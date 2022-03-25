@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh mục bài viết
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên danh mục bài viết</th>
            <th>Slug</th>
            <th>Trạng thái</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($category_post as $key => $cate_post)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $cate_post->cate_post_name }}</td>
            <td>{{ $cate_post->cate_post_slug }}</td>
            <td>
                @if($cate_post->cate_post_status ==0)
                            Hiển thị
                @else
                            Ẩn
                @endif
            </td>
            <td>
              <a href="{{URL::to('/edit-category-post/'.$cate_post->cate_post_id)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-pencil-square-o text-success text-active"></i>
                </a>
            <a onclick="return confirm('Bạn có muốn xóa bài viết này không ?')" href="{{URL::to('/delete-category-post/'.$cate_post->cate_post_id)}}" class="active styling-edit" ui-toggle-class="">
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
