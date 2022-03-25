@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thông tin website
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
                                @foreach($contact as $key => $val)
                                <form role="form" action="{{URL::to('/update-info/'.$val -> info_id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field()}}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thông tin liên hệ</label>
                                    <textarea style="resize: none" rows="4" class="form-control" name="info_contact" data-validation="length" data-validation-length="min5" data-validation-error-msg="Vui lòng nhập ít nhất 5 kí tự" id="2" placeholder="Nhập thông tin liên hệ">{{$val -> info_contact}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bản đồ</label>
                                    <textarea style="resize: none" rows="4" class="form-control" name="info_map" data-validation="length" data-validation-length="min5" data-validation-error-msg="Vui lòng nhập ít nhất 5 kí tự" placeholder="Bản đồ">{{$val -> info_map}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Fanpage</label>
                                    <textarea style="resize: none" rows="4" class="form-control" name="info_fanpage" data-validation="length" data-validation-length="min5" data-validation-error-msg="Vui lòng nhập ít nhất 5 kí tự" placeholder="Nhập Fanpage">{{$val -> info_fanpage}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh logo</label>
                                    <input type="file" name="info_image" class="form-control" id="exampleInputEmail1" >
                                    <img src="{{URL::to('public/uploads/contact/'.$val -> info_logo )}}" height="100" width="100" alt="">
                                </div>
                                <button type="submit" name="add_info" class="btn btn-info">Thêm thông tin</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>
    <!-- thông tin đối tác  -->
                <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thông tin đói tác
                        </header>
                        <div class="panel-body">
                        <?php

                            $message = Session::get('message');
                            if('$message')
                            {
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                            <div class="position-center">

                                <form role="form" id="form-nut" enctype="multipart/form-data">
                                {{ csrf_field()}}

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tên đối tác</label>
                                    <input type="text" name="name" id="name_doitac" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Link đối tác</label>
                                    <input type="text" name="link" id="link_doitac" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh đối tác</label>
                                    <input type="file" name="info_image" class="form-control" id="image_doitac" >
                                </div>
                                <button type="submit" name="add_info" class="btn btn-info add-doitac">Thêm đối tác</button>
                            </form>

                            </div>
                            <div class="position-center">
                                <div id="list_doitac"></div>
                            </div>

                        </div>
                    </section>
            </div>
</div>
@endsection
