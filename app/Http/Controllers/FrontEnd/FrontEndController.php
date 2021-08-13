<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsLetter;
use DB;

class FrontEndController extends Controller
{
    public function index(){
        return view('frontend.home.home');
    }
    public function saveNewsLetter(Request $request){
        $this->validate($request,[
            'email' => 'required|unique:news_letters|max:200',
        ]);
        $newsLetter = new NewsLetter();
        $newsLetter->email = $request->email;
        $newsLetter->save();
        $notification = array(
            'message' => 'Thanks For Subscribing',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function userLogin(){
        return view('frontend.register-login.login');
    }
    public function orderTracking(Request $request){
        $code = $request->code;
        $track = DB::table('orders')->where('status_code',$code)->first();
        if($track){
//            dd($track);
            return view('frontend.pages.order-tracking',['track'=>$track]);
        }else{
            $notification = array(
                'message' => 'Status code is invalid',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
