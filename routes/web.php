<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShortlinkController;
use App\Http\Middleware\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShortlinkController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register.post');

Route::middleware([Auth::class])->group(function () {
    Route::get('/dashboard', [ShortlinkController::class, 'dashboard'])->name('dashboard');
    Route::get('/shortlinks/create', [ShortlinkController::class, 'create'])->name('shortlinks.create');
    Route::post('/shortlinks', [ShortlinkController::class, 'store'])->name('shortlinks.store');
    Route::get('/shortlinks/{shortlink}', [ShortlinkController::class, 'show'])->name('shortlinks.show');
    Route::get('/shortlinks/{shortlink}/edit', [ShortlinkController::class, 'edit'])->name('shortlinks.edit');
    Route::put('/shortlinks/{shortlink}', [ShortlinkController::class, 'update'])->name('shortlinks.update');
    Route::delete('/shortlinks/{shortlink}', [ShortlinkController::class, 'destroy'])->name('shortlinks.destroy');
});

// Route to handle the short URL redirection
Route::get('/{short_url}', [ShortlinkController::class, 'redirect'])->name('shortlinks.redirect');