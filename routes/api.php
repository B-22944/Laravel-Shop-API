<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Listing the products category
Route::get('listCategory',[CategoryController::class,'listCategory'])->name('categories.show_categories');
//Listing the products
Route::get('listProduct/{id?}',[ProductController::class,'listProduct'])->name('products.show_products');;
//Searching the data on the basis of category_id
Route::get('category/{id}',[ProductController::class,'category'])->name('products.search_category');;