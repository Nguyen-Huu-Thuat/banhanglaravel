@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm thư viện ảnh sản phẩm
            </header>
            <?php

            use Illuminate\Support\Facades\Session;

            $message = Session::get('message');
            if ('$message') {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="panel-body">
                <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
                <form>
                    @csrf

                <div id="gallery_load">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tên hình ảnh</th>
                                <th>Hình ảnh</th>
                                <th>Quản lý</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                </form>
            </div>
        </section>

    </div>
</div>

@endsection


@section('javascript_page')
        <!-- gallery hình ảnh -->
        <script type="text/javascript">
        $(document).ready(function(){
            load_gallery();
            function load_gallery(){
                var pro_id = $('.pro_id').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: 'select-gallery',
                    type: 'POST',
                    data: {pro_id:pro_id,_token:_token},
                    success: function(data) {
                        $('#gallery_load').html(data);
                    }
                });
            }
        });
    </script>
@endsection
