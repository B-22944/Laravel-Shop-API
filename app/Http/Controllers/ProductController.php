<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    //Fetching the product from database with id
    //if id is not given it will show all results
    public function listProduct($id=null){
        try {
            return $id?Product::find($id):Product::all();
        }
        catch(Exception $e){
            return "No Data Found";
        }

    }

    //Searching for Categories
    public function category($id){

        try {
            //Elequent Query for searching category id from products table
            $categories = Product::where('category_id', '=', $id)->get();
            return $categories;    
        } 
        catch (Exception $e) {
            return "NO Data Found";
        }
        
    }
}

