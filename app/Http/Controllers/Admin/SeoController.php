<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SeoController extends Controller
{
    public function addSEO(){
        $seo = DB::table('seos')->first();
        return view('admin.seo.add-seo',['seo'=>$seo]);

    }

    public function updateSEO(Request $request,$id){
        $id = $request->id;

        $data = array();
        $data['meta_title'] = $request->meta_title;
        $data['meta_author'] = $request->meta_author;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytic'] = $request->google_analytic;
        $data['bing_analytic'] = $request->bing_analytic;

        DB::table('seos')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'SEO information updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    }
}
