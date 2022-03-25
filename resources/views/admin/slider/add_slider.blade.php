@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm slider
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
                                <form role="form" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên slide</label>
                                    <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng nhập tên slide" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên slider">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file"  name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Hình ảnh">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả slider</label>
                                    <textarea style="resize: none" rows="3" class="form-control" name="slider_desc"  placeholder="Mô tả slider"></textarea>
                                </div>

                                <div class="form-group">
                                <label for="exampleInputFile">Hiển thị</label>
                                    <select name="slider_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị slider</option>
                                    <option value="1">Ẩn slider</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_slider" class="btn btn-info">Thêm slider</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection
