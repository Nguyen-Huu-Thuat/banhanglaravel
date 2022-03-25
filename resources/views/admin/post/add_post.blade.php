@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm bài viết
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
                                <form role="form" action="{{URL::to('/save-post')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài viết</label>
                                    <input type="text" data-validation="length"
                                    data-validation-length="min3"
                                    data-validation-error-msg="Vui lòng nhập tên bài viết" name="post_title"
                                    class="form-control" id="slug" onkeyup="ChangeToSlug();" placeholder="Tên bài viết">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text"  name="post_slug"
                                    class="form-control" id="convert_slug" placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                    <textarea style="resize: none" rows="4" id="1" class="form-control" name="post_desc"  placeholder="Tóm tắt bài viết"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>
                                    <textarea style="resize: none" rows="4" id="2" class="form-control" name="post_content"  placeholder="Nội dung bài viết"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta keyword</label>
                                    <textarea style="resize: none" rows="3" class="form-control" name="post_meta_keyword"  placeholder="Meta keyword"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta nội dung</label>
                                    <textarea style="resize: none" rows="3" class="form-control" name="post_meta_desc"  placeholder="Meta nội dung"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                    <input type="file" name="post_image" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFile">Danh mục bài viết</label>
                                    <select name="cate_post_id" class="form-control input-sm m-bot15">
                                        @foreach($cate_post as $key => $cate )
                                            <option value="{{$cate->cate_post_id}}">{{$cate->cate_post_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputFile">Hiển thị</label>
                                    <select name="post_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_post" class="btn btn-info">Thêm bài viết</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
</div>
@endsection
