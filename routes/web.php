<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => [ 'dashboard']], function () {
    Route::get('dashboard', [RegisterController::class, 'dashboardIndex'])->name('admin');
});

Route::group(['middleware' => [ 'AdminIs']], function () {
    Route::get('dashboardAdmin', [RegisterController::class, 'superAdmin'])->name('superAdminDashhboard');
});
Route::get('adminLogout', [RegisterController::class, 'superAdminLogout'])->name('adminLogout');







