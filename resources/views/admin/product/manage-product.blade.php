@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
               <div class="table-responsive">
                   <table class="table table-bordered">
                       <tr class="bg-primary">
                           <th>SI NO</th>
                           <th>Category Name</th>
                           <th>Brand Name</th>
                           <th>Product Name</th>
                           <th>Product Price</th>
                           <th>Product Quantity</th>
                           <th>Product Image</th>
                           <th>Publication Status</th>
                           <th width="20%">Action</th>
                       </tr>
                       @php($i=1)
                       @foreach($products as $product)


                           <tr>
                               <td>{{$i++}}</td>
                               <td>{{$product->category_name}}</td>
                               <td>{{$product->brand_name}}</td>
                               <td>{{$product->product_name}}</td>
                               <td>{{$product->product_price}}</td>
                               <td>{{$product->product_quantity}}</td>
                               <td>
                                   <img src="{{asset($product->product_image)}}" height="100" width="100">
                               </td>
                               <td>{{$product->publication_status}}</td>
                               <td>
                                   <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-primary">Edit</a>
                                   <a href="{{route('delete-product',['id'=>$product->id])}}" onclick="return confirm('Are you sure to delete this product??');" class="btn btn-danger">Delete</a>
                               </td>
                           </tr>
                       @endforeach
                   </table>

               </div>


            </div>

        </div>
    </div>
@endsection