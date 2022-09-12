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

    //Searching for Categories
    public function searchCategory($id){

            $categories = DB::table('employees')->where('category_id','=',$id);    
            return array($categories);    
    }
}

