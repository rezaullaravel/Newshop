@extends('frontend.master')
@section('title')
    Home page
@endsection
@section('body-content')
    <div class="banner-w3">
    <div class="demo-1">
        <div id="example1" class="core-slider core-slider__carousel example_1">
            <div class="core-slider_viewport">
                <div class="core-slider_list">
                    <div class="core-slider_item">
                        <img src="{{asset('/')}}/frontend/images/b1.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="core-slider_item">
                        <img src="{{asset('/')}}/frontend/images/b2.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="core-slider_item">
                        <img src="{{asset('/')}}/frontend/images/b3.jpg" class="img-responsive" alt="">
                    </div>
                    <div class="core-slider_item">
                        <img src="{{asset('/')}}/frontend/images/b4.jpg" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
            <div class="core-slider_nav">
                <div class="core-slider_arrow core-slider_arrow__right"></div>
                <div class="core-slider_arrow core-slider_arrow__left"></div>
            </div>
            <div class="core-slider_control-nav"></div>
        </div>
    </div>
    <link href="{{asset('/')}}/frontend/css/coreSlider.css" rel="stylesheet" type="text/css">
    <script src="{{asset('/')}}/frontend/js/coreSlider.js"></script>
    <script>
        $('#example1').coreSlider({
            pauseOnHover: false,
            interval: 3000,
            controlNavEnabled: true
        });

    </script>

    </div>
    <!--banner-->
    <!--content-->
    <div class="content">
        <!--banner-bottom-->
        <div class="ban-bottom-w3l">
            <div class="container">
                <div class="col-md-6 ban-bottom">
                    <div class="ban-top">
                        <img src="{{asset('/')}}/frontend/images/p1.jpg" class="img-responsive" alt=""/>
                        <div class="ban-text">
                            <h4>Men’s Clothing</h4>
                        </div>
                        <div class="ban-text2 hvr-sweep-to-top">
                            <h4>50% <span>Off/-</span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ban-bottom3">
                    <div class="ban-top">
                        <img src="{{asset('/')}}/frontend/images/p2.jpg" class="img-responsive" alt=""/>
                        <div class="ban-text1">
                            <h4>Women's Clothing</h4>
                        </div>
                    </div>
                    <div class="ban-img">
                        <div class=" ban-bottom1">
                            <div class="ban-top">
                                <img src="{{asset('/')}}/frontend/images/p3.jpg" class="img-responsive" alt=""/>
                                <div class="ban-text1">
                                    <h4>T - Shirt</h4>
                                </div>
                            </div>
                        </div>
                        <div class="ban-bottom2">
                            <div class="ban-top">
                                <img src="{{asset('/')}}/frontend/images/p4.jpg" class="img-responsive" alt=""/>
                                <div class="ban-text1">
                                    <h4>Hand Bag</h4>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--banner-bottom-->
        <!--new-arrivals-->
        <div class="new-arrivals-w3agile">
            <div class="container">
                <h2 class="tittle">New Arrivals</h2>

                <div class="arrivals-grids">
                    @foreach($newProducts as $newProduct)
                    <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                        <div class="grid-arr">
                            <div  class="grid-arrival">
                                <figure>
                                    <a href="{{route('product-details',['id'=>$newProduct->id,'name'=>$newProduct->product_name])}}" class="new-gri" >
                                        <div class="grid-img">
                                            <img  src="{{asset($newProduct->product_image)}}" width="200" height="200"  alt="">
                                        </div>
                                        <div class="grid-img">
                                            <img  src="{{asset($newProduct->product_image)}}" width="200" height="200"  alt="">
                                        </div>
                                    </a>
                                </figure>
                            </div>
                            <div class="ribben">
                                <p>NEW</p>
                            </div>
                            <div class="ribben1">
                                <p>SALE</p>
                            </div>
                            <div class="block">
                                <div class="starbox small ghosting"> </div>
                            </div>
                            <div class="women">
                                <h6><a href="single.html">{{$newProduct->product_name}}</a></h6>
                                <span class="size">XL / XXL / S </span>
                                <p ><em class="item_price">TK.{{$newProduct->product_price}}</em></p>
                                <!--<a href="#" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</a>-->
                                <form action="{{route('add-to-cart')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="color-quality">
                                        <h6>Quality :</h6>
                                        <div class="quantity">
                                            <input type="number" name="qty" value="1" min="1">
                                            <input type="hidden" name="id" value="{{$newProduct->id}}">
                                        </div>
                                        <!--quantity-->

                                        <!--quantity-->
                                    </div>
                                    <div class="women">
                                        <input type="submit" name="btn" value="Add To shopping Cart" class="my-cart-b item_add">
                                    </div>
                                </form>


                            </div>
                        </div>

                    </div>
                    @endforeach



                        <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <!--new-arrivals-->
        <!--accessories-->
        <div class="accessories-w3l">
            <div class="container">
                <h3 class="tittle">20% Discount on</h3>
                <span>TRENDING DESIGNS</span>
                <div class="button">
                    <a href="#" class="button1"> Shop Now</a>
                    <a href="#" class="button1"> Quick View</a>
                </div>
            </div>
        </div>
        <!--accessories-->
        <!--Products-->

        <!--Products-->
        <div class="latest-w3">
            <div class="container">
                <h3 class="tittle1">Latest Fashion Trends</h3>
                <div class="latest-grids">
                    <div class="col-md-4 latest-grid">
                        <div class="latest-top">
                            <img  src="{{asset('/')}}/frontend/images/l1.jpg" class="img-responsive"  alt="">
                            <div class="latest-text">
                                <h4>Men</h4>
                            </div>
                            <div class="latest-text2 hvr-sweep-to-top">
                                <h4>-50%</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 latest-grid">
                        <div class="latest-top">
                            <img  src="{{asset('/')}}/frontend/images/l2.jpg" class="img-responsive"  alt="">
                            <div class="latest-text">
                                <h4>Shoes</h4>
                            </div>
                            <div class="latest-text2 hvr-sweep-to-top">
                                <h4>-20%</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 latest-grid">
                        <div class="latest-top">
                            <img  src="{{asset('/')}}/frontend/images/l3.jpg" class="img-responsive"  alt="">
                            <div class="latest-text">
                                <h4>Women</h4>
                            </div>
                            <div class="latest-text2 hvr-sweep-to-top">
                                <h4>-50%</h4>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="latest-grids">
                    <div class="col-md-4 latest-grid">
                        <div class="latest-top">
                            <img  src="{{asset('/')}}/frontend/images/l4.jpg" class="img-responsive"  alt="">
                            <div class="latest-text">
                                <h4>Watch</h4>
                            </div>
                            <div class="latest-text2 hvr-sweep-to-top">
                                <h4>-45%</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 latest-grid">
                        <div class="latest-top">
                            <img  src="{{asset('/')}}/frontend/images/l5.jpg" class="img-responsive"  alt="">
                            <div class="latest-text">
                                <h4>Bag</h4>
                            </div>
                            <div class="latest-text2 hvr-sweep-to-top">
                                <h4>-10%</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 latest-grid">
                        <div class="latest-top">
                            <img  src="{{asset('/')}}/frontend/images/l6.jpg" class="img-responsive"  alt="">
                            <div class="latest-text">
                                <h4>Cameras</h4>
                            </div>
                            <div class="latest-text2 hvr-sweep-to-top">
                                <h4>-30%</h4>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <!--new-arrivals-->
    </div>
@endsection