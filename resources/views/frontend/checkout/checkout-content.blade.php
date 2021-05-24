@extends('frontend.master')
@section('title')
    Registration and login page
@endsection

@section('body-content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <h1 class="text-center text-success">You have to login here to complete your valuable order. If you are not registered before please register first.</h1>
            </div>

        </div>
        <hr>
        <hr>
        <hr>
        <div class="row">
            <div class="col-md-5">
                <h1 class="text-center">Register here if you are not registered before.</h1>
                <hr/>
                <form class="form-horizontal" action="{{route('customer-sign-up')}}" method="post">
                    {{csrf_field()}}


                    <div class="form-group ">

                       <input type="text" name="first_name" class="form-control" placeholder="First Name">
                    </div>

                    <div class="form-group">

                        <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                    </div>

                    <div class="form-group ">

                        <input type="email" name="email_address" class="form-control" placeholder="example@gmail.com">
                    </div>

                    <div class="form-group ">

                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>

                    <div class="form-group ">

                        <input type="text" name="phone_number" class="form-control" placeholder="phone number">
                    </div>

                    <div class="form-group ">
                        <textarea name="address" class="form-control" placeholder="Address"></textarea>
                    </div>



                    <div class="form-group ">
                        <input type="submit" name="btn" value="Register" class="btn btn-info form-control">
                    </div>








                </form>

            </div>
            <div class="col-md-2"></div>

            <div class="col-md-5">
                <hr>
                <h1 class="text-center">Login here.</h1>
                <br>
                <h3 class="text-center text-danger">{{Session::get('message')}}</h3>
                <hr>

                <form class="form-horizontal" action="{{route('customer-login')}}" method="post">
                    {{csrf_field()}}




                    <div class="form-group ">

                        <input type="email" name="email_address" class="form-control" placeholder="example@gmail.com" >
                    </div>

                    <div class="form-group ">

                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>





                    <div class="form-group row">
                        <input type="submit" name="btn" value="Login" class="btn btn-info form-control">
                    </div>








                </form>

            </div>

        </div>

    </div>
@endsection
