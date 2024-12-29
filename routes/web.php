<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/donate/{donation}', [DashboardController::class, 'showDonation'])->name('donate');
    Route::post('/donate/{donation}/submit', [DashboardController::class, 'donate'])->name('donate.submit');

    Route::resource('donations', DonationController::class);

    Route::resource('posts', PostController::class);

    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
});

require __DIR__.'/auth.php';
