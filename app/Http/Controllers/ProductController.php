<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
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

    /*
    API CRUD Operations
    */

    //Fetching all the product from database
    public function showAll(){
        $products = Product::all();
        return ProductResource::collection($products);
    }

    public function store(Request $request){
        $product = new Product();
        $product->image=$request->image;
        $product->title=$request->title;
        $product->price=$request->price;
        $product->description=$request->description;
        $product->category_id=$request->category_id;
        if ($product->save()) {
            return new ProductResource($product);
        }
    }

    //Fetching the product from database with id
    public function show($id){
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->image = $request->image;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if ($product->save()) {
            return new ProductResource($product);
        }
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return new ProductResource($product);
        }
    }
}

