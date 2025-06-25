<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\PostController;


Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/adopt/detail-adopt', [PostController::class, 'indexDetail'])->name('adopt.detail');
Route::get('/adopt/post-adopt', [PostController::class, 'indexAdopt'])->name('adopt.post');
Route::get('/', function () {return view('landing'); })->name('landing');
Route::get('/adopsi/formulir', [AdoptionController::class, 'create'])->name('adoption.form');
Route::post('/adopsi/formulir', [AdoptionController::class, 'store'])->name('adoption.store');
Route::get('/faq_adopt', [FAQController::class, 'adopter_view'])->name('faqAdopt.view');
Route::get('/faq_rehome', [FAQController::class, 'rehomer_view'])->name('faqRehome.view');
Route::get('/tentang_kami', [TentangKamiController::class, 'view'])->name('tentangKami.view');