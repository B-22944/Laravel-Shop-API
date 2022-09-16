<?php
namespace App\Repositories;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface{
    /*
    Method for category
    */
    public function getProductsByCategoryId($id){
        return Product::where('category_id', '=', $id)->get();
    }

    /*
    Methods for Products
    */
    public function showAllProducts(){
        return Product::all();
    }

    public function storeProduct($data){

            $product = new Product;
            $product->image = $data['image'];        
            $product->title = $data['title'];
            $product->price = $data['price'];
            $product->description = $data['description'];
            $product->category_id = $data['category_id'];
            return $product->save();
        
    }

    public function findProduct($id){
        return Product::find($id);
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        return $product->delete();
    }

    public function updateProduct($id, $data){
        $product = Product::where('id',$id)->first();
            $product->image = $data['image'];        
            $product->title = $data['title'];
            $product->price = $data['price'];
            $product->description = $data['description'];
            $product->category_id = $data['category_id'];
                return $product->save();
    }

}