<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function listProduct($id=null){
        return $id?Product::find($id):Product::all();
    }
}

