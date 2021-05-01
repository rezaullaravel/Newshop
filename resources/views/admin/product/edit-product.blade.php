@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                <form class="form-horizontal" action="{{route('update-product')}}" method="post" enctype="multipart/form-data" name="editProductForm">
                    {{csrf_field()}}

                    <h2 class="card-title" >Edit Product Info</h2>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category Name:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_id">
                                <option>---Select Category Name----</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Brand Name:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="brand_id">
                                <option>---Select Brand Name----</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product Name:</label>
                        <div class="col-sm-9">
                            <input type="text" name="product_name" value="{{$product->product_name}}" class="form-control">
                            <input type="hidden" name="id" value="{{$product->id}}" class="form-control">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product Price:</label>
                        <div class="col-sm-9">
                            <input type="number" name="product_price" value="{{$product->product_price}}" class="form-control">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product Quantity:</label>
                        <div class="col-sm-9">
                            <input type="number" name="product_quantity" value="{{$product->product_quantity}}" class="form-control">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Short Description:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="short_description">{{$product->short_description}}</textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Long Description:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="long_description">{{$product->long_description}}</textarea>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product Image:</label>
                        <div class="col-sm-9">
                            <input type="file" name="product_image" class="form-control">
                            <img src="{{asset($product->product_image)}}">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Publication Status:</label>
                        <div class="col-sm-9">
                            <input type="radio"  name="publication_status" {{$product->publication_status==1 ? 'checked':''}} value="1" >Published
                            <input type="radio"  name="publication_status" {{$product->publication_status==0 ? 'checked':''}} value="0" >Unpublished <br/>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"></label>
                        <div class="col-sm-9">
                            <input type="submit" name="btn" value="Update Product Info" class=" form-control btn btn-info" >
                        </div>
                    </div>








                </form>


            </div>

        </div>
    </div>
    <script>
        document.forms['editProductForm'].elements['category_id'].value='{{$product->category_id}}';
        document.forms['editProductForm'].elements['brand_id'].value='{{$product->brand_id}}';
    </script>
@endsection

