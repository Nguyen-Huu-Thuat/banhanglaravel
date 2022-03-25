@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết
    </div>

    <div class="table-responsive">
    <?php
                            use Illuminate\Support\Facades\Session;
                            $message = Session::get('message');
                            if('$message')
                            {
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th>Tên bài viết</th>
            <th>Slug</th>
            <th>Hình ảnh</th>
            <th>Tóm tắt bài viết</th>
            <th>Từ khóa bài viết</th>
            <th>Danh mục bài viết</th>
             <th>Trạng thái</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_post as $key => $post)
          <tr>
            <td>{{ $post->post_title }}</td>
            <td>{{ $post->post_slug }}</td>
            <td><img src="public/uploads/post/{{ $post->post_image }}" height="100" width="100" alt=""></td>
            <td>{!! $post->post_desc !!}</td>
            <td>{{ $post->post_meta_keyword }}</td>
            <td>{{ $post->cate_post->cate_post_name }}</td>
            <td>
                @if($post->post_status == 0)
                            Hiển thị
                @else
                            Ẩn
                @endif
            </td>
            <td>
              <a href="{{URL::to('/edit-post/'.$post->post_id)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
            <a onclick="return confirm('Bạn có muốn xóa bài viết này không ?')" href="{{URL::to('/delete-post/'.$post->post_id)}}" class="active styling-edit" ui-toggle-class="">
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
