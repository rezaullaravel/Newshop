@extends('frontend.master')
@section('title')
    Shopping cart
@endsection

@section('body-content')
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
               
                <div class="row">
                  <div class="col-md-11">
                  <h1 class="text-center text-success">My shopping cart</h1>
                  <hr/>
                  <table class="table table-bordered">
                      <tr class="bg-primary">
                        <th>SL NO</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                      </tr>
                      @php($i=1)
                      @php($sum=0)
                      @foreach($cartProducts as $cartProduct)

                      <tr>
                         <td>{{$i++}}</td>
                         <td>{{$cartProduct->name}}</td>
                         <td><img src="{{asset($cartProduct->options->image)}}" alt="" height="50" width="50"></td>
                         <td>{{$cartProduct->price}}</td>
                         <td>
                             <form action="{{route('update-cart')}}" method="post">
                                 {{csrf_field()}}
                                 <input type="number" name="qty" value="{{$cartProduct->qty}}" min="1">
                                 <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}">
                                 <input type="submit" name="btn" value="Update">
                             </form>
</td>
                         <td>{{$total=$cartProduct->price*$cartProduct->qty}}</td>
                         <td>
                             <a href="{{route('delete-cart',['rowid'=>$cartProduct->rowId])}}" class="btn btn-success" onclick="return confirm('Are you sure to delete this cart item???');">Delete</a>
                         </td>
                      </tr>
                          <?php $sum=$sum+$total;?>
                      @endforeach
                  </table>
                      <table class="table table-bordered">
                          <tr>
                              <th>Item Total(TK.)</th>
                              <td>{{$sum}}</td>
                          </tr>

                          <tr>
                              <th>Vat Total(TK.)</th>
                              <td>{{$vat=0}}</td>
                          </tr>

                          <tr>
                              <th>Grand Total(TK.)</th>
                              <td>{{$orderTotal=$sum+$vat}}</td>
                              <?php Session::put('orderTotal',$orderTotal) ?>
                          </tr>
                      </table>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-11">
                        <a href="" class="btn btn-success">Continue shopping</a>
                        @if(Session::get('customerID') && Session::get('shippingId'))
                            <a href="{{route('checkout-payment')}}" class="pull-right btn btn-success">Checkout</a>

                        @elseif(Session::get('customerID'))
                            <a href="{{route('checkout-shipping')}}" class="pull-right btn btn-success">Checkout</a>
                        @else
                        <a href="{{route('checkout')}}" class="pull-right btn btn-success">Checkout</a>
                        @endif

                    </div>

                </div>
            </div>
        </div>
      
       
        
    </div>
@endsection