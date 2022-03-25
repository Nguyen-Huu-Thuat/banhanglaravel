@extends('cutlayout')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image:url('https://www.fashioncrab.com/wp-content/uploads/2016/01/Banner4.jpg');margin-top: -39px;">
    <h2 class="ltext-105 cl0 txt-center" style="font-family: auto;color: cyan;">
        LỊCH SỬ ĐẶT HÀNG
    </h2>
</section>
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="width: 100%;">
                <form>
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Lịch sử đặt hàng của bạn tại SONGZIO Shop
                    </h4>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="table-primary">STT</th>
                                <th scope="col" class="table-primary">Mã đơn hàng</th>
                                <th scope="col" class="table-primary">Thời gian đặt hàng</th>
                                <th scope="col" class="table-primary">Tình trạng đơn hàng</th>
                                <th scope="col" class="table-primary">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 0;
                            @endphp
                            @foreach($getorder as $key => $ord)
                            @php
                            $i++;
                            @endphp
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>{{ $ord->order_code }}</td>
                                <td>{{ $ord->created_at }}</td>
                                <td>
                                    @if($ord->order_status ==1)
                                    <span class="text text-primary">Đơn hàng mới</span>
                                    @elseif($ord->order_status==2)
                                        <span class="text text-success">Đã xử lí - Tiến hàng giao hàng</span>
                                    @else
                                        <span class="text text-danger">Đơn hàng đã hủy bởi khách đặt</span>
                                    @endif
                                </td>
                                <td>
                                    <p><a href="{{URL::to('/view-history-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                                            Xem đơn hàng
                                        </a></p>
                                @if($ord->order_status != 3)
                                    <p><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#huydon">Huỷ đơn hàng</button></p>
                                @endif
                                    <!-- Modal -->
                                    <div id="huydon" class="modal fade" role="dialog" style="margin-top: 100px;">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header" style="background: antiquewhite;">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title" style="margin-right: 70px;">Vui lòng điền lý do hủy đơn hàng</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p><textarea class="reason" required name="" id="" cols="30" rows="4" placeholder="Lý do hủy đơn hàng ..."></textarea></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                    <button type="button" id="{{ $ord->order_code }}" onclick="Huydonhang(this.id)" class="btn btn-primary">Gửi</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $getorder->links() !!}
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
