<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Brand;
use Image;
use DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function manageBrand(){
        $brands = Brand::all();
        return view('admin.brand.manage-brand',['brands'=>$brands]);
    }
    public function saveBrand(Request $request){
        $this->validate($request,[
            'brand_name' => 'required|unique:brands|max:255',
        ]);

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $image = $request->file('brand_logo');
        if($image){
            $image_name = date('dmy_H_s_i');
            $extension = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$extension;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['brand_logo'] = $image_url;
            $brand = DB::table('brands')->insert($data);
            $notification = array(
                'message' => 'Brand Info Added successfully!!!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }else{
            $brand = DB::table('brands')->insert($data);
            $notification = array(
                'message' => 'Nothing to Update!!!',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function editBrand($id) {
        $brand = Brand::find($id);
        return view('admin.brand.edit-brand',['brand'=>$brand]);
    }
    public function updateBrand(Request $request,$id){
        $oldLogo = $request->old_logo;
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $image = $request->file('brand_logo');
        if($image){
            unlink($oldLogo);
            $image_name = date('dmy_H_s_i');
            $extension = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$extension;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['brand_logo'] = $image_url;
            $brand = DB::table('brands')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Brand Info Updated successfully!!!',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-brand')->with($notification);
        }else{
            $brand = DB::table('brands')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Update Without Image!!!',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-brand')->with($notification);
        }
    }
    public function deleteBrand($id){
        $brand = Brand::find($id);
        $image = $brand->brand_logo;
        unlink($image);
        $brand->delete();
        $notification = array(
            'message' => 'Information deleted successfully!!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
