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

    <title>Đăng kí</title>
  </head>
  <body>


  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('public/login/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Đăng kí đến tài khoản <strong>SONGZIO</strong></h3>
            <p class="mb-4">Vui lòng hoàn tất đăng kí để sử dụng dịch vụ.</p>
            <form action="{{URL::to('/add-customer')}}" method="post">
                @csrf
            <div class="form-group first">
                <label for="username">Họ và tên</label>
                <input type="text" name="customer_name" class="form-control" placeholder="Name" id="username">
              </div>
              <div class="form-group first">
                <label for="username">Email đăng nhập</label>
                <input type="email" name="customer_email" class="form-control" placeholder="your-email@gmail.com" id="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Mật khẩu</label>
                <input type="password" name="customer_password" class="form-control" placeholder="Your Password" id="password">
              </div>
              <div class="form-group first">
                <label for="username">Số điện thoại</label>
                <input type="text" name="customer_phone" class="form-control" placeholder="Name" id="username">
              </div>

              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Ghi nhớ lựa chọn</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
              </div>

              <input type="submit" value="Đăng Kí" class="btn btn-block btn-primary">
              <p class="mb-4" style="text-align: center;padding-top: 10px;">Nếu đã có tài khoản vui lòng kích vào <a href="{{URL::to('/login-checkout')}}">Đăng nhập</a></p>

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
