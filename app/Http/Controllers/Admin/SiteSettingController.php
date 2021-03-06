<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SiteSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function siteSetting(){
        $siteSetting = DB::table('site_settings')->first();
        return view('admin.setting.site_setting',compact('siteSetting'));
    }
    public function updateSiteSetting(Request $request){
        $id = $request->id;
        $data = array();
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['email'] = $request->email;
        $data['company_name'] = $request->company_name;
        $data['company_address'] = $request->company_address;
        $data['facebook'] = $request->facebook;
        $data['youtube'] = $request->youtube;
        $data['instagram'] = $request->instagram;
        $data['twitter'] = $request->twitter;
        DB::table('site_settings')->where('id',$id)->update($data);
        $notification=array(
            'message' => 'Site Setting Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
