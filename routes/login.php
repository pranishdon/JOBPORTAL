<?php

use App\Http\Controllers\AuthForgetPassword;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;


Route::middleware(['userlogin','throttle:70,1'])->group(function () {

    Route::get('/', function () {
        return view('login.index');
    })->name('guestlogin');
    Route::post('login/index', [RegisterController::class, 'login'])->name('login.perform');
    Route::get('register', [RegisterController::class, 'register'])->name('register');
    Route::post('register/input', [RegisterController::class, 'registerInput'])->name('registerInput');


    Route::get('auth/forget/password',[AuthForgetPassword::class,'forgetPassowrdIndex'])->name('forgotpassword');;
    Route::post('auth/check/email',[AuthForgetPassword::class,'forgetPassword'])->name('forgotcheckpassword');

    // Password reset routes...
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});
