<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('public/login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/login/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('public/login/css/style.css')}}">

    <title>Điền mật khẩu mới</title>
  </head>
  <body>


  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('public/login/images/bg_3.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Xác nhận tài khoản <strong>SONGZIO</strong></h3>
            <p class="mb-4">Vui lòng xác nhận thông tin để lấy lại tài khoản.</p>
            @if(session()->has('message'))
            <div class="alert alert-success">
                {!! session()->get('message') !!}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {!! session()->get('error') !!}
            </div>

            @endif

            @php
                $token = $_GET['token'];
                    $email = $_GET['email'];
            @endphp
            <form action="{{url('/reset-new-pass')}}" method="post">
                @csrf
              <div class="form-group first">
                <label for="username">Điền mật khẩu mới</label>
                <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="token" value="{{$token}}">
                <input type="text" name="password_account" class="form-control" placeholder="Nhập mật khẩu mới ..." id="username">
              </div>

              <input type="submit" value="Gửi" class="btn btn-block btn-primary">
              <p class="mb-4" style="text-align: center;padding-top: 10px;">Nếu chưa có tài khoản vui lòng kích vào <a href="{{URL::to('/signup-checkout')}}">Đăng kí </a>hoặc nếu có tài khoản vui lòng
            <a href="{{url('/login-checkout')}}">Đăng nhập.</a></p>

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>



    <script src="{{asset('public/login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/login/js/popper.min.js')}}"></script>
    <script src="{{asset('public/login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/login/js/main.js')}}"></script>
  </body>
</html>
