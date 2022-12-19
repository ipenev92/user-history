<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\main\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User
Route::get('/changePassword', [UserController::class, 'showChangePasswordForm'])->name('goToChange');
Route::post('/changePassword',[UserController::class, 'changePassword'])->name('changePassword');
Route::get('/recoverPassword', [UserController::class, 'showRecoverPasswordForm'])->name('goToRecover');
Route::post('/recoverPassword', [UserController::class, 'recoverPassword'])->name('recoverPassword');