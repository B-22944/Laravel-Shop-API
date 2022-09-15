<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Listing the products category
Route::get('listCategory',[CategoryController::class,'listCategory'])->name('categories.show');
//Searching the data on the basis of category_id
Route::get('category/{id}',[ProductController::class,'category'])->name('products.search_category');

/*
API CRUD Routes
*/
Route::get('/products',[ProductController::class,'showAll'])->name('products.show_all');
Route::post('/product/add',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{id}',[ProductController::class,'show'])->name('APIproducts.show');
Route::put('/products/{id}',[ProductController::class,'update'])->name('products.update');
Route::delete('/products/{id}',[ProductController::class,'destroy'])->name('products.delete');