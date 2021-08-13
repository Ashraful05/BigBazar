<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function contactPage(){

        return view('frontend.pages.contact');
    }
    public function saveContactPage(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['message'] = $request->message;
        DB::table('contacts')->insert($data);
        $notification = array(
            'message' => 'Contact Information saved successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function allMessage(){
        $message = DB::table('contacts')->get();
        return view('admin.contact.all_message',compact('message'));
    }
}
