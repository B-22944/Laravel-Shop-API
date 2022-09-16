<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Http\Requests\ApiRequest;
use function is_null;

class ProductController extends Controller
{
    /*
    Making Constructor to use the private member
    All the functions/methods are called from ProductRepository
   */
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository){
        $this->productRepository = $productRepository;
    }

    /*
    Searching for Categories
    */
    public function category($id){

        try {
            $categories = $this->productRepository->getProductsByCategoryId($id);
            return response()->json(['categories'=>$categories],200);    
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
        $products = $this->productRepository->showAllProducts();
        return response()->json(['products'=>$products],200);
    }

    public function store(ApiRequest $request){
 
        try {
            /*
            Insert of new record
            */
            $this->productRepository->storeProduct($request);
            return response()->json(['message'=>'Added Success'],201);
        } 
        catch (\Exception $e) {
        
            return response()->json(['message'=>'Error: Not Found'],404);
        }

    }

    public function update(ApiRequest $request, $id){
 
        try {
            /*
            Insert of new record
            */
            $this->productRepository->updateProduct($id, $request);
            return response()->json(['message'=>'Updated Success'],201);
        } 
        catch (\Exception $e) {
        
            return response()->json(['message'=>'Error: Not Found'],404);
        }

    }

    /*
    Fetching the product from database with id
    */
    public function show($id){
        try {
            $product = $this->productRepository->findProduct($id);
            return response()->json(['product'=>$product],200);
        } catch (\Exception $e) {
            return response()->json(['message'=>'Error: Not Found'],404);
        }
        
    }

    public function destroy($id){
        try {
            $product = $this->productRepository->deleteProduct($id);
            return response()->json(['message'=>'Deleted'],204);
                
        } catch (\Exception $e) {
            return response()->json(['message'=>'Error: Not Found'],404);
        }
    }
}

