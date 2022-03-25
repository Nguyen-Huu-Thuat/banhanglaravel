<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
session_start();

class CartController extends Controller
{
    public function remove_item(request $request){
        $data = $request->all();
        $cart = Session::get('cart');

        if($cart ==true){
             foreach($cart as $key => $val){
                 if($val['product_id'] == $data['id']){
                     unset($cart[$key]); //unset theo mảng
                 }
             }
             Session::put('cart',$cart); //làm lại 1 cái session cart
        }
    }
    public function hover_cart(){
        $cart = count(Session::get('cart'));
        $output = '';
        if($cart>0){
            $output.= '<table>';
            foreach(Session::get('cart') as $key => $value){
                $output.= '<li>
                    <tr>
                        <a href="">
                            <td><img src="'.asset('public/uploads/product/'.$value['product_image']).'" style="margin-left: 10px;margin-bottom: 10px;border-radius: 10px;margin-right: 8px;"  alt="" width="100px" height="100px"></td>
                            <td>
                                <p>'.$value['product_name'].'</p>
                                <p>'.number_format($value['product_price'],0,',','.').'VNĐ</p>
                                <p>Số lượng: '.$value['product_qty'].'</p>
                            </td>
                        </a>
                    </tr>

                </li>';
            }
                $output.= '</table>';
        }else{
            $output.= '
                <li>
                    <p>Giỏ hàng trống</p>
                </li>';
        }
        echo $output;
    }
    public function show_cart(){
        $cart = count(Session::get('cart'));
        echo $cart;
    }
    public function gio_hang(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); //lấy danh mục sản phẩm khi status = 0 lệnh while
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('cart')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function add_cart_ajax(Request $request){
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_available = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_available++;
                }
            }
            if($is_available == 0){

                $cart[] = array(
                    'session_id'=> $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],


                );
                Session::put('cart',$cart);
            }
        }else{ //nếu chưa tồn tại session cart tạo session cart mới
            $cart[] = array(
                'session_id'=> $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],


            );
        }
        Session::put('cart',$cart);
        Session::save();

    }

    public function del_product($session_id){
        $cart = Session::get('cart');
        if($cart==true){
            foreach($cart as $key => $val){
                if($val['session_id']==$session_id){
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa sản phẩm thành công');
        }else{
            return redirect()->back()->with('message','Xóa sản phẩm thất bại');
        }
    }
    public function update_cart(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart==true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id']==$key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Cập nhật số lượng thành công');

        }else{
            return redirect()->back()->with('message','Cập nhật số lượng thất bại');
        }
    }

    public function delete_all_product(){
        $cart = Session::get('cart');
        if($cart==true){
            // Session::destroy('cart');
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa tất cả sản phẩm thành công');
        }
    }

    public function check_coupon(Request $request){
        $data = $request->all();
        $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');

        $data = $request->all();
        //nếu có đăng nhập
        if(Session::get('customer_id')){
            $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)
            ->where('coupon_used','LIKE','%'.Session::get('customer_id').'%')->first();
            if($coupon){
                return redirect()->back()->with('error','Mã giảm giá đã được sử dụng trước đây, vui lòng nhập lại mã khác !!! ');
            }else{
                $coupon_login = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
                if($coupon_login){
                    $count_coupon = $coupon_login->count();
                    if($count_coupon>0){
                        $coupon_session = Session::get('coupon'); //neu co coupon tao 1 session['coupon'] luu ma giam gia
                        if($coupon_session==true){
                            $is_available =0;
                            if($is_available==0){
                                $cou[] = array(
                                    'coupon_code' => $coupon_login -> coupon_code,
                                    'coupon_condition' => $coupon_login -> coupon_condition,
                                    'coupon_number' => $coupon_login -> coupon_number,
                                );
                                Session::put('coupon',$cou);
                            }
                        }else{
                            $cou[] = array(
                                'coupon_code' => $coupon_login -> coupon_code,
                                'coupon_condition' => $coupon_login -> coupon_condition,
                                'coupon_number' => $coupon_login -> coupon_number,
                            );
                            Session::put('coupon',$cou);
                        }
                        Session::save();
                        return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                    }
                }else{
                    return redirect()->back()->with('error','Mã giảm giá không hợp lệ hoặc đã hết hạn');
                }
            }

    //nếu chưa đăng nhập

        }else{
            $coupon = Coupon::where('coupon_code',$data['coupon'])->where('coupon_status',1)->where('coupon_date_end','>=',$today)->first();
            if($coupon){
                $count_coupon = $coupon->count();
                if($count_coupon>0){
                    $coupon_session = Session::get('coupon'); //neu co coupon tao 1 session['coupon'] luu ma giam gia
                    if($coupon_session==true){
                        $is_available =0;
                        if($is_available==0){
                            $cou[] = array(
                                'coupon_code' => $coupon -> coupon_code,
                                'coupon_condition' => $coupon -> coupon_condition,
                                'coupon_number' => $coupon -> coupon_number,
                            );
                            Session::put('coupon',$cou);
                        }
                    }else{
                        $cou[] = array(
                            'coupon_code' => $coupon -> coupon_code,
                            'coupon_condition' => $coupon -> coupon_condition,
                            'coupon_number' => $coupon -> coupon_number,
                        );
                        Session::put('coupon',$cou);
                    }
                    Session::save();
                    return redirect()->back()->with('message','Thêm mã giảm giá thành công');
                }
            }else{
                return redirect()->back()->with('error','Mã giảm giá không hợp lệ hoặc đã hết hạn');
            }
        }


    }

    public function save_cart(Request $request){

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); //lấy danh mục sản phẩm khi status = 0 lệnh while
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        $productid = $request->productid_hidden;
        $quantity = $request->qty;

        $product_info = DB::table('tbl_product')->where('product_id',$productid)->first();


        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product);

    }

    public function show_quickcart(){
        $output = '<form>
        '.csrf_field().'
        <table class="shop_table cart table" id="t01">
        <thead>
            <tr>
                <th class="product-name" colspan="2">Sản phẩm</th>
                <th class="product-price">Giá tiền</th>
                <th class="product-quantity">Số lượng</th>
                <th class="product-subtotal" colspan="2">Thành tiền</th>
            </tr>
        </thead>';

        $output1 =' <table class="table shop_table">
        <tbody>';

                if(Session::get('cart')==true){
                    $total = 0;
                    foreach(Session::get('cart') as $key => $cart){

                        $subtotal = $cart['product_price']*$cart['product_qty'];
                        $total += $subtotal;

                        $output.='<tbody>
                        <tr class="cart_item">
                            <td class="product-thumbnail">
                                <a href="#">
                                    <img width="150" height="150" src="'.url('public/uploads/product/'.$cart['product_image']).'" alt="'.$cart['product_name'].'">
                                </a>
                            </td>
                            <td class="product-name">
                                <a href="#">'.$cart['product_name'].'</a>
                                <ul>
                                    <li>Size: XL</li>
                                    <li>Color: White</li>
                                </ul>
                            </td>
                            <td class="product-price">
                                <span class="amount">'.number_format($cart['product_price'],0,',',',').'VNĐ</span>
                            </td>
                            <td class="product-quantity">
                                <div class="quantity buttons_added">
                                    <input type="number" step="1" name="cart_qty['.$cart['session_id'].']" min="0" value="'.$cart['product_qty'].'" title="Qty" class="input-text qty text">

                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="amount">'.number_format($subtotal,0,',',',').'VNĐ</span>
                            </td>
                            <td class="product-remove">
                                <a style="cursor: pointer;" class="remove" id="'.$cart['session_id'].'" onclick="deletecartitem(this.id)" title="Xóa sản phẩm">
                                    <i class="zmdi zmdi-close-circle-o"></i>
                                </a>
                            </td>
                        </tr>';
                        }


        $output.= '</tbody>
        </table>
        </form>';
            }else{
        $output.=
        '<p>Vui lòng thêm sản phẩm vào giỏ hàng</p>';
            }
        $output1 .= '<tr class="cart-subtotal">
        <th>Tổng tiền</th>
        <td>
            <span class="amount">'.number_format($total,0,',',',').'VNĐ</span>
        </td>
    </tr>
    <tr class="order-total">
                                <th>Tổng thanh toán</th>
                                <td>
                                    <strong><span class="amount">'.number_format($total,0,',',',').'VNĐ</span></strong>
                                </td>
                            </tr>
                            <tr class="order-total">
                            <th>';

                            if(Session::get('customer_id')) {
                                $output1.= '<li class="nav-register" style="list-style: none;border: 1px solid #c0c0c0;padding: inherit;padding-left: 15px;width:113px;">
                                        <a href="'.url('/checkout').'">Thanh toán</a>
                                    </li>';

                                }else {
                                    $output1.= '<li class="nav-register" style="list-style: none;border: 1px solid #c0c0c0;padding: inherit;padding-left: 15px;width:113px;">
                                        <a href="'.url('/login-checkout').'">Thanh toán</a>
                                    </li>';
                                }

                                $output1.= '</th>
                            <td>
                                <strong><span class="amount"></span></strong>
                            </td>
                        </tr>

                    </tbody>
                    </table>';
            echo $output;
            echo $output1;
        }



}
