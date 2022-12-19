<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\main\UserController;
use App\Http\Controllers\main\OffersController;

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

// Default Laravel home screen
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes. Automatically generated.
Auth::routes();

// Dashboard, Offers and Promotional codes. WIP.
Route::controller(OffersController::class)->group(function() {
    Route::get('/home', 'homepage')->name('home');
    Route::get('/offers', 'showOffersPage')->name('goToOffers');
    Route::get('/details', 'showDetailsPage')->name('goToDetails');
    Route::get('/createOffer', 'showCreateOfferForm')->name('goToCreateOffer');
    Route::post('/createOffer', 'createOffer')->name('createOffer');
    Route::get('/generateCode', 'generatePromotionalCode')->name('generateCode');
    Route::get('/redeemCode/{id}', 'redeemPromotionalCode')->name('redeemCode');
});

// User Authentication Control
Route::controller(UserController::class)->group(function() {
    Route::get('/changePassword', 'showChangePasswordForm')->name('goToChange');
    Route::post('/changePassword', 'changePassword')->name('changePassword');
    Route::get('/recoverPassword', 'showRecoverPasswordForm')->name('goToRecover');
    Route::post('/recoverPassword', 'recoverPassword')->name('recoverPassword');
});