<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AdminMoviesController;


// Homepage Route using HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Movies Routes
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create')->middleware('auth');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store')->middleware('auth');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show'); // This will render movie_details_page.blade.php
Route::get('/movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit')->middleware('auth');
Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update')->middleware('auth');
Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy')->middleware('auth');
Route::post('/movies/{movie}/wishlist', [MovieController::class, 'addToWishlist'])->name('movies.addToWishlist');

// Wishlist Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{movie}', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{movie}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
});

// Admin Routes
Route::middleware(['auth', 'check.admin'])->group(function () {
    Route::get('/admin/movies', [MovieController::class, 'index'])->name('admin.movies.index');
    Route::get('/admin/movies/create', [MovieController::class, 'create'])->name('admin.movies.create');
    Route::post('/admin/movies', [MovieController::class, 'store'])->name('admin.movies.store');
    Route::get('/admin/movies/{movie}/edit', [MovieController::class, 'edit'])->name('admin.movies.edit');
    Route::put('/admin/movies/{movie}', [MovieController::class, 'update'])->name('admin.movies.update');
    Route::delete('/admin/movies/{movie}', [MovieController::class, 'destroy'])->name('admin.movies.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/movies', [MovieController::class, 'index'])->name('admin.movies.index');
    Route::get('/admin/movies/create', [AdminMoviesController::class, 'create'])->name('admin.movies.create');
    Route::post('/admin/movies', [AdminMoviesController::class, 'store'])->name('admin.movies.store');
    Route::get('/admin/movies/{movie}/edit', [AdminMoviesController::class, 'edit'])->name('admin.movies.edit');
    Route::put('/admin/movies/{movie}', [AdminMoviesController::class, 'update'])->name('admin.movies.update');
    Route::delete('/admin/movies/{movie}', [AdminMoviesController::class, 'destroy'])->name('admin.movies.destroy');
});
