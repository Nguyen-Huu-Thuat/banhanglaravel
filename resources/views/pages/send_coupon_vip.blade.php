<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mã khuyến mãi từ SONGZIO SHOP</title>
    <style>
        body {
            font-family: Arial;
        }
        .coupon{
            border: 5px solid #bbb;
            width: 80%;
            border-radius:15px;
            margin: 0 auto;
            max-width: 600px;
        }
        .container {
            padding:2px 16px;
            background-color: #f1f1f1;

        }
        .promo {
            background: #ccc;
            padding: 3px;
        }
        .expire {
            color: red;
        }
        p.code {
            text-align: center;
            font-size: 20px;
        }
        p.expire {
            text-align: center;
        }
        h2.note {
            text-align: center;
            font-size: large;
            text-decoration: underline;
        }
    </style>
</head>
<body>
        <div class="coupon">
            <div class="container">
                <h3>Mã khuyến mãi từ Shop <a target="_blank" href="https://www.facebook.com/huuthuat.nguyen.940/">SONGZIO</a></h3>
            </div>
            <div class="container" style="background-color:white;">
                <h2 class="note"><b><i>@if($coupon['coupon_condition']==1)
                    Giảm {{$coupon['coupon_number']}}%
                    @else
                    Giảm {{number_format($coupon['coupon_number'],0,',','.')}}k
                    @endif
                    cho tổng đơn hàng đặt mua</i></b></h2>
                <p>Quý khách đã từng mua hàng tại shop <a target="_blank" href="https://www.facebook.com/huuthuat.nguyen.940/">SONGZIO</a> nếu đã có tài khoản xin vui lòng <a target="_blank" href="https://www.facebook.com/huuthuat.nguyen.940/" style="color: red;">đăng nhập</a>
            vào tài khoản để mua hàng và nhập mã code phía dưới để được giảm giá mua hàng, xin cảm ơn quý khách. Chúc quý khách thật nhiều sức khỏe và bình an trong cuộc sống. </p>
        </div>
        <div class="container">
            <p class="code">Sử dụng Code sau: <span class="promo">{{$coupon['coupon_code']}}</span>(Lưu ý: chỉ còn {{$coupon['coupon_time']}} mã.)</p>
            <p class="expire">Ngày bắt đầu: {{$coupon['start_coupon']}} | Ngày hết hạn: {{$coupon['end_coupon']}}</p>
        </div>
        </div>
</body>
</html>
