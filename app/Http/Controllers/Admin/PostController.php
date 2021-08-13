<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }
    public function addBlogCategory(){
        $blogCategories = DB::table('post_category')->get();
        return view('admin.blog.category.index',compact('blogCategories'));
    }
    public function saveBlogCategory(Request $request){
        $this->validate($request,[
            'category_name_en'=>'required',
            'category_name_in'=>'required'
        ]);
        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_in'] = $request->category_name_in;
        DB::table('post_category')->insert($data);
        $notification=array(
            'message' => 'Blog Category Info added successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteBlogCategory($id){
        DB::table('post_category')->where('id',$id)->delete();
        $notification=array(
            'message' => 'Blog Category Info deleted successfully',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
    public function editBlogCategory($id){
        $blogCategory = DB::table('post_category')->where('id',$id)->first();
        return view('admin.blog.category.edit',compact('blogCategory'));
    }
    public function updateBlogCategory(Request $request,$id){
        $data = array();
        $data['category_name_en'] = $request->category_name_en;
        $data['category_name_in'] = $request->category_name_in;
        DB::table('post_category')->where('id',$id)->update($data);
        $notification=array(
            'message' => 'Blog Category Info updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('add-blog-category')->with($notification);
    }
    public function addBlogPost(){
        $blogPosts = DB::table('posts')->get();
        $blogCategories = DB::table('post_category')->get();
        return view('admin.blog.add-post',compact('blogPosts','blogCategories'));
    }
    public function saveBlogPost(Request $request){
        $this->validate($request,[
            'post_title_en'=>'required',
            'post_title_in'=>'required',
        ]);
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_in'] = $request->post_title_in;
        $data['details_en'] = $request->details_en;
        $data['details_in'] = $request->details_in;
        $postImage = $request->file('post_image');
        if($postImage){
            $imageName = hexdec(uniqid()).'.'.$postImage->getClientOriginalExtension();
            Image::make($postImage)->resize(400,200)->save('public/media/post/'.$imageName);
            $data['post_image'] = 'public/media/post/'.$imageName;

            DB::table('posts')->insert($data);
            $notification=array(
                'message' => 'Post Info inserted successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $data['post_image'] = '';
            DB::table('posts')->insert($data);
            $notification=array(
                'message' => 'Post Info inserted without image',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
    public function manageBlogPost(){
        $managePosts = DB::table('posts')
            ->join('post_category','posts.category_id','post_category.id')
            ->select('posts.*','post_category.category_name_en')
            ->get();

        return view('admin.blog.manage-post',['managePosts'=>$managePosts]);
    }
    public function editBlogPost($id){
        $editBlogPost = DB::table('posts')->where('id',$id)->first();
        $blogCategories = DB::table('post_category')->get();
        return view('admin.blog.edit-post',['editBlogPost'=>$editBlogPost,'blogCategories'=>$blogCategories]);
    }
    public function updateBlogPost(Request $request,$id){
        $oldImage = $request->old_image;

        $this->validate($request,[
            'post_title_en'=>'required',
            'post_title_in'=>'required',
        ]);
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_in'] = $request->post_title_in;
        $data['details_en'] = $request->details_en;
        $data['details_in'] = $request->details_in;
        $postImage = $request->file('post_image');
        if($postImage){
            unlink($oldImage);
            $imageName = hexdec(uniqid()).'.'.$postImage->getClientOriginalExtension();
            Image::make($postImage)->resize(400,200)->save('public/media/post/'.$imageName);
            $data['post_image'] = 'public/media/post/'.$imageName;

            DB::table('posts')->where('id',$id)->update($data);
            $notification=array(
                'message' => 'Post Info updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-blog-post')->with($notification);
        }else{
            $data['post_image'] = '';
            DB::table('posts')->update($data);
            $notification=array(
                'message' => 'Post Info updated without image',
                'alert-type' => 'success'
            );
            return redirect()->route('manage-blog-post')->with($notification);
        }
    }
    public function deleteBlogPost($id){
        $deletePost = DB::table('posts')->where('id',$id)->first();
        $image = $deletePost->post_image;
        unlink($image);
        DB::table('posts')->where('id',$id)->delete();
        $notification=array(
            'message' => 'Post Info deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
