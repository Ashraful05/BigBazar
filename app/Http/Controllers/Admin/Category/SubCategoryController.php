<?php

namespace App\Http\Controllers\Admin\Category;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function manageSubCategory(){
        $categories = Category::all();
        $subCategory = DB::table('sub_categories')
            ->join('categories','sub_categories.category_id','categories.id')
            ->select('sub_categories.*','categories.category_name')
            ->get();
       return view('admin.subcategory.manage-sub-category',compact('categories','subCategory'));
    }
    public function saveSubCategory(Request $request){
        $this->validate($request,[
            'subcategory_name' => 'required',
        ]);
        $subCatgory = new SubCategory();
        $subCatgory->category_id = $request->category_id;
        $subCatgory->subcategory_name = $request->subcategory_name;
        $subCatgory->save();
//        $data = array();
//        $data['category_id'] = $request->category_id;
//        $data['subcategory_name'] = $request->subcategory_name;
//        DB::table('subcategories')->insert($data);
        $notification = array(
            'message' => 'Sub Category Info added successfully!!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editSubCategory($id){
        $editSubCategory = SubCategory::find($id);
        $categories = Category::all();
        return view('admin.subcategory.edit-subcategory',['categories'=>$categories,'editSubCategory'=>$editSubCategory]);
    }
    public function updateSubCategory(Request $request,$id){
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('sub_categories')->where('id',$id)->update($data);
        $notification = array(
            'message' => 'Sub Category Info Updated successfully!!!',
            'alert-type' => 'success'
        );
        return redirect()->route('sub-category')->with($notification);
    }
    public function deleteSubCategory($id){
        $deleteSubCategory = SubCategory::find($id);
        $deleteSubCategory->delete();
        $notification = array(
            'message' => 'SubCategory Deleted Successfully!!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
