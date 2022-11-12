<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\MailForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{

    public function contact(ContactFormRequest $request): \Illuminate\Http\JsonResponse
    {
        $formData = $request->validated();

        foreach (['djtresk@gmail.com', 'happy_centre@mail.ru'] as $recipient) {
            Mail::to($recipient)->send(new MailForm($formData));
        }

        return response()->json('Спасибо за заявку!', 200, array());
    }
}
