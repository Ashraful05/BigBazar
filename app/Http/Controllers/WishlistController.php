<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function addWishlist($id){
        $userId = Auth::id();
        $check = DB::table('wishlists')->where('user_id',$userId)->where('product_id',$id)->first();
        $data = array(
            'user_id'=>$userId,
            'product_id'=>$id,
        );

        if(Auth::check()){
            if($check){
                return \Response::json(['error' => 'product already in your wishlist']);
            }else{
                DB::table('wishlists')->insert($data);
                return \Response::json(['success' => 'Product Added to your wishlist']);
            }
        }else{
            return \Response::json(['error' => 'First Login To Your Account']);
        }

    }
}
