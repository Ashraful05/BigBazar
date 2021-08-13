<?php

namespace App\Http\Controllers\Admin\Category;

use App\Category;
use App\Coupon;
use App\Http\Controllers\Controller;
use App\NewsLetter;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function manageCoupon(){
        $coupons = Coupon::all();
        return view('admin.coupon.manage-coupon',['coupons'=>$coupons]);
    }
    public function saveCoupon(Request $request){
        $coupon = new Coupon();
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();
        $notification = array(
            'message' => 'Coupon Info added successfully!!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editCoupon($id){
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit-coupon',['coupon'=>$coupon]);
    }
    public function updateCoupon(Request $request,$id){
        $coupon = Coupon::find($request->coupon_id);
//        return $coupon;
        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->update();
        $notification = array(
            'message' => 'Coupon Info Updated successfully!!!',
            'alert-type' => 'info'
        );
        return redirect()->route('manage-coupon')->with($notification);
    }
    public function deleteCoupon($id){
        $coupon = Coupon::find($id);
        $coupon->delete();
        $notification = array(
            'message' => 'Coupon Info deleted successfully!!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function manageNewsLetter(){
        $newsLetters = NewsLetter::all();
        return view('admin.coupon.manage-newsletter',compact('newsLetters'));
    }
    public function saveNewsLetter(Request $request){
        $newsLetter = new NewsLetter();
        $newsLetter->email = $request->email;
        $newsLetter->save();
        $notification = array(
            'message' => 'NewsLetter Info deleted successfully!!!',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-newsletter')->with($notification);
    }
    public function deleteNewsLetter($id){
        $newsLetter = NewsLetter::find($id);
        $newsLetter->delete();
        $notification = array(
            'message' => 'NewsLetter Info deleted successfully!!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
