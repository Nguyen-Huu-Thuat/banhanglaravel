<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Brand;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
session_start();

class BrandProduct extends Controller
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
    public function add_brand_product(){
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function all_brand_product(){
        $this->AuthLogin();
    $all_brand_product = Brand::orderby('brand_id','desc')->get();
       $manager_brand_product =view('admin.all_brand_product')->with('all_brand_product',$all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product',$manager_brand_product);

    }
    public function save_brand_product(REQUEST $request){
        $this->AuthLogin();
        // Models
        $data = $request->all();

        $brand = new Brand();
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->brand_status = $data['brand_product_status'];
        $brand->save();
        // $data=array();
        // $data['brand_name'] =$request->brand_product_name;
        // $data['brand_desc'] =$request->brand_product_desc;
        // $data['brand_status'] =$request->brand_product_status;

        // DB::table('tbl_brand')->insert($data);
        Toastr::success('Thêm thương hiệu sản phẩm thành công','Thành công');
        return Redirect::to('add-brand-product');
    }
    public function unactive_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>1]);
        Toastr::success('Ẩn thương hiệu sản phẩm thành công','Thành công');
        return Redirect::to('all-brand-product');
    }
    public function active_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update(['brand_status'=>0]);
        Toastr::success('Kích hoạt thương hiệu sản phẩm thành công','Thành công');
        return Redirect::to('all-brand-product');

    }
    public function edit_brand_product($brand_product_id){
        $this->AuthLogin();
        // $edit_brand_product = DB::table('tbl_brand')->where('brand_id', $brand_product_id)->get();
        $edit_brand_product = Brand::find($brand_product_id); //find sửa 1 sản phẩm
        $manager_brand_product =view('admin.edit_brand_product')->with('edit_brand_product',$edit_brand_product);
         return view('admin_layout')->with('admin.edit_brand_product',$manager_brand_product);

    }
    public function update_brand_product(REQUEST $request,$brand_product_id){
        $this->AuthLogin();
        $data = $request->all();
        $brand = Brand::find($brand_product_id);
        $brand->brand_name = $data['brand_product_name'];
        $brand->brand_desc = $data['brand_product_desc'];
        $brand->save();
        // $data=array();
        // $data['brand_name'] =$request->brand_product_name;
        // $data['brand_desc'] =$request->brand_product_desc;

        // DB::table('tbl_brand')->where('brand_id',$brand_product_id)->update($data);
        Toastr::success('Cập nhật thương hiệu sản phẩm thành công','Thành công');
        return Redirect::to('all-brand-product');
    }
    public function delete_brand_product($brand_product_id){
        $this->AuthLogin();
        DB::table('tbl_brand')->where('brand_id',$brand_product_id)->delete();
        Toastr::success('Xóa thương hiệu sản phẩm thành công','Thành công');
        return Redirect::to('all-brand-product');
    }
    //END FUNCTION ADMIN PAGE

    public function show_brand_home($brand_id){
       $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); //lấy danh mục sản phẩm khi status = 0 lệnh while
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $brand_by_id =DB::table('tbl_product')
        ->join('tbl_brand','tbl_product.brand_id','=','tbl_brand.brand_id')
        ->where('tbl_product.brand_id',$brand_id)->get();
        $brand_name = DB::table('tbl_brand')->where('tbl_brand.brand_id',$brand_id)->limit(1)->get();
        return view('pages.brand.show_brand')->with('category',$cate_product)->with('brand',$brand_product)
        ->with('brand_by_id',$brand_by_id)->with('brand_name',$brand_name);
    }
}
