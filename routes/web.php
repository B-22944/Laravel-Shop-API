<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

//Categories routes in a group
Route::group(['prefix' => 'categories'],function(){
    Route::get('/',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');

    Route::post('/store',[CategoryController::class,'store'])->name('categories.store');
    Route::post('/update',[CategoryController::class,'update'])->name('categories.update');
});
