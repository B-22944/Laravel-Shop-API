<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //Fetching all the categoriess from database
    public function listCategory(){
        return Category::all();
    }
}