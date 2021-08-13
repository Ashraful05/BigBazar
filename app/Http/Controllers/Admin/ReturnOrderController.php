<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReturnOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function returnRequest(){
        $order = DB::table('orders')->where('return_order',1)->get();
        return view('admin.return-order.return_request',compact('order'));
    }
    public function returnApprove($id){
        DB::table('orders')->where('id',$id)->update(['return_order' => 2]);
        $notification = array(
            'message' => 'Order Return Success',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function allReturn(){
        $order = DB::table('orders')->where('return_order',2)->get();
        return view('admin.return-order.all_return',compact('order'));
    }
}
