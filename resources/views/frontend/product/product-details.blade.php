@extends('frontend.master')
@section('title')
    Product details page
@endsection

@section('body-content')
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="single-grids">
                    <div class="col-md-9 single-grid">
                        <div clas="single-top">
                            <div class="single-left">
                                <div class="flexslider">
                                    <ul class="slides">
                                        <li data-thumb="{{asset($product->product_image)}}">
                                            <div class="thumb-image"> <img src="{{asset($product->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
                                        </li>
                                        <li data-thumb="{{asset($product->product_image)}}">
                                            <div class="thumb-image"> <img src="{{asset($product->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
                                        </li>
                                        <li data-thumb="{{asset($product->product_image)}}">
                                            <div class="thumb-image"> <img src="{{asset($product->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="single-right simpleCart_shelfItem">
                                <h4>{{$product->product_name}}</h4>
                                <div class="block">
                                    <div class="starbox small ghosting"> </div>
                                </div>
                                <p class="price item_price">TK.{{$product->product_price}}</p>
                                <div class="description">
                                    <p><span>Quick Overview : </span> {{$product->short_description}}</p>
                                </div>


                                <form action="{{route('add-to-cart')}}" method="POST">
                                {{csrf_field()}}
                                <div class="color-quality">
                                    <h6>Quality :</h6>
                                    <div class="quantity">
                                        <input type="number" name="qty" value="1" min="1">
                                        <input type="hidden" name="id" value="{{$product->id}}">
                                    </div>
                                    <!--quantity-->

                                    <!--quantity-->
                                </div>
                                <div class="women">
                                   <input type="submit" name="btn" value="Add To shopping Cart" class="my-cart-b item_add">
                                </div>
                                </form>


                                <div class="social-icon">
                                    <a href="#"><i class="icon"></i></a>
                                    <a href="#"><i class="icon1"></i></a>
                                    <a href="#"><i class="icon2"></i></a>
                                    <a href="#"><i class="icon3"></i></a>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>


                    <div class="clearfix"> </div>
                </div>
                <!--Product Description-->

                <!--Product Description-->
            </div>
        </div>
        <!--single-->

        <!--new-arrivals-->
    </div>
@endsection