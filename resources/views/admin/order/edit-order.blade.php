@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h3 class="text-center text-success"></h3>
                <form class="form-horizontal" action="{{route('update-order')}}" method="post" >
                    {{csrf_field()}}

                    <h2 class="card-title" >Edit order Info</h2>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">first Name:</label>
                        <div class="col-sm-9">
                           <input type="text" name="first_name" value="{{$customer->first_name}}" class="form-control">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">last Name:</label>
                        <div class="col-sm-9">
                            <input type="text" name="last_name" value="{{$customer->last_name}}" class="form-control">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Order total:</label>
                        <div class="col-sm-9">
                            <input type="number" name="order_total" value="{{$order->order_total}}" class="form-control">
                            <input type="hidden" name="id" value="{{$order->id}}" class="form-control">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Order status:</label>
                        <div class="col-sm-9">
                            <input type="text" name="order_status" value="{{$order->order_status}}" class="form-control">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Order date:</label>
                        <div class="col-sm-9">
                            <input type="text" name="created_at" value="{{$order->created_at}}" class="form-control">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Payment type:</label>
                        <div class="col-sm-9">
                            <input type="text" name="payment_type" value="{{$payment->payment_type}}" class="form-control">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Payment status:</label>
                        <div class="col-sm-9">
                            <input type="text" name="payment_status" value="{{$payment->payment_status}}" class="form-control">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label"></label>
                        <div class="col-sm-9">
                            <input type="submit" name="btn" value="Update order Info" class=" form-control btn btn-info" >
                        </div>
                    </div>








                </form>


            </div>

        </div>
    </div>

@endsection


