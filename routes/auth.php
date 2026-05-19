<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// Disable all public auth routes - redirect to admin login
Route::middleware('guest')->group(function () {
    Route::get('register', function () {
        return redirect()->route('admin.login');
    })->name('register');

    Route::post('register', function () {
        return redirect()->route('admin.login');
    });

    Route::get('login', function () {
        return redirect()->route('admin.login');
    })->name('login');

    Route::post('login', function () {
        return redirect()->route('admin.login');
    });

    Route::get('forgot-password', function () {
        return redirect()->route('admin.login');
    })->name('password.request');

    Route::post('forgot-password', function () {
        return redirect()->route('admin.login');
    })->name('password.email');

    Route::get('reset-password/{token}', function () {
        return redirect()->route('admin.login');
    })->name('password.reset');

    Route::post('reset-password', function () {
        return redirect()->route('admin.login');
    })->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', function () {
        return redirect()->route('admin.login');
    })->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', function () {
        return redirect()->route('admin.login');
    })->name('verification.verify');

    Route::post('email/verification-notification', function () {
        return redirect()->route('admin.login');
    })->name('verification.send');

    Route::get('confirm-password', function () {
        return redirect()->route('admin.login');
    })->name('password.confirm');

    Route::post('confirm-password', function () {
        return redirect()->route('admin.login');
    });

    Route::put('password', function () {
        return redirect()->route('admin.login');
    })->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
