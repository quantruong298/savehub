<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Bookmark\Index as BookmarkIndex;
use App\Livewire\Folder\Index as FolderIndex;

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
Route::middleware(['auth'])->group(function () {
    // Bookmark Route
    Route::get('/dashboard', BookmarkIndex::class)->name('dashboard');
    // Folder Route
    Route::get('/dashboard/folder', FolderIndex::class)->name('dashboard.folder');
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
