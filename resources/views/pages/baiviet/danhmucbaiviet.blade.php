@extends('cutlayout')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../public/frontend/images/bg-02.jpg');margin-top: -39px;">
    <h2 class="ltext-105 cl0 txt-center">
        Blog
    </h2>
</section>
<section class="bg0 p-t-62 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <!-- item blog -->
                    @foreach($post as $key => $p)
                    <div class="p-b-63">
                        <a href="{{URL::to('/bai-viet/'.$p->post_slug)}}" class="hov-img0 how-pos5-parent" style="height:100%">
                            <img src="{{asset('public/uploads/post/'.$p->post_image)}}" alt="IMG-BLOG">

                            <div class="flex-col-c-m size-123 bg9 how-pos5">
                                <span class="ltext-107 cl2 txt-center">
                                    22
                                </span>

                                <span class="stext-109 cl3 txt-center">
                                    Jan 2018
                                </span>
                            </div>
                        </a>

                        <div class="p-t-32">
                            <h4 class="p-b-15">
                                <a href="{{URL::to('/bai-viet/'.$p->post_slug)}}" class="ltext-108 cl2 hov-cl1 trans-04">
                                    {{$p -> post_title}}
                                </a>
                            </h4>

                            <p class="stext-117 cl6">
                                @php
                                $truncated = Str::limit($p->post_desc,250,' ...');
                                @endphp
                                {!!$truncated!!}
                            </p>

                            <div class="flex-w flex-sb-m p-t-18">
                                <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                    <span>
                                        <span class="cl4">By</span> Admin
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>

                                    <span>
                                        StreetStyle, Fashion, Couple
                                        <span class="cl12 m-l-4 m-r-6">|</span>
                                    </span>

                                    <span>
                                        8 Comments
                                    </span>
                                </span>

                                <a href="{{URL::to('/bai-viet/'.$p->post_slug)}}" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                    Continue Reading

                                    <i class="fa fa-long-arrow-right m-l-9"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Pagination -->
                    <ul class="flex-l-m flex-w w-full p-t-10 m-lr--7">
                        {!! $post->links() !!}
                    </ul>

                </div>
            </div>

            <div class="col-md-4 col-lg-3 p-b-80">
                <div class="side-menu">
                    <div class="bor17 of-hidden pos-relative">
                        <input class="stext-103 cl2 plh4 size-116 p-l-28 p-r-55" type="text" name="search" placeholder="Search">

                        <button class="flex-c-m size-122 ab-t-r fs-18 cl4 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </div>

                    <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-33">
                            Categories
                        </h4>

                        <ul>
                            <li class="bor18">
                                <a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    Fashion
                                </a>
                            </li>

                            <li class="bor18">
                                <a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    Beauty
                                </a>
                            </li>

                            <li class="bor18">
                                <a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    Street Style
                                </a>
                            </li>

                            <li class="bor18">
                                <a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    Life Style
                                </a>
                            </li>

                            <li class="bor18">
                                <a href="#" class="dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 p-lr-4">
                                    DIY & Crafts
                                </a>
                            </li>
                        </ul>
                    </div>


                    <div class="p-t-55">
                        <h4 class="mtext-112 cl2 p-b-20">
                            Archive
                        </h4>

                        <ul>
                            <li class="p-b-7">
                                <a href="#" class="flex-w flex-sb-m stext-115 cl6 hov-cl1 trans-04 p-tb-2">
                                    <span>
                                        July 2018
                                    </span>

                                    <span>
                                        (9)
                                    </span>
                                </a>
                            </li>


                        </ul>
                    </div>

                    <div class="p-t-50">
                        <h4 class="mtext-112 cl2 p-b-27">
                            Tags
                        </h4>

                        <div class="flex-w m-r--5">
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
    </div>
</section>
@endsection
