<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\FolderController;
use App\Livewire\Folder\Index;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// Auth Routes
Route::get('/login', function () {
    return view('auth.login'); // Trang này chứa <livewire:auth.login-form />
})->middleware('guest')->name('login');

Route::post('logout', App\Livewire\Actions\Logout::class)
    ->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Dashboard Routes
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [BookmarkController::class, 'index'])->name('dashboard');
    Route::get('/folder', Index::class)->name('dashboard.folder');
});







// Route::view('dashboard', 'layouts.dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::redirect('settings', 'settings/profile');

//     Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
//     Volt::route('settings/password', 'settings.password')->name('settings.password');
//     Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
// });

// Route::middleware(['auth'])->group(function () {
//     Route::get('/client-dashboard', Index::class)->name('client.dashboard');
// });

// require __DIR__.'/auth.php';
