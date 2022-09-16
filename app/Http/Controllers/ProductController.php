<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Http\Requests\ApiRequest;

class ProductController extends Controller
{
    /*
    Searching for Categories
    */
    public function category($id){

        try {
            /*
            Elequent Query for searching category id from products table
            */
            $categories = Product::where('category_id', '=', $id)->get();
            return response()->json(['categories'=>$categories],404);    
        } 
        catch (Exception $e) {
            return response()->json(['message'=>'Error Error: Not Found'],404);
        }
        
    }

    /*
    API CRUD Operations
    */

    /*
    Fetching all the product from database
    */
    public function showAll(){
        $products = Product::all();
        return response()->json(['products'=>$products],200);
    }

    /*
    Storing Data through Postman in Raw jason format 
    */
    public function store(ApiRequest $request){
        
        try {
            $product = new Product;
            $product->image = $request->image;        
            $product->title = $request->title;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->save();
                return response()->json(['message'=>'Added Success'],201);
                
        } catch (\Exception $e) {
            /* 
            Set a response code for error: not found
            */
            return response()->json(['message'=>'Error: Not Found'],404);
        }
    }

    /*
    Fetching the product from database with id
    */
    public function show($id){
        try {
            $product = Product::findOrFail($id);
            return response()->json(['product'=>$product],200);
        } catch (\Exception $e) {
            return response()->json(['message'=>'Error: Not Found'],404);
        }
        
    }

    /*
    Storing Data through Postman in Raw jason format
    */
    public function update(ApiRequest $request, $id){
  
        try {

            $product = Product::findOrFail($id);
            $product->image = $request->image;        
            $product->title = $request->title;
            $product->price = $request->price;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->save();
                return response()->json(['message'=>'Updated Success'],201);
            
        } catch (\Exception $e) {
            /* 
            Set a response code for error: not found
            */
            return response()->json(['message'=>'Error Error: Not Found'],404);
        }
    }

    public function destroy($id){
        try {
            $product = Product::findOrFail($id);
                if ($product->delete()) {
                return response()->json(['product'=>$product],204);;
                }
        } catch (\Exception $e) {
            return response()->json(['message'=>'Error Error: Not Found'],404);
        }
    }
}

