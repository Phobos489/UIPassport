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

Route::middleware('guest.check')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    
    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
});

/*
|--------------------------------------------------------------------------
| User Only Routes (Only for logged in users with 'user' role)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth.check', 'role.check:user'])->group(function () {
    Route::get('/form', function () {
        return view('form');
    })->name('form');
    
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
});

/*
|--------------------------------------------------------------------------
| Admin Only Routes (Only for logged in users with 'admin' role)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth.check', 'role.check:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Admin can also access profile
    Route::get('/profile', function () {
        return view('profile');
    })->name('profile.admin');
});

/*
|--------------------------------------------------------------------------
| Catch All Route - 404 Handler
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return view('errors.404');
});