@extends('cutlayout')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('./public/frontend/images/bg-01.jpg');margin-top: -39px;">
        <h2 class="ltext-105 cl0 txt-center">
            Contact
        </h2>
    </section>
    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form>
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Gửi tin nhắn cho SONGZIO Shop
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email"
                                placeholder="Địa chỉ email của bạn">
                            <img class="how-pos4 pointer-none" src="{{asset('public/frontend/images/icons/icon-email.png')}}" alt="ICON">
                        </div>

                        <div class="bor8 m-b-30">
                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg"
                                placeholder="Bạn muốn chúng tôi hỗ trợ về gì?"></textarea>
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                            GỬI
                        </button>
                    </form>
                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-map-marker"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Địa chỉ
                            </span>

                            <p class="stext-115 cl6 size-213 p-t-18">
                                Shop SONGZIO, 470 Trần Đại Nghĩa, quận Ngũ Hành Sơn
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full p-b-42">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-phone-handset"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Liên hệ tư vấn qua số hotline
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                0358555461
                            </p>
                        </div>
                    </div>

                    <div class="flex-w w-full">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-envelope"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Email hỗ trợ
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                                thuatnguyen09112002@gmail.com
                            </p>
                        </div>
                    </div>
                @foreach($contact as $key => $cont)
                    <div class="flex-w w-full" style="margin-top: 5px;">
                        <span class="fs-18 cl5 txt-center size-211">
                            <span class="lnr lnr-heart"></span>
                        </span>

                        <div class="size-212 p-t-2">
                            <span class="mtext-110 cl2">
                                Fanpage
                            </span>

                            <p class="stext-115 cl1 size-213 p-t-18">
                           {!! $cont->info_fanpage !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="col-md-12 map" style="margin-top: -30px;" >
     {!! $cont->info_map !!}
    </div>
    @endforeach
@endsection
