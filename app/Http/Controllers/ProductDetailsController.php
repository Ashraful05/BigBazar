<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;

class ProductDetailsController extends Controller
{
    public function productDetails($id,$product_name){
        $product = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('sub_categories','products.subcategory_id','sub_categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','sub_categories.subcategory_name','brands.brand_name')
            ->where('products.id',$id)
            ->first();
        $color = $product->product_color;
        $product_color = explode(',', $color);
        $size = $product->product_size;
        $product_size = explode(',', $size);
        return view('frontend.pages.product_details',compact('product','product_color','product_size'));
    }
    public function addCartProduct(Request $request,$id){
        $addCard = DB::table('products')->where('id',$id)->first();
        $data = array();
        if($addCard->discount_price == Null){
            $data['id'] = $addCard->id;
            $data['name'] = $addCard->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $addCard->product_price;
            $data['weight'] = 1;
            $data['options']['image'] = $addCard->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            $notification=array(
                'message'=>'Product Successfully added!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $data['id'] = $addCard->id;
            $data['name'] = $addCard->product_name;
            $data['qty'] = $request->qty;
            $data['price'] = $addCard->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $addCard->image_one;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;
            Cart::add($data);
            $notification=array(
                'message'=>'Product added successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function productView($id){
        $products = DB::table('products')->where('subcategory_id',$id)->paginate(10);
        $categories = DB::table('categories')->get();
        $brands = DB::table('products')->where('subcategory_id',$id)->select('brand_id')->groupBy('brand_id')->get();
        return view('frontend.pages.all-product',compact('products','categories','brands'));
    }
    public function categoryView($id){
        $categories = DB::table('products')->where('category_id',$id)->paginate(5);
        return view('frontend.pages.all-category',['categories'=>$categories]);
    }
}
