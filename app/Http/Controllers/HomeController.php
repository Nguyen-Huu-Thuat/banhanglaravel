<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Models\Slider;
use App\Models\Product;
use App\Models\PostCategory;
use App\Models\CategoryProductModel;

session_start();

class HomeController extends Controller
{
    public function load_more_product(Request $request){
        $data = $request->all();
        if($data['id']>0){
        $all_product =Product::where('product_status', '0')->where('product_id','<',$data['id'])->orderby('product_id', 'desc')->take(4)->get();
        }else{
            $all_product =Product::where('product_status', '0')->orderby('product_id', 'desc')->take(4)->get();
        }
        $output = '';
        if(!$all_product->isEmpty()){
        foreach($all_product as $key => $pro){
            $last_id = $pro->product_id;
            $output.= '
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
            <!-- Block2 -->
            <div class="block2">
                <div class="block2-pic hov-img0 label-new" data-label="New">
                    <img src="'.url('public/uploads/product/'.$pro -> product_image).'" alt="'.$pro->product_name.'">

                    <a href="#"
                        class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                        Quick View
                    </a>
                </div>

                <div class="block2-txt flex-w flex-t p-t-14">
                    <div class="block2-txt-child1 flex-col-l ">
                        <a href="'.url('chi-tiet-san-pham/'.$pro -> product_id).'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                            "'.$pro -> product_name.'"
                        </a>

                        <span class="stext-105 cl3">'.number_format($pro->product_price,0,',','.').'VNĐ
                        </span>
                    </div>

                    <div class="block2-txt-child2 flex-r p-t-3">
                        <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                            <img class="icon-heart1 dis-block trans-04" src="'.asset('public/frontend/images/icons/icon-heart-01.png').'"
                                alt="ICON">
                            <img class="icon-heart2 dis-block trans-04 ab-t-l"
                                src="'.asset('public/frontend/images/icons/icon-heart-02.png').'" alt="ICON">
                        </a>
                    </div>
                </div>
            </div>
        </div>';
        }
        $output.= '
        <div id="load_more" class="flex-c-m flex-w w-full p-t-45">
        <a  href="#" id="load_more_button" data-id="'.$last_id.'" class="flex-c-m stext-1212 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
            Load More
        </a>
    </div>';
    }else{
        $output.= '
        <div id="load_more" class="flex-c-m flex-w w-full p-t-45">
        <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
            Đã hết sản phẩm để hiển thị !
        </a>
    </div>';
    }
        echo $output;

    }
    public function index()
    {
        //Category post
        $category_post = PostCategory::orderby('cate_post_id','desc')->get();
        //Slider
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get(); //lấy danh mục sản phẩm khi status = 0 lệnh while
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        // $category_by_slug = CategoryProductModel::where('slug_category_product',$slug_category_product);


        //Sắp xếp
        // if(isset($_GET['sort_by'])) {
        //     $sort_by = $_GET['sort_by'];
        //     if($sort_by == 'giam_dan'){
        //         $category_by_id = Product::with('category')->where('category_id',$category_id)->orderby('product_price','DESC')
        //         ->paginate(6)->appends(request()->query());
        //     }
        // }

        $all_product = DB::table('tbl_product')->where('product_status', '0')->orderby('product_id', 'desc')->paginate(8); //limit(10)->get();
        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product)->with(compact('slider'))->with(compact('category_post'));
    }

    public function san_pham()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get(); //lấy danh mục sản phẩm khi status = 0 lệnh while
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status', '0')->orderby('product_id', 'desc')->limit(0)->get();
        return view('product')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product);
    }


    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get(); //lấy danh mục sản phẩm khi status = 0 lệnh while
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name', 'like', '%' . $keywords . '%')->get();
        return view('pages.sanpham.search')->with('category', $cate_product)->with('brand', $brand_product)->with('search_product', $search_product);
    }

    public function send_mail()
    {
        $to_name = "Nguyen Huu Thuat";
        $to_email = "thuatnguyen09112002@gmail.com"; //send to this email

        $data = array("name" => "Mail từ khách hàng", "body" => "Mail gửi về vấn đề"); //body of mail.blade.php

        Mail::send('pages.send_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('test mail nhé'); //send this mail with subject
            $message->from($to_email, $to_name); //send from this mail
        });
    }
    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $product = Product::where('product_status',0)->where('product_name','LIKE','%'.$data['query'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block;position: relative;width: -webkit-fill-available;">';
            foreach($product as $key => $val){
                $output .= '<li class="li_search_ajax" style="padding-left:45px"><a href="#">'.$val->product_name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
