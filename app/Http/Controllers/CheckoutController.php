<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Models\Brand;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\Coupon;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;
session_start();

class CheckoutController extends Controller
{
    public function confirm_order(Request $request){
        $data = $request->all();
        //get coupon
        if($data['order_coupon']!='no'){
        $coupon = Coupon::where('coupon_code',$data['order_coupon'])->first();
        $coupon->coupon_used = $coupon->coupon_used.','.Session::get('customer_id');
        $coupon_mail = $coupon->coupon_code;
            $coupon->coupon_time = $coupon->coupon_time - 1;
            $coupon ->save();
        }else{
                $coupon_mail = 'Không có';
        }
        //get vận chuyển
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_note = $data['shipping_note'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();

        $shipping_id = $shipping->shipping_id;
        $checkout_code = substr(md5(microtime()),rand(0,26),5); //tao random chu va so, lay 5 so bat ki

        //get order
        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status =1;
        $order->order_code = $checkout_code;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now(); //bắt thời gian đặt hàng
        // $today = Carbon::now('Asis/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        // $order_date = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        // $order->created_at = $today;
        // $order->order_date = $order_date;
        $order->save();



        if(Session::get('cart')){
            foreach(Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails();
                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->save();
            }
        }

        //send mail confirm
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');

        $title_mail ="Đơn hàng xác nhận ngày".' '.$now;
        $customer = Customer::find(Session::get('customer_id'));
        $data['email'][] = $customer->customer_email;
        //lấy giỏ hàng
        if(Session::get('cart')==true){
            foreach(Session::get('cart') as $key =>$cart_mail){
                $cart_array[] = array(
                    'product_name' => $cart_mail['product_name'],
                    'product_price' => $cart_mail['product_price'],
                    'product_qty' => $cart_mail['product_qty']
                );
            }
        }
        //lấy phí ship
        if(Session::get('fee')==true) {
            $fee = Session::get('fee').'k';
        }else{
            $fee = '25000đ';
        }
        //lấy thông tin vận chuyển
        $shipping_array = array(
            'fee' => $fee,
            'customer_name' => $customer->customer_name,
            'shipping_name' => $data['shipping_name'],
            'shipping_email' => $data['shipping_email'],
            'shipping_phone' => $data['shipping_phone'],
            'shipping_address' => $data['shipping_address'],
            'shipping_note' => $data['shipping_note'],
            'shipping_method' => $data['shipping_method']
        );
        //lấy mã giảm giá,coupon
        $ordercode_mail = array(
            'coupon_code' =>$coupon_mail,
            'order_code' => $checkout_code
        );
        Mail::send('pages.mail.mail_order', ['cart_array'=>$cart_array, 'shipping_array'=>$shipping_array,'code'=>$ordercode_mail],function($message) use ($title_mail,$data){
            $message->to($data['email'])->subject($title_mail);
            $message->from($data['email'],$title_mail);
        });
        // kết thúc mail order
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
        Session::forget('paypal_success');
        Session::forget('total_paypal');


    }
    public function del_fee(){
        Session::forget('fee');
        return Redirect()->back();
    }
    public function caculate_fee(Request $request){
        $data = $request->all();
        if($data['matp']){
            $feeship = Feeship::where('fee_matp',$data['matp'])->where('fee_maqh',$data['maqh'])->where('fee_xaid',$data['xaid'])->get();
            if($feeship){
                $count_feeship = $feeship->count();
                if($count_feeship>0){
                    foreach($feeship as $key => $fee){
                        Session::put('fee',$fee->fee_feeship);
                        Session::save();
                    }

                }else{
                    Session::put('fee',20000);
                    Session::save();
                }
            }

        }
    }
    public function select_delivery_home(Request $request){
        $data = $request->all();
        if($data['action']){
            $output ='';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderBy('maqh','ASC')->get();
                $output.='<option>-- Chọn Quận/Huyện --</option>';
                foreach($select_province as $key => $province){
                $output.='<option value="'. $province->maqh.'">'.$province->name_quanhuyen.'</option>';
        }
            }else{
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderBy('xaid','ASC')->get();
                $output.='<option>-- Chọn Xã/Phường --</option>';
                foreach($select_wards as $key => $ward){
                $output.='<option value="'. $ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
            }
        }
        echo $output;
    }
    public function login_checkout(){
        return view('pages.checkout.login_checkout');
    }
    public function signup_checkout(){
        return view('pages.checkout.signup_checkout');
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);
        $data['customer_phone'] = $request->customer_phone;

        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);

        return Redirect::to('/checkout');

    }
    public function checkout() {
        $city = City::orderBy('matp','ASC')->get();
        return view('pages.checkout.checkout')->with('city',$city);
    }
    public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }
    public function payment(){

    }
    public function logout_checkout(){
        Session::flush();
        Session::forget('customer_id');
        Session::forget('coupon');
        return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $request){
        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('tbl_customers')->where('customer_email',$email)->where('customer_password',$password)->first();
        if(Session::get('coupon')==true){
            Session::forget('coupon');
        }
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/trang-chu');
        }else{
            Toastr::error('Sai mật khẩu hoặc tài khoản. Vui lòng kiểm tra thông tin đăng nhập','Lưu ý');
            return Redirect::to('/login-checkout');

        }
        Session::save();
    }

}
