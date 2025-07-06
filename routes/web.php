<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest; // <-- Add this line
use Illuminate\Http\Request; // <-- This should already be here
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RehomerController;
use App\Models\Pet;
Route::get('/register', [RegisterController::class, 'view'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/adopt/detail-adopt/{pet}', [PostController::class, 'indexDetail'])->name('adopt.detail');
Route::get('/adopt/post-adopt', [PostController::class, 'indexAdopt'])->name('adopt.post');
Route::get('/', function () {
    $pets = Pet::where('status', 'available')->latest()->take(4)->get();
    return view('landing', ['pets' => $pets]);
})->name('landing');

Route::get('/faq-adopt', [FAQController::class, 'adopter_view'])->name('faqAdopt.view');
Route::get('/faq-rehome', [FAQController::class, 'rehomer_view'])->name('faqRehome.view');
Route::get('/tentang-kami', [TentangKamiController::class, 'view'])->name('tentangKami.view');
Route::delete('/search-history/{id}', [AccountController::class, 'deleteSearchHistory'])->name('searchHistory.destroy');
// routes/web.php
Route::get('/auth/google/redirect', [LoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');

//Route::middleware(['auth', 'permission:Admin'])->group(function () {
//});
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified'])->group(function () {


//Route::middleware(['auth', 'permission:Admin'])->group(function () {
//});


Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //rehome
    Route::get('/rehomer/formulir', [RehomerController::class, 'create'])->name('rehomer.form');
    Route::post('/rehomer/formulir', [RehomerController::class, 'store'])->name('rehomer.store');

    //adopt
    Route::get('/adopsi/formulir/{pet}', [AdoptionController::class, 'create'])->name('adoption.form');
    Route::post('/adopsi/formulir/{pet}', [AdoptionController::class, 'store'])->name('adoption.store');

    //account
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::put('/account/update-profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');
    Route::put('/account/change-password', [AccountController::class, 'changePassword'])->name('account.changePassword');
    Route::put('/adoption/accept/{id}', [AccountController::class, 'accept'])->name('adoption.accept');
    Route::put('/adoption/reject/{id}', [AccountController::class, 'reject'])->name('adoption.reject');
    Route::get('/adoption/review/{id}', [AccountController::class, 'review'])->name('adoption.review');
});

Route::middleware(['auth', 'permission:Admin'])->group(function () {
    #dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'indexDashboard'])->name('admin.dashboard');

    #curd pengguna
    Route::get('/admin/pengguna', [AdminController::class, 'indexUsers'])->name('admin.pengguna');
    Route::post('/admin/pengguna', [AdminController::class, 'indexUsers'])->name('admin.pengguna.search');
    Route::get('/admin/pengguna/tambah', [AdminController::class, 'createUser'])->name('admin.pengguna.create');
    Route::post('/admin/pengguna/tambah', [AdminController::class, 'storeUser'])->name('admin.pengguna.store');
    Route::get('/admin/pengguna/view-pengguna/{id}', [AdminController::class, 'showUser'])->name('admin.pengguna.view');
    Route::get('/admin/pengguna/edit-pengguna/{id}', [AdminController::class, 'indexeditUser'])->name('admin.pengguna.edit');
    Route::post('/admin/pengguna/edit-pengguna/{id}', [AdminController::class, 'updateUser'])->name('admin.pengguna.edit.post');
    Route::put('/admin/pengguna/{id}', [AdminController::class, 'deleteUser'])->name('admin.pengguna.delete');

    #curd postingan
    Route::get('/admin/postingan', [AdminController::class, 'indexPosts'])->name('admin.postingan');
    Route::post('/admin/postingan', [AdminController::class, 'indexPosts'])->name('admin.postingan.search');
    Route::get('/admin/postingan/view-postingan/{id}', [AdminController::class, 'viewdetailPost'])->name('admin.postingan.view');
    Route::get('/admin/postingan/edit-postingan/{id}', [AdminController::class, 'vieweditPost'])->name('admin.postingan.view.edit');
    Route::post('/admin/postingan/edit-postingan/{id}', [AdminController::class, 'updatePost'])->name('admin.postingan.view.post');
    Route::put('/admin/postingan/{id}', [AdminController::class, 'deletePost'])->name('admin.postingan.delete');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['auth', 'permission:Admin'])->group(function () {
    #dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'indexDashboard'])->name('admin.dashboard');

    #curd pengguna
    Route::get('/admin/pengguna', [AdminController::class, 'indexUsers'])->name('admin.pengguna');
    Route::post('/admin/pengguna', [AdminController::class, 'indexUsers'])->name('admin.pengguna.search');
    Route::get('/admin/pengguna/tambah', [AdminController::class, 'createUser'])->name('admin.pengguna.create');
    Route::post('/admin/pengguna/tambah', [AdminController::class, 'storeUser'])->name('admin.pengguna.store');
    Route::get('/admin/pengguna/view-pengguna/{id}', [AdminController::class, 'showUser'])->name('admin.pengguna.view');
    Route::get('/admin/pengguna/edit-pengguna/{id}', [AdminController::class, 'indexeditUser'])->name('admin.pengguna.edit');
    Route::post('/admin/pengguna/edit-pengguna/{id}', [AdminController::class, 'updateUser'])->name('admin.pengguna.edit.post');
    Route::put('/admin/pengguna/{id}', [AdminController::class, 'deleteUser'])->name('admin.pengguna.delete');

    #curd postingan
    Route::get('/admin/postingan', [AdminController::class, 'indexPosts'])->name('admin.postingan');
    Route::post('/admin/postingan', [AdminController::class, 'indexPosts'])->name('admin.postingan.search');
    Route::get('/admin/postingan/view-postingan/{id}', [AdminController::class, 'viewdetailPost'])->name('admin.postingan.view');
    Route::get('/admin/postingan/edit-postingan/{id}', [AdminController::class, 'vieweditPost'])->name('admin.postingan.view.edit');
    Route::post('/admin/postingan/edit-postingan/{id}', [AdminController::class, 'updatePost'])->name('admin.postingan.view.post');
    Route::put('/admin/postingan/{id}', [AdminController::class, 'deletePost'])->name('admin.postingan.delete');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

