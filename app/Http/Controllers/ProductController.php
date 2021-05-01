<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use DB;


class ProductController extends Controller
{
    public function index(){
          $categories=Category::where('publication_status',1)->get();
          $brands=Brand::where('publication_status',1)->get();

          return view('admin.product.add-product',[
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }

    protected function productInfoValidate($request){
        $this->validate($request,[
            'product_name'=>'required',
            'long_description'=>'required',
            'product_image'=>'required'
        ]);
    }

    protected function productImageUpload($request){
        $productImage=$request->file('product_image');
        $imageName=$productImage->getClientOriginalName();
        //return $imageName;
        $directory='product-images/';
        $imageUrl=$directory.$imageName;
        $productImage->move($directory,$imageName);
        //Image::make($productImage)->resize(200,200)->save($imageUrl);
        return $imageUrl;

    }

    protected function saveProductBasicInfo($request,$imageUrl){
        $product=new Product();
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->product_quantity=$request->product_quantity;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->product_image=$imageUrl;
        $product->publication_status=$request->publication_status;
        $product->save();
    }


    public function saveProductInfo(Request $request){
        //return $request->all();
        $this->productInfoValidate($request);

        $imageUrl=$this->productImageUpload($request);
        $this->saveProductBasicInfo($request,$imageUrl);

        return redirect('/product/add')->with('message','Product Info Saved Successfully');

    }


    public function manageProduct(){
        //$product=Product::all();
        //return $product;
        $products=DB::table('products')
                      ->join('categories','products.category_id','=','categories.id')
                      ->join('brands','products.brand_id','=','brands.id')
                       ->select('products.*','categories.category_name','brands.brand_name')
                        ->get();
             //return $products;


        return view('admin.product.manage-product',[
            'products'=>$products
            ]);
    }


    public function editProductInfo($id){
       // $product=Product::find($id);
       // return $product;
        $categories=Category::where('publication_status',1)->get();
        $brands=Brand::where('publication_status',1)->get();
        $product=Product::find($id);

        return view('admin.product.edit-product',[
            'categories'=>$categories,
            'brands'=>$brands,
            'product'=>$product,
        ]);
    }


    protected function updateProductBasicInfoWithImage($product,$request,$imageUrl){
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->product_quantity=$request->product_quantity;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->product_image=$imageUrl;
        $product->publication_status=$request->publication_status;
        $product->save();

    }

    protected function updateProductBasicInfoWithoutImage($product,$request){
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->product_quantity=$request->product_quantity;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->publication_status=$request->publication_status;
        $product->save();
    }

    public function updateProductInfo(Request $request){
	
        $product=Product::find($request->id);
        $productImage=$request->file('product_image');
        if($productImage){
            unlink($product->product_image);

            $imageUrl=$this->productImageUpload($request);
            $this->updateProductBasicInfoWithImage($product,$request,$imageUrl);


        } else{

            $this->updateProductBasicInfoWithoutImage($product,$request);

        }

        return redirect('/product/manage')->with('message','Product info updated successfully');


    } 


    public function deleteProductInfo($id){
        //return $id;
        $product=Product::find($id);
        //return $product;
        if(file_exists($product->product_image)){
            unlink($product->product_image         );

        }
        $product->delete();
        return redirect('/product/manage')->with('message','Product info deleted successfully');
    }

















}
