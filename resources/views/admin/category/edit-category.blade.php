@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                <form class="form-horizontal" action="{{route('update-category')}}" method="post">
                    {{csrf_field()}}

                    <h2 class="card-title" >Edit Category Info</h2>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}" >
                            <input type="hidden" class="form-control" name="category_id" value="{{$category->id}}" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category Description:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description">{{$category->category_description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Publication Status:</label>
                        <div class="col-sm-9">
                            <input type="radio"  name="publication_status" {{$category->publication_status==1 ? 'checked':''}} value="1" >Published
                            <input type="radio"  name="publication_status" {{$category->publication_status==0 ? 'checked':''}} value="0" >Unpublished
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"></label>
                        <div class="col-sm-9">
                            <input type="submit" name="btn" value="Update Category Info" class=" form-control btn btn-info" >
                        </div>
                    </div>








                </form>


            </div>

        </div>
    </div>
@endsection
