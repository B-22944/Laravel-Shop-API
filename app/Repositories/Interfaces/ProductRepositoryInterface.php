<?php
namespace App\Repositories\Interfaces;
use App\Models\Product;

Interface ProductRepositoryInterface{
    
    /*
    Product API CRUD Functions
    */
    public function getProductsByCategoryId($id);
    public function showAllProducts();
    public function storeProduct($data);
    public function findProduct($id);
    public function deleteProduct($id);
    public function updateProduct($id, $data);
    /*
    Auth User Functions
    */
    public function userRegister($data);
    public function userLogin($data);
    public function userData();
}