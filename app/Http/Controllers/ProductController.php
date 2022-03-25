<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Comment;
use Brian2694\Toastr\Facades\Toastr;
session_start();

class ProductController extends Controller
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
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function all_product(){
        $this->AuthLogin();
       $all_product = DB::table('tbl_product')
       ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
       ->orderby('tbl_product.product_id','desc')->paginate(8);
       $manager_product =view('admin.all_product')->with('all_product',$all_product);
        return view('admin_layout')->with('admin.all_product',$manager_product);

    }
    public function save_product(REQUEST $request){
        $this->AuthLogin();
        $data=array();
        $data['product_name'] =$request->product_name;
        $data['product_tags'] =$request->product_tags;
        $data['product_price'] =$request->product_price;
        $data['product_quantity'] =$request->product_quantity;
        $data['product_desc'] =$request->product_desc;
        $data['product_content'] =$request->product_content;
        $data['category_id'] =$request->product_cate;
        $data['brand_id'] =$request->product_brand;
        $data['product_status'] =$request->product_status;
        $data['product_slug'] =$request->product_slug;


        $get_image = $request->file('product_image');
        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image)); //phân tách chuỗi dựa vào dấu .
            $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi name ảnh
            $get_image->move('public/uploads/product',$new_image);  //thêm ảnh vào public/uploads/product
            $data['product_image']=$new_image;
            DB::table('tbl_product')->insert($data);
            Toastr::success('Thêm sản phẩm thành công','Thành công');
            return Redirect::to('add-product');

        }
        $data['product_image']=''; //Nếu ko chọn ảnh cho image = rổng

        DB::table('tbl_product')->insert($data);
        Toastr::error('Thêm sản phẩm thất bại','Lỗi');
        return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Toastr::success('Ẩn sản phẩm thành công','Thành công');
        return Redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Toastr::success('Hiển thị sản phẩm thành công','Thành công');
        return Redirect::to('all-product');

    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product =view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product);
         return view('admin_layout')->with('admin.edit_product',$manager_product);

    }
    public function update_product(REQUEST $request,$product_id){
        $this->AuthLogin();
        $data=array();
        $data['product_name'] =$request->product_name;
        $data['product_tags'] =$request->product_tags;
        $data['product_price'] =$request->product_price;
        $data['product_quantity'] =$request->product_quantity;
        $data['product_desc'] =$request->product_desc;
        $data['product_content'] =$request->product_content;
        $data['category_id'] =$request->product_cate;
        $data['brand_id'] =$request->product_brand;
        $data['product_status'] =$request->product_status;
        $data['product_slug'] =$request->product_slug;
        $get_image = $request->file('product_image');

        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image)); //phân tách chuỗi dựa vào dấu .
            $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi name ảnh
            $get_image->move('public/uploads/product',$new_image);  //thêm ảnh vào public/uploads/product
            $data['product_image']=$new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Toastr::success('Cập nhật sản phẩm thành công','Thành công');
            return Redirect::to('all-product');

        }

        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Toastr::success('Cập nhật sản phẩm thành công','Thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Toastr::success('Xóa sản phẩm thành công','Thành công');
        return Redirect::to('all-product');
    }
//END FUNCTION ADMIN PAGE
    public function details_product($product_id,Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); //lấy danh mục sản phẩm khi status = 0 lệnh while
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id') //tbl product kết nối vs tbl brand qua brand id
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $value){
            $category_id = $value ->category_id;
            $url_canonical = $request->url();
            $image_og = url('public/uploads/product/'.$value->product_image);
        }
        //update views
        $product = Product::where('product_id',$product_id)->first();
        $product->product_views = $product->product_views + 1;
        $product->save();

        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id') //tbl product kết nối vs tbl brand qua brand id
        ->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->get();

        return view('pages.sanpham.show_details')->with('category',$cate_product)
        ->with('brand',$brand_product)->with('product_details',$details_product)
        ->with('relate',$related_product)->with('url_canonical',$url_canonical)->with('image_og',$image_og);
    }
    public function tag(Request $request, $product_tag){
        echo 'Trả về sản phẩm bài viết liên quan từ khóa tag:'.$request->product_tag;

    }
    public function quickview(Request $request){
        $product_id = $request->product_id;
        $product = Product::find($product_id);
        $output['product_name'] = $product->product_name;
        $output['product_id'] = $product->product_id;
        $output['product_desc'] = $product->product_desc;
        $output['product_content'] = $product->product_content;
        $output['product_price'] = number_format($product->product_price,0,',','.').' VNĐ';
        $output['product_image'] = '<p><img width="100%" src="public/uploads/product/'. $product->product_image.'"></p>';
        $output['product_quickview_value'] = '
        <input type="hidden" value="'.$product->product_id.'" class="cart_product_id_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_name.'" class="cart_product_name_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_image.'" class="cart_product_image_'.$product->product_id.'">
        <input type="hidden" value="'.$product->product_price.'" class="cart_product_price_'.$product->product_id.'">
        <input type="hidden" value="1" class="cart_product_qty_'.$product->product_id.'">
        ';
        echo json_encode($output);


    }
    public function load_comment(Request $request){
        $product_id = $request->product_id;
        $comment = Comment::where('comment_product_id',$product_id)->get();
        $output = '';
        foreach($comment as $key => $com){
            $output .= '
            <div class="flex-w flex-t p-b-68">
            <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                <img src="'.url().'/public/backend/images/avt.jpg" alt="AVATAR">
            </div>

            <div class="size-207">
                <div class="flex-w flex-sb-m p-b-17">
                    <span class="mtext-107 cl2 p-r-20">
                        '.$com->comment_name.'
                        <p class="stext-102 cl6">
                            11-30-2021
                        </p>
                    </span>

                    <span class="fs-18 cl11">
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star"></i>
                        <i class="zmdi zmdi-star-half"></i>
                    </span>
                </div>

                <p class="stext-102 cl6">
                    '.$com->comment.'
                </p>
            </div>
        </div>
        ';
        }
        echo $output;

    }
    public function ckeditor_image(Request $request){
        if($request->hasFile('upload')){
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName,PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension; //gắn thêm time() tránh trùng tên

            $request->file('upload')->move('public/uploads/ckeditor',$fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/uploads/ckeditor'.$fileName);
            $msg = 'Tải ảnh thành công';
            $reponse = "<script>window.parent.CKEDITOR.tools.callFuction($CKEditorFuncNum,'$url','$msg')</script>";
            @header('Content-Type: text/html; charset=utf-8');
            echo $reponse;
        }

    }
    public function file_browser(Request $request){
        $paths = glob(public_path('uploads/ckeditor/*'));
        $fileNames = array();
        foreach($paths as $path){
            array_push($fileNames,basename($path));

        }
        $data = array(
            'fileNames' => $fileNames,
        );
        return view('admin.images.file_browser')->with($data);
    }
}
