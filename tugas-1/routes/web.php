<?php

use App\Http\Controllers\tugas1controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('routing')->group(function () {
    Route::get('/', function () {
        return view('routing');
    })->name('routing.page');

    Route::get('/basic', function () {
        return view('routing.basic');
    })->name('routing.basic');

    Route::get('/named', function () {
        return view('routing.named');
    })->name('routing.named');

    Route::get('/grouped', function () {
        return view('routing.grouped');
    })->name('routing.grouped');
});

Route::prefix('math')->group(function () {
    Route::get('/', function () {
        return view('math');
    })->name('math.page');

    Route::get('/evenodd', [Tugas1Controller::class, 'showForm'])->name('math.evenodd');
    Route::post('/evenodd', [Tugas1Controller::class, 'checkNumber'])->name('check.number');

    Route::get('/primenumber', [Tugas1Controller::class, 'showPrimeForm'])->name('math.primenumber');
    Route::post('/primenumber', [Tugas1Controller::class, 'checkPrime'])->name('check.prime');

    Route::get('/fibonacci', [Tugas1Controller::class, 'showFibonacciForm'])->name('math.fibonacci');
    Route::post('/fibonacci', [Tugas1Controller::class, 'generateFibonacci'])->name('check.fibonacci');
});
