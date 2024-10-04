<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::post('/products',[ProductController::class,'save'])->name('products.create'); 
Route::get('/products/{id}',[ProductController::class,'getProductById'])->name('products.id'); 
Route::put('/products/{id}',[ProductController::class,'update'])->name('products.update'); 
Route::delete('/products/{id}',[ProductController::class,'delete'])->name('products.delete'); 