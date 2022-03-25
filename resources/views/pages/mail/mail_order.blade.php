<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container" style="background:#222;border-radius: 12px;padding:15px;">
    <div class="col-md-12">
        <p>Đây là email tự động. Quý khách vui lòng không trả lời email này.</p>
        <div class="row" style="background: cadetblue;padding:15px;">
            <div class="col-md-6" style="text-align: center;color:#fff;font-weight: bold;font-size:30px;">
                <h4 style="margin: 0;">SHOP THỜI TRANG SONGZIO</h4>
                <h6>DỊCH VỤ BÁN HÀNG CHUYÊN NGHIỆP - NHANH CHÓNG - CHẤT LƯỢNG</h6>
            </div>

            <div class="col-md-6 logo" style="color: #fff;">
                <p>Chào bạn <strong style="color: #000;text-decoration: underline;">{{$shipping_array['customer_name']}}</strong></p>
        </div>

        <div class="col-md-12">
            <p style="color: #fff;font-size: 17px;">Thông tin đơn hàng của bạn:</p>
            <h4 style="color: #000;text-transform: uppercase;">Thông tin đặt hàng</h4>
            <p>Mã đơn hàng: <strong style="text-transform: uppercase;color: #fff;">{{$code['order_code']}}</strong></p>
            <p>Mã khuyến mãi đã sử dụng: <strong style="text-transform: uppercase;color: #fff;">{{$code['coupon_code']}}</strong></p>
            <p>Phí vận chuyển: <strong style="text-transform: uppercase;color: #fff;">{{$shipping_array['fee']}}</strong></p>
            <p>Dịch vụ <strong style="text-transform: uppercase;color: #fff;">Đặt hàng trực tuyến</strong></p>

            <h4 style="color: #000;text-transform: uppercase;">Thông tin người nhận</h4>
            <p>Email:
                @if($shipping_array['shipping_email'] == '')
                không có địa chỉ email
                @else
                <span style="color: #fff;">{{$shipping_array['shipping_email']}}</span>
                @endif
            </p>
            <p>Họ tên người gửi:
                @if($shipping_array['shipping_name'] == '')
                    <span style="color: #fff;">Không có</span>
                @else
                <span style="color: #fff;">{{$shipping_array['shipping_name']}}</span>
                @endif
            </p>
            <p>Địa chỉ nhận hàng:
                @if($shipping_array['shipping_address'] == '')
                <span style="color: #fff;">Không có</span>
                @else
                <span style="color: #fff;">{{$shipping_array['shipping_address']}}</span>
                @endif
            </p>
            <p>Số điện thoại:
                @if($shipping_array['shipping_phone'] == '')
                <span style="color: #fff;">Không có</span>
                @else
                <span style="color: #fff;">{{$shipping_array['shipping_phone']}}</span>
                @endif
            </p>
            <p>Ghi chú đơn hàng:
                @if($shipping_array['shipping_note'] == '')
                <span style="color: #fff;">Không có</span>
                @else
                <span style="color: #fff;">{{$shipping_array['shipping_note']}}</span>
                @endif
            </p>
            <p>Hình thức thanh toán: <strong style="color: #fff;text-transform: uppercase;">
                @if($shipping_array['shipping_method'] == 0)
                    Chuyển khoản ATM
                @else
                    Tiền mặt
                @endif
                </strong>
            </p>

            <p style="color: #fff;">Nếu có sai sót bất kì thông tin gì vui lòng liên hệ shop SONGZIO để được tư vấn giải quyết.</p>
            <h4 style="color: #000;text-transform: uppercase;">Sản phẩm đã đặt</h4>
            <table class="table table-striped" style="border: 2px solid;margin: auto;">
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Số lượng đặt</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sub_total = 0;
                        $total = 0;
                    @endphp
                    @foreach($cart_array as $cart)
                        @php
                            $sub_total = $cart['product_qty']*$cart['product_price'];
                            $total = $sub_total;
                        @endphp
                       <tr>
                           <td>{{$cart['product_name']}}</td>
                           <td>{{number_format($cart['product_price'],0,',','.')}}VNĐ</td>
                           <td>{{$cart['product_qty']}}</td>
                           <td>{{number_format($sub_total,0,',','.')}}VNĐ</td>
                       </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" align="right">Tổng tiền thanh toán: {{number_format($total,0,',','.')}}VNĐ</td>
                    </tr>
                </tbody>
        </table>

        </div>
        <p style="color: #fff;text-align: center;font-size: 15px;">Xem lại lịch sử đơn hàng đã đặt tại: <a target="_blank" href="{{url('/history')}}">Lịch sử đơn hàng của bạn</a> </p>
        <p style="color: #fff;">Mọi chi tiết xin liên hệ qua website tại: <a target="_blank" href="http://shopthoitrang.com/banhanglaravel/trang-chu">Shop SONGZIO</a>
    , hoặc liên hệ qua số hotline: 0358559461. Xin cảm ơn quý khách đã đặt hàng tại shop SONGZIO.</p>
    </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
