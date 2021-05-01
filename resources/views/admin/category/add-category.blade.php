@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
             <h3 class="text-center text-success">{{Session::get('message')}}</h3>
                <form class="form-horizontal" action="{{route('new-category')}}" method="post">
                    {{csrf_field()}}

                    <h2 class="card-title" >Add Category Info</h2>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="category_name" >
                            <span class="text-danger">{{$errors->has('category_name') ? $errors->first('category_name'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Category Description:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="category_description"></textarea>
                            <span class="text-danger">{{$errors->has('category_description') ? $errors->first('category_description'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Publication Status:</label>
                        <div class="col-sm-9">
                            <input type="radio"  name="publication_status" value="1" >Published
                            <input type="radio"  name="publication_status" value="0" >Unpublished <br>
                            <span class="text-danger" ">{{$errors->has('publication_status') ? $errors->first('publication_status'):''}}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"></label>
                        <div class="col-sm-9">
                            <input type="submit" name="btn" value="Save" class=" form-control btn btn-info" >
                        </div>
                    </div>








                </form>


            </div>

        </div>
    </div>
@endsection