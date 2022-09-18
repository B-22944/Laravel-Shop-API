<?php
namespace App\Repositories;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\User;
use Hash;

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
        $products = auth()->user();
        return response()->json(['products',$products],200);
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

    public function userRegister($data){
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();
        /*
        Creating token for user to access api
        */
        $token = $user->createToken('Token')->accessToken;
        return response()->json(['token'=>$token,'user'=>$user],200);

    }

    public function userLogin($user){
        $data = [
            'email' => $user['email'],
            'password' => $user['password']
        ];
        /*
        Login and create token if user is authentic
        */
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Token')->accessToken;
            return response()->json(['token'=>$token],200);
        }
        else {
            return response()->json(['message'=>'Error'],404);
        }
    }

    public function userData(){
        $user = auth()->user();
        return response()->json(['user'=>$user],200);
    }

}