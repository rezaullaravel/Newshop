<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use DB;

class orderController extends Controller
{
    public function manageOrderInfo(){
        $orders=DB::table('orders')
            ->join('customers','orders.customer_id','=','customers.id')
            ->join('payments','orders.id','=','payments.order_id')
            ->select('orders.*','customers.first_name','customers.last_name','payments.payment_type','payments.payment_status')
            ->get();
        //return $orders;


        return view('admin.order.manage-order',[
            'orders'=>$orders
        ]);
    }

    public function viewOrderDetail($id){
        $order=Order::find($id);
        $customer=Customer::find($order->customer_id);
        $shipping=Shipping::find($order->shipping_id);
        $payment=Payment::where('order_id',$order->id)->first();
        $orderDetails=OrderDetail::where('order_id',$order->id)->get();
        return view('admin.order.view-order',[
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetails'=>$orderDetails,
            'order'=>$order
        ]);
    }

    public function editOrder($id){

        $order=Order::find($id);
        $payment=Payment::where('order_id',$order->id)->first();
        $customer=Customer::find($order->customer_id);
        //return $customer;
        return view('admin.order.edit-order',[
            'order'=>$order,
            'customer'=>$customer,
            'payment'=>$payment
        ]);
    }

    public function updateOrderInfo(Request $request){
        //return $request->all();
        $order=Order::find($request->id);
        $order->order_total=$request->order_total;
        $order->created_at=$request->created_at;
        $order->order_status=$request->order_status;
        $order->save();
        //return $order;
        $customer=Customer::find($order->customer_id);
        $customer->first_name=$request->first_name;
        $customer->last_name=$request->last_name;
        $customer->save();
        //return $customer;
        $payment=Payment::where('order_id',$order->id)->first();
        $payment->payment_type=$request->payment_type;
        $payment->payment_status=$request->payment_status;
        $payment->save();
        //return $payment;
        return redirect('/manage/order')->with('sms','Order info updated successfully');
    }

    public function deleteOrderInfo($id){
        $order=Order::find($id);
        $order->delete();
        //return $order;


        $payment=Payment::where('order_id',$order->id)->first();
        $payment->delete();
        return redirect('/manage/order')->with('message','Order info deleted successfully');

    }















}
