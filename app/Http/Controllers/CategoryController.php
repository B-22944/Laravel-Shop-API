<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Using CategoryRepositoryInterface from Repositories
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryController extends Controller
{
    //Making Constructor to use the private variable
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository){
        $this->categoryRepository = $categoryRepository;
    }

    /*
    API Functions Start
    */
    //Fetching all the categoriess from database
    public function listCategory(){
        try{
            return Category::all();
        }
        catch (Exception $e){
            return "No Data Found";
        }
    }
    /*
    API Functions END
    */

    public function index(){
        $categories = $this->categoryRepository->allCategories();
        return view('categories.index',compact('categories'));
    }

    public function store(Request $request){
        
        //Validating the data
        $data = $request->validate(['name'=>'required']);

        //in try $categories is requesting to add data
        try {
            $this->categoryRepository->storeCategory($data);
            return redirect(route('categories.index'))->with('status','Category Added Succesfully');
        } 
        catch (\Exception $e) {
            return redirect(route('categories.index'))->with('status','Error: Something went Wrong');
        }
        
    }

    public function destroy($id)
    {
        //finding and destroying the category by id
        $category = $this->categoryRepository->destroyCategory($id);
        return redirect(route('categories.index'))->with('status','Deleted');
    }

    public function edit($id)
    {
        //Getting data with the id
        $category = $this->categoryRepository->findCategory($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request){
        //in try $categories is requesting to update data
        $data = $request->validate(['name'=>'required']);
        try {
            $this->categoryRepository->updateCategory($request->id,$data);
            return redirect(route('categories.index'))->with('status','Category Added Succesfully');
        } 
        catch (\Exception $e) {
            return redirect(route('categories.index'))->with('status','Error: Something went Wrong');
        }
        
    }
}
