<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/login', 'login-stateless::page')->middleware('guest');

Route::view('/dashboard', 'login-stateless::page')->middleware(['auth', 'verified', 'can:admin']);
