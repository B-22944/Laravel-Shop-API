<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('listCategory',[CategoryController::class,'listCategory']);
Route::get('listProduct/{id?}',[ProductController::class,'listProduct']);
Route::get('searchCategory/{id}',[ProductController::class,'searchCategory']);