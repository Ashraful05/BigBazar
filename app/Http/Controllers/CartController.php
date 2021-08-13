<?php

namespace App\Http\Controllers;

//use Gloudemans\Shoppingcart\Cart;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Auth;
use Session;

class CartController extends Controller
{
    public function addCard($id){
        $addCard = DB::table('products')->where('id',$id)->first();
        $data = array();
        if($addCard->discount_price == Null){
            $data['id'] = $addCard->id;
            $data['name'] = $addCard->product_name;
            $data['qty'] = 1;
            $data['price'] = $addCard->product_price;
            $data['weight'] = 1;
            $data['options']['image'] = $addCard->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return \Response::json(['success' => 'product added on your Cardlist']);
        }else{
            $data['id'] = $addCard->id;
            $data['name'] = $addCard->product_name;
            $data['qty'] = 1;
            $data['price'] = $addCard->discount_price;
            $data['weight'] = 1;
            $data['options']['image'] = $addCard->image_one;
            $data['options']['color'] = '';
            $data['options']['size'] = '';
            Cart::add($data);
            return \Response::json(['success' => 'product added on your Cardlist']);
        }
    }
    public function check(){
        $content = Cart::content();
        return $content;
    }
    public function showCard(){
        $cart = Cart::content();
//        return $cart;
        return view('frontend.pages.cart',compact('cart'));
    }
    public function removeCart($rowId){
        Cart::remove($rowId);
        $notification=array(
            'message'=>'Product remove cart Successfully',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }
    public function updateCart(Request $request){
        $rowId = $request->product_id;
        $qty = $request->qty;
        Cart::update($rowId,$qty);
        $notification=array(
            'message'=>'Product quantity updated Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function viewProduct($id){
        $product = DB::table('products')
            ->join('categories','products.category_id','categories.id')
            ->join('sub_categories','products.subcategory_id','sub_categories.id')
            ->join('brands','products.brand_id','brands.id')
            ->select('products.*','categories.category_name','sub_categories.subcategory_name','brands.brand_name')
            ->where('products.id',$id)
            ->first();

//        return response()->json($product);
        $color = $product->product_color;
        $product_color = explode(',', $color);
        $size = $product->product_size;
        $product_size = explode(',', $size);

        return response::json(array(
            'product' => $product,
            'color' => $product_color,
            'size' => $product_size
        ));
    }
    public function insertCart(Request $request){
        $id = $request->product_id;
        $addCard = DB::table('products')->where('id',$id)->first();
        $color = $request->color;
        $size = $request->size;
        $quantity = $request->qty;
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
                'message'=>'Product Added Successfully',
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
                'message'=>'Product Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function userCheckout(){
        if(Auth::check()){
            $cart = Cart::content();
            return view('frontend.pages.checkout',['cart'=>$cart]);
        }else{
            $notification=array(
                'message'=>'First Login to your account',
                'alert-type'=>'success'
            );
            return Redirect()->route('customer-login')->with($notification);
        }
    }
    public function userWishlist(Request $request){
        $user_id = Auth::id();
        $product = DB::table('wishlists')
            ->join('products','wishlists.product_id','products.id')
            ->select('products.*','wishlists.user_id')
            ->where('wishlists.user_id',$user_id)
            ->get();
        return view('frontend.pages.wishlist',['product'=>$product]);
    }
    public function applyCoupon(Request $request){
        $coupon = $request->coupon;
        $check = DB::table('coupons')->where('coupon',$coupon)->first();
        if($check){
            Session::put('coupon',[
               'name' => $check->coupon,
                'discount'=> $check->discount,
                'balance' => Cart::Subtotal()-$check->discount
            ]);
            $notification=array(
                'message'=>'Coupon Applied successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'message'=>'Invalid Coupon',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }

    }
    public function removeCoupon(){
        Session::forget('coupon');
        $notification=array(
            'message'=>'Coupon Removed',
            'alert-type'=>'error'
        );
        return Redirect()->back()->with($notification);
    }
    public function paymentPage(){
        $cart = Cart::content();
        return view('frontend.pages.payment',compact('cart'));
    }

    public function productSearch(Request $request){
        $item = $request->search;
        $products = DB::table('products')
            ->where('product_name','LIKE',"%$item%")
            ->paginate(20);
        return view('frontend.pages.product_search',compact('products'));

    }


}
