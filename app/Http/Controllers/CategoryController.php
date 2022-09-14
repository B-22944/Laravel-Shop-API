<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //Fetching all the categoriess from database
    public function listCategory(){
        try{
            return Category::all();
        }
        catch (Exception $e){
            return "No Data Found";
        }
    }

    public function index(){
        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    public function store(Request $request){
        //in try $categories is requesting to add data
        try {
            $categories = new Category;
            $categories->name=$request->name;
            $categories->save();
            return redirect(route('categories.index'))->with('status','Category Added Succesfully');
        } 
        catch (\Exception $e) {
            return redirect(route('categories.index'))->with('status','Error: Something went Wrong');
        }
        
    }

    public function destroy($id)
    {
        //finding and destroying the category by id
        $category = Category::find($id);
        $category->delete();
        return redirect(route('categories.index'))->with('status','Delete: '.$category->name.' is removed');
    }

    public function edit($id)
    {
        //Getting data with the id
        $category = Category::find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request){
        //in try $categories is requesting to update data
        try {
            $category = Category::find($request->id);
            $category->name=$request->name;
            $category->save();
            return redirect(route('categories.index'))->with('status','Category Added Succesfully');
        } 
        catch (\Exception $e) {
            return redirect(route('categories.index'))->with('status','Error: Something went Wrong');
        }
        
    }
}
