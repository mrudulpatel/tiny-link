<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard/{id}', [AuthController::class, 'dashboard']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'login'])->name('login.custom');
Route::get('register', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'register'])->name('register.custom');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::post('shorten/{id}', [App\Http\Controllers\UrlController::class, 'shorten'])->name('shorten');

Route::get('/{code}', [App\Http\Controllers\UrlController::class, 'shortenLink'])->name('shorten.link');
// Read the data from table urls

