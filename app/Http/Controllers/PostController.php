<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
session_start();

class PostController extends Controller
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
        $this->AuthLogin();
        $cate_post = PostCategory::orderby('cate_post_id','desc')->get();
        return view('admin.post.add_post')->with(compact('cate_post'));
    }
        public function save_post(REQUEST $request){
        $this->AuthLogin();
        $data= $request->all();
        $post = new Post();
        $markupFixer  = new     \TOC\MarkupFixer();

        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];

        $contentwithmenu = $markupFixer->fix($data['post_content']);

        $post->post_content = $contentwithmenu;

        $post->post_meta_keyword = $data['post_meta_keyword'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_desc = $data['post_desc'];
        $post->post_status = $data['post_status'];
        $post->cate_post_id = $data['cate_post_id'];



        $get_image = $request->file('post_image');
        if($get_image){

            $get_name_image = $get_image->getClientOriginalName(); //lấy tên của hình ảnh
            $name_image = current(explode('.', $get_name_image)); //phân tách chuỗi dựa vào dấu .
            $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi name ảnh
            $get_image->move('public/uploads/post',$new_image);  //thêm ảnh vào public/uploads/product
            $post->post_image = $new_image;
            $post->save();
            Toastr::success('Thêm bài viết thành công','Thành công');
            return Redirect()->back();

        }else{
            Toastr::info('Vui lòng thêm ảnh để tạo bài viết','Chú ý');
            return Redirect()->back();

        }

    }
    public function all_post(){
        $this->AuthLogin();
       $all_post = Post::with('cate_post')->orderby('post_id','desc')->get();
        return view('admin.post.list_post')->with(compact('all_post'));

    }
    public function delete_post($post_id){
        $this->AuthLogin();
        $post = Post::find($post_id);
        $post_image = $post->post_image;

        if($post_image)
        {
            $path =  'public/uploads/post/'.$post_image; //nếu bài viết có hình ảnh thì xóa luôn hình ảnh
            unlink($path);
        }
            $post->delete();



            Toastr::success('Xóa bài viết thành công','Thành công');
        return Redirect()->back();
    }
    public function edit_post(Request $request, $post_id){
        $cate_post = PostCategory::orderby('cate_post_id')->get(); //lấy ra danh mục sản phẩm
        $post = Post::find($post_id);
        return view('admin.post.edit_post')->with(compact('post','cate_post'));
    }
    public function update_post(Request $request, $post_id){
        $this->AuthLogin();
        $data= $request->all();
        $post = Post::find($post_id);
        $markupFixer  = new     \TOC\MarkupFixer();

        $post->post_title = $data['post_title'];
        $post->post_slug = $data['post_slug'];

        $contentwithmenu = $markupFixer->fix($data['post_content']);

        $post->post_content = $contentwithmenu;

        // $post->post_content = $data['post_content'];
        $post->post_meta_keyword = $data['post_meta_keyword'];
        $post->post_meta_desc = $data['post_meta_desc'];
        $post->post_desc = $data['post_desc'];
        $post->post_status = $data['post_status'];
        $post->cate_post_id = $data['cate_post_id'];



        $get_image = $request->file('post_image');
        if($get_image){
            //xóa ảnh cũ
            $post_image_old = $post->post_image;
            $path =  'public/uploads/post/'.$post_image_old; //nếu bài viết có hình ảnh thì xóa luôn hình ảnh
            unlink($path);
            //Cập nhật lại ảnh mới
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên của hình ảnh
            $name_image = current(explode('.', $get_name_image)); //phân tách chuỗi dựa vào dấu .
            $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi name ảnh
            $get_image->move('public/uploads/post',$new_image);  //thêm ảnh vào public/uploads/product
            $post->post_image = $new_image;

        }
        $post->save();
        Toastr::success('Cập nhật bài viết thành công','Thành công');
        return Redirect()->back();

    }
    public function danh_muc_bai_viet(Request $request,$post_slug){
         //Category post
        $category_post = PostCategory::orderby('cate_post_id','desc')->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get(); //lấy danh mục sản phẩm khi status = 0 lệnh while
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        $cate_post = PostCategory::where('cate_post_slug',$post_slug)->take(1)->get();
        foreach($cate_post as $key =>$cate){
            //seo
            $meta_desc = $cate -> cate_post_desc;
            $meta_keywords = $cate -> cate_post_slug;
            $meta_title = $cate -> cate_post_name;
            $cate_id = $cate -> cate_post_id;
            $url_canonical = $request->url();
        }
        $post = Post::with('cate_post')->where('post_status', 0)->where('cate_post_id',$cate_id)->paginate(3);
        return view('pages.baiviet.danhmucbaiviet')->with('category', $cate_product)->with('brand', $brand_product)->with('meta_desc',$meta_desc)
        ->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('post',$post)
        ->with('category_post',$category_post);
    }
    public function bai_viet(Request $request,$post_slug){
         //Category post
         $category_post = PostCategory::orderby('cate_post_id','desc')->get();
         $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get(); //lấy danh mục sản phẩm khi status = 0 lệnh while
         $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

         $cate_post = PostCategory::where('cate_post_slug',$post_slug)->take(1)->get();
         $post = Post::with('cate_post')->where('post_status', 0)->where('post_slug',$post_slug)->take(1)->get();
         foreach($post as $key =>$p){
             //seo
             $meta_desc = $p -> cate_post_desc;
             $meta_keywords = $p -> cate_post_slug;
             $meta_title = $p -> cate_post_name;
             $cate_id = $p -> cate_post_id;
             $url_canonical = $request->url();
             $cate_post_id = $p -> cate_post_id;
             $post_id = $p -> post_id;
         }
         //update views
        //  $post = Post::where('post_id', $post_id)->first();
        //  $post->post_views = $post->post_views + 1;
        //  $post->save();
         $related =  Post::with('cate_post')->where('post_status', 0)->where('cate_post_id',$cate_post_id)->whereNotIn('post_slug',[$post_slug])->take(5)->get();

         return view('pages.baiviet.baiviet')->with('category', $cate_product)->with('brand', $brand_product)->with('meta_desc',$meta_desc)
         ->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical)->with('post',$post)
         ->with('category_post',$category_post)->with('related',$related);
    }
    public function about(){
        $category_post = PostCategory::orderby('cate_post_id','desc')->get();
        return view('pages.about.aboutus')->with('category_post',$category_post);
    }
}
