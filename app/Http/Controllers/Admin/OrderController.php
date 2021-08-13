<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function newOrder(){
        $order = DB::table('orders')->where('status','0')->get();
//        return $order;
        return view('admin.order.pending-order',compact('order'));
    }
    public function viewOrder($id){
        $order = DB::table('orders')
            ->join('users','orders.user_id','users.id')
            ->select('orders.*','users.name','users.phone')
            ->where('orders.id',$id)->first();
//        dd($orders);
        $shipping = DB::table('shippings')->where('order_id',$id)->first();
//        dd($shipping);

        $details = DB::table('order_details')
            ->join('products','order_details.product_id','products.id')
            ->select('order_details.*','products.product_code','products.image_one')
            ->where('order_details.order_id',$id)
            ->get();
//        dd($details);
        return view('admin.order.view-order',compact('order','shipping','details'));
    }
    public function orderAccept($id){
        DB::table('orders')->where('id',$id)->update(['status'=>1]);
        $notification = array(
            'message' => 'order Accept Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function orderCancel($id){
        DB::table('orders')->where('id',$id)->update(['status'=>4]);
        $notification = array(
            'message' => 'Order Cancel',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function orderHistory(){
        $order = DB::table('orders')->where('status',1)->get();
//        return $order;
        return view('admin.order.pending-order',['order'=>$order]);
    }
    public function orderCancelHistory(){
        $order = DB::table('orders')->where('status',4)->get();
//        return $order;
        return view('admin.order.pending-order',compact('order'));
    }
    public function orderProgressHistory(){
        $order = DB::table('orders')->where('status',2)->get();
//        return $order;
        return view('admin.order.pending-order',compact('order'));
    }
    public function orderDeliveryHistory(){
        $order = DB::table('orders')->where('status',3)->get();
        //        return $order;
        return view('admin.order.pending-order',compact('order'));
    }

    public function deliveryProcess($id){
        DB::table('orders')->where('id',$id)->update(['status'=>2]);
        $notification = array(
            'message' => 'Send to Delivery',
            'alert-type' => 'success'
        );
        return redirect()->route('accept-order-history')->with($notification);

    }
    public function deliveryDone($id){
        $product = DB::table('order_details')->where('order_id',$id)->get();
        foreach ($product as $row){
            DB::table('products')->where('id',$row->product_id)->update(['product_quantity' => DB::raw('product_quantity-'.$row->quantity) ]);
        }


        DB::table('orders')->where('id',$id)->update(['status'=>3]);
        $notification = array(
            'message' => 'Product Delivery Done',
            'alert-type' => 'info'
        );
        return redirect()->route('delivered-order-history')->with($notification);

    }


}
