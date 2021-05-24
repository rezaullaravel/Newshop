@extends('admin.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{Session::get('sms')}}</h1>
                <h1>{{Session::get('message')}}</h1>
                <table class="table table-bordered">
                    <tr class="bg-success">
                        <th>Sl no</th>
                        <th>Customer name</th>
                        <th>order total</th>
                        <th>order status</th>
                        <th>order date</th>
                        <th>payment type</th>
                        <th>payment status</th>
                        <th>Action</th>
                    </tr>
                    @php($i=1)
                    @foreach($orders as $order)

                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$order->first_name.' '.$order->last_name}}</td>
                        <td>{{$order->order_total}}</td>
                        <td>{{$order->order_status}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->payment_type}}</td>
                        <td>{{$order->payment_status}}</td>

                        <td>
                            <a href="{{route('view-order-detail',['id'=>$order->id])}}" class="btn btn-primary">View order details</a>
                            <a href="{{route('edit-order',['id'=>$order->id])}}" class="btn btn-info">Edit order</a>
                            <a href="{{route('delete-order',['id'=>$order->id])}}" class="btn btn-success" onclick="return confirm('Are you sure to delete this order???');">Delete order</a>

                        </td>
                    </tr>
                    @endforeach
                </table>




            </div>

        </div>
    </div>
@endsection
