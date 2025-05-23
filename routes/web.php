<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\OperationController;

/* POST /language-switch  (keeps your JS-based selector, if any) */
Route::post('language-switch', [LanguageController::class, 'switch'])
    ->name('lang.switch');

/* GET /   →  /{locale}   (defaults to the current app locale) */
Route::get('/', fn () => redirect(app()->getLocale()));

/* All public pages under /{locale}/… */
Route::group([
    'prefix'     => '{locale}',
    'where'      => ['locale' => implode('|', config('app.supported_locales'))],
    // “web” already contains your SetLocale middleware (bootstrapped),
    // so we don’t need to list 'setlocale' again.
    'middleware' => 'web',
], function () {
    Route::get('/.well-known/acme-challenge/{any}', function () {
        return response('OK', 200);
    })->where('any', '.*');
    /* ----------  Auth  ---------- */
    Route::get ('/login',  [LoginController::class, 'index'])->name('login');
    Route::post('/login',  [LoginController::class, 'authenticate'])->name('login.submit');

    /* ----------  Protected  ---------- */
    /*Route::middleware('auth:agent')->group(function () {
        Route::view('/commissions', 'commissions.index')->name('commissions');
        Route::view('/payment-details',  'payment-details.index')->name('payment-details');
    });*/

    Route::view('/bookings', 'bookings.index')->name('bookings');
    Route::view('/commissions', 'commissions.index')->name('commissions');
    Route::view('/payment-details',  'payment-details.index')->name('payment-details');

});
