<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;



Route::group(['middleware' => [ 'dashboard']], function () {
    Route::get('userLogin', [UserController::class, 'userIndex'])->name('userLogin');


    Route::get('findJob', [UserController::class, 'findJob']);
    Route::get('userPostJob', [UserController::class, 'postJOb']);
    Route::get('userJobDetail', [UserController::class, 'jobDetail']);
});

Route::group(['middleware' => [ 'AdminIs']], function () {
    Route::get('dashboardAdmin', [RegisterController::class, 'superAdmin'])->name('superAdminDashhboard');
});
Route::get('adminLogout', [RegisterController::class, 'superAdminLogout'])->name('adminLogout');

Route::get('userLogout', [UserController::class, 'userLogout'])->name('userLogout');







