@extends('layout')
@section('content')
<section class="section-slide">
    <div class="wrap-slick1 rs2-slick1">
        <div class="slick1">
            @foreach($slider as $key => $slide)
            <div class="item-slick1 bg-overlay1" style="background-image: url('public/uploads/slider/{{$slide->slider_image}}');" data-thumb="{{'public//uploads/slider/'.$slide->slider_image}}" data-caption="{{$slide ->slider_name}}">
                <div class="container h-full">
                    <div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
                            <span class="ltext-202 txt-center cl0 respon2">
                                {{$slide ->slider_name}}
                            </span>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
                                {{$slide ->slider_desc}}
                            </h2>
                        </div>

                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                            <a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                                @lang('lang.shopnow')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="wrap-slick1-dots p-lr-10"></div>
    </div>

</section>
<div class="sec-banner bg0 p-t-95 p-b-55">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{'public/frontend/images/banner-04.jpg'}}" alt="IMG-BANNER">

                    <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                @lang('lang.women')
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                @lang('lang.nt')
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                @lang('lang.shopnow')
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{'public/frontend/images/banner-05.jpg'}}" alt="IMG-BANNER">

                    <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                @lang('lang.men')
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                @lang('lang.nt')
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                @lang('lang.shopnow')
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{'public/frontend/images/banner-07.jpg'}}" alt="IMG-BANNER">

                    <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                @lang('lang.watches')
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                @lang('lang.spring2021')
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                @lang('lang.shopnow')
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{'public/frontend/images/banner-08.jpg'}}" alt="IMG-BANNER">

                    <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                @lang('lang.bags')
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                @lang('lang.spring2021')
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                @lang('lang.shopnow')
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
                <!-- Block1 -->
                <div class="block1 wrap-pic-w">
                    <img src="{{'public/frontend/images/banner-09.jpg'}}" alt="IMG-BANNER">

                    <a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                        <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                @lang('lang.accessories')
                            </span>

                            <span class="block1-info stext-102 trans-04">
                                @lang('lang.spring2021')
                            </span>
                        </div>

                        <div class="block1-txt-child2 p-b-4 trans-05">
                            <div class="block1-link stext-101 cl0 trans-09">
                                @lang('lang.shopnow')
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="bg0 p-t-23 p-b-130">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                @lang('lang.productoverview')
            </h3>
        </div>

        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    @lang('lang.allproducts')
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".women">
                    @lang('lang.women')
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".men">
                    @lang('lang.men')
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".bag">
                    @lang('lang.bags')
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".shoes">
                    @lang('lang.shoes')
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".watches">
                    @lang('lang.watches')
                </button>
            </div>

            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    @lang('lang.filter')
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    @lang('lang.search')
                </div>
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <form action="{{URL::to('/tim-kiem')}}" method="post">
                    @csrf
                    <div class="bor8 dis-flex p-l-15">
                        <button type="submit" class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>

                        <input class="mtext-107 cl2 size-114 plh2 p-r-15" id="keywords" type="text" name="keywords_submit" placeholder="Search">

                    </div>
                    <div id="search_ajax"></div>
                </form>
            </div>

            <!-- Filter -->

            <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sort By
                        </div>
                        @foreach($brand as $key =>$sort)
                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    {{ $sort-> brand_name }}
                                </a>
                            </li>
                        </ul>
                        @endforeach
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    All
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $0.00 - $50.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $50.00 - $100.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $100.00 - $150.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $150.00 - $200.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $200.00+
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col3 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            <label for="">Sắp xếp theo</label>
                            <form action="">
                                @csrf
                                <select name="sort" id="sort" class="bg6">
                                    <option value="{{Request::url()}}?sort_by=none">-- Lọc --</option>
                                    <option value="{{Request::url()}}?sort_by=tang_dan">-- Giá tăng dần --</option>
                                    <option value="{{Request::url()}}?sort_by=giam_dan">-- Giá giảm dần --</option>
                                    <option value="{{Request::url()}}?sort_by=kytu_az">Lọc theo tên A đến Z</option>
                                    <option value="{{Request::url()}}?sort_by=kytu_za">Lọc theo tên Z đến A</option>
                                </select>
                            </form>
                        </div>

                        <!-- <ul>
                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Black
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                        Blue
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Grey
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Green
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                        <i class="zmdi zmdi-circle"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        Red
                                    </a>
                                </li>

                                <li class="p-b-6">
                                    <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                        <i class="zmdi zmdi-circle-o"></i>
                                    </span>

                                    <a href="#" class="filter-link stext-106 trans-04">
                                        White
                                    </a>
                                </li>
                            </ul> -->
                    </div>

                    <div class="filter-col4 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Tags
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Fashion
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Lifestyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Denim
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Streetstyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Crafts
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row isotope-grid">
            @foreach($all_product as $key => $product)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
                <!-- Block2 -->
                <div class="block2">
                    <form action="">
                        @csrf
                        <input type="hidden" id="wishlist_productid" value="{{ $product->product_id }}" class="cart_product_id_{{$product->product_id}}">
                        <input type="hidden" id="wishlist_productname{{ $product->product_id }}" value="{{ $product->product_name }}" class="cart_product_name_{{$product->product_id}}">
                        <input type="hidden" value="{{ $product->product_image }}" class="cart_product_image_{{$product->product_id}}">
                        <input type="hidden" id="wishlist_productprice{{ $product->product_id }}" value="{{ $product->product_price }}" class="cart_product_price_{{$product->product_id}}">
                        <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                        <div class="block2-pic hov-img0 label-new" data-label="New">
                            <img id="wishlist_productimage{{ $product->product_id }}" src="{{URL::to('public/uploads/product/'.$product -> product_image)}}" alt="IMG-PRODUCT">

                            <input type="button" value="Xem nhanh" data-id_product="{{$product->product_id}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 xemnhanh">


                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">

                                <a id="wishlist_producturl{{ $product->product_id }}" style="margin: auto;font-weight: bold;" href="{{URL::to('chi-tiet-san-pham/'.$product -> product_id)}}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {!! $product -> product_name !!}
                                </a>
                                <div style="width: 100%;" class="">
                                    <button style="width: 50%;margin-bottom: 5px;background: seashell;" type="button" class="add-to-cart custom-btn btn-9 home_cart" data-id_product="{{$product -> product_id}}" name="add-to-cart"><i class="zmdi zmdi-shopping-cart-plus"></i> Thêm</button>
                                    <button style="width: 50%;margin-bottom: 5px;background: seashell;float: left;" type="button" class="custom-btn btn-9" id="{{$product -> product_id}}" onclick="add_compare(this.id)"><i class="zmdi zmdi-flare"></i>So sánh</button>
                                    <button style="width: 50%;margin-bottom: 5px;background: seashell;float: left;display: none;" type="button" class="custom-btn btn-9 rm_home_cart" id="{{$product -> product_id}}" onclick="Deletecart(this.id)"><i class="zmdi zmdi-flare"></i>Bỏ thêm</button>

                                    <!--  -->
                                    <div class="container">


                                        <!-- Modal so sánh -->
                                        <div class="modal fade" id="compare" role="dialog" style="margin-top: 50px;">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content" style="width: 975px;margin-left: -250px;">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title" style="margin-right: 250px;"><span id="title-compare"></span></h4>
                                                    </div>
                                                    <div class="modal-body">

                                                        <table class="table table-striped" id="row_compare">
                                                            <thead>
                                                                <tr>
                                                                    <th>Tên sản phẩm</th>
                                                                    <th>Hình ảnh</th>
                                                                    <th>Giá sản phẩm</th>
                                                                    <th>Thông số kĩ thuật</th>
                                                                    <th>Xem sản phẩm</th>
                                                                    <th>Xóa</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <!-- modal giỏ hàng -->
                                        <div class="modal fade" id="quick-cart" role="dialog" style="margin-top: 50px;">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content" style="width: 975px;margin-left: -250px;">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title" style="margin: auto;">Giỏ hàng của bạn</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div id="show_alert"></div>
                                                        <div id="show_quickcart"></div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- kết thúc modal giỏ hàng -->

                                    </div>

                                    <!--  -->

                                    <div class="container-fluid"></div>
                                </div>
                                <span class="stext-105 cl3" style="margin:auto">
                                    {{ number_format($product->product_price).' '.'VNĐ' }}
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">

                                <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                    <img class="icon-heart1 dis-block trans-04" src="{{'public/frontend/images/icons/icon-heart-01.png'}}" alt="ICON">
                                    <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{'public/frontend/images/icons/icon-heart-02.png'}}" alt="ICON">
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach


        </div>

        <!-- Pagination -->
        <div class="flex-c-m flex-w w-full p-t-38">

            {!! $all_product-> render() !!}
            <!-- <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
                    1
                </a>

                <a href="#" class="flex-c-m how-pagination1 trans-04 m-all-7">
                    2
                </a> -->
        </div>
        <div class="flex-c-m flex-w w-full p-t-38">
            <!-- <h3 class="block1-name ltext-102 trans-04 p-b-8" style="margin-bottom: 30px;"><i class="zmdi zmdi-accounts-list-alt"></i> Đối tác của chúng tôi <i class="zmdi zmdi-accounts-list-alt"></i></h3> -->
            <h3 class="title-comm"><span class="title-holder">@lang('lang.partner')</span></h3>
            <div class="owl-carousel owl-theme">
                <div class="item"><img height="150.28px" style="border-radius: 10px;" src="{{asset('public/uploads/doitac/lazada-mall.jpg')}}" alt=""></div>
                <div class="item"><img height="150.28px" style="border-radius: 10px;" src="{{asset('public/uploads/doitac/q5bS5n.jpg')}}" alt=""></div>
                <div class="item"><img height="150.28px" style="border-radius: 10px;" src="{{asset('public/uploads/doitac/tabbao.jpg')}}" alt=""></div>
                <div class="item"><img height="150.28px" style="border-radius: 10px;" src="{{asset('public/uploads/doitac/unnamed.jpg')}}" alt=""></div>
                <div class="item"><img height="150.28px" style="border-radius: 10px;" src="{{asset('public/uploads/doitac/amazon.png')}}" alt=""></div>
                <div class="item"><img height="150.28px" style="border-radius: 10px;" src="{{asset('public/uploads/doitac/images.jfif')}}" alt=""></div>
                <div class="item"><img height="150.28px" style="border-radius: 10px;" src="{{asset('public/uploads/doitac/Tmall-logo.png')}}" alt=""></div>
                <div class="item"><img height="150.28px" style="border-radius: 10px;" src="{{asset('public/uploads/doitac/lazada-mall.jpg')}}" alt=""></div>
                <div class="item"><img height="150.28px" style="border-radius: 10px;" src="{{asset('public/uploads/doitac/baba.jpg')}}" alt=""></div>
                <div class="item"><img height="150.28px" style="border-radius: 10px;" src="{{asset('public/uploads/doitac/bkav.png')}}" alt=""></div>
            </div>
        </div>
    </div>
</section>
<!-- modal xem nhanh -->
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="{{'public/frontend/images/icons/icon-close.png'}}" alt="CLOSE">
            </button>
            <form>
                @csrf
                <div id="product_quickview_value"></div>
                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    <div class="item-slick3" data-thumb="{{'public/frontend/images/product-detail-01.jpg'}}">
                                        <div class="wrap-pic-w pos-relative">
                                            <span id="product_quickview_image"></span>
                                            <!-- <img src="{{'public/frontend/images/product-detail-01.jpg'}}" alt="IMG-PRODUCT"> -->

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{'public/frontend/images/product-detail-01.jpg'}}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" data-thumb="{{'public/frontend/images/product-detail-02.jpg'}}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{'public/frontend/images/product-detail-02.jpg'}}" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{'public/frontend/images/product-detail-02.jpg'}}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" data-thumb="{{'public/frontend/images/product-detail-03.jpg'}}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{'public/frontend/images/product-detail-03.jpg'}}" alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{'public/frontend/images/product-detail-03.jpg'}}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <p class="stext-102 cl3 p-t-23">
                                Mã ID: <span id="product_quickview_id"></span>
                            </p>
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                Tên sản phẩm: <span id="product_quickview_title"></span>
                            </h4>

                            <span class="mtext-106 cl2" id="product_quickview_price">
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                                Mô tả sản phẩm: <span id="product_quickview_desc"></span>
                            </p>
                            <p class="stext-102 cl3 p-t-23">
                                <span id="product_quickview_content"></span>
                            </p>

                            <!--  -->
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Size
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Size S</option>
                                                <option>Size M</option>
                                                <option>Size L</option>
                                                <option>Size XL</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Color
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Red</option>
                                                <option>Blue</option>
                                                <option>White</option>
                                                <option>Grey</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <button type="button" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail add-to-cart-quickview">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!--  -->
                            <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                <div class="flex-m bor9 p-r-10 m-r-11">
                                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                        <i class="zmdi zmdi-favorite"></i>
                                    </a>
                                </div>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
