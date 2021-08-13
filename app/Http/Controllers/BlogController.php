<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class BlogController extends Controller
{
    public function blog(){
        $post = DB::table('posts')
            ->join('post_category','posts.category_id','post_category.id')
            ->select('posts.*','post_category.category_name_en','post_category.category_name_in')
            ->get();
        return view('frontend.pages.blog',compact('post'));

    }
    public function englishLanguage(){
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','english');
        return redirect()->back();

    }
    public function hindiLanguage(){
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang','hindi');
        return redirect()->back();
    }
    public function blogSingleDetails($id){
        $posts = DB::table('posts')->where('id',$id)->get();
        return view('frontend.pages.blog-single-details',compact('posts'));
    }
}
