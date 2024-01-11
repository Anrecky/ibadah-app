<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ManageUser;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Manage User Routes
    // Route::get('kelola-user', ManageUser::class)->name('manage-user.index');
    Route::get('kelola-user', ManageUser::class)->name('manage-user.index');
});

require __DIR__ . '/auth.php';
