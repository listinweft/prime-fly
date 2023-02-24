@extends('web.layouts.main')
@section('content')
<!--Inner Banner Start-->
<section class="innerBanner innerBannerProducts">
    <div class="innerBannerImageArea">
        <img class="bannerImg img-fluid" src="{{ asset('frontend/images/banner/banner-09.jpg')}}" alt="">
    </div>
    <div class="innerBannerDetails">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Product Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}"><img
                                        src="{{ asset('frontend/images/home.png') }}" alt=""></a></li>
                            <li class="breadcrumb-item"><a href="{{url('products')}}">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Inner Banner End-->

<!--Product Details Page Start-->

<section class="productDetailsPage">
    <div class="container">
        <div class="row justify-content-between align-items-start">
            <div class="col-xxl-5  col-lg-5 product_details_gallery canvas">
                <div class="row sliderWrapperArea ">
                    <div class=" col-9 productDetailsLeftSecond " >
                        <div class="productDetailsLargeImages">
                            <div class="item position-relative">
                                <div class="fotorama__stage__frame" >
                                    <div class="fotorama__html">
                                        <img class="art-canvas fotorama__img" src="{{asset($product->thumbnail_image)}}" aria-hidden="false">
                                    </div>
                                </div>
                            </div>
                            @if($product->activeGalleries->count() > 0)
                                @foreach ($product->activeGalleries as $gallery)
                                <div class="item position-relative">
                                    <div class="fotorama__stage__frame" >
                                        <div class="fotorama__html">
                                            <img class=" fotorama__img" src="{{asset($gallery->image)}}" aria-hidden="false">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            @if($productFrames->isNotEmpty())
                            @foreach ($productFrames as $frame)
                            <div class="item position-relative">
                                <div class="fotorama__stage__frame" >
                                    <div class="fotorama__html">
                                        <img class=" fotorama__img" src="{{asset($frame->image)}}" aria-hidden="false">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        </div>
                    </div>
                    <div class="col-3 productDetailsLeftFirst" >
                        <div class="productDetailsThumbs ">
                            <div class="fotorama__nav__frame">
                                <div class="fotorama__thumb fotorama_horizontal_ratio ">
                                    <img src="{{asset($product->thumbnail_image)}}" class="fotorama__img img-fluid">
                                </div>
                            </div>
                            @if($product->activeGalleries->count() > 0)
                                @foreach ($product->activeGalleries as $gallery)
                                    <div class="fotorama__nav__frame ">
                                        <div class="fotorama__thumb fotorama_vertical_ratio ">
                                            {!! Helper::printImage(@$gallery,'image','image_webp','image_attribute','fotorama__img img-fluid') !!}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            @if($productFrames->isNotEmpty())
                                @foreach ($productFrames as $frame)
                                    <div class="fotorama__nav__frame ">
                                        <div class="fotorama__thumb fotorama_vertical_ratio ">
                                            {!! Helper::printImage(@$frame,'image','image_webp','image_attribute','fotorama__img img-fluid') !!}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7 col-lg-7 productDetailsInfo ps-xxl-5 ps-xl-4">
                <div class="productNameStock">
                    <div class="name">
                        <h4>{{$product->title}}</h4>
                    </div>
<!--                    <div class="stock">-->
<!--                        In Stock-->
<!--                    </div>-->
                @if (@$product->availability == 'out of stock')
                <div class="stock outOfStock">
                    {{ $product->availability}}
                </div>
                @endif
                                </div>
                <div class="productRatingPrice">
                    <div class="rating">
                        <h6>{{ $totalReviews }} Ratings</h6>
                        @if($averageRatings >0)
                        <div class="rate_area">
                            <i class="fa-solid fa-star"></i> 4.5
                        </div>
                        @endif
                    </div>
                    <div class="price">
                        @php
                        $price = \App\Models\ProductPrice::where('product_id',$product->id)->first();
                    @endphp
                    <h5>AED {{$price->price.'.00'}}</h5>
                    </div>
                </div>
                <div class="productCode">
                    <h5>
                        Product Code : <strong>{{$product->sku}}</strong>
                    </h5>
                </div>
                <div class="textArea">
                    {!! @$product->description !!}
                </div>

                <div class="relatedProductsTypesSelect">
                    <h5>
                        Select Product Type
                    </h5>
                    <div class="relatedProductsTypesWrapper">
                        <div class="relatedProductsTypesWrapper">
                     
                            @foreach ($products as $prd)
                            <div class="item {{$prd->productType->id ==  $product->productType->id ?  'active' : '' }}">
                                <a href=" {{url('/product/'.$prd->short_url)}} ">
                                   {!! Helper::printImage($prd->productType, 'image','image_webp','image_attribute') !!}
                                    <p>{{$prd->productType->title}}</p>
                                </a>
                            </div>
                              
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="relatedProductsTypesSelect">
                    <h5>
                        Select Size <span>(Size in cms)</span>
                    </h5>
                    <div class="relatedProductsTypesWrapper sizeSection">
                        @foreach ($sizes as $size)
                        <div class="item {{$size->id ==  1 ?  'active' : '' }} checkprice" data-id="{{$size->id}}" data-product_id="{{$product->id}}" data-product_type_id="1">
                            <div class="sizeImageBox">
                                {!! Helper::printImage($size, 'image','image_webp','image_attribute', 'img-fluid') !!}
                            </div>
                            <p>{{$size->title}}</p>
                        </div>
                    @endforeach
                    </div>
                </div>

                <div class="totalBox">
                    <h5>
                        Total
                    </h5>
                    <div class="priceQuantityArea">
                        <div class="priceArea">
                           
                            @php
                            $price = \App\Models\ProductPrice::where('product_id',$product->id)->first();
                        @endphp
                        <h3 id="price">AED {{$price->price.'.00'}}</h3>
                        <h6></h6>
                        </div>
                        <div class="quantity_parice_order_area">
                            <div class="quantity-counter">
                                <button class="btn btn-quantity-down">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </button>
                                <input type="number" disabled class="input-number__input form-control2 form-control-lg" min="1" max="100" step="1" value="1">
                                <button class="btn btn-quantity-up">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="btnsArea">
                        <a class="primary_btn" href="">Add to Cart</a>
                        <a class="primary_btn secondary_btn" href="" data-bs-target="#bulk_order_form_pop" data-bs-toggle="modal" data-bs-dismiss="modal" >Bulk Enquiry</a>
                    </div>
                </div>

                <div class="tagArea">
                    <h6>Product Tags</h6>
                    @foreach ($productTags as $tag)
                        
                    <div class="tag">{{$tag->title}}</div>
                    @endforeach
                 
                </div>

            </div>
        </div>
        @if(@$product->about_item != null)
        <div class="moreDetails">
            @if($product->about_item)
            <div class="row">
                <div class="col-12">
                    <h4>
                        About This Item
                    </h4>
                    <div class="textArea">
                       {!! $product->about_item !!}
                    </div>
                </div>
            </div>
            @endif
            @if($product->featured_image)
            <div class="row justify-content-center mt-4">
                <div class="col-lg-5">
                    {!! Helper::printImage($product, 'featured_image','featured_image_webp','featured_image_attribute', 'img-fluid') !!}
                </div>
                <div class="col-lg-5 right ps-xl-5">
                    <div class="textArea">
                        <div>
                           {!! $product->featured_description !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>
</section>

<!--Product Details Page End -->

<!--Reviews Section Start-->

<section class="reviewSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pe-xl-5">
                <div class="reviewDetailsLeft">
                    <div class="left">
                        <h5>Customer Reviews</h5>
                        <p>What others think about the item</p>
                        <h6>{{ $totalRatings }} Customer Ratings</h6>
                        <div class="my-rating-readonly" data-rating="4"></div>
                    </div>
                    <div class="right">
                        <h5><img src="{{ asset('frontend/images/star.png') }}" alt="">{{ $averageRatings }}</h5>
                        <p>Average customer rating</p>
                    </div>
                </div>
                <div class="ratings_reviews_right_bar">
                    <h6>Reviews</h6>
                    <ul>
                        <ul>
                            @for($i=5;$i>=1;$i--)
    
                            <li>
                                <div class="ratings_reviews_star">
                                    <p>{{ $i }}<img src="{{ asset('frontend/images/star.png') }}" alt=""></p>
                                </div>
                                @php $var = 'starPercent'.$i @endphp
                                <div class="ratings_reviews_bar">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: {{ $$var }}%" aria-valuenow="{{ $$var }}" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p>
                                        {{ $$var }}%
                                    </p>
                                </div>
                            </li>
                            @endfor
                           
                        </ul>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="formArea">
                    <div class="head">
                        <h5>Write A Review</h5>
                        <div class="my-rating" data-rating="0"></div>
                    </div>
                    <div class="row">
                        <div class=" col-12">
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <img  src="{{ asset('frontend/images/loginUser.png')}}" alt="">
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>
                        </div>
                        <div class=" col-12">
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <img  src="{{ asset('frontend/images/icon-email.png')}}" alt="">
                                <input type="text" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-12 message">
                            <div class="form-group">
                                <label for="">Message</label>
                                <img  src="{{ asset('frontend/images/icon-pen.png')}}" alt="">
                                <textarea class="form-control" placeholder="Say Something"></textarea>
                            </div>
                        </div>
                        <div class="col-12x ">
                            <div class="form-group d-flex align-items-end mb-0">
                                <button type="submit" class="primary_btn ">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Reviews Section End-->

<!-- Testimonial Start-->
@if ($testimonials->isNotempty())
<section class="testimonialSection productTestimonialSection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-12 pt-60">
                <div class="testimonialsSlider">
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
                        {!! @$blog->message !!}
                            
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 text-center mt-md-5">
                <a href="" data-bs-toggle="modal" data-bs-target="#reviewModal" class="primary_btn">Add Your Review</a>
            </div>
        </div>
    </div>
</section>
    
@endif
<!-- Testimonial End-->
@if(@$similarProducts->isNotEmpty())
<div class="relatedProducts youMayAlsoLike">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>You May Also Like </h3>
                <section id="demos">
                    <div class="relatedSlider owl-carousel owl-theme ">
                        @foreach ($similarProducts as $product)
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="{{ url('/product/'.$product->short_url) }}" tabindex="-1">
                                                {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                            </a>
                                        </div>
                                        <div class="cartWishlistBox">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist {{ (Auth::guard('customer')->check())?'wishlist-action':'login-popup' }} {{ (Auth::guard('customer')->check())?((app('wishlist')->get($product->id))?'fill':''):'' }}" data-id="{{$product->id}}"  data-bs-toggle="popover"  id="wishlist_check_{{$product->id}}" 
                                                            data-bs-placement="left" data-bs-trigger="hover" data-bs-content="Wishlist">
                                                        <div class="textIcon">
                                                            Wishlist
                                                        </div>
                                                        <div class="iconBox" id="wishlist_check_span_{{$product->id}}">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist  cartBtn {{ ($product->availability=='In Stock' && $product->stock!=0)?'cart-action':'out-of-stock' }}" data-id="{{$product->id}}">
                                                        <div class="iconBox">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                        </div>
                                                        <div class="textIcon">
                                                            Add to Cart
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="logoArea mt-auto">
                                            {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a href="{{ url('/product/'.$product->short_url) }}">
                                        <div class="pro-name">
                                        {{ $product->title }}
                                        </div>
                                        <ul class="price-area">
                                            <li class="offer">
                                            @if(Helper::offerPrice($product->id)!='')
                                            </li>
                                            @endif
                                            @if(Helper::offerPrice($product->id)!='')
                                            <li>
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
                                        <ul class="type-review">
                                        @foreach($product->product_categories as $product_category)
                                            <li>
                                            {{ $product_category->title }}
                                            </li>
                                            @endforeach
                                            @if(Helper::averageRating($product->id)>0)
                                            <li class="review">
                                                <i class="fa-solid fa-star"></i>{{ Helper::averageRating($product->id)  }}
                                            </li>
                                            @endif
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                            
                        @endforeach
      
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endif
@if(@$relatedProducts->isNotEmpty())
<div class="relatedProducts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Related Products</h3>
                <section id="demos">
                    <div class="relatedSlider owl-carousel owl-theme ">
                        @foreach ($relatedProducts as $product)
                        <div class="item">
                            <div class="product-item-info">htgh
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="{{ url('/product/'.$product->short_url) }}" tabindex="-1">
                                                {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                            </a>
                                        </div>
                                        <div class="cartWishlistBox">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist {{ (Auth::guard('customer')->check())?'wishlist-action':'login-popup' }} {{ (Auth::guard('customer')->check())?((app('wishlist')->get($product->id))?'fill':''):'' }}" data-id="{{$product->id}}"  data-bs-toggle="popover"  id="wishlist_check_{{$product->id}}" 
                                                            data-bs-placement="left" data-bs-trigger="hover" data-bs-content="Wishlist">
                                                        <div class="textIcon">
                                                            Wishlist
                                                        </div>
                                                        <div class="iconBox" id="wishlist_check_span_{{$product->id}}">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist  cartBtn {{ ($product->availability=='In Stock' && $product->stock!=0)?'cart-action':'out-of-stock' }}" data-id="{{$product->id}}">
                                                        <div class="iconBox">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                        </div>
                                                        <div class="textIcon">
                                                            Add to Cart
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="logoArea mt-auto">
                                            {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a href="{{ url('/product/'.$product->short_url) }}">
                                        <div class="pro-name">
                                        {{ $product->title }}
                                        </div>
                                        <ul class="price-area">
                                            <li class="offer">
                                            @if(Helper::offerPrice($product->id)!='')
                                            </li>
                                            @endif
                                            @if(Helper::offerPrice($product->id)!='')
                                            <li>
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
                                        <ul class="type-review">
                                        @foreach($product->product_categories as $product_category)
                                            <li>
                                            {{ $product_category->title }}
                                            </li>
                                            @endforeach
                                            @if(Helper::averageRating($product->id)>0)
                                            <li class="review">
                                                <i class="fa-solid fa-star"></i>{{ Helper::averageRating($product->id)  }}
                                            </li>
                                            @endif
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endif

<section class="bottomStickyBar">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="bottomItemWrapper">
                    <div class="imageName">
                        <div class="imgBox">
                          {!! Helper::printImage(@$product,'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','img-fluid') !!}
                        </div>
                        <div class="name">
                            <p>
                             {{$product->title}}
                            </p>
                        </div>
                    </div>
                    <div class="qntyAddBtn">
                        <div class="quantity-counter">
                            <button class="btn btn-quantity-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input type="number" disabled class="input-number__input form-control2 form-control-lg"
                                min="1" max="100" step="1" value="1">
                            <button class="btn btn-quantity-up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                        <a class="primary_btn" href="">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade login_create" id="bulk_order_form_pop" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa-solid fa-list"></i> Bulk Enquiry</h5>
                <button type="button" class="btn " data-bs-dismiss="modal" aria-label="Close"><img
                        class="img-fluid" src="{{ asset('frontend/images/svg/colse_login.svg') }}"
                        alt=""></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="bulkenquiryForm" name="bulkenquiryForm">
                    <div class="row">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Name*">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control"
                                placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" id="phone"class="form-control"
                                placeholder="Phone*">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" class="form-control form-message" placeholder="Message*"></textarea>
                            <!-- <input type="password" class="form-control" placeholder="Password*"> -->
                        </div>
                        {{-- <input type="hidden" name="subject" value="subject"> --}}

                        <input type="hidden" name="type" value="product">
                        <input type="hidden" name="product_id" value="1">
                        <div class="form-group">
                            <button class="btn primary_btn submit_form_btn" data-url="/enquiry">Send</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection