<?php

namespace App\Http\Controllers\Admin\Product;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function addProduct(){
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::all();
        return view('admin.product.add-product',['brands'=>$brands,'products'=>$products,'categories'=>$categories]);
    }
    public function saveProduct(Request $request){
//        $product = new Product();
//        return $request->all();

//        $data[] = $request->all();
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_details'] = $request->product_details;
        $data['product_color'] = $request->product_color;
        $data['product_size'] = $request->product_size;
        $data['product_price'] = $request->product_price;
        $data['discount_price'] = $request->discount_price;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated	;
        $data['mid_slider'] = $request->mid_slider;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['hot_new'] = $request->hot_new;
        $data['trend'] = $request->trend;
        $data['status'] = 1;

        $imageOne = $request->image_one;
        $imageTwo = $request->image_two;
        $imageThree = $request->image_three;

        if($imageOne && $imageTwo && $imageThree){
            $imageOneName = hexdec(uniqid()).'.'.$imageOne->getClientOriginalExtension();
            Image::make($imageOne)->resize(300,300)->save('public/media/product/'.$imageOneName);
            $data['image_one'] = 'public/media/product/'.$imageOneName;

            $imageTwoName = hexdec(uniqid()).'.'.$imageTwo->getClientOriginalExtension();
            Image::make($imageTwo)->resize(300,300)->save('public/media/product/'.$imageTwoName);
            $data['image_two'] = 'public/media/product/'.$imageTwoName;

            $imageThreeName = hexdec(uniqid()).'.'.$imageThree->getClientOriginalExtension();
            Image::make($imageThree)->resize(300,300)->save('public/media/product/'.$imageThreeName);
            $data['image_three'] = 'public/media/product/'.$imageThreeName;
            $product = DB::table('products')->insert($data);

            $notification=array(
                'message' => 'Product Info added successfully!!!!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }


    }
    public function getSubCategory($category_id){
        $category = DB::table('sub_categories')->where('category_id',$category_id)->get();
        return json_encode($category);
    }
    public function manageProduct(){
        $products = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->get();
//        return $product;
        return view('admin.product.manage-product',compact('products'));

    }
    public function inActiveProduct($id){
        DB::table('products')->where('id',$id)->update(['status'=>0]);
        $notification=array(
            'message' => 'Product Deactivated!!!!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function activeProduct($id){
        DB::table('products')->where('id',$id)->update(['status'=>1]);
        $notification=array(
            'message' => 'Product Activated!!!!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteProduct($id){
        $product = Product::find($id);
        $image1 = $product->image_one;
        $image2 = $product->image_two;
        $image3 = $product->image_three;
        unlink($image1);
        unlink($image2);
        unlink($image3);
        $product->delete();
        $notification=array(
            'message' => 'Product Deleted!!!!',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function viewProduct($id){
        $products = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('sub_categories','products.subcategory_id','sub_categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','brands.brand_name','sub_categories.subcategory_name')
            ->where('products.id',$id)
            ->first();
//        dd($products);
        return view('admin.product.view-product',compact('products'));

    }
    public function editProduct($id){
        $editProduct = Product::find($id);
        $categories = Category::all();
        $brands = Brand::all();
        $subCategories = SubCategory::all();
        return view('admin.product.edit-product',['subCategories'=>$subCategories,'brands'=>$brands,'categories'=>$categories,'editProduct'=>$editProduct]);
    }
    public function updateProductWithOUtImage(Request $request,$id){
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_details'] = $request->product_details;
        $data['product_color'] = $request->product_color;
        $data['product_size'] = $request->product_size;
        $data['product_price'] = $request->product_price;
        $data['discount_price'] = $request->discount_price;
        $data['video_link'] = $request->video_link;
        $data['main_slider'] = $request->main_slider;
        $data['hot_deal'] = $request->hot_deal;
        $data['best_rated'] = $request->best_rated	;
        $data['mid_slider'] = $request->mid_slider;
        $data['buyone_getone'] = $request->buyone_getone;
        $data['hot_new'] = $request->hot_new;
        $data['trend'] = $request->trend;
        $update = DB::table('products')->where('id',$id)->update($data);
        if($update){
            $notification=array(
                'message' => 'Product Updated',
                'alert-type' => 'info'
            );
            return redirect()->route('manage-product')->with($notification);
        }else{
            $notification=array(
                'message' => 'Nothing Updated',
                'alert-type' => 'warning'
            );
            return redirect()->route('manage-product')->with($notification);
        }
    }
    public function updateProductWithImage(Request $request,$id){
        $oldOne = $request->old_one;
        $oldTwo = $request->old_two;
        $oldThree = $request->old_three;
        $data = array();
        $image_1 = $request->file('image_one');
        $image_2 = $request->file('image_two');
        $image_3 = $request->file('image_three');
        if($image_1){
            unlink($oldOne);
            $image_name = date('dmy_H_s_i');
            $extension = strtolower($image_1->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$extension;
            $upload_path = 'public/media/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_1->move($upload_path,$image_full_name);

            $data['image_one'] = $image_url;
            $product = DB::table('products')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Product Image One Updated successfully!!!',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-product')->with($notification);
        }
        if($image_2){
            unlink($oldTwo);
            $image_name = date('dmy_H_s_i');
            $extension = strtolower($image_2->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$extension;
            $upload_path = 'public/media/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_2->move($upload_path,$image_full_name);

            $data['image_two'] = $image_url;
            $product = DB::table('products')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Product Image Two Updated successfully!!!',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-product')->with($notification);
        }
        if($image_3){
            unlink($oldThree);
            $image_name = date('dmy_H_s_i');
            $extension = strtolower($image_3->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$extension;
            $upload_path = 'public/media/product/';
            $image_url = $upload_path.$image_full_name;
            $success = $image_3->move($upload_path,$image_full_name);

            $data['image_three'] = $image_url;
            $product = DB::table('products')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Product Image Three Updated successfully!!!',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-product')->with($notification);
        }
    }
}
