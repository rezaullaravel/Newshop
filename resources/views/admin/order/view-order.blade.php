@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-success">customer info for this order</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>customer name</th>
                        <td>{{$customer->first_name.' '.$customer->last_name}}</td>
                    </tr>

                    <tr>
                        <th>phone number</th>
                        <td>{{$customer->phone_number}}</td>
                    </tr>

                    <tr>
                        <th>email address</th>
                        <td>{{$customer->email_address}}</td>
                    </tr>

                    <tr>
                        <th>address</th>
                        <td>{{$customer->address}}</td>
                    </tr>
                </table>

                <h2 class="text-center text-success">shipping info for this order</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>full name</th>
                        <td>{{$shipping->full_name}}</td>
                    </tr>

                    <tr>
                        <th>phone number</th>
                        <td>{{$shipping->phone_number}}</td>
                    </tr>

                    <tr>
                        <th>email address</th>
                        <td>{{$shipping->email_address}}</td>
                    </tr>

                    <tr>
                        <th>address</th>
                        <td>{{$shipping->address}}</td>
                    </tr>
                </table>

                <h2 class="text-center text-success">payment info for this order</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>payment type</th>
                        <td>{{$payment->payment_type}}</td>
                    </tr>

                    <tr>
                        <th>payment status</th>
                        <td>{{$payment->payment_status}}</td>
                    </tr>


                </table>

                <h2 class="text-center text-success">product info for this order</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>Sl no</th>
                        <th>product id</th>
                        <th>product name</th>
                        <th>product price</th>
                        <th>product quantity</th>
                        <th>total price</th>
                    </tr>
                    @php($i=1)
                    @foreach($orderDetails as $orderDetail)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$orderDetail->product_id}}</td>
                        <td>{{$orderDetail->product_name}}</td>
                        <td>TK{{$orderDetail->product_price}}</td>
                        <td>{{$orderDetail->product_quantity}}</td>
                        <td>TK{{$orderDetail->product_price*$orderDetail->product_quantity}}</td>
                    </tr>
                    @endforeach
                </table>

                <h2 class="text-center text-success">order info for this order</h2>
                <table class="table table-bordered">
                    <tr>
                        <th>order id</th>
                        <td>{{$order->id}}</td>
                    </tr>

                    <tr>
                        <th>order total</th>
                        <td>{{$order->order_total}}</td>
                    </tr>

                    <tr>
                        <th>order status</th>
                        <td>{{$order->order_status}}</td>
                    </tr>

                    <tr>
                        <th>order date</th>
                        <td>{{$order->created_at}}</td>
                    </tr>
                </table>




            </div>

        </div>
    </div>
@endsection
