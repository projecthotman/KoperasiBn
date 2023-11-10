<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login-action', [AuthController::class, 'login_action'])->name('login_action');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register-store', [AuthController::class, 'register_store'])->name('register_store');
    // Definisi rute pendaftaran, lupa kata sandi, dll.
});

Route::middleware(['auth'])->group(function () {
    route::get('profile', [AuthController::class, 'profile'])->name('profil');

    Route::get('/', [HomeController::class, 'home'])->name("home");
    // Tambahkan rute-rute lain yang memerlukan autentikasi di sini
});




