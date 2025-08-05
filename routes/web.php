<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/auth/registration', [MainController::class, 'registration'])->name('auth.registration');
Route::get('/auth/login', [MainController::class, 'login'])->name('auth.login');

Route::get('/profiles/profile', [MainController::class, 'profile'])->name('profiles.profile');
Route::post('/auth/registration', [AuthController::class, 'registration'])->name('auth.registration');
Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login');



Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/show', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');



Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/show', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');

