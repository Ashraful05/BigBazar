<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function userRole(){
        $user = DB::table('admins')->where('type',2)->get();
        return view('admin.role.all-role',['user'=>$user]);
    }
    public function createUser(){
        return view('admin.role.create_role');
    }
    public function saveAdmin(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['phone'] = $request->phone;
        $data['category'] = $request->category;
        $data['coupon'] = $request->coupon;
        $data['product'] = $request->product;
        $data['blog'] = $request->blog;
        $data['order'] = $request->order;
        $data['report'] = $request->report;
        $data['role'] = $request->role;
        $data['return'] = $request->return;
        $data['contact'] = $request->contact;
        $data['comment'] = $request->comment;
        $data['setting'] = $request->setting;
        $data['stock'] = $request->stock;
        $data['type'] = 2;
        DB::table('admins')->insert($data);
        $notification=array(
            'message' => 'Child Admin created successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin-all-user')->with($notification);
    }
    public function deleteAdmin($id){
        DB::table('admins')->where('id',$id)->delete();
        $notification=array(
            'message' => 'Child Admin deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('admin-all-user')->with($notification);
    }
    public function editAdmin($id){
        $user = DB::table('admins')->where('id',$id)->first();
        return view('admin.role.edit_role',compact('user'));
    }
    public function updateAdmin(Request $request){
        $id = $request->id;
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['category'] = $request->category;
        $data['coupon'] = $request->coupon;
        $data['product'] = $request->product;
        $data['blog'] = $request->blog;
        $data['order'] = $request->order;
        $data['report'] = $request->report;
        $data['role'] = $request->role;
        $data['return'] = $request->return;
        $data['contact'] = $request->contact;
        $data['comment'] = $request->comment;
        $data['setting'] = $request->setting;
        $data['stock'] = $request->stock;
        DB::table('admins')->where('id',$id)->update($data);
        $notification=array(
            'message' => 'Child Admin Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('admin-all-user')->with($notification);
    }
    public function productStock(){
        $products = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->get();
//        return $product;
        return view('admin.stock.manage-stock',compact('products'));
    }
}
