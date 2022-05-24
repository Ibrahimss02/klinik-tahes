<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::post('login/dokter', [DokterController::class, 'login'])
        ->name('dokter.login');

    Route::post('register/dokter', [DokterController::class, 'register'])
        ->name('dokter.register');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('reservasi', [DokterController::class, 'index'])
        ->name('reservasi.index');

    Route::get('reservasi/list', [ReservasiController::class, 'listReservasi'])
        ->name('reservasi.list');

    Route::get('reservasi/{id_dokter}', [ReservasiController::class, 'reservasiDokter'])
        ->name('reservasi');

    Route::post('reservasi/{id_dokter}/create', [ReservasiController::class, 'createReservasi'])
        ->name('reservasi.dokter');

    Route::get('reservasi/list/{id_reservasi}', [ReservasiController::class, 'detailReservasi'])
        ->name('reservasi.detail');

    Route::post('reservasi/list/{id_reservasi}/update', [ReservasiController::class, 'updateReservasi']);

    Route::post('reservasi/list/{id_reservasi}/delete', [ReservasiController::class, 'deleteReservasi']);

    Route::get('resep', [ResepController::class, 'indexPasien'])
        ->name('resep.index');

    Route::get('resep/{id_resep}', [ResepController::class, 'showPasienResep'])
        ->name('resep.detail');
});
