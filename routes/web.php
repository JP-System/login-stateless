<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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

Route::redirect('/', '/dashboard');

Volt::route('login', 'auth.login')->middleware('guest')->name('login');

Volt::route('dashboard', 'dashboard.index')->middleware(['auth', 'verified', 'can:admin'])->name('dashboard');

// Volt::route('dashboard', 'dashboard.index')->name('dashboard');

// Route::view('dashboard', 'dashboard')->middleware(['auth', 'verified', 'can:admin'])->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');
