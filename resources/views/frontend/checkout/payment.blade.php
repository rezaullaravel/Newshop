@extends('frontend.master')
@section('title')
   Payment page
@endsection

@section('body-content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <h1 class="text-center text-success">Dear {{Session::get('customerName')}} you have to give us product payment method to complete your valuable order.</h1>
            </div>

        </div>
        <hr>
        <hr>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <form action="{{route('new-order')}}" method="post">
                    {{csrf_field()}}
              <table class="table table-bordered">
                  <tr class="bg bg-info">
                      <th>Cash on delivery</th>
                      <td><input type="radio" name="payment_type" value="cash">Cash on delivery</td>
                  </tr>

                  <tr class="bg bg-danger">
                      <th>Paypal</th>
                      <td><input type="radio" name="payment_type" value="paypal">Paypal</td>
                  </tr>

                  <tr class="bg bg-primary">
                      <th>Bikash</th>
                      <td><input type="radio" name="payment_type" value="bikash">Bikash</td>
                  </tr>

                  <tr>
                      <th></th>
                      <td><input type="submit" name="btn" class="btn btn-success" value="Confirm Order"></td>
                  </tr>
              </table>
                </form>



            </div>




        </div>

    </div>
@endsection


