<?php

use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndustriTypeController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\OrganizationTypeController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\StateController;
use App\Models\Country;
use Illuminate\Support\Facades\Route;

Route::group(
    ['middleware' => ['guest:admin'], 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        Route::get('login', [
            AuthenticatedSessionController::class,
            'create',
        ])->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [
            PasswordResetLinkController::class,
            'create',
        ])->name('password.request');

        Route::post('forgot-password', [
            PasswordResetLinkController::class,
            'store',
        ])->name('password.email');

        Route::get('reset-password/{token}', [
            NewPasswordController::class,
            'create',
        ])->name('password.reset');

        Route::post('reset-password', [
            NewPasswordController::class,
            'store',
        ])->name('password.store');
    }
);

Route::group(
    ['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'],
    function () {
        // admin dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name(
            'dashboard'
        );

        Route::get(
            'verify-email',
            EmailVerificationPromptController::class
        )->name('verification.notice');

        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('email/verification-notification', [
            EmailVerificationNotificationController::class,
            'store',
        ])
            ->middleware('throttle:6,1')
            ->name('verification.send');

        Route::get('confirm-password', [
            ConfirmablePasswordController::class,
            'show',
        ])->name('password.confirm');

        Route::post('confirm-password', [
            ConfirmablePasswordController::class,
            'store',
        ]);

        Route::put('password', [PasswordController::class, 'update'])->name(
            'password.update'
        );

        Route::post('logout', [
            AuthenticatedSessionController::class,
            'destroy',
        ])->name('logout');

        // Industri Type Route
        Route::resource('/industry-type', IndustriTypeController::class);

        // Organization Type Route
        Route::resource(
            '/organization-type',
            OrganizationTypeController::class
        );

        // Country Route
        Route::resource('/countries', CountryController::class);

        // State Route
        Route::resource('/states', StateController::class);

        // City Route
        Route::resource('/cities', CityController::class);

        // Languages Route
        Route::resource('/languages', LanguageController::class);

        // Profession Route
        Route::resource('/professions', ProfessionController::class);

        //Skills Route
        Route::resource('/skills', SkillController::class);

        Route::get('get-states/{countryId}', [
            LocationController::class,
            'getStatesOfCountry',
        ])->name('get.states');
    }
);
