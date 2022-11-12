<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/grade/{slug}', [GradeController::class, 'show'])->name('grade');
Route::get('/sections', [SectionController::class, 'index'])->name('section');
Route::get('/policy', [PolicyController::class, 'index'])->name('policy');
Route::post('contact', [ContactController::class, 'contact'])->name('contact');

// Оплата
Route::match(['GET', 'POST'], 'payments/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::post('payments/create', [PaymentController::class, 'create'])->name('payment.create');

Route::redirect('/login', '/admin/login')->name('login');
