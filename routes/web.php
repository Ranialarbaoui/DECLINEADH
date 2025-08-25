<?php

use App\Http\Controllers\AdherentController;
use App\Http\Controllers\AdhUserAuthController;
use App\Http\Controllers\PasswordChangeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BeneficiaireController;

// Redirect root to login
Route::get('/', function () {
    return redirect('/login');
});

// Dashboard route (protected by auth middleware)
Route::middleware('auth')->group(function () {
Route::get('/dashboard', function () {return view('dashboard'); })->name('dashboard');
});

// Authentication routes
Route::get('/login', [AdhUserAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdhUserAuthController::class, 'login']);
Route::get('/password/update', [AdhUserAuthController::class, 'showPasswordForm'])->name('password.update.form');
Route::post('/password/update', [AdhUserAuthController::class, 'updatePassword'])->name('password.update');
Route::post('/logout', [AdhUserAuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [BeneficiaireController::class, 'showForm'])->middleware('auth');

Route::post('/choisir-type', [AdhUserAuthController::class, 'choisirType'])->name('choisir.type');
