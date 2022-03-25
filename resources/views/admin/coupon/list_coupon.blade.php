@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê mã giảm giá
        </div>
        <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
            <!-- <div class="col-md-6"><p><a style="background-color: cornsilk;" href="{{url('/send-coupon-vip')}}" class="btn btn-default">Gửi mã giảm giá khách hàng VIP</a></p></div>
            <div class="col-md-3"><p><a style="background-color: cornsilk;" href="{{url('/send-coupon')}}" class="btn btn-default">Gửi mã giảm cho khách hàng mới</a></p></div> -->
        </div>
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
            <table class="table table-striped b-t b-light" id="myTable">
                <thead>
                    <tr>
                        <th>Tên mã giảm giá</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Mã giảm giá</th>
                        <th>Số lượng</th>
                        <th>Điều kiện giảm giá</th>
                        <th>Số tiền giảm</th>
                        <th>Tình trạng</th>
                        <th>Hết hạn</th>
                        <th>Gửi mã</th>
                        <th>Quản lí</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coupon as $key => $cou)
                    <tr>
                        <td>{{ $cou->coupon_name }}</td>
                        <td>{{ $cou->coupon_date_start }}</td>
                        <td>{{ $cou->coupon_date_end }}</td>
                        <td>{{ $cou->coupon_code }}</td>
                        <td>{{ $cou->coupon_time }}</td>
                        <td><span class="text-ellipsis">
                                <?php
                                if ($cou->coupon_condition == 1) {
                                ?>
                                    Giảm theo %
                                <?php
                                } else {
                                ?>
                                    Giảm theo tiền
                                <?php
                                }
                                ?>
                            </span></td>
                        <td><span class="text-ellipsis">
                                <?php
                                if ($cou->coupon_condition == 1) {
                                ?>
                                    Giảm {{$cou->coupon_number}}%
                                <?php
                                } else {
                                ?>
                                    Giảm {{$cou->coupon_number}}đ
                                <?php
                                }
                                ?>
                            </span></td>
                            <td><span class="text-ellipsis">
                                <?php
                                if ($cou->coupon_status == 1) {
                                ?>
                                    <span style="color:green;">Đang kích hoạt</span>
                                <?php
                                } else {
                                ?>
                                    <span style="color:red;">Block</span>
                                <?php
                                }
                                ?>
                            </span></td>
                            <td>

                                    @if($cou->coupon_date_end>=$today)
                                        <span style="color:green;">Còn hạn</span>
                                    @else
                                        <span style="color:red;">Đã hết hạn</span>
                                    @endif

                            </td>
                        <td>
                                <p><a style="background-color: cornsilk;margin-bottom: 7px;" href="{{url('/send-coupon-vip',[
                                    
                                    'coupon_time'=>$cou->coupon_time,
                                    'coupon_condition'=>$cou->coupon_condition,
                                    'coupon_number'=>$cou->coupon_number,
                                    'coupon_code'=>$cou->coupon_code
                                    ])}}"
                                    class="btn btn-default">Gửi MGG khách hàng VIP</a></p>

                                <p><a style="background-color: #ffb0f2;" href="{{url('/send-coupon',[
                                    
                                    'coupon_time'=>$cou->coupon_time,
                                    'coupon_condition'=>$cou->coupon_condition,
                                    'coupon_number'=>$cou->coupon_number,
                                    'coupon_code'=>$cou->coupon_code
                                    ])}}"
                                    class="btn btn-default">Gửi MGG khách hàng mới</a></p>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure to delete ?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
