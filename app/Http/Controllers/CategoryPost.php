<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\PostCategory;
session_start();

class CategoryPost extends Controller
{
    public function AuthLogin(){   //kiem tra dang nhap
        $admin_id = Auth::id();
        if($admin_id){
           return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_post(){

    }
    public function add_category_post(){
        $this->AuthLogin();
        return view('admin.category_post.add_category');
    }
    public function save_category_post(REQUEST $request){
        $this->AuthLogin();
        $data= $request->all();
        $category_post = new PostCategory();
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::put('message','Thêm danh mục bài viết thành công');
        return Redirect()->back();
    }
    public function all_category_post(){
        $this->AuthLogin();

        $category_post = PostCategory::orderby('cate_post_id','desc')->get();

        return view('admin.category_post.list_category')->with(compact('category_post'));

    }
    // public function danh_muc_bai_viet($cate_post_slug){

    // }

    public function edit_category_post($cate_post_id){
        $this->AuthLogin();
        $category_post = PostCategory::find($cate_post_id);

         return view('admin.category_post.edit_category')->with(compact('category_post'));

    }
    public function update_category_post(REQUEST $request, $cate_post_id){
        $this->AuthLogin();

        $data= $request->all();
        $category_post = PostCategory::find($cate_post_id);
        $category_post->cate_post_name = $data['cate_post_name'];
        $category_post->cate_post_slug = $data['cate_post_slug'];
        $category_post->cate_post_desc = $data['cate_post_desc'];
        $category_post->cate_post_status = $data['cate_post_status'];
        $category_post->save();
        Session::put('message','Cập nhật danh mục bài viết thành công');
        return Redirect('/all-category-post');
    }
    public function delete_category_post($cate_post_id){
        $this->AuthLogin();
        $category_post = PostCategory::find($cate_post_id);
        $category_post->delete();
        Session::put('message','Xóa danh mục bài viết thành công');
        return Redirect()->back();
    }
// //END FUNCTION ADMIN PAGE

//     public function show_category_home($category_id){
//         $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); //lấy danh mục sản phẩm khi status = 0 lệnh while
//         $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

//         $category_by_id =DB::table('tbl_product')
//         ->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')
//         ->where('tbl_product.category_id',$category_id)->get();

//         $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();
//         return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)
//         ->with('category_by_id',$category_by_id)->with('category_name',$category_name);
//     }
}
