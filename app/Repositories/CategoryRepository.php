<?php
namespace App\Repositories;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface{
    
    //returning all categories. It Points to index function
    public function allCategories(){
        return Category::all();
    }

    public function storeCategory($data){
         return Category::create($data);
    }

    //Finding the value on id. It points to edit function
    public function findCategory($id){
        return Category::find($id);
    }

    //Finding and updating the value on id.
    public function updateCategory($id, $data){
        $category = Category::where('id',$id)->first();
            $category->name=$data['name'];
            $category->save();
    }

    //Finding and deleting the value on id. It points to delete function
    public function destroyCategory($id){
        $category = Category::find($id);
        $category->delete();
    }

}