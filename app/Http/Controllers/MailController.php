<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\Customer;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MailController extends Controller
{
    public function send_mail(){
        $to_name = "Nguyen Huu Thuat";
        $to_email = "thuatnguyen09112002@gmail.com"; //send to this email

        $data = array("name" => "Mail từ khách hàng", "body" => "Mail gửi về vấn đề hàng hóa"); //body of mail.blade.php

        Mail::send('pages.send_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email)->subject('test mail nhé'); //send this mail with subject
            $message->from($to_email, $to_name); //send from this mail
        });
    }
    public function send_coupon_vip($coupon_time, $coupon_condition, $coupon_number, $coupon_code){
        $customer_vip = Customer::where('customer_vip',1)->get();
        $coupon = Coupon::where('coupon_code',$coupon_code)->first();
        $start_coupon = $coupon -> coupon_date_start;
        $end_coupon = $coupon -> coupon_date_end;
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $title_mail = "Mã khuyến mãi ngày".' '.$now;
        $data = [];
        foreach ($customer_vip as $vip){
            $data['email'][] = $vip->customer_email;
        }
        $coupon = array(
            'start_coupon' =>$start_coupon,
            'end_coupon' =>$end_coupon,
            'coupon_time' =>$coupon_time,
            'coupon_condition' =>$coupon_condition,
            'coupon_number' =>$coupon_number,
            'coupon_code' =>$coupon_code

        );
        Mail::send('pages.send_coupon_vip',['coupon'=>$coupon],function($message) use ($title_mail, $data){
            $message->to($data['email'])->subject($title_mail); //send this mail with subject
            $message->from($data['email'],$title_mail); //send from this email
        });
        return redirect()->back()->with('message','Gửi mã khuyến mãi khách hàng VIP thành công');
    }


    public function send_coupon($coupon_time, $coupon_condition, $coupon_number, $coupon_code){
        $customer = Customer::where('customer_vip','!=',1)->get();
        $coupon = Coupon::where('coupon_code',$coupon_code)->first();
        $start_coupon = $coupon -> coupon_date_start;
        $end_coupon = $coupon -> coupon_date_end;
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $title_mail = "Mã khuyến mãi ngày".' '.$now;
        $data = [];
        foreach ($customer as $normal){
            $data['email'][] = $normal->customer_email;
        }
        $coupon = array(
            'start_coupon' =>$start_coupon,
            'end_coupon' =>$end_coupon,
            'coupon_time' =>$coupon_time,
            'coupon_condition' =>$coupon_condition,
            'coupon_number' =>$coupon_number,
            'coupon_code' =>$coupon_code

        );
        Mail::send('pages.send_coupon',['coupon'=>$coupon],function($message) use ($title_mail, $data){
            $message->to($data['email'])->subject($title_mail); //send this mail with subject
            $message->from($data['email'],$title_mail); //send from this email
        });
        return redirect()->back()->with('message','Gửi mã khuyến mãi khách hàng thành công');
    }
    public function mail_example(){
        return view('pages.send_mail');
    }
    public function quen_mat_khau(){
        return view('pages.checkout.quen_mat_khau');
    }
    // DÙNG TOKEN ĐỂ TRÁNH LINK TRONG GMAIL HẾT HẠN
    public function recover_pass(Request $request){
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $title_mail = "Lấy lại mật khẩu SHOP SONGZIO".' '.$now;
        $customer = Customer::where('customer_email','=',$data['email_account'])->get();
        foreach($customer as $key => $value) {
            $customer_id = $value->customer_id;
        }

        if($customer){
            $count_customer = $customer->count();
            if($count_customer==0){
                return redirect()->back()->with('error','Email chưa được đăng kí trước đây để khôi phục tài khoản');
            }else{
                $token_random = Str::random();//Dùng random string để tạo cái token trong laravel
                $customer = Customer::find($customer_id);
                $customer->customer_token = $token_random;
                $customer->save();

                //send mail
                $to_email = $data['email_account'];
                $link_reset_pass = url('update-new-pass?email='.$to_email.'&token='.$token_random); //với parameter email

                $data = array("name"=>$title_mail,"body"=>$link_reset_pass,'email'=>$data['email_account']);
                Mail::send('pages.checkout.forget_pass_notify',['data'=>$data], function($message) use ($title_mail, $data){
                    $message->to($data['email'])->subject($title_mail); //send this mail with subject
                    $message->from($data['email'],$title_mail); //send from this email
                });
                return redirect()->back()->with('message','Gửi mail thành công, vui lòng vào gmail để reset password');
            }
        }


        Mail::send('pages.send_coupon_vip',function($message) use ($title_mail, $data){
            $message->to($data['email'])->subject($title_mail); //send this mail with subject
            $message->from($data['email'],$title_mail); //send from this email
        });
    }
    public function update_new_pass(){
        return view('pages.checkout.new_pass');
    }
    public function reset_new_pass(Request $request){
        $data = $request->all();
        $token_random = Str::random();
        $customer = Customer::where('customer_email','=',$data['email'])->where('customer_token','=',$data['token'])->get();
        $count = $customer->count();
        if($count>0){
            foreach($customer as $key => $cus){
                $customer_id = $cus->customer_id;
            }
        $reset = Customer::find($customer_id);
        $reset->customer_password = md5($data['password_account']);
        $reset -> customer_token = $token_random;
        $reset->save();
            return redirect('login-checkout')->with('message','Mật khẩu đã được cập nhập. Quay lại trang đăng nhập');
        }else{
            return redirect('quen-mat-khau')->with('error','Vui lòng nhập lại email vì link quá hạn');
        }
    }
    public function mail_order(){
        return view('pages.mail.mail_order');
    }
}
