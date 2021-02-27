<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', function (){
    return view('/dashboard');
})->middleware('auth');