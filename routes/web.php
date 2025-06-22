<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdoptionController;

Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/', function () {return view('landing'); })->name('landing');
Route::get('/adopsi/formulir', [AdoptionController::class, 'create'])->name('adoption.form');
Route::post('/adopsi/formulir', [AdoptionController::class, 'store'])->name('adoption.store');
