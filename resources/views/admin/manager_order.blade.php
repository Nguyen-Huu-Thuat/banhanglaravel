@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info" >
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
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
            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Thời gian đặt hàng</th>
            <th>Tình trạng đơn hàng</th>
            <th>Lý do hủy của khách hàng</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach($order as $key => $ord)
            @php
                $i++;
            @endphp
          <tr>
            <td><i>{{$i}}</i></td>
            <td>{{ $ord->order_code }}</td>
            <td>{{ $ord->created_at }}</td>
            <td>@if($ord->order_status==1)
                <span class="text text-primary">Đơn hàng mới</span>
                @elseif($ord->order_status==2)
                    <span class="text text-success">Đã xử lí - Tiến hàng giao hàng</span>
                @else
                    <span class="text text-danger">Đơn hàng đã hủy bởi khách đặt</span>
                @endif
            </td>
            <td>
                @if($ord->order_status==3)
                <span class="text text-primary">{{$ord->order_reason}}</span>
                @else
                --------------------------------
                @endif
            </td>
            <td>
              <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-eye text-success text-active"></i>
                </a>
            <a onclick="return confirm('Are you sure to delete ?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
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
