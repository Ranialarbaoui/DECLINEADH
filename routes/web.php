<?php
use App\Http\Controllers\AdhUserAuthController;
use App\Http\Controllers\PasswordChangeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/password/change', [PasswordChangeController::class, 'edit'])->name('password.change');
//     Route::post('/password/change', [PasswordChangeController::class, 'update'])->name('password.change.update');
// });
// Route::post('/login', [LoginController::class, 'login'])->name('login');
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');








Route::get('/login', [AdhUserAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdhUserAuthController::class, 'login']);
Route::get('/password/update', [AdhUserAuthController::class, 'showPasswordForm'])->name('password.update.form');
Route::post('/password/update', [AdhUserAuthController::class, 'updatePassword'])->name('password.update');
Route::post('/logout', [AdhUserAuthController::class, 'logout'])->name('logout');