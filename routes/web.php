<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use Illuminate\Foundation\Auth\EmailVerificationPromptController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-mail', function(){
    try {
        Mail::to('mugishaa388@gmail.com')->send(new App\Mail\TestMail());
        return 'Mail sent successfully';
    } catch (\Exception $e) {
        return 'Failed to send mail: ' . $e->getMessage();
    }
});
Route::get('/verify-email/{token}',[AuthController::class, 'verifyEmail'])->name('verify.email');
Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login' ,[AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/email-redirection', [AuthController::class, 'emailMessage']);

// Route::resource('contact', ContactController::class);
