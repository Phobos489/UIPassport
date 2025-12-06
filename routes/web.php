<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Accessible by Everyone)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Guest Only Routes (Login/Register pages - redirect if already logged in)
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

/*
|--------------------------------------------------------------------------
| Authenticated Routes (Require login - checked via JavaScript)
|--------------------------------------------------------------------------
*/

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Fallback - 404 Handler
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return view('errors.404');
});