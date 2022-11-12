<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusEnum;
use App\Http\Requests\PaymentFormRequest;
use App\Mail\PaymentData;
use App\Models\Transaction;
use App\Service\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;

class PaymentController extends Controller
{
    /**
     * @throws NotFoundException
     * @throws ResponseProcessingException
     * @throws ApiException
     * @throws ExtensionNotFoundException
     * @throws BadApiRequestException
     * @throws InternalServerError
     * @throws ForbiddenException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     * @throws ValidationException
     */
    public function create(PaymentFormRequest $request, PaymentService $service)
    {
        $amount = (float)$request->get('amount');
        $description = $request->get('name');
        $phone = $request->get('phone');

        $transaction = Transaction::create([
            'amount' => $amount,
            'description' => $description,
            'phone' => $phone
        ]);

        if ($transaction) {
            $link = $service->createPayment($amount, $description, [
                'transaction_id' => $transaction->id
            ]);

            return redirect()->away($link);
        }
    }

    /**
     * @throws NotFoundException
     * @throws ResponseProcessingException
     * @throws ApiException
     * @throws BadApiRequestException
     * @throws ExtensionNotFoundException
     * @throws InternalServerError
     * @throws ForbiddenException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     */
    public function callback(Request $request, PaymentService $service)
    {
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);
        $notification = (isset($requestBody['event'])) && ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded($requestBody)
            : new NotificationWaitingForCapture($requestBody);
        $payment = $notification->getObject();

        if (isset($payment->status) && $payment->status === 'waiting_for_capture') {
            $service->getClient()->capturePayment([
                'amount' => $payment->amount,
            ], $payment->id, uniqid('', true));
        }

        if (isset($payment->status) && $payment->status === 'succeeded') {
            if ($payment->paid === true) {
                $metadata = (object)$payment->metadata;
                if (isset($metadata->transaction_id)) {
                    $transactionId = (int)$metadata->transaction_id;
                    $transaction = Transaction::find($transactionId);
                    $transaction->status = PaymentStatusEnum::CONFIRMED;
                    $transaction->save();

                    foreach (['djtresk@gmail.com', 'happy_centre@mail.ru'] as $recipient) {
                        Mail::to($recipient)->send(new PaymentData($transaction));
                    }
                };
            }
        };
    }
}
