<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', function (){
    return view('/dashboard');
})->middleware('auth');

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->middleware('auth');
    Route::get('/create', [CategoryController::class, 'create'])->middleware('auth');
    Route::post('/create/register', [CategoryController::class, 'store'])->middleware('auth');
    Route::get('/update/{id}', [CategoryController::class, 'edit'])->middleware('auth');
    Route::put('/update/alter/{id}', [CategoryController::class, 'update'])->middleware('auth');
    Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->middleware('auth');
});

Route::prefix('subcategory')->group(function () {
    Route::get('/', [SubcategoryController::class, 'index'])->middleware('auth');
    Route::get('/create', [SubcategoryController::class, 'create'])->middleware('auth');
    Route::post('/create/register', [SubcategoryController::class, 'store'])->middleware('auth');
    Route::get('/update/{id}', [SubcategoryController::class, 'edit'])->middleware('auth');
    Route::put('/update/alter/{id}', [SubcategoryController::class, 'update'])->middleware('auth');
    Route::delete('/delete/{id}', [SubcategoryController::class, 'destroy'])->middleware('auth');
    Route::get('/listByCategory/{idCategory}', [SubcategoryController::class, 'listSubcategoryByCategory'])->middleware('auth');
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->middleware('auth');
    Route::get('/create', [ProductController::class, 'create'])->middleware('auth');
    Route::post('/create/register', [ProductController::class, 'store'])->middleware('auth');
    Route::get('/update/{id}', [ProductController::class, 'edit'])->middleware('auth');
    Route::put('/update/alter/{id}', [ProductController::class, 'update'])->middleware('auth');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->middleware('auth');
});