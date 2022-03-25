@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin đăng nhập
        </div>
        <div class="row w3-res-tb">
        </div>
        <div class="table-responsive">
            <?php

            use Illuminate\Support\Facades\Session;

            $message = Session::get('message');
            if ('$message') {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>

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
        </div>
    </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin vận chuyển hàng
        </div>
        <div class="row w3-res-tb">
        </div>
        <div class="table-responsive">
            <?php

            $message = Session::get('message');
            if ('$message') {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th>Tên người vận chuyển</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Hình thức thanh toán</th>
                        <th>Ghi chú</th>

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
        </div>
    </div>
</div>
<br>
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê chi tiết đơn hàng
        </div>
        <div class="table-responsive">
            <?php

            $message = Session::get('message');
            if ('$message') {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width: 216px;">STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tồn kho</th>
                        <th>Giá sản phẩm</th>
                        <th>Phí vận chuyển</th>
                        <th>Mã giảm giá</th>
                        <th>Tổng tiền</th>
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
                        <td>{{$i}}</td>
                        <td>{{$details->product_name}}</td>
                        <td><input type="number" min="1" value="{{$details->product_sales_quantity}}" name="product_sales_quantity">
                            <input type="hidden" name="order_product_id" class="order_product_id" value="{{$details->product_id}}">
                            <button class="btn btn-default" name="update_quantity">Cập nhật</button>
                        </td>
                        <td>{{$details->product->product_quantity}}</td>
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
                    <tr>
                        <td>
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
                    <tr>
                        <td colspan="" >
                            @foreach($order as $key => $or)
                                @if($or->order_status==1)
                                <form>
                                    @csrf
                                    <select class="form-control order_details">
                                        <option>-- Chọn hình thức xử lí đơn hàng --</option>
                                        <option id="{{$or->order_id}}" value="1">Chưa xử lí</option>
                                        <option id="{{$or->order_id}}" value="1">Chưa xử lí</option>
                                        <option id="{{$or->order_id}}" value="2">Đã xử lí và tiến hàng giao hàng</option>
                                        <option id="{{$or->order_id}}" value="3">Hủy đơn hàng</option>

                                    </select>
                                </form>
                            @elseif($or->order_status==2)
                                <form>
                                    @csrf
                                    <select class="form-control order_details">
                                        <option>--Chọn hình thức xử lí đơn hàng--</option>
                                        <option id="{{$or->order_id}}" value="1">Chưa xử lí</option>
                                        <option id="{{$or->order_id}}" selected value="2">Đã xử lí và tiến hàng giao hàng</option>
                                        <option id="{{$or->order_id}}" value="3">Hủy đơn hàng</option>
                                    </select>
                                </form>
                            @else
                                <form>
                                    @csrf
                                        <select class="form-control order_details">
                                            <option>--Chọn hình thức xử lí đơn hàng--</option>
                                            <option id="{{$or->order_id}}" value="1">Chưa xử lí</option>
                                            <option id="{{$or->order_id}}" value="2">Đã xử lí và tiến hàng giao hàng</option>
                                            <option id="{{$or->order_id}}" selected  value="3">Hủy đơn hàng</option>
                                        </select>
                                    </form>
                            @endif
                            @endforeach
                        </td>
                    </tr>
                </tbody>

            </table>
            <a href="{{url('/print-order')}}">In đơn hàng</a>
        </div>
    </div>
</div>


</div>
</div>
@endsection
