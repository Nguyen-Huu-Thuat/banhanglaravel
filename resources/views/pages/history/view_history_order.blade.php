@extends('cutlayout')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:url('https://www.fashioncrab.com/wp-content/uploads/2016/01/Banner4.jpg');margin-top: -39px;">
    <h2 class="ltext-105 cl0 txt-center" style="font-family: auto;color: cyan;">
        Xem chi tiết lịch sử đơn hàng đã đặt
    </h2>
</section>
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 100%;">
                <form>
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Thông tin đăng nhập
                    </h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="table-primary">Tên khách hàng</th>
                                <th scope="col" class="table-primary">Số điện thoại</th>
                                <th scope="col" class="table-primary">Emails</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$customer->customer_name}}</td>
                                <td>{{$customer->customer_phone}}</td>
                                <td>{{$customer->customer_email}}</td>
                            </tr>

                        </tbody>
                    </table>
                    <!--  -->
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Thông tin vận chuyển hàng
                    </h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="table-primary">Tên người đặt hàng</th>
                                <th scope="col" class="table-primary">Địa chỉ</th>
                                <th scope="col" class="table-primary">Số điện thoại</th>
                                <th scope="col" class="table-primary">Hình thức thanh toán</th>
                                <th scope="col" class="table-primary">Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$shipping->shipping_name}}</td>
                                <td>{{$shipping->shipping_address}}</td>
                                <td>{{$shipping->shipping_phone}}</td>
                                <td>
                                    @if($shipping->shipping_method==0)
                                    Chuyển khoản ATM/Ví điện tử
                                    @elseif($shipping->shipping_method==2)
                                    Thanh toán bằng Paypal
                                    @else
                                    Nhận hàng trả tiền mặt
                                    @endif
                                </td>
                                <td>{{$shipping->shipping_note}}</td>
                            </tr>

                        </tbody>
                    </table>
                    <!--  -->
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Chi tiết đơn hàng
                    </h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="table-primary">STT</th>
                                <th scope="col" class="table-primary">Tên sản phẩm</th>
                                <th scope="col" class="table-primary">Số lượng</th>
                                <th scope="col" class="table-primary">Giá sản phẩm</th>
                                <th scope="col" class="table-primary">Phí vận chuyển</th>
                                <th scope="col" class="table-primary">Mã giảm giá</th>
                                <th scope="col" class="table-primary">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=0;
                            $total = 0;
                            @endphp
                            @foreach($order_details as $key => $details)
                            @php
                            $i++;
                            $subtotal = $details->product_price*$details->product_sales_quantity;
                            $total+=$subtotal;
                            @endphp
                            <tr>
                                <td scope="row">{{$i}}</td>
                                <td>{{$details->product_name}}</td>
                                <td>{{$details->product_sales_quantity}}</td>
                                <td>{{ number_format($details->product_price,0,',','.')}}đ</td>
                                <td>{{ number_format($details->product_feeship,0,',','.')}}đ</td>
                                <td>
                                    @if($details->product_coupon!='0')
                                    {{$details->product_coupon}}
                                    @else
                                    Không có
                                    @endif
                                </td>
                                <td>{{ number_format($subtotal,0,',','.')}}đ</td>
                            </tr>
                            @endforeach
                            <tr  style="margin-top: 10px;">
                                <td class="table-success">
                                    @php
                                    $total_coupon = 0;
                                    @endphp
                                    @if($coupon_condition==1)
                                    @php
                                    $total_after_coupon = ($total*$coupon_number)/100;
                                    echo 'Tổng giảm:'.number_format($total_after_coupon,0,',','.').'</br>';
                                    $total_coupon = $total-$total_after_coupon+$details->product_feeship;
                                    @endphp
                                    @else
                                    @php
                                    echo 'Tổng giảm:'.number_format($coupon_number,0,',','.').'đ'.'</br>';
                                    $total_coupon = $total - $coupon_number+$details->product_feeship;
                                    @endphp
                                    @endif

                                    Phí ship: {{ number_format($details->product_feeship,0,',','.')}}đ<br>
                                    Thanh toán: {{ number_format($total_coupon,0,',','.')}}đ
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
