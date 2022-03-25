<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shop thời trang</title>
    <!-- SEO -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="Fashion" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <link rel="canonical" href="http://localhost/banhanglaravel/" />
    <!-- Kết thúc SEO -->



    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=220029563422288&autoLogAppEvents=1" nonce="q1WCfh99"></script>
    <link rel="icon" type="image/png" href="{{asset('public/frontend/images/icons/favicon.png')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/fonts/iconic/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/animate/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/animsition/css/animsition.min.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/select2/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/MagnificPopup/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">

</head>

<body class="animsition">
    <!-- Header -->
    <header class="header-v3">
        <!-- Header desktop laptop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">

                    <!-- Logo desktop -->
                    <a href="{{URL::to('/trang-chu')}}" class="logo">
                        <img style="border-radius: 5px;width: 80px;" src="{{'public/frontend/images/icons/logo_03.jpg'}}" alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="{{URL::to('/trang-chu')}}">@lang('lang.home')</a>
                            </li>

                            <li>
                                <a href="{{URL::to('/san-pham')}}">@lang('lang.shop')</a>
                            </li>

                            <li>
                                <a href="{{URL::to('/gio-hang')}}">@lang('lang.features')</a>
                                <span class="label22" id="show-cart"></span>
                                <ul class="sub-menu" id="giohang-hover"  style="width: 500px;"></ul>

                            </li>


                            <li>
                                <a href="#">@lang('lang.blog')</a>
                                <ul class="sub-menu">
                                    @foreach($category_post as $key => $baiviet)
                                    <li><a href="{{URL::to('/danh-muc-bai-viet/'.$baiviet->cate_post_slug)}}">{{$baiviet -> cate_post_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li>
                                <a href="{{URL::to('/about')}}">@lang('lang.about')</a>
                            </li>

                            <li>
                                <a href="{{URL::to('/lien-he')}}">@lang('lang.contact')</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-r-25 bor6">
                            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-cart">
                                <?php

                                use Illuminate\Support\Facades\Session;

                                $name = Session::get('customer_name');
                                if ('$name') {
                                    echo '<span style="font-size: 16px;margin-right:5px;">' . $name . '</span>';
                                }
                                ?>

                                <?php

                                $customer_id = Session::get('customer_id');
                                if ($customer_id != NULL) {
                                ?>
                                    <a href="{{url::to('/logout-checkout')}}" style="color:#fff"><img style="width:40px;border-radius: 10px;" src="{{Session::get('customer_picture')}}" alt=""></i></a>

                                <?php
                                } else {
                                ?>
                                    <a href="{{url::to('/login-checkout')}}" style="color:#fff"><i class="zmdi zmdi-account-circle"></i></a>
                                <?php
                                }
                                ?>


                            </div>
                        </div>
                        <div class="flex-c-m h-full p-r-25 bor6">
                            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-cart">
                                <?php



                                $customer_id = Session::get('customer_id');
                                if ($customer_id != NULL) {
                                ?>
                                    <a href="{{url::to('/checkout')}}" style="color:#fff"><i class="zmdi zmdi-shopping-cart"></i></a>

                                <?php
                                } else {
                                ?>
                                    <a href="{{url::to('/login-checkout')}}" style="color:#fff"><i class="zmdi zmdi-shopping-cart"></i></a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="flex-c-m h-full p-lr-19">
                            <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                                <i class="zmdi zmdi-menu"></i>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="{{URL::to('/trang-chu')}}"><img src="{{'public/frontend/images/icons/logo_03.jpg'}}" alt="IMG-LOGO"></a>
            </div>

            <!-- reponsive điện thoại -->
            <div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
                <div class="flex-c-m h-full p-r-5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-cart">

                        <?php



                        $customer_id = Session::get('customer_id');
                        if ($customer_id != NULL) {
                        ?>
                            <a href="{{url::to('/logout-checkout')}}" style="color:black"><i class="zmdi zmdi-account-circle"></i></a>

                        <?php
                        } else {
                        ?>
                            <a href="{{url::to('/login-checkout')}}" style="color:black"><i class="zmdi zmdi-account-circle"></i></a>
                        <?php
                        }
                        ?>


                    </div>
                </div>
                <div class="flex-c-m h-full p-r-5">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-cart">

                        <?php



                        $customer_id = Session::get('customer_id');
                        if ($customer_id != NULL) {
                        ?>
                            <a href="{{url::to('/checkout')}}" style="color:black"><i class="zmdi zmdi-shopping-cart"></i></a>

                        <?php
                        } else {
                        ?>
                            <a href="{{url::to('/login-checkout')}}" style="color:black"><i class="zmdi zmdi-shopping-cart"></i></a>
                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="main-menu-m">
                <li>
                    <a href="{{URL::to('/trang-chu')}}">@lang('lang.home')</a>
                    <span class="arrow-main-menu-m">
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </span>
                </li>

                <li>
                    <a href="{{URL::to('/san-pham')}}">@lang('lang.shop')</a>
                </li>

                <li>
                    <a href="{{URL::to('/gio-hang')}}" class="label1 rs1" data-label1="1">@lang('lang.features')</a>
                </li>

                <li>
                    <a href="blog.html">@lang('lang.blog')</a>
                </li>

                <li>
                    <a href="{{URL::to('/about')}}">@lang('lang.about')</a>
                </li>

                <li>
                    <a href="contact.html">@lang('lang.contact')</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <button class="flex-c-m btn-hide-modal-search trans-04">
                <i class="zmdi zmdi-close"></i>
            </button>

            <form class="wrap-search-header flex-w p-l-15" action="{{URL::to('/tim-kiem')}}" method="post">
                @csrf
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="keywords_submit" placeholder="Search...">
            </form>
        </div>
    </header>
    <aside class="wrap-sidebar js-sidebar">
        <div class="s-full js-hide-sidebar"></div>

        <div class="sidebar flex-col-l p-t-22 p-b-25">
            <div class="flex-r w-full p-b-30 p-r-27">
                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>
            <div class="btn-group">
                <button type="button" style="margin-left: 50px;" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">Ngôn ngữ hiển thị
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{url('lang/vi')}}">Tiếng Việt</a></li>
                    <li><a href="{{url('lang/en')}}">Tiếng Anh</a></li>
                    <li><a href="{{url('lang/cn')}}">Tiếng Trung</a></li>
                </ul>
            </div>
            <div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">

                <ul class="sidebar-link w-full">
                    <li class="p-b-13">
                        <a href="index.html" class="stext-102 cl2 hov-cl1 trans-04">
                            Trang chủ
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="{{url('/logout-checkout')}}" class="stext-102 cl2 hov-cl1 trans-04">
                            Đăng xuất
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="{{url('/history')}}" class="stext-102 cl2 hov-cl1 trans-04">
                            Lịch sử mua hàng
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            Track Oder
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            Refunds
                        </a>
                    </li>

                    <li class="p-b-13">
                        <a href="#" class="stext-102 cl2 hov-cl1 trans-04">
                            Help & FAQs
                        </a>
                    </li>
                </ul>

                <div class="sidebar-gallery w-full p-tb-30">
                    <span class="mtext-101 cl5">
                        @ SONGZIO
                    </span>

                    <div class="flex-w flex-sb p-t-36 gallery-lb">
                        <!-- item gallery sidebar -->
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="{{'public/frontend/images/gallery-01.jpg'}}" data-lightbox="gallery" style="background-image: url('public/frontend/images/gallery-01.jpg');"></a>
                        </div>
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="{{'public/frontend/images/gallery-01.jpg'}}" data-lightbox="gallery" style="background-image: url('public/frontend/images/gallery-02.jpg');"></a>
                        </div>
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="{{'public/frontend/images/gallery-01.jpg'}}" data-lightbox="gallery" style="background-image: url('public/frontend/images/gallery-03.jpg');"></a>
                        </div>
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="{{'public/frontend/images/gallery-01.jpg'}}" data-lightbox="gallery" style="background-image: url('public/frontend/images/gallery-04.jpg');"></a>
                        </div>
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="{{'public/frontend/images/gallery-01.jpg'}}" data-lightbox="gallery" style="background-image: url('public/frontend/images/gallery-05.jpg');"></a>
                        </div>
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="{{'public/frontend/images/gallery-01.jpg'}}" data-lightbox="gallery" style="background-image: url('public/frontend/images/gallery-06.jpg');"></a>
                        </div>
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="{{'public/frontend/images/gallery-01.jpg'}}" data-lightbox="gallery" style="background-image: url('public/frontend/images/gallery-07.jpg');"></a>
                        </div>
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="{{'public/frontend/images/gallery-01.jpg'}}" data-lightbox="gallery" style="background-image: url('public/frontend/images/gallery-08.jpg');"></a>
                        </div>
                        <div class="wrap-item-gallery m-b-10">
                            <a class="item-gallery bg-img1" href="{{'public/frontend/images/gallery-01.jpg'}}" data-lightbox="gallery" style="background-image: url('public/frontend/images/gallery-09.jpg');"></a>
                        </div>

                    </div>
                </div>

                <div class="sidebar-gallery w-full">
                    <span class="mtext-101 cl5">
                        About Us
                    </span>

                    <p class="stext-108 cl6 p-t-27">
                        Xu hướng thời trang luôn được chúng tôi cập nhật và càng ngày hoàn thiện nhằm đem đến người dùng những trải nghiệm tốt nhất.
                    </p>
                </div>
            </div>
        </div>
    </aside>

    <div class="wrap-header-cart ">
    </div>
    <!-- slider Banner -->
    @yield('content')
    <!-- ======================================= ABOUT ================================= -->
    <!-- <section>
        <div class="col-md-12">
            <h3>Đối tác </h3>
        </div>
    </section> -->

    <script src="{{ asset('public/frontend/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('public/frontend/vendor/animsition/js/animsition.min.js')}}"></script>
    <script src="{{ asset('public/frontend/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{ asset('public/frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('public/frontend/vendor/select2/select2.min.js')}}"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <script src="{{ asset('public/frontend/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ asset('public/frontend/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('public/frontend/vendor/slick/slick.min.js')}}"></script>
    <script src="{{ asset('public/frontend/js/slick-custom.js')}}"></script>
    <script src="{{ asset('public/frontend/js/owl.carousel.js')}}"></script>
    <script src="{{ asset('public/frontend/vendor/parallax100/parallax100.js')}}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <script src="{{ asset('public/frontend/vendor/MagnificPopup/jquery.magnific-popup.min.js')}}"></script>
    <script>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <script src="{{ asset('public/frontend/vendor/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('public/frontend/vendor/sweetalert/sweetalert.min.js')}}"></script>
    <!-- sắp xếp sản phầm -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sort').on('change', function() {
                var url = $(this).val();
                // alert(url);
                if (url) {
                    window.location = url;
                }
                return false;
            });
        });
    </script>
    <!-- quickview xem nhanh -->
    <script type="text/javascript">
        $('.xemnhanh').click(function() {
            var product_id = $(this).data('id_product');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: 'quickview',
                type: 'POST',
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
                    $('#product_quickview_title').html(data.product_name);
                    $('#product_quickview_id').html(data.product_id);
                    $('#product_quickview_price').html(data.product_price);
                    $('#product_quickview_image').html(data.product_image);
                    $('#product_quickview_desc').html(data.product_desc);
                    $('#product_quickview_content').html(data.product_content);
                    $('#product_quickview_value').html(data.product_quickview_value);
                }
            });
        });
    </script>
    <!-- autocomplete -->
    <script type="text/javascript">
        $('#keywords').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: 'autocomplete-ajax',
                    type: 'POST',
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });
            } else {
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click', '.li_search_ajax', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <!-- add cart trong quickview -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart-quickview').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: 'add-cart-ajax',
                    type: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function(data) {
                        alert('Mua sản phẩm thành công');

                    }
                });
            });
        });
    </script>
    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "107288155117235");
        chatbox.setAttribute("attribution", "biz_inbox");

        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v12.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>
    <script src="{{ asset('public/frontend/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <script src="{{ asset('public/frontend/js/main.js')}}"></script>
    <script src="{{ asset('public/frontend/js/sweetalert.js')}}"></script>
    <!-- thêm sản phẩm = ajax -->
    <script type="text/javascript">
        function show_quickcart(){
            $.ajax({
                    url: 'show-quickcart',
                    type: 'GET',
                    success: function(data) {
                        $('#show_quickcart').html(data);
                        $('#quick-cart').modal();
                        // show_cart();
                        // hover_cart();
                    }
                });
        }
        // hover cart
        hover_cart();
        function hover_cart(){
            $.ajax({
                    url: 'hover-cart',
                    type: 'GET',
                    success: function(data) {
                        $('#giohang-hover').html(data);
                    }
                });

        }
        function deletecartitem($session_id){
            var session_id = $session_id;
            var _token = $('input[name="_token"]').val();
            $.ajax({
                    url: 'del-product'+'/'+session_id,
                    type: 'GET',
                    data:{_token:_token},
                    success: function() {
                        $('#show_alert').html('<p class="text text-success">Xóa sản phẩm thành công !!!</p>');
                        $('#show_alert').fadeOut(1500);
                        show_quickcart();
                        show_cart();
                        hover_cart();
                    }
                });
        }
        function Deletecart(id){
            var id = id;
            $.ajax({
                url: 'remove-item',
                type: 'GET',
                data: {id: id},
                success: function(data){
                    alert('Xoá sản phẩm trong giỏ hàng thành công !!!');
                    // document.getElementsByClassName("home_cart_"+ id)[0].style.display = "inline";
                    // document.getElementsByClassName("rm_home_cart_"+ id)[0].style.display = "none";
                    hover_cart();
                    show_cart();
                    cart_session();
                }
            });
        }
        $(document).ready(function() {
            show_cart();
            //show-cart-quantity
            function show_cart() {
                $.ajax({
                    url: 'show-cart',
                    type: 'GET',
                    success: function(data) {
                        $('#show-cart').html(data);
                    }
                });
            }
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: 'add-cart-ajax',
                    type: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function(data) {
                        show_quickcart();
                        show_cart();
                        hover_cart();
                        // swal({
                        //         title: "Đã thêm sản phẩm vào giỏ hàng",
                        //         text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                        //         showCancelButton: true,
                        //         cancelButtonText: "Xem tiếp",
                        //         confirmButtonClass: "btn-success",
                        //         confirmButtonText: "Đi đến giỏ hàng",
                        //         closeOnConfirm: false
                        //     },
                        //     function() {
                        //         window.location.href = "{{url('/gio-hang')}}";
                        //     });
                        //     document.getElementsByClassName("home_cart")[0].style.display = "none";
                        //     document.getElementsByClassName("rm_home_cart")[0].style.display = "inline";
                    }
                });
            });
        });
    </script>

    <!-- so sánh sản phẩm -->
    <script type="text/javascript">
        function delete_compare(id) {

            if (localStorage.getItem('compare') != null) {
                var data = JSON.parse(localStorage.getItem('compare'));
                var index = data.findIndex(item => item.id === id);
                data.splice(index, 1);
                localStorage.setItem('compare', JSON.stringify(data));
                //remove element by id
                document.getElementById("row_compare" + id).remove();
            }
        }
        viewed_compare();

        function viewed_compare() {
            if (localStorage.getItem('compare') != null) {

                var data = JSON.parse(localStorage.getItem('compare')); //chuyển thành kiểu Json trả về cho biến data

                for (i = 0; i < data.length; i++) {
                    var name = data[i].name;
                    var price = data[i].price;
                    var image = data[i].image;
                    var url = data[i].url;
                    var content = data[i].content;
                    var id = data[i].id;

                    $('#row_compare').find('tbody').append(`

                    <tr id="row_compare` + id + `">
                        <td>` + name + `</td>
                        <td><img width="200px" style="border-radius:10px" src="` + image + `"></td>
                        <td>` + price + `VNĐ</td>
                        <td></td>
                        <td><a href="` + url + `">Xem sản phẩm</a></br></td>
                        <td onclick="delete_compare(` + id + `)"><a style="cursor:pointer;">Xóa so sánh</a></td>
                    </tr>
                    `);
                }
            }
        }

        function add_compare(product_id) {
            document.getElementById('title-compare').innerText = 'Chỉ cho phép so sánh tối đa 3 sản phẩm';
            var id = product_id;
            var name = document.getElementById('wishlist_productname' + id).value;
            // var content = document.getElementById('wishlist_productcontent'+id).value;
            var price = document.getElementById('wishlist_productprice' + id).value;
            var image = document.getElementById('wishlist_productimage' + id).src;
            var url = document.getElementById('wishlist_producturl' + id).href;

            var newItem = {
                'url': url,
                'image': image,
                'price': price,
                'id': id,
                'name': name
                // 'content':content
            }
            if (localStorage.getItem('compare') == null) {
                localStorage.setItem('compare', '[]');
            }

            var old_data = JSON.parse(localStorage.getItem('compare'));
            var matches = $.grep(old_data, function(obj) {
                return obj.id == id;
            })
            if (matches.length) {

            } else {
                if (old_data.length <= 2) {
                    old_data.push(newItem);
                    $('#row_compare').find('tbody').append(`
                    <tr id="row_compare` + id + `">
                        <td>` + newItem.name + `</td>
                        <td><img width="150px" style="border-radius:10px" src="` + image + `"></td>
                        <td>` + newItem.price + `VNĐ</td>
                        <td></td>
                        <td><a href="` + newItem.url + `">Xem sản phẩm</a></br></td>
                        <td onclick="delete_compare(` + id + `)"><a style="cursor:pointer;">Xóa so sánh</a></td>
                    </tr>
                    `);
                }
            }
            localStorage.setItem('compare', JSON.stringify(old_data));
            $('#compare').modal();
        }
    </script>

    <!-- đối tác -->
    <script type="text/javascript">
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items: 4,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true
        });
    </script>
    <!-- <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div> -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Dịch vụ
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Hướng dẫn mua hàng
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Hướng dẫn thanh toán
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Quy định đổi trả
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Điều khoản dịch vụ
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        HỖ TRỢ KHÁCH HÀNG
                    </h4>

                    <ul>
                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Đặt hàng
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Đổi trả
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                Vận chuyển
                            </a>
                        </li>

                        <li class="p-b-10">
                            <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                                FAQs
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        EMAIL PHẢN HỒI KHÁCH HÀNG
                    </h4>

                    <form>
                        <div class="wrap-input1 w-full p-b-4">
                            <input autocomplete="off" class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="abc@gmail.com">
                            <div class="focus-input1 trans-04"></div>
                        </div>

                        <div class="p-t-18">
                            <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                GỬI
                            </button>
                        </div>
                    </form>
                </div>
                @foreach($contact as $key => $cnt)
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        MẠNG XÃ HỘI
                    </h4>


                    {!! $cnt -> info_fanpage !!}


                    <div class="p-t-27">
                        <a href="https://www.facebook.com/huuthuat.nguyen.940" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="https://www.instagram.com/pklolt_098/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                            <i class="fa fa-pinterest-p"></i>
                        </a>

                        <div class="fb-share-button" data-href="http://localhost/banhanglaravel/trang-chu" data-layout="button_count" data-size="small">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fbanhanglaravel%2Ftrang-chu&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a>
                        </div>



                    </div>
                </div>
                @endforeach
            </div>

            <div class="p-t-40">
                <div class="flex-c-m flex-w p-b-18">
                    <a href="#" class="m-all-1">
                        <img src="{{'public/frontend/images/icons/icon-pay-01.png'}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{'public/frontend/images/icons/icon-pay-02.png'}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{'public/frontend/images/icons/icon-pay-03.png'}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{'public/frontend/images/icons/icon-pay-04.png'}}" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-all-1">
                        <img src="{{'public/frontend/images/icons/icon-pay-05.png'}}" alt="ICON-PAY">
                    </a>
                </div>

                <p class="stext-107 cl6 txt-center">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.facebook.com/huuthuat.nguyen.940/" target="_blank">Hữu Thuật</a>

                </p>
            </div>
        </div>
    </footer>
</body>

</html>
