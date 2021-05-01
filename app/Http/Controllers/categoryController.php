<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class categoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category');
    }

    public function saveCategory(Request $request){
        $this->validate($request,[
            'category_name'=>'required',
            'category_description'=>'required',
            'publication_status'=>'required'
        ]);
       $category=new Category();
       $category->category_name=$request->category_name;
        $category->category_description=$request->category_description;
        $category->publication_status=$request->publication_status;
        $category->save();
        return redirect('/category/add')->with('message','Category info saved successfully');
    }


    public function manageCategoryInfo(){
      $categories=Category::all();
        //return $categories;
        return view('admin.category.manage-category',['categories'=>$categories]);
    }

    public function unpublishedCategoryInfo($id){
       // return $id;
        $category=Category::find($id);
        //return $category;
        $category->publication_status=0;
        $category->save();
        return redirect('/category/manage')->with('message','Category info unpublished successfully');
    }


    public function publishedCategoryInfo($id){
        // return $id;
        $category=Category::find($id);
        //return $category;
        $category->publication_status=1;
        $category->save();
        return redirect('/category/manage')->with('message','Category info published successfully');
    }


    public function editCategoryInfo($id){
       $category=Category::find($id);
       //return  $category;
        return view('admin.category.edit-category',['category'=>$category]);
    }


    public function updateCategoryInfo(Request $request){
       // return $request->all();
        $category=Category::find($request->category_id);
        $category->category_name=$request->category_name;
        $category->category_description=$request->category_description;
        $category->publication_status=$request->publication_status;
        $category->save();
        return redirect('/category/manage')->with('message','Category info updated successfully');
    }


    public function delete($id){
        $category=Category::find($id);
        //return $category;
$category->delete();
return redirect('/category/manage')->with('message','Category info deleted successfully');
    }























}
