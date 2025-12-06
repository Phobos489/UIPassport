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
| Guest Only Routes (Only for users NOT logged in)
|--------------------------------------------------------------------------
*/

Route::middleware(['guest.check'])->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register')->name('register');
});

/*
|--------------------------------------------------------------------------
| User Only Routes (Only for logged in users with 'user' role)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth.check', 'role.check:user'])->group(function () {
    Route::view('/form', 'form')->name('form');
    Route::view('/profile', 'profile')->name('profile');
});

/*
|--------------------------------------------------------------------------
| Admin Only Routes (Only for logged in users with 'admin' role)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth.check', 'role.check:admin'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::view('/profile', 'profile')->name('profile.admin');
});

/*
|--------------------------------------------------------------------------
| Catch All Route - 404 Handler
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return view('errors.404');
});

// Test route untuk middleware
Route::get('/test-middleware', function () {
    return 'Middleware test OK';
})->middleware('auth.check');