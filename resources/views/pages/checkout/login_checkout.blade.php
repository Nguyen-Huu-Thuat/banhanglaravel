<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('public/login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/login/css/bootstrap.min.css')}}">
    <link href="{{asset('public/backend/css/loginbutton.css')}}" rel='stylesheet' type='text/css' />

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('public/login/css/style.css')}}">

    <title>Đăng nhập</title>
</head>

<body>


    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('public/login/images/bg_3.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <h3>Đăng nhập với tài khoản <strong><b><a style="text-decoration: none;" href="{{url('/trang-chu')}}">SONGZIO</a></b></strong></h3>
                        <p class="mb-4">Vui lòng đăng nhập để tiếp tục sử dụng.</p>
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            {!! session()->get('message') !!}
                        </div>
                        @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {!! session()->get('error') !!}
                        </div>

                        @endif

                        <form action="{{URL::to('/login-customer')}}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="text" name="email_account" class="form-control" placeholder="your-email@gmail.com" id="username">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password_account" class="form-control" placeholder="Your Password" id="password">
                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Ghi nhớ đăng nhập</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="{{url('/quen-mat-khau')}}" class="forgot-pass">Quên mật khẩu</a></span>
                            </div>

                            <input type="submit" value="Đăng Nhập" class="btn btn-block btn-primary">

                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-6">
                                    <button class="loginBtn loginBtn--facebook">
                                        <a style="color: #FFF;text-decoration: none;" href="{{url('/login-facebook-customer')}}">Login with Facebook</a>
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="loginBtn loginBtn--google">
                                        <a style="color: #FFF;text-decoration: none;" href="{{url('/login-customer-google')}}"> Login with Google</a>
                                    </button>
                                </div>
                            </div>
                            <p class="mb-4" style="text-align: center;padding-top: 10px;">Nếu chưa có tài khoản vui lòng kích vào <a href="{{URL::to('/signup-checkout')}}">Đăng kí</a></p>

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
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
