<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;

session_start();

class GalleryController extends Controller
{
    public function AuthLogin()
    {   //kiem tra dang nhap
        $admin_id = Auth::id();
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function add_gallery($product_id)
    {
        $pro_id = $product_id;
        return view('admin.gallery.add_gallery')->with(compact('pro_id'));
    }
    public function select_gallery(Request $request)
    {

        $product_id = $request->pro_id;
        $gallery = Gallery::where('product_id', $product_id)->get();
        $gallery_count = $gallery->count();
        $output = '
        <table class="table table-hover">
        <thead>
            <tr>
                <th>Tên hình ảnh</th>
                <th>Hình ảnh</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
        ';
        if($gallery_count > 0) {
            $i = 0;
            foreach($gallery as $key => $gal) {
                $i++;
                $output.= '
                            <tr>
                                <td>'.$i.'</td>
                                <td>'.$gal->gallery_name.'</td>
                                <td>'.$gal->gallery_image.'</td>
                                <td>
                                <button data-gal_id="'.$gal->gallery_id.'" class="btn btn-xs btn-danger delete-gallery">Xóa</button>

                                </td>
                            </tr>
                            ';
            }
        }else{
            $output.= '
            <tr>
                <td colspan="4">Sản phảm này chưa có thư viện ảnh</td>
            </tr>
            ';
        }
        echo $output;
    }
}
