<?php

use App\Http\Controllers\CallController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamMemberController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [DashboardController::class, 'welcome'])->name('home');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::Resource('posts', PostController::class)->only(['index', 'show'])->names('posts');
Route::Resource('calls', CallController::class)->only(['index', 'show'])->names('calls');
Route::Resource('team-members', TeamMemberController::class)->only(['index', 'show'])->names('team-members');

require __DIR__ . '/auth.php';
