@extends('web.layouts.main')
@section('content')

@if($homeBanners->isNotEmpty())

<section class="home_banner">
    <div class="home_silder">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators container">
                @foreach($homeBanners as $banner)
                    <button type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="{{$loop->iteration-1}}" class="{{$loop->first?'active':''}}"
                            aria-current="{{$loop->first?'true':'false'}}"
                            aria-label="Slide {{$loop->iteration}}">
                        <div class="dot"></div>
                    </button>
                @endforeach
            </div>
            <div class="carousel-inner ">
                @foreach($homeBanners as $banner)

                    <div class="carousel-item {{$loop->first?'active':''}}">
                        <a href="{{$banner->url}}">
                            {!! Helper::printImage($banner, 'desktop_image','desktop_image_webp','image_attribute','d-block w-100','','d-none d-md-block') !!}
                            {!! Helper::printImage($banner, 'mobile_image','mobile_image_webp','image_attribute','d-block w-100','','d-block d-md-none') !!}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

@if($featuredProducts->isNotEmpty())
<section class="special_Mebashi">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Make Your Day Special With Mebashi</h1>
                <h6 class="subtext">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tu enim ista
                    lenius, hic Stoicorum more nos</h6>
            </div>
        </div>
    </div>
    <div class="row g-0 ">
        <div class="special_product_wrapper">

            <div class="special_product_image">
                <!-- <picture>
                <img src="{{asset('frontend/images/special_image.jpg')}}" class="d-block w-100" alt="...">
            </picture> -->
                <div class="special_ad_slider">
                    @foreach(@$featuredProducts as $featured)
                        <div class="special_ad_body">
                            {!! Helper::printImage(@$featured, 'featured_image','featured_image_webp','featured_image_attribute') !!}
                            <a href="https://youtu.be/JsnzZF0_13I" data-fancybox="group">
                                <button type="button" class="video-btn">
                                    <img class="img-fluid" src="http://mebashi/frontend/images/svg/play.svg"
                                         alt="">
                                </button>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="special_product_slider_wrapper">
                <div class="special_product_slider">
                    @foreach(@$featuredProducts as $featured)
                        <div class="special_product_card">
                            <a href="{{url('product/'.$featured->short_url)}}">
                                <div class="special_product_body">
                                    <div class="special_right_image">
                                        {!! Helper::printImage(@$featured, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                    </div>
                                    <div class="special_product_info">
                                        <h3>
                                            {{$featured->title}}
                                        </h3>
                                        {!! $featured->featured_description  !!}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="slick-slider-nav-sp">
                </div>
                <div class="mebashi">

                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($categories->isNotEmpty())
        <section class="home_category">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        @php
                            $cateHeading =   $homeHeadings->where('type','category')->first();
                        @endphp
                       
                        <h1>{{$cateHeading->title}}</h1>
                        <h6 class="subtext">{!!$cateHeading->description!!}</h6>
                    </div>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-12 g-0">
                    <div class="home_category_slider">
                        @foreach($categories as $category)
                            <div class="home_category_slider_card">
                                <a href="{{url('category/'.@$category->short_url)}}">
                                    {!! Helper::printImage(@$category, 'image','image_webp','image_attribute','d-block w-100 category_slider_img') !!}
                                    <div class="overlay_cnt">
                                        <h4>
                                            {{$category->title}}
                                        </h4>
                                        <a class="circle" href="{{url('category/'.@$category->short_url)}}">
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($latestProducts->isNotEmpty())
        <section class="home_product">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>  {{ @$latest->title }}</h1>
                        <h6 class="subtext"> {!! @$latest->description !!} </h6>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="home_product_wrapper">
                            @foreach($latestProducts as $latest)
                                <div class="product_item home-latest{{$loop->iteration}}">
                                    <div class="buttons_box">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="icon_box my_wishlist add_compare_product
                                                {{Session::exists('compare_products')? (in_array($latest->id, array_column(Session::get('compare_products'), 'product_id'))? 'fill':''):'' }}"
                                                   data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover"
                                                   data-bs-content="Compare" data-id="{{ $latest->id }}">
                                                    <div class="comprae_icon">
                                                        <i class="fa-solid fa-code-compare"></i>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a data-id="{{$latest->id}}"  href="javascript:void(0)" class="icon_box my_wishlist {{ (Auth::guard('customer')->check())?'wishlist-action':'login-popup' }}"
                                                     data-bs-toggle="popover"  id="wishlist_check_{{$latest->id}}" 
                                                    data-bs-placement="left" data-bs-trigger="hover" data-bs-content="Wishlist">
                                                    <span
                                                        id="wishlist_check_span_{{$latest->id}}"
                                                        class="wishlist-image {{ (Auth::guard('customer')->check())?((app('wishlist')->get($latest->id))?'fill':''):'' }}">
                                                    <i class="fa-solid fa-heart"></i></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" data-id="{{$latest->id}}"
                                                 class="icon_box my_wishlist cartBtn {{ ($latest->availability=='In Stock' && $latest->stock!=0)?'cart-action':'out-of-stock' }}" 
                                                 data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover" data-bs-content="Cart">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </a>
                                            </li>
                                      
                                        </ul>
                                    </div>
                                    <div class="sale_new_tag_wrapper">
                                        @foreach($latest->product_categories as $product_category)
                    
                                        <div class="product_tag">
                                            <a href="{{ url('category/'.$product_category->short_url) }}">
                                                <p>{{ $product_category->title }}</p>
                                            </a>
                                        </div>
                                        @endforeach
                                  
                                        @if($latest->availability=='Out of Stock')
                                        <div class="sale">
                                           Out of Stock     
                                        </div>
                                        @else
                                        <div class="sale">
                                           Sale  
                                         </div>
                                        @endif
                                        @if($latest->new_arrival=='Yes')
                                        <div class="new">
                                           New     
                                        </div>
                                        @endif
                                    </div>
                                    <div>
                                        <a href="{{url('product/'.@$latest->short_url)}}">
                                            <div class="images_box">
                                                {!! Helper::printImage(@$latest, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                            </div>
                                            <h5>
                                                {{$latest->title}}
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if($getQuote)
    <section class="home-quote">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 quote_image">
                    {!! Helper::printImage(@$getQuote, 'image','image_webp','image_attribute','d-block w-100') !!}

                </div>
                <div class="col-lg-5 quote_area">
                    <div class="cnt_wrapper">
                        <h1>
                            {{@$getQuote->title}}
                            {{--                            Fresh <mark>Coffee</mark>--}}
                            {{--                            Everyday--}}
                        </h1>
                        {!! @$getQuote->description !!}
                        <a href="" data-bs-target="#get_quote_form_pop" data-bs-toggle="modal"
                           data-bs-dismiss="modal" class="primary_btn">{{@$getQuote->button_text}} <i
                                class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif

@if($advertisements->isNotEmpty())
<section class="advertisement_section">
    <div class="mebashi_logo">
        <img src="{{asset('frontend/images/mebashi_category-logo.svg')}}" alt="...">
    </div>
    <div class="advertisement_slider_wrapper">
        <div class="d-none d-md-block">
            <div class="advertisement_slider ">
                @foreach($advertisements as $advertisement)
                    <div class="{{$loop->first?'advertisement_body':'ad_body'}}">
                        <a href="{{$advertisement->url}}">
                            {!! Helper::printImage(@$advertisement, 'desktop_image','desktop_image_webp','image_attribute','d-block w-100') !!}
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="slick-slider-nav">
            </div>
        </div>
        <div class="d-block d-md-none">
            <div class="advertisement_slider_mb ">

                @foreach($advertisements as $advertisement)

                    <div class="{{$loop->first?'advertisement_body':'ad_body'}}">
                        <a href="{{$advertisement->url}}">
                            {!! Helper::printImage(@$advertisement, 'mobile_image','mobile_image_webp','image_attribute','d-block w-100') !!}
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="slick-slider-nav_mb">
            </div>
        </div>
    </div>

</section>
@endif

<div class="btn-group  compare_btn_test compare_count_item dropup d-none" id="compare_count">
  <a href="compare.php" class="dropdown-toggle"  >
    <h6>Compare</h6>
    <div class="count_num">
        3
    </div>
  </a>
  <ul class="dropdown-menu" aria-labelledby="">
    <li>
        <div class="dropdown-item" href="#">
            <a href="javascript:void(0)" class="close_compare_btn"><i class="fa-solid fa-xmark"></i></a>
            <picture>
                <img src="{{asset('frontend/images/products/products_04(1000).png')}}" class="d-block w-100" alt="...">
            </picture>
            <div class="p_name">
                Espresso Coffee Machine ME-ECM1007B
            </div>
        </div>
    </li>
    <li>
        <div class="dropdown-item" href="#">
            <a href="javascript:void(0)" class="close_compare_btn"><i class="fa-solid fa-xmark"></i></a>
            <picture>
                <img src="{{asset('frontend/images/products/products_03(1000).png')}}" class="d-block w-100" alt="...">
            </picture>
            <div class="p_name">
                Espresso Coffee Machine ME-ECM2001 2 in 1
            </div>
        </div>
    </li>
    <li>
        <div class="dropdown-item" href="#">
            <a href="javascript:void(0)" class="close_compare_btn"><i class="fa-solid fa-xmark"></i></a>
           <picture>
                <img src="{{asset('frontend/images/products/products_04(1000).png')}}" class="d-block w-100" alt="...">
            </picture>
            <div class="p_name">
                Air Fryer ME-AF993B
            </div>
        </div>
    </li>
  </ul>
</div>


@endsection