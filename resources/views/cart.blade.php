<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop Cart</title>

    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700%7COpen+Sans:400,400i,600,700' rel='stylesheet'>

    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('public/frontends/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/frontends/css/magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/frontends/css/font-icons.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/frontends/css/sliders.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/frontends/css/style.css')}}" />

    <!-- Favicons -->
    <!-- <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png"> -->

</head>

<body class="relative">

    <!-- Preloader -->
    <div class="loader-mask">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>

    <main class="main-wrapper">

        <header class="nav-type-1">

            <!-- Fullscreen search -->
            <div class="search-wrap">
                <div class="search-inner">
                    <div class="search-cell">
                        <form method="get">
                            <div class="search-field-holder">
                                <input type="search" class="form-control main-search-input" placeholder="Search for">
                                <i class="ui-close search-close" id="search-close"></i>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end fullscreen search -->

            <nav class="navbar navbar-static-top">
                <div class="navigation" id="sticky-nav">
                    <div class="container relative">

                        <div class="row flex-parent">

                            <div class="navbar-header flex-child">
                                <!-- Logo -->
                                <div class="logo-container">
                                    <div class="logo-wrap">
                                        <a href="{{URL::to('/trang-chu')}}">
                                            <img class="" style="background:black;width: 100px;height: 60px;" src="{{'public/frontend/images/icons/logo_03.jpg'}}" alt="logo">
                                        </a>
                                    </div>
                                </div>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Mobile cart -->
                                <div class="nav-cart mobile-cart hidden-lg hidden-md">
                                    <div class="nav-cart-outer">
                                        <div class="nav-cart-inner">
                                            <a href="#" class="nav-cart-icon">
                                                <span class="nav-cart-badge">2</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end navbar-header -->

                            <div class="nav-wrap flex-child">
                                <div class="collapse navbar-collapse text-center" id="navbar-collapse">

                                    <ul class="nav navbar-nav">

                                        <li class="dropdown">
                                            <a href="{{URL::to('/trang-chu')}}">Home</a>
                                            <i class="fa fa-angle-down dropdown-trigger"></i>
                                        </li>

                                        <li class="dropdown">
                                            <a href="{{URL::to('/san-pham')}}">Shop</a>
                                            <i class="fa fa-angle-down dropdown-trigger"></i>
                                        </li>

                                        <li class="dropdown">
                                            <a href="{{URL::to('/gio-hang')}}">Features</a>
                                            <i class="fa fa-angle-down dropdown-trigger"></i>
                                        </li>

                                        <li class="dropdown">
                                            <a href="#">Blog</a>
                                            <i class="fa fa-angle-down dropdown-trigger"></i>

                                        </li>

                                        <li class="dropdown">
                                            <a href="#">About</a>
                                            <i class="fa fa-angle-down dropdown-trigger"></i>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#">Contact</a>
                                            <i class="fa fa-angle-down dropdown-trigger"></i>
                                        </li>
                                        <!-- end elements -->

                                        <li class="mobile-links hidden-lg hidden-md">
                                            <a href="#">My Account</a>
                                        </li>

                                        <!-- Mobile search -->
                                        <li id="mobile-search" class="hidden-lg hidden-md">
                                            <form method="get" class="mobile-search">
                                                <input type="search" class="form-control" placeholder="Search...">
                                                <button type="submit" class="search-button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </form>
                                        </li>

                                    </ul> <!-- end menu -->
                                </div> <!-- end collapse -->
                            </div> <!-- end col -->

                            <div class="flex-child flex-right nav-right hidden-sm hidden-xs">
                                <ul>
                                    <!-- xử lí đăng nhập, đăng kí -->
                                    <?php
                                    use Illuminate\Support\Facades\Session;
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id != NULL) {
                                    ?>
                                        <li class="nav-register">
                                            <a href="{{ url::to('/logout-checkout')}}">Đăng xuất</a>
                                        </li>

                                    <?php
                                    } else {
                                    ?>
                                        <li class="nav-register">
                                            <a href="{{ url::to('/login-checkout')}}">Đăng nhập</a>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                    <!-- kết thúc xử lí đn đăng kí -->
                                    <?php

                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id != NULL) {
                                    ?>
                                        <li class="nav-register">
                                            <a href="{{ url::to('/checkout')}}">Thanh toán</a>
                                        </li>

                                    <?php
                                    } else {
                                    ?>
                                        <li class="nav-register">
                                            <a href="{{ url::to('/login-checkout')}}">Thanh toán</a>
                                        </li>
                                    <?php
                                    }
                                    ?>

                                    <li class="nav-search-wrap style-2 hidden-sm hidden-xs">
                                        <a href="#" class="nav-search search-trigger">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-cart">
                                        <div class="nav-cart-outer">
                                            <div class="nav-cart-inner">
                                                <a href="#" class="nav-cart-icon">
                                                    0
                                                </a>
                                            </div>
                                    </li> -->
                                </ul>
                            </div>

                        </div> <!-- end row -->
                    </div> <!-- end container -->
                </div> <!-- end navigation -->
            </nav> <!-- end navbar -->
        </header>

        <!-- Page Title -->
        <section class="page-title text-center bg-light" style="background-image:url('https://www.fashioncrab.com/wp-content/uploads/2016/01/Banner4.jpg')">
            <div class="container relative clearfix">
                <div class="title-holder">
                    <div class="title-text">
                        <h1 class="uppercase">Shopping Cart</h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="{{URL::to('/trang-chu')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{URL::to('/san-pham')}}">Shop</a>
                            </li>
                            <li class="active">
                                Cart
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <div class="content-wrapper oh">

            <!-- Cart -->
            <form class="" action="{{url('/update-cart')}}" method="post">
                @csrf
                <section class="section-wrap shopping-cart">
                    <div class="container relative">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="table-wrap mb-30">
                                    @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                    @elseif(session()->has('error'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('error') }}
                                    </div>
                                    @endif
                                    <table class="shop_table cart table" id="t01">
                                        <thead>
                                            <tr>
                                                <th class="product-name" colspan="2">Sản phẩm</th>
                                                <th class="product-price">Giá tiền</th>
                                                <th class="product-quantity">Số lượng</th>
                                                <th class="product-subtotal" colspan="2">Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(Session::get('cart')==true)
                                            @php
                                            $total = 0;
                                            @endphp

                                            @foreach(Session::get('cart') as $key => $cart)

                                            @php
                                            $subtotal = $cart['product_price']*$cart['product_qty'];
                                            $total += $subtotal;
                                            @endphp
                                            <tr class="cart_item">
                                                <td class="product-thumbnail">
                                                    <a href="#">
                                                        <img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" alt="{{ $cart['product_name'] }}">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="#">{{ $cart['product_name'] }}</a>
                                                    <ul>
                                                        <li>Size: XL</li>
                                                        <li>Color: White</li>
                                                    </ul>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">{{ number_format($cart['product_price']).'đ'}}</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity buttons_added">
                                                        <input type="number" step="1" name="cart_qty[{{$cart['session_id']}}]" min="0" value="{{$cart['product_qty']}}" title="Qty" class="input-text qty text">
                                                        <div class="quantity-adjust">
                                                            <a href="#" class="plus">
                                                                <i class="fa fa-angle-up"></i>
                                                            </a>
                                                            <a href="#" class="minus">
                                                                <i class="fa fa-angle-down"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="amount">{{ number_format($subtotal).'đ'}}</span>
                                                </td>
                                                <td class="product-remove">
                                                    <a href="{{ url('/del-product/'.$cart['session_id'])}}" class="remove" title="Remove this item">
                                                        <i class="ui-close"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row mb-50">
                                    <div class="col-md-7">
                                        <div class="actions">
                                            <input type="submit" name="update_qty" value="Cập nhật giỏ hàng" class="btn btn-lg btn-stroke">
                                            <div class="wc-proceed-to-checkout">
                                                <a href="{{url('/del-all-product')}}" class="btn btn-lg btn-dark"><span>Xóa tất cả</span></a>
                                            </div>
                                        </div>
                                    </div>
            </form>
            @if(Session::get('cart'))
            <form action="{{url('/check-coupon')}}" method="post">
                @csrf
                <div class="col-md-5 col-sm-12">
                    <div class="coupon">
                        <input type="text" name="coupon" id="coupon_code" class="input-text form-control" value placeholder="Coupon code">
                        <input style="width:145px;font-size:10px;" type="submit" name="check_coupon" class="btn btn-lg btn-stroke" value="Áp mã giảm giá">
                        @if(Session::get('coupon'))
                        <a href="{{url('/unset-coupon')}}" class="btn-delete-coupon">Xóa mã</a>
                        @endif
                    </div>
                </div>
            </form>
            @endif
        </div>

        </div> <!-- end col -->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-md-6">
                <div class="cart_totals">
                    <h2 class="heading relative bottom-line full-grey uppercase mb-30">Cart Totals</h2>

                    <table class="table shop_table">
                        <tbody>
                            <tr class="cart-subtotal">
                                <th>Tổng tiền</th>
                                <td>
                                    <span class="amount">{{ number_format($total).'đ'}}</span>
                                </td>
                            </tr>
                            @if(Session::get('coupon'))
                            <tr class="shipping">
                                <th>Mã giảm:</th>

                                <td>
                                    <span>

                                        @foreach(Session::get('coupon') as $key => $cou)
                                        @if($cou['coupon_condition']==1)
                                        {{$cou['coupon_number']}}%
                                        <p>
                                            @php
                                            $total_coupon = ($total * $cou['coupon_number'])/100;
                                            echo '
                                        <p><b>Tổng giảm: '.number_format($total_coupon,0,',','.').'đ</b></p>';
                                        @endphp
                                        </p>
                                        <p><b>Tiền sau giảm: {{number_format($total-$total_coupon,0,',','.')}}đ</b></p>
                                        @elseif($cou['coupon_condition']==2)
                                        {{ number_format($cou['coupon_number'],0,',','.')}}đ
                                        <p>
                                            @php
                                            $total_coupon = $total - $cou['coupon_number'];
                                            @endphp
                                        </p>
                                        <p><b>Tiền sau giảm: {{number_format($total_coupon,0,',','.')}}đ</b></p>
                                        @endif
                                        @endforeach




                                    </span>
                                </td>
                            </tr>
                            @endif
                            <tr class="order-total">
                                <th>Tổng thanh toán</th>
                                <td>
                                    <strong><span class="amount">{{ number_format($total).'đ'}}</span></strong>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>

                                    <?php
                                    $customer_id = Session::get('customer_id');
                                    if ($customer_id != NULL) {
                                    ?>
                                        <li class="nav-register" style="list-style: none;border: 1px solid #c0c0c0;padding: inherit;padding-left: 15px;width:113px;">
                                            <a href="{{url::to('/checkout')}}">Thanh toán</a>
                                        </li>

                                    <?php
                                    } else {
                                    ?>
                                        <li class="nav-register" style="list-style: none;border: 1px solid #c0c0c0;padding: inherit;padding-left: 15px;width:113px;">
                                            <a href="{{url::to('/login-checkout')}}">Thanh toán</a>
                                        </li>
                                    <?php
                                    }
                                    ?>

                                </th>
                                <td>
                                    <strong><span class="amount"></span></strong>
                                </td>
                            </tr>

                        </tbody>
                        @else
                        @php
                        echo 'Vui lòng thêm sản phẩm vào giỏ hàng'
                        @endphp
                        @endif
                    </table>

                </div>
            </div> <!-- end col cart totals -->
            <div class="col-md-6 shipping-calculator-form">
                <h2 class="heading relative uppercase bottom-line full-grey mb-30">Calculate Shipping</h2>
                <p class="form-row form-row-wide">
                    <select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" rel="calc_shipping_state">
                        <option>Select a country…</option>
                        <option value="AF">Afghanistan</option>
                    </select>
                </p>

                <div class="row row-10">
                    <div class="col-sm-6">
                        <p class="form-row form-row-wide">
                            <input type="text" class="input-text" value placeholder="State / county" name="calc_shipping_state" id="calc_shipping_state">
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p class="form-row form-row-wide">
                            <input type="text" class="input-text" value placeholder="Postcode" name="calc_shipping_postcode" id="calc_shipping_postcode">
                        </p>
                    </div>
                </div>

                <p>
                    <input type="submit" name="calc_shipping" value="Update Totals" class="btn btn-lg btn-stroke mt-10 mb-mdm-40">
                </p>
            </div> <!-- end col shipping calculator -->



        </div> <!-- end row -->


        </div> <!-- end container -->
        </section> <!-- end cart -->


        <!-- Newsletter -->
        <section class="newsletter" id="subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h4>Get the latest updates</h4>
                        <form class="relative newsletter-form">
                            <input type="email" class="newsletter-input" placeholder="Enter your email">
                            <input type="submit" class="btn btn-lg btn-dark newsletter-submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Type-1 -->
        <footer class="footer footer-type-1">
            <div class="container">
                <div class="footer-widgets">
                    <div class="row">

                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="widget footer-about-us">
                                <img src="img/logo_dark.png" alt="" class="logo">
                                <p class="mb-30">Zenna Shop is a very slick and clean eCommerce template.</p>
                                <div class="footer-socials">
                                    <div class="social-icons nobase">
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end about us -->

                        <div class="col-md-2 col-md-offset-1 col-sm-6 col-xs-12">
                            <div class="widget footer-links">
                                <h5 class="widget-title bottom-line left-align grey">Information</h5>
                                <ul class="list-no-dividers">
                                    <li><a href="#">Our stores</a></li>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Business with us</a></li>
                                    <li><a href="#">Delivery information</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="widget footer-links">
                                <h5 class="widget-title bottom-line left-align grey">Account</h5>
                                <ul class="list-no-dividers">
                                    <li><a href="#">My account</a></li>
                                    <li><a href="#">Wishlist</a></li>
                                    <li><a href="#">Order history</a></li>
                                    <li><a href="#">Specials</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="widget footer-links">
                                <h5 class="widget-title bottom-line left-align grey">Useful Links</h5>
                                <ul class="list-no-dividers">
                                    <li><a href="#">Shipping Policy</a></li>
                                    <li><a href="#">Stores</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="widget footer-links">
                                <h5 class="widget-title bottom-line left-align grey">Service</h5>
                                <ul class="list-no-dividers">
                                    <li><a href="#">Support</a></li>
                                    <li><a href="#">Warranty</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end container -->

            <div class="bottom-footer">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-6 copyright sm-text-center">
                            <span>
                                &copy; 2021, Made by <a href="https://www.facebook.com/huuthuat.nguyen.940/">Hữu Thuật</a>
                            </span>
                        </div>

                        <div class="col-sm-6 col-xs-12 footer-payment-systems text-right sm-text-center mt-sml-10">
                            <i class="fa fa-cc-paypal"></i>
                            <i class="fa fa-cc-visa"></i>
                            <i class="fa fa-cc-mastercard"></i>
                            <i class="fa fa-cc-discover"></i>
                            <i class="fa fa-cc-amex"></i>
                        </div>

                    </div>
                </div>
            </div> <!-- end bottom footer -->
        </footer> <!-- end footer -->

        <div id="back-to-top">
            <a href="#top"><i class="fa fa-angle-up"></i></a>
        </div>

        </div> <!-- end content wrapper -->
    </main> <!-- end main wrapper -->

    <!-- jQuery Scripts -->
    <script type="text/javascript" src="{{ asset('public/frontends/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/frontends/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/frontends/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{ asset('public/frontends/js/scripts.js')}}"></script>

</body>

</html>
