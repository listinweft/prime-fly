@extends('web.layouts.main')
@section('content')

@if($homeBanners->isNotEmpty())
<section class="homeSlider">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-xl-5 col-md-6 col-sm-6 col-6 d-flex align-items-center ">
                <div class="homeSliderDetailsArea d-block w-100">
                    <div class="homeSliderDetails ">
                        @foreach ($homeBanners as $banner)
                            <div class="item">
                                <h1>
                                    <strong>{{$banner->title}}</strong> {{$banner->subtitle}}
                                </h1>
                            
                                    {!!$banner->description!!}  .
                                @if ($banner->button_text == '' || $banner->button_text == null)
                                <a href="{{$banner->url}}" class="primary_btn">
                                    {{$banner->button_text}}
                                </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-md-6 col-sm-6 col-6 homeSliderArea">

                <div class="homeSliderImages ">
                    @foreach ($homeBanners as $banner)
                        <div class="item">
                            {!! Helper::printImage(@$banner, 'desktop_image', 'desktop_image_webp', '', 'img-fluid') !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(Auth::check())
@if(@$relatedProducts->isNotEmpty())
@include('web._related_products')
@endif
@endif
<!--Home Collection Start-->
@if(@$ourcollection)
    <section class="collectionsArea">
        <div class="collectionsBgback">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="subHeading">Our Collections</h6>
                    <h2 class="mainHeading"> {!! @$ourcollection->title !!} </h2>
                    <div class="headingText">
                        <p>
                        {!! @$ourcollection->description !!}
                        </p>
                    </div>
                </div>
                <div class="col-12 pt-60">
                    <div class="collectionsAreaWrapper">
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage(@$ourcollection, 'mobile_image', 'mobile_image_webp', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5> {!! @$ourcollection->title1 !!}</h5>
                                    <p>
                                    {!! @$ourcollection->description1 !!}
                                    </p>
                                    <a class="primary_btn" href="{{ url(@$ourcollection->short_url1) }}">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage(@$ourcollection, 'mobile_image1', 'mobile_image_webp1', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5> {!! @$ourcollection->title2 !!}</h5>
                                    <p>
                                    {!! @$ourcollection->description2 !!}
                                    </p>
                                    <a class="primary_btn" href="{{ url(@$ourcollection->short_url2) }}">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage(@$ourcollection, 'mobile_image2', 'mobile_image_webp2', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5>{!! @$ourcollection->title3 !!}</h5>
                                    <p>
                                    {!! @$ourcollection->description3 !!}
                                    </p>
                                    <a class="primary_btn" href="{{ url(@$ourcollection->short_url3) }}">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage(@$ourcollection, 'mobile_image3', 'mobile_image_webp3', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5>{!! @$ourcollection->title4 !!}</h5>
                                    <p>
                                    {!! @$ourcollection->description4 !!}
                                    </p>
                                    <a class="primary_btn" href="{{ url(@$ourcollection->short_url4) }}">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage(@$ourcollection, 'mobile_image4', 'mobile_image_webp4', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5>{!! @$ourcollection->title5 !!}</h5>
                                    <p>
                                    {!! @$ourcollection->description5 !!}
                                    </p>
                                    <a class="primary_btn" href="{{ url(@$ourcollection->short_url5) }}">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage(@$ourcollection, 'mobile_image5', 'mobile_image_webp5', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5>{!! @$ourcollection->title6 !!}</h5>
                                    <p>
                                    {!! @$ourcollection->description6 !!}
                                    </p>
                                    <a class="primary_btn" href="{{ url(@$ourcollection->short_url6) }}">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--Home Collection End-->
@endif
<!--Home Shop By Theme Start-->
@if(@$themes)
    <div class="shopSection">
        <div class="container">
            <div class="col-12 text-center">
                <h6 class="subHeading">{{$catHomeHeadings->sub_title}}</h6>
                <h2 class="mainHeading">{{$catHomeHeadings->title}}</h2>
                <div class="headingText">
                   {!! $catHomeHeadings->description !!}
                </div>
            </div>
            <div class="col-12 pt-60">
                <div class="shopSectionWrapper">
                    @php
                        $n =1;
                    @endphp
                    @foreach ($themes as $theme)
                    <div class="shopSectionItem shopSectionItemBg{{$n}}">
                        <div class="wrapper">
                            <div class="imgBox">
                                {!! Helper::printImage(@$theme, 'image', 'image_webp', '', 'img-fluid') !!}
                                {{-- <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-01.jpg')}}" alt=""> --}}
                            </div>
                            <h5>{{$theme->title}}</h5>
                        
                            {{-- <h6>{{@$count }} items</h6> --}}
                        </div>
                    </div>
                    @php
                        $n++;
                        if($n==6){
                            $n=1;
                        }
                    @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
<!--Home Shop By Theme End-->

<!--Home Services Start-->
@if(@$products->isNotEmpty())
    <section class="serviceHome">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="subHeading">Our Selection</h6>
                    <h2 class="mainHeading">Find Your Inspiration</h2>
                    <div class="headingText">
                        <p>
                            Our goal is to keep things fresh and bring you inspired canvases with new styles and themes.
                        </p>
                    </div>
                </div>
                <div class="col-12 pt-60">
                    <div class="selectionWrapper">
                        @foreach ($products as $product)
                        <div class="item">
                            {{-- {{ Helper::printImage(@$product, 'image', 'image_webp', 'image_attribute', 'img-fluid') }} --}}
                            <div class="product-image-wrapper">
                                <img class="img-fluid"src="{{ asset($product->thumbnail_image)}}" alt="{{$product->thumbnail_image_attribute}}">
                            </div>
                            <div class="cntOverlay">
                                <div class="w-100">
                                    <a href="">
                                        <h6>{{ $product->title }}</h6>
                                        @foreach ($product->product_categories as $category)
                                            <p>{{ $category->title }}</p>
                                            
                                        @endforeach
                                        <p>Poster Art</p>
                                        <div class="starPrice">
                                            {{-- <div class="my-rating-readonly" data-rating="4"></div> --}}
                                            <div class="price">
                                                <ul>
                                                    @if(Helper::offerPrice($product->id)!='')
                                                    <li class="offer">
                                                        @php
                                                            $price = \ProductPrice::where('product_id',$product->id)->where('')->first();
                                                        @endphp
                                                        {{Helper::defaultCurrency().' '.number_format(Helper::offerPriceAmount($product->id),2)}}
                                                    </li>
                                                    <li>
                                                        {{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}
                                                    </li>
                                                 
                                                   
                                                    @else
                                                    <li>
                                                        {{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}
                                                    </li>
                                                    <li>
                                                       
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<!--Home Services End-->

<!--Home Testimonial Start-->
    <section class="testimonialSection">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="subHeading">{{@$homeHeadings->title}}</h6>
                    <h2 class="mainHeading">{{@$homeHeadings->subtitle}}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10 col-12 pt-60">
               
                    <div class="testimonialsSlider">
                    @if($testimonials->isNotEmpty())
                    @foreach( $testimonials as $blog)
                        <div class="testimonialsCard">
                            <div class="testimonialsProfile">
                                <div class="leftPhoto">
                                {!! Helper::printImage($blog, 'image', 'image_webp', '', 'img-fluid') !!}
                                </div>
                                <div class="rightDetails">
                                    <h3>{{ @$blog->name }}</h3>
                                    <h6>{{ @$blog->designation }}</h6>
                                    <div class="reviewIconStar">
                                        @if(@$blog->review_type!=="Normal")
                                        <div class="icon">
                                            <img class="imgBox"src="{{ asset('frontend/images/google.png')}}" alt="">
                                        </div>
                                        @endif
                    
                                        <div class="my-rating-readonly" data-rating={{$blog->rating}}></div>
                                    </div>
                                </div>
                            </div>
                            <div class="textWrapper">
                            {!! @$blog->message !!}
                            
                                {!! @$blog->message !!}
                            
                            </div>
                        </div>
                        @endforeach
                        @endif
                       
                    </div>
                    
                </div>
                <div class="col-12 text-center mt-md-5">
                    <a href="" data-bs-toggle="modal" data-bs-target="#reviewModal" class="primary_btn">Add Your Review</a>
                </div>
            </div>
        </div>
    </section>
<!--Home Testimonial End-->
@endsection
@push('scripts')
    
@endpush