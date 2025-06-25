<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/adopt/detail-adopt', [PostController::class, 'indexDetail'])->name('adopt.detail');
Route::get('/adopt/post-adopt', [PostController::class, 'indexAdopt'])->name('adopt.post');
Route::get('/', function () {return view('landing'); })->name('landing');
