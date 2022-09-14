<?php
namespace App\Repositories\Interfaces;

Interface CategoryRepositoryInterface{
    
    //CRUD Functions
    public function allCategories();
    public function storeCategory($data);
    public function findCategory($id);
    public function updateCategory($id, $data); 
    public function destroyCategory($id);
}