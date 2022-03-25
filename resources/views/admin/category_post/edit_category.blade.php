@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục bài viết
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
                    <form role="form" action="{{URL::to('/update-category-post/'.$category_post->cate_post_id)}}" method="post">
                        {{ csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="cate_post_name" class="form-control" id="slug" value="{{$category_post->cate_post_name}}" placeholder="Tên danh mục" onkeyup="ChangeToSlug();">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" name="cate_post_slug" class="form-control" value="{{$category_post->cate_post_slug}}" id="convert_slug" placeholder="Slug">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="4" class="form-control" name="cate_post_desc" placeholder="Mô tả danh mục">{{$category_post->cate_post_desc}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Hiển thị</label>
                            <select name="cate_post_status" class="form-control input-sm m-bot15">
                                @if($category_post->cate_post_status==0)
                                    <option selected value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
                                @else
                                    <option value="0">Hiển thị</option>
                                    <option selected value="1">Ẩn</option>
                                @endif

                            </select>
                        </div>
                        <button type="submit" name="update_post_cate" class="btn btn-info">Cập nhật danh mục bài viết</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
</div>
@endsection
