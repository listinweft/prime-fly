<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARTEMYST</title>
    <meta name="title" content="{!! @$seo_data->meta_title !!}">
    <meta name="description" content="{!! @$seo_data->meta_description !!}"/>
    <meta name="keywords" content="{!! @$seo_data->meta_keyword !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ config('app.name') }} - {!! @$seo_data->meta_title !!}</title>
    {!! @$seo_data->other_meta_tag !!}
    {!! @$siteInformation->header_tag !!}
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png')}}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('frontend/css/star-rating-svg.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/xzoom/1.0.15/xzoom.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https:////code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css')}}">
</head>

<body id="go-to-top">



<!--Top Header Start-->

<section class="topHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-3 hamburgerMenuArea">
                <a class="" data-bs-toggle="offcanvas" href="#hamburgerMenu" role="button"
                   aria-controls="offcanvasExample">
                    <img class="img-fluid" src="{{ asset('frontend/images/hamburgerMenuIcon.png')}}" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-6 artemyst">
                <a href="index.php">
                    <img class="img-fluid artemystLogo" src="{{ asset('frontend/images/artemystLogo.png')}}" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-3 topRightArea">
                <ul class="topRightAreaUl">
                    <li>
                        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#searchTop"
                           aria-controls="offcanvasTop">
                            <img class="img-fluid" src="{{ asset('frontend/images/search.png')}}" alt="">
                        </a>
                    </li>
                    <li class="currency">
                        <img class="img-fluid language-flag" src="{{ asset('frontend/images/currency/aed.png')}}" alt="">
                        <select id="language-selector">
                            <option data-img="{{ asset('frontend/images/currency/aed.png')}}">
                                AED
                            </option>
                            <option data-img="{{ asset('frontend/images/currency/usd.png')}}">
                                USD
                            </option>
                        </select>
                    </li>
                    <li class="cart">
                        <a class="position-relative" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#cartListRight" aria-controls="offcanvasRight">
                            <img class="img-fluid" src="{{ asset('frontend/images/bag.png')}}" alt="">
                            <span class="position-absolute top-0 start-100  badge rounded-pill bg-danger">
                                23
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <img class="img-fluid" src="{{ asset('frontend/images/wishlist.png')}}" alt="">
                        </a>
                    </li>
                    <li class="login">
                        <div class="dropdown">
                            <a class="userBox dropdown-toggle" type="button" id="dropdownMenuButton1"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-fluid icon" src="{{ asset('frontend/images/user.png')}}" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="register.php">Register</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--Top Header End-->
<!-- Hamburger Menu End -->
@include('web.layouts.header')

<!-- Hamburger Menu Start -->
@include('web.includes.cart')
@include('web.includes.login')

<div id="loading">
    <img id="loading-image" src="{{ asset('frontend/images/loading.gif')}}" alt="Loading..."/>
</div>
@yield('content')
@include('web.layouts.footer')