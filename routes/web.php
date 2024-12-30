<?php

use App\Http\Controllers\FrontEnd\LocationController;
use App\Http\Controllers\FrontEnd\CandidateDashboardController;
use App\Http\Controllers\FrontEnd\CandidateProfileController;
use App\Http\Controllers\FrontEnd\CompanyDashboardController;
use App\Http\Controllers\FrontEnd\CompanyProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route for fetching states of a country
Route::get('/get-states/{countryId}', [
    LocationController::class,
    'getStatesOfCountry',
])->name('get-states');

// Route for Fetching Cities of a State
Route::get('/get-cities/{stateId}', [
    LocationController::class,
    'getCitiesOfState',
])->name('get-cities');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name(
        'profile.edit'
    );
    Route::patch('/profile', [ProfileController::class, 'update'])->name(
        'profile.update'
    );
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name(
        'profile.destroy'
    );
});

require __DIR__ . '/auth.php';

// route Group for candidate
Route::group(
    [
        'middleware' => ['auth:web', 'verified', 'user.role:candidate'],
        'prefix' => 'candidate',
        'as' => 'candidate.',
    ],
    function () {
        Route::get('/dashboard', [
            CandidateDashboardController::class,
            'index',
        ])->name('dashboard');

        Route::get('/profile', [
            CandidateProfileController::class,
            'index',
        ])->name('profile');

        Route::post('/profile/basic-info', [
            CandidateProfileController::class,
            'basicInfoUpdate',
        ])->name('profile.basic-info');
    }
);

// route Group for company
Route::group(
    [
        'middleware' => ['auth:web', 'verified', 'user.role:company'],
        'prefix' => 'company',
        'as' => 'company.',
    ],
    function () {
        Route::get('/dashboard', [
            CompanyDashboardController::class,
            'index',
        ])->name('dashboard');

        Route::get('/profile', [
            CompanyProfileController::class,
            'index',
        ])->name('profile');

        Route::post('/profile/company-info', [
            CompanyProfileController::class,
            'updateCompanyInfo',
        ])->name('profile.company-info');

        Route::post('/profile/founding-info', [
            CompanyProfileController::class,
            'updateFoundingInfo',
        ])->name('profile.founding-info');

        Route::post('/profile/account-info', [
            CompanyProfileController::class,
            'updateAccountInfo',
        ])->name('profile.account-info');

        Route::post('/profile/password-info', [
            CompanyProfileController::class,
            'updatePasswordInfo',
        ])->name('profile.password-info');
    }
);
