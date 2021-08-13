<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function addSEO(){
        $seo = DB::table('seos')->first();
        return view('admin.category.add-seo',['seo'=>$seo]);
    }
    public function manageCategory(){
        $categories = Category::all();
        return view('admin.category.manage-category',['categories'=>$categories]);
    }
    public function saveCategory(Request $request){
        $this->validate($request,[
            'category_name' => 'required|unique:categories|max:255'
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        $notifcation = array(
            'message' => 'Category Information added Successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifcation);
    }
    public function editCategory($id){
        $category = Category::find($id);
        return view('admin.category.edit-category',['category'=>$category]);
    }
    public function updateCategory(Request $request,$id){
//        $category = Category::find($request->category_id);
//        $category->category_name = $request->category_name;
//        $update = $category->update();
        $data = array();
        $data['category_name'] = $request->category_name;
        $update = DB::table('categories')->where('id',$id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Category Information updated Successfully!!',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-category')->with($notification);
        }else{
            $notification = array(
                'message' => 'Nothing to Update!!!',
                'alert-type' => 'warning'
            );
            return redirect()->route('manage-category')->with($notification);
        }

    }
    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();
        $notification = array(
            'message' => 'Category Information deleted Successfully!!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
