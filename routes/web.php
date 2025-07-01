<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AccountController;

Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/adopt/detail-adopt/{pet}', [PostController::class, 'indexDetail'])->name('adopt.detail');
Route::get('/adopt/post-adopt', [PostController::class, 'indexAdopt'])->name('adopt.post');
Route::get('/', function () {return view('landing'); })->name('landing');
Route::get('/rehomer/formulir/{pet}', [AdoptionController::class, 'create'])->name('rehomer.form');
Route::post('/rehomer/formulir/{pet}', [AdoptionController::class, 'create'])->name('rehomer.store');

Route::get('/adopsi/formulir/{pet}', [AdoptionController::class, 'create'])->name('adoption.form');
Route::post('/adopsi/formulir/{pet}', [AdoptionController::class, 'store'])->name('adoption.store');
Route::get('/faq-adopt', [FAQController::class, 'adopter_view'])->name('faqAdopt.view');
Route::get('/faq-rehome', [FAQController::class, 'rehomer_view'])->name('faqRehome.view');
Route::get('/tentang-kami', [TentangKamiController::class, 'view'])->name('tentangKami.view');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::put('/account/update-profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
Route::delete('/search-history/{id}', [AccountController::class, 'deleteSearchHistory'])
    ->middleware('auth')
    ->name('searchHistory.destroy');