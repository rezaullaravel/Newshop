<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;

class NewShopController extends Controller
{
    public function index(){
        $categories=Category::where('publication_status',1)->get();
        //return $categories;
        $newProducts=Product::where('publication_status',1)
                 ->orderBy('id','DESC')
                 ->take(8)
                 ->get();
        //return $newProducts;
        return view('frontend.home.home',[
            'categories'=>$categories,
            'newProducts'=>$newProducts
        ]);
    }

    public function CategoryProduct($id){
        $categories=Category::where('publication_status',1)->get();
        $categoryProducts=Product::where('category_id',$id)
                                   ->where('publication_status',1)
                                   ->get();

        return view('frontend.category.category-product',[
            'categories'=>$categories,
            'categoryProducts'=>$categoryProducts
        ]);
    }

    public function productDetails($id){
        $categories=Category::where('publication_status',1)->get();
        $product=Product::find($id);
        return view('frontend.product.product-details',[
            'categories'=>$categories,
            'product'=>$product
        ]);
    }
















}
