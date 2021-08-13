<?php

namespace App\Http\Controllers;

use App\Mail\InvoiceMail;
use Illuminate\Http\Request;
use Auth;
use DB;
use Cart;
use Session;
use Stripe\Invoice;
use Mail;

class PaymentController extends Controller
{
    public function paymentProcess(Request $request){
//        $payment = $request->payment;
//        return $payment;
        $data = array();
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['payment'] = $request->payment;


        if($request->payment == 'stripe'){
            return view('frontend.payment.stripe',['data'=>$data]);
        }elseif ($request->payment == 'paypal') {
            return view('frontend.payment.paypal',['data'=>$data]);
        }elseif ($request->payment == 'ideal'){
            return view('frontend.payment.ideal',['data'=>$data]);
        }else{
        $request->payment == 'oncash';
            return view('frontend.payment.oncash',['data'=>$data]);
        }
    }
    public function stripeCharge(Request $request){
        $email = Auth::user()->email;
//        $user = Auth::id();
        $total = $request->total;

        // Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
        \Stripe\Stripe::setApiKey('sk_test_51JKmF2CH6py4vIl34bE3VhiBfQPEehuj2r7pmY8SeECAOZtwn7watY1D8Kx35Y05R5lPH3kQjhxzew7UQ2k8dBu200loogVRyD');

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total*100,
            'currency' => 'usd',
            'description' => 'Udmey Ecommerce Details',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);
//        dd($charge);
        $data = array();
        $data['user_id'] = Auth::id();
        $data['payment_id'] = $charge->payment_method;
        $data['paying_amount'] = $charge->amount;
        $data['balance_transaction'] = $charge->balance_transaction;
        $data['stripe_order_id'] = $charge->metadata->order_id;
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_type'] = $request->payment_type;
        $data['status_code'] = mt_rand(100000,999999);

        if(Session::has('coupon')){
            $data['subtotal'] = Session::get('coupon')['balance'];
        }else{
            $data['subtotal'] = Cart::Subtotal();
        }
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);

        //Mail send to user for invoice
        Mail::to($email)->send(new InvoiceMail($data));

        //inserting into shipping table.....
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['shipping_name'] = $request->shipping_name;
        $shipping['shipping_phone'] = $request->shipping_phone;
        $shipping['shipping_email'] = $request->shipping_email;
        $shipping['shipping_address'] = $request->shipping_address;
        $shipping['shipping_city'] = $request->shipping_city;
        DB::table('shippings')->insert($shipping);

        //inserting into Order Details table........
        $content = Cart::content();
        $details = array();
        foreach($content as $row){
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->options->color;
            $details['size'] = $row->options->size;
            $details['quantity'] = $row->qty;
            $details['single_price'] = $row->price;
            $details['total_price'] = $row->qty * $row->price;
            DB::table('order_details')->insert($details);
        }
        Cart::destroy();
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        $notification = array(
            'message' => 'Your order processed successfully',
            'alert-type' => 'success'
        );
        return redirect()->to('/')->with($notification);
    }

    public function oncashCharge(Request $request){

//        dd($charge);
        $data = array();
        $data['user_id'] = Auth::id();
        $data['shipping'] = $request->shipping;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_type'] = $request->payment_type;
        $data['status_code'] = mt_rand(100000,999999);

        if(Session::has('coupon')){
            $data['subtotal'] = Session::get('coupon')['balance'];
        }else{
            $data['subtotal'] = Cart::Subtotal();
        }
        $data['status'] = 0;
        $data['date'] = date('d-m-y');
        $data['month'] = date('F');
        $data['year'] = date('Y');
        $order_id = DB::table('orders')->insertGetId($data);



        //inserting into shipping table.....
        $shipping = array();
        $shipping['order_id'] = $order_id;
        $shipping['shipping_name'] = $request->shipping_name;
        $shipping['shipping_phone'] = $request->shipping_phone;
        $shipping['shipping_email'] = $request->shipping_email;
        $shipping['shipping_address'] = $request->shipping_address;
        $shipping['shipping_city'] = $request->shipping_city;
        DB::table('shippings')->insert($shipping);

        //inserting into Order Details table........
        $content = Cart::content();
        $details = array();
        foreach($content as $row){
            $details['order_id'] = $order_id;
            $details['product_id'] = $row->id;
            $details['product_name'] = $row->name;
            $details['color'] = $row->options->color;
            $details['size'] = $row->options->size;
            $details['quantity'] = $row->qty;
            $details['single_price'] = $row->price;
            $details['total_price'] = $row->qty * $row->price;
            DB::table('order_details')->insert($details);
        }
        Cart::destroy();
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        $notification = array(
            'message' => 'Your order processed successfully',
            'alert-type' => 'success'
        );
        return redirect()->to('/')->with($notification);
    }

    public function successList(){
        $order = DB::table('orders')->where('user_id',Auth::id())->where('status',3)->orderBy('id','desc')->limit(4)->get();
        return view('frontend.pages.return_order',['order'=>$order]);
    }
    public function returnRequest($id){
        DB::table('orders')->where('id',$id)->update(['return_order'=>1]);
        $notification = array(
            'message' => 'Order request done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
