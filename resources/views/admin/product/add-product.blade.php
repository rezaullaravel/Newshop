@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                <form class="form-horizontal" action="{{route('new-product')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <h2 class="card-title" >Add Product Info</h2>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category Name:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_id">
                                <option>---Select Category Name----</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id'):''}}</span>
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
                            <span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product Name:</label>
                        <div class="col-sm-9">
                            <input type="text" name="product_name" class="form-control">
                            <span class="text-danger">{{$errors->has('product_name') ? $errors->first('product_name'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product Price:</label>
                        <div class="col-sm-9">
                            <input type="number" name="product_price" class="form-control">
                            <span class="text-danger">{{$errors->has('product_price') ? $errors->first('product_price'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product Quantity:</label>
                        <div class="col-sm-9">
                            <input type="number" name="product_quantity" class="form-control">
                            <span class="text-danger">{{$errors->has('product_quantity') ? $errors->first('product_quantity'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Short Description:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="short_description"></textarea>
                            <span class="text-danger">{{$errors->has('short_description') ? $errors->first('short_description'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Long Description:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="long_description"></textarea>
                            <span class="text-danger">{{$errors->has('long_description') ? $errors->first('long_description'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Product Image:</label>
                        <div class="col-sm-9">
                            <input type="file" name="product_image" class="form-control">
                            <span class="text-danger">{{$errors->has('product_image') ? $errors->first('product_image'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Publication Status:</label>
                        <div class="col-sm-9">
                            <input type="radio"  name="publication_status" value="1" >Published
                            <input type="radio"  name="publication_status" value="0" >Unpublished <br/>
                            <span class="text-danger">{{$errors->has('publication_status') ? $errors->first('publication_status'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"></label>
                        <div class="col-sm-9">
                            <input type="submit" name="btn" value="Save Product Info" class=" form-control btn btn-info" >
                        </div>
                    </div>








                </form>


            </div>

        </div>
    </div>
@endsection

