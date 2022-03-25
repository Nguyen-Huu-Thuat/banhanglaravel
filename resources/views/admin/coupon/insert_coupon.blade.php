@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm mã giảm giá
            </header>
            <div class="panel-body">
                <?php

                use Illuminate\Support\Facades\Session;

                $message = Session::get('message');
                if ('$message') {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="position-center">
                    <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post">
                        @csrf
                        <div class="form-group">

                            <label for="exampleInputEmail1">Tên mã giảm giá</label>
                            <input type="text" data-validation="length" data-validation-length="min3"
                            data-validation-error-msg="Vui lòng nhập tên mã giảm giá" name="coupon_name"
                            class="form-control" id="exampleInputEmail1" placeholder="Tên mã giảm giá">

                        </div>
                        <div class="form-group">

                            <label for="exampleInputEmail1">Ngày bắt đầu</label>
                            <input type="text" data-validation="length" data-validation-length="min3"
                            data-validation-error-msg="Vui lòng nhập ngày bắt đầu" name="coupon_date_start"
                            class="form-control" id="start_coupon" placeholder="Ngày bắt đầu">

                        </div>
                        <div class="form-group">

                            <label for="exampleInputEmail1">Ngày kết thúc</label>
                            <input type="text" data-validation="length" data-validation-length="min3"
                            data-validation-error-msg="Vui lòng nhập ngày kết thúc" name="coupon_date_end"
                            class="form-control" id="end_coupon" placeholder="Ngày kết thúc">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã giảm giá</label>

                            <input autocomplete="off" type="text" data-validation="length" data-validation-length="min3"
                            data-validation-error-msg="Vui lòng nhập mã giảm giá" name="coupon_code"
                            class="form-control" id="exampleInputEmail1" placeholder="Mã giảm giá">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số lượng mã</label>

                            <input type="text" data-validation="length" data-validation-length="min1"
                            data-validation-error-msg="Vui lòng nhập số lượng mã" name="coupon_time"
                            class="form-control" id="exampleInputEmail1" placeholder="Số lượng mã">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tính năng mã</label>
                            <select name="coupon_condition" class="form-control input-sm m-bot15">
                                <option value="0">-----Chọn-----</option>
                                <option value="1">Giảm theo phần trăm</option>
                                <option value="2">Giảm theo tiền</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhập số % hoặc tiền giảm</label>
                            <input type="text" data-validation="length" data-validation-length="min1"
                            data-validation-error-msg="Vui lòng nhập phần giảm" name="coupon_number"
                            class="form-control" id="exampleInputEmail1">
                        </div>
                        <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã giảm giá</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
