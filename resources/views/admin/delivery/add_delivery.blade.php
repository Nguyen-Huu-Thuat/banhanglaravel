@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm vận chuyển
                        </header>
                        <div class="panel-body">
                        <?php
                            use Illuminate\Support\Facades\Session;
                            $message = Session::get('message');
                            if('$message')
                            {
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                            <div class="position-center">
                                <form>
                                    @csrf

                                <div class="form-group">
                                <label for="exampleInputFile">Chọn Tỉnh/Thành phố</label>
                                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                        <option value="">-- Chọn Tỉnh/Thành phố --</option>
                                    @foreach($city as $key =>$ci)
                                        <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputFile">Chọn Quận/Huyện</label>
                                    <select name="province" id="province" class="form-control input-sm m-bot15 choose province">
                                    <option value="">-- Chọn Quận/Huyện --</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputFile">Chọn Xã/Phường</label>
                                    <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                    <option value="">-- Chọn Xã/Phường --</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phí vận chuyển</label>
                                    <input type="text" data-validation="length" data-validation-length="min1"
                                    data-validation-error-msg="Vui lòng nhập phí vận chuyển" name="fee_ship" class="form-control fee_ship"
                                    id="exampleInputEmail1">
                                </div>

                                <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm phí vận chuyển</button>
                            </form>
                            </div>

                            <div id="load_delivery">
                                
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection
