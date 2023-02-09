<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MEBASHI | Home Appliances</title>
    <meta name="title" content="{!! @$seo_data->meta_title !!}">
    <meta name="description" content="{!! @$seo_data->meta_description !!}"/>
    <meta name="keywords" content="{!! @$seo_data->meta_keyword !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ config('app.name') }} - {!! @$seo_data->meta_title !!}</title>
    {!! @$seo_data->other_meta_tag !!}
    {!! @$siteInformation->header_tag !!}
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/svg/favicon.svg')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome-animation.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/slick/slick.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/slick/slick-theme.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/star-rating-svg.css')}}">
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/xzoom/css/xzoom.css')}}" media="all">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('frontend/owlcarousel/assets/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{ asset('frontend/owlcarousel/assets/owl.theme.default.min.css')}}">
    @stack('styles')
    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
    </script>
</head>
<body>
    {!! @$siteInformation->body_tag !!}


<div id="loading">
    <img id="loading-image" src="{{asset('frontend/images/loading-78.webp')}}" alt="Loading..."/>
</div>
@include('web.layouts.header')


<div class="offcanvas offcanvas-top desk_open_menu search_box" tabindex="-1" id="offcanvasTop"
     aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-body desk_open_wrapper">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <div class="row justify-content-lg-center ">
            <div class="col-lg-6 col-10 ">
                <form class="position-relative">
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <input class="form-control" type="text" name="" id="main-search" placeholder="Search">
                        <button class="mobile-search-btn" id="searchBtn" type="submit"><img
                                src="{{asset('frontend/images/svg/search.svg')}}">
                        </button>


                        <div class="searchResult">
                            <ul id="search-result-append-here"></ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




@include('web.includes.login')


<div class="fixed_social">
    <ul class="share_On">
        @if($address->facebook_url)
        <li>
            <a href="{{$address->facebook_url}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
        </li>
        @endif
        @if($address->instagram_url)
        <li>
            <a href="{{$address->instagram_url}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
        </li>
        @endif
        @if($address->twitter_url)
        <li>
            <a href="{{$address->twitter_url}}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
        </li>
        @endif
        @if($address->linkedin_url)
        <li>
            <a href="{{$address->linkedin_url}}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
        </li>
        @endif
        @if($address->snapchat_url)
        <li>
            <a href="{{$address->snapchat_url}}" target="_blank"><i class="fa-brands fa-snapchat"></i></a>
        </li>
        @endif
        @if($address->pinterest_url)
        <li>
            <a href="{{$address->pinterest_url}}" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
        </li>
        @endif

        @if($address->youtube_url)
        <li>
            <a href="{{$address->youtube_url}}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
        </li>
        @endif
    </ul>
</div>


<div class="fixedrightSidebar">
    <div class="socialMedia">
        @if($address->whatsapp_number)
            <div class="QuickSideRightBar QuickSideRightBarContact">
                <a href="https://wa.me/{{$address->whatsapp_number}}" target="_blank">
                    <div class="img_box">
                        <img src="{{ asset('frontend/images/svg/fixed_whatsapp.svg')}}" alt="">
                    </div>                 
                    <div class="slideLeft">
                        <span class="textRight"> {{$address->whatsapp_number}}</span>
                    </div>
                </a>
            </div>
        @endif
        @if($address->phone)
            <div class="QuickSideRightBar QuickSideRightBarWhatsapp">
                <a href="tel:{{$address->phone}}" target="blank">
                    <div class="img_box">
                        <img src="{{ asset('frontend/images/svg/fixed_call.svg')}}" alt="" class="CallRight">
                    </div>                    
                    <div class="slideLeft">
                        <span class="textRight"> {{$address->phone}}</span>
                    </div>
                </a>
            </div>
        @endif
    </div>
</div>


<div class="fixedBottomBar">
   <div class="container">
       <div class="row">
           <ul>

            <li class="nav-item icon_space">
                <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"  class="header_icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </li>
            <li class="nav-item icon_space ">
                <a href="{{ url('cart') }}" class="header_icon">
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill cart-count">
                        {{ Helper::getCartItemCount()}}
                    </span>
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </li>
            @if(Auth::guard('customer')->check())
                <li class="nav-item icon_space">
                    <a href="{{url('customer/account/profile')}}"  class="header_icon">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </li>
                {{-- <li class="nav-item icon_space">
                    <a href="{{url('customer/account/wishlist')}}"  class="header_icon">
                        <i class="fa-solid fa-heart"></i>
                    </a>
                </li> --}}
                
            @else
                <li class="nav-item icon_space">
                    <a href="" data-bs-toggle="modal" data-bs-target="#login_form_pop"  class="header_icon">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </li>
            @endif
           </ul>
       </div>
   </div>
</div>
@yield('content')

@include('web.includes.get_a_quote')
@include('web.includes.enquire-now-modal')
@include('web.includes.compare-modal')

<footer>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-6 order-xl-4 col-12 info">
                <a href="{{url('/')}}"><img class="logo" src="{{asset('frontend/images/footer_logo.svg')}}" alt=""></a>
                <ul>
                    @if($address->address)
                        <li>
                            <img src="{{asset('frontend/images/svg/footer-location.svg')}}" alt="">
                            {!! $address->address !!}
                        </li>
                    @endif
                    @if($address->email)
                        <li>
                            <img src="{{asset('frontend/images/svg/footer-mail.svg')}}" alt="">
                            <a href="mailto:{{ $address->email }}">{{$address->email}}</a>
                        </li>
                    @endif
                    @if($address->phone)
                        <li>
                            <img src="{{asset('frontend/images/svg/footer-call.svg')}}" alt="">
                            <a href="tel:{{$address->phone}}" target="_blank">{{$address->phone}}</a>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="col-xl-2 col-lg-3 order-lg-1 col-6 ">
                <h6 class="heading">Quick Links</h6>
                <ul class="list">
                    <li>
                        <a href="{{ url('/about') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}">Contact Us</a>
                    </li>

                    <li>
                        <a href="{{ url('/blogs') }}">Blogs</a>
                    </li>
                    <li>
                        <a href="{{url('terms-and-conditions')}}">Terms and condition</a>
                    </li>
                    <li>
                        <a href="{{url('privacy-policy')}}">Privacy policy</a>
                    </li>
                    {{--                    <li>--}}
                    {{--                        <a href="">Sitemap</a>--}}
                    {{--                    </li>--}}
                </ul>
            </div>
            @if($parentCategories->isNotEmpty())
                <div class="col-xl-2 col-lg-3 order-lg-2 col-6 ">
                    <h6 class="heading">Explore By Category</h6>
                    <ul class="list">
                        @foreach($parentCategories as $category)
                            <li>
                                <a href="{{url('category',$category->short_url)}}">{{$category->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-xl-5 order-lg-3 ">
                <h6 class="heading">Newsletter</h6>
                <form action="" id="newsletterForm" name="newsletterForm">
                    <div class="form-group newsLetter">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Id...">
                        <button class="btn form_submit_btn" data-url="/newsletter">subscribe</button>
                    </div>
                </form>
                <div class="share_icon_area">
                    <h6 class="share">Follow Us on</h6>
                    @if($address->facebook_url)
                        <a href="{{$address->facebook_url}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    @endif
                    @if($address->instagram_url)
                        <a href="{{$address->instagram_url}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                    @if($address->twitter_url)
                        <a href="{{$address->twitter_url}}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    @endif
                    @if($address->linkedin_url)
                        <a href="{{$address->linkedin_url}}" target="_blank"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                    @endif
                    @if($address->linkedin_url)
                        <a href="{{$address->snapchat_url}}" target="_blank"><i class="fa-brands fa-snapchat"></i></a>
                    @endif
                    @if($address->pinterest_url)
                        <a href="{{$address->pinterest_url}}" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
                    @endif
                    @if($address->youtube_url)
                        <a href="{{$address->youtube_url}}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</footer>
{{--<section class="copy">--}}
{{--    <div class="container">--}}
{{--        <div class="row  ">--}}
{{--            <div class="col-12 copy-wrapper">--}}
{{--                <p>{{$siteInformation->copyright}} </p>--}}
{{--                <p>Powered By <a href="">PentaCodes IT Solutions</a></p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script> -->
<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('frontend/vendor/slick/slick.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.js"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.countup.js')}}"></script>
<script type="text/javascript">
    // $('.counter').countUp(
    //     {
    //         delay: 5,
    //         time: 1500
    //     }
    // );
</script>
<script src="{{ asset('frontend/xzoom/js/xzoom.min.js')}}"></script>
<script src="{{ asset('frontend/xzoom/js/setup.js')}}"></script>
<script src="{{ asset('frontend/owlcarousel/owl.carousel.js')}}"></script>
<script src="{{ asset('frontend/js/jquery.star-rating-svg.js')}}"></script>
<script src="{{ asset('frontend/js/scripts.js')}}"></script>
<script src="{{ asset('frontend/js/custom.js')}}"></script>
<script src="{{ asset('frontend/js/demo.js')}}"></script>
<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    var swal = Swal.mixin({
        backdrop: true, showConfirmButton: false,
    });
    var Toast = Swal.mixin({
        toast: true, position: 'top-end', showConfirmButton: false, timer: 3000
    });
</script>
@stack('scripts')
</body>
</html>

