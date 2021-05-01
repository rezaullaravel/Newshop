<?php

namespace App\Http\Controllers;


use App\Category;
use App\Shipping;
use Illuminate\Http\Request;
use App\Customer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Order;
use App\Payment;
use App\OrderDetail;
use Cart;

class CheckoutController extends Controller
{
    public function index(){
        $categories=Category::where('publication_status',1)->get();
        return view('frontend.checkout.checkout-content',[
            'categories'=>$categories
        ]);
    }

    public function customerSignup(Request $request){
        $customer=new Customer();
        $customer->first_name=$request->first_name;
        $customer->last_name=$request->last_name;
        $customer->email_address=$request->email_address;
        $customer->password=bcrypt($request->password);
        $customer->phone_number=$request->phone_number;
        $customer->address=$request->address;
        $customer->save();
        $customerId=$customer->id;
        Session::put('customerId',$customerId);
        Session::put('customerName',$customer->first_name.' '.$customer->last_name);

        $data=$customer->toArray();
        Mail::send('frontend.mails.confirmation-mail',$data,
        function ($message) use ($data){
            $message->to($data['email_address']);
            $message->subject('confirmation mail');
        });

        return redirect('/checkout/shipping');


    }


    public function shippingForm(){
        $categories=Category::where('publication_status',1)->get();
        $customer=Customer::find(Session::get('customerId'));
        return view('frontend.checkout.shipping',[
            'categories'=>$categories,
            'customer'=>$customer
        ]);
    }


    public function saveShippinInfo(Request $request){
        //return $request->all();
        $shipping=new Shipping();
        $shipping->full_name=$request->full_name;
        $shipping->email_address=$request->email_address;
        $shipping->phone_number=$request->phone_number;
        $shipping->address=$request->address;
        $shipping->save();
        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');

    }


    public function paymentForm(){
        $categories=Category::where('publication_status',1)->get();
        return view('frontend.checkout.payment',[
            'categories'=>$categories
        ]);
    }

    public function newOrder(Request $request){
        //return $request->all();
        $paymentType=$request->payment_type;
        if($paymentType=='cash'){
           $order=new Order();
            $order->customer_id=Session::get('customerId');
            $order->shipping_id=Session::get('shippingId');
            $order->order_total=Session::get('orderTotal');
            $order->save();

            $payment=new Payment();
            $payment->order_id=$order->id;
            $payment->payment_type=$paymentType;
            $payment->save();
            $cartProducts=Cart::content();
            foreach ($cartProducts as $cartProduct){
                $orderDetail=new OrderDetail();
                $orderDetail->order_id=$order->id;
                $orderDetail->product_id=$cartProduct->id;
                $orderDetail->product_name=$cartProduct->name;
                $orderDetail->product_price=$cartProduct->price;
                $orderDetail->product_quantity=$cartProduct->qty;
                $orderDetail->save();
            }
            Cart::destroy();
            return redirect('/complete/order');


        }elseif ($paymentType=='paypal'){

        }
    }

    public function completeOrder(){
        return 'Your order has been successfully completed';
    }









}
