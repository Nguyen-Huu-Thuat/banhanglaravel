<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feeship;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\PostCategory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function update_order_qty(Request $request){
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();
    }

    public function print_order($checkout_code){
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($checkout_code));
        return $pdf->stream();

    }
    public function print_order_convert($checkout_code){
        return $checkout_code;
    }

    public function view_order($order_code){
        $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
        $order = Order::where('order_code', $order_code)->get();
        foreach($order as $key => $ord){

            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;

        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
        foreach($order_details as $key => $order_d) {
            $product_coupon = $order_d->product_coupon;


        }

        if($product_coupon!='0'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }


        return view('admin.view_order')->with(compact('order_details','customer','shipping','order_details','coupon_condition','coupon_number','order'));

    }
    public function manager_order(){
        $order = Order::orderBy('created_at','DESC')->get();
        return view('admin.manager_order')->with(compact('order'));
    }
    public function history(Request $request){
        if(!Session::get('customer_id')){
            return redirect('login-checkout')->with('error','Vui lòng đăng nhập để xem lịch sử đặt hàng của bạn.');
        }else{
            $category_post = PostCategory::orderby('cate_post_id','desc')->get();
            $getorder = Order::where('customer_id',Session::get('customer_id'))->orderBy('order_id','DESC')->paginate(5);
            return view('pages.history.history')->with(compact('category_post','getorder'));
        }
    }
    public function view_history_order(Request $request,$order_code) {
        if(!Session::get('customer_id')){
            return redirect('login-checkout')->with('error','Vui lòng đăng nhập để xem lịch sử đặt hàng của bạn.');
        }else{
        $category_post = PostCategory::orderby('cate_post_id','desc')->get();
        $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
        $order = Order::where('order_code', $order_code)->get();
        foreach($order as $key => $ord){

            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;

        }
        $customer = Customer::where('customer_id',$customer_id)->first();
        $shipping = Shipping::where('shipping_id',$shipping_id)->first();
        $order_details = OrderDetails::with('product')->where('order_code', $order_code)->get();
        foreach($order_details as $key => $order_d) {
            $product_coupon = $order_d->product_coupon;


        }

        if($product_coupon!='0'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }

        return view('pages.history.view_history_order')->with(compact('category_post','order_details','customer','shipping','order_details','coupon_condition','coupon_number','order'));
    }
}
    public function huy_don_hang(Request $request){
        $data = $request->all();
        $order = Order::where('order_code',$data['id'])->first();
        $order->order_reason = $data['reason'];
        $order->order_status = 3;
        $order->save();
    }
    
}
