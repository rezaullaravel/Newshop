<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use App\Category;

class CartController extends Controller
{
    public function addToCart(Request $request){
        //return $request->all();
        $product=Product::find($request->id);
        //return $product;
        Cart::add([
            'id'=>$request->id,
            'qty'=>$request->qty,
            'name'=>$product->product_name,
            'price'=>$product->product_price,
            'options'=>[
                'image'=>$product->product_image
            ]
        ]);
        return redirect('/cart/show');
       
    }


    public function showCart(){
                    $cartProducts=Cart::content();
        $categories=Category::all();
        return view('frontend.cart.show-cart',[
            'categories'=>$categories,
            'cartProducts'=>$cartProducts
        ]);
    }

    public function deleteCart($id){
        Cart::remove($id);
        return redirect('/cart/show');
    }

    public function updateCart(Request $request){
        //return $request->all();
        Cart::update($request->rowId, $request->qty);
        return redirect('/cart/show');
    }

   
}
