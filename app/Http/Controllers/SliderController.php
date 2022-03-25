<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
session_start();

class SliderController extends Controller
{
    public function unactive_slide($slider_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>0]);
        Session::put('message','Ẩn slider thành công');
        return Redirect::to('manager-slider');
    }
    public function active_slide($slider_id){
        $this->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
        Session::put('message','Kích hoạt slider thành công');
        return Redirect::to('manager-slider');

    }
    public function manager_slider(){
        $all_slide = Slider::orderBy('slider_id','DESC')->get();
        return view('admin.slider.list_slider')->with(compact('all_slide'));
    }
    public function add_slider(){
        return view('admin.slider.add_slider');
    }
    public function insert_slider(Request $request){
        $data = $request->all();
        $this->AuthLogin();


        $get_image = $request->file('slider_image');
        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image)); //phân tách chuỗi dựa vào dấu .
            $new_image= $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension(); //lấy đuôi name ảnh
            $get_image->move('public/uploads/slider',$new_image);  //thêm ảnh vào public/uploads/product
            $slider = new Slider();

            $slider->slider_name = $data['slider_name'];
            $slider->slider_image = $new_image;
            $slider->slider_status = $data['slider_status'];
            $slider->slider_desc = $data['slider_desc'];
            $slider->save();

            Session::put('message','Thêm slider thành công');
            return Redirect::to('add-slider');
        }else{
            Session::put('message','Làm ơn thêm hình ảnh');
            return Redirect::to('add-slider');
        }

    }
    public function AuthLogin(){   //kiem tra dang nhap
        $admin_id = Auth::id();
        if($admin_id){
           return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }
}
