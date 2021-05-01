@extends('frontend.master')
@section('title')
    Shipping info page
@endsection

@section('body-content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <h1 class="text-center text-success">Dear {{Session::get('customerName')}} you have to give us product shipping info to complete your valuable order. If your billing info and shipping info are same then just click save shippin info button</h1>
            </div>

        </div>
        <hr>
        <hr>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <h1 class="text-center">Shipping info goes here</h1>
                <hr/>
                <form class="form-horizontal" action="{{route('new-shipping')}}" method="post">
                    {{csrf_field()}}


                    <div class="form-group row">
                         <label class="col-sm-3">Full name:</label>

                        <div class="col-sm-9">
                            <input type="text" name="full_name" value="{{$customer->first_name.' '.$customer->last_name}}" class="form-control">
                        </div>

                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3">Email address:</label>

                        <div class="col-sm-9">
                            <input type="email" name="email_address" value="{{$customer->email_address}}" class="form-control">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3">Phone number:</label>

                        <div class="col-sm-9">
                            <input type="text" name="phone_number" value="{{$customer->phone_number}}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3">Address:</label>
                        <div class="col-sm-9">
                        <textarea name="address" class="form-control" >{{$customer->address}}</textarea>
                        </div>
                    </div>



                    <div class="form-group ">
                        <input type="submit" name="btn" value="Save shipping info" class="btn btn-info form-control">
                    </div>








                </form>

            </div>




        </div>

    </div>
@endsection

