@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
               <table class="table table-bordered">
                   <tr class="bg-primary">
                       <th>SI NO</th>
                       <th>Category Name</th>
                       <th>Category Description</th>
                       <th>Publication Status</th>
                       <th width="20%">Action</th>
                   </tr>
                   @php($i=1)
                   @foreach($categories as $category)

                   <tr>
                       <td>{{$i++}}</td>
                       <td>{{$category->category_name}}</td>
                       <td>{{$category->category_description}}</td>
                       <td>{{$category->publication_status==1 ? 'Published':'Unpublished'}}</td>
                       <td>
                           @if($category->publication_status==1)
                           <a href="{{route('unpublished-category',['id'=>$category->id])}}" class="btn btn-info ">
                               <span class="fa fa-arrow-up"></span>
                           </a>
                           @else
                               <a href="{{route('published-category',['id'=>$category->id])}}" class="btn btn-warning ">
                                   <span class="fa fa-arrow-down"></span>
                               </a>
                           @endif

                           <a href="{{route('edit-category',['id'=>$category->id])}}" class="btn btn-success">
                               <span class="fa fa-edit"></span>
                           </a>

                           <a href="{{route('delete-category',['id'=>$category->id])}}" onclick="return confirm('Are you sure to delete it???');" class="btn btn-danger">
                               <span class="fa fa-trash"></span>
                           </a>
                       </td>
                   </tr>
                   @endforeach
               </table>



            </div>

        </div>
    </div>
@endsection