<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Bookmark\Index;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login'); // Trang này chứa <livewire:auth.login-form />
})->middleware('guest')->name('login');


Route::get('/register', function () {
    return view('auth.register');
})->name('register');



Route::view('dashboard', 'layouts.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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
