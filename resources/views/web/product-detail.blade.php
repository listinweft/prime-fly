@extends('web.layouts.main')

@section('content')
    @include('web.includes.banner',[$banner, 'type'=> 'Product     >     '.$product->short_url])
    
<section class="product_details_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 product_details_image_gallery ">
                <div class="product_details_image_bg">
                    @if($product->new_arrival == "Yes")
                        <div class="new-tag">
                            <p>New</p>
                        </div>
                    @endif
                    @foreach($product->product_categories as $product_category)
                        <div class="product_tag">
                            {{ $product_category->title }}
                        </div>
                    @endforeach
                    <div class="slick-slider-xzoom">
                    </div>
                    <div class="x-zoom_area">
                        <div class="share_compare">
                            <div class="share">
                                <a href="">
                                    <img class="img-fluid active"src="{{ asset('frontend/images/svg/share.svg')}}"  alt="">
                                    <img class="img-fluid hover"src="{{ asset('frontend/images/svg/share-active.svg')}}"  alt="">
                                    <div class="slideLeft">
                                        <div class="social">
                                            <a href="{{ 'https://www.facebook.com/sharer/sharer.php?u='.Request::fullUrl() }}"
                                               rel="tooltip" title="FaceBook" data-bs-placement="top"
                                               target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                            <a href="{{ 'https://wa.me/?text='.Request::fullUrl()}}" rel="tooltip"
                                               title="WhatsApp" data-bs-placement="top"
                                               target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                                            <a href="{{ 'https://www.linkedin.com/shareArticle?mini=true&url='.Request::fullUrl() }}"
                                               rel="tooltip" title="LinkedIn" data-bs-placement="top"
                                               target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                            <a href="{{ 'https://twitter.com/intent/tweet/?url='.Request::fullUrl() }}"
                                               rel="tooltip" title="Twitter" data-bs-placement="top"
                                               target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="compare">
                                <a href="javascript:void(0)" class="my_wishlist add_compare_product
                               {{Session::exists('compare_products')? (in_array($product->id, array_column(Session::get('compare_products'), 'product_id'))? 'fill':''):'' }}"
                                  data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover"
                                  data-bs-content="Compare" data-id="{{ $product->id }}">
                                   <div class="compare_icon">
                                       <i class="fa-solid fa-code-compare"></i>
                                   </div>
                               </a>
                           </div>
                        </div>
                        <div class="row slider_zomm_box">
                            <div class="col-12">
                                <source srcset="{{ asset($product->thumbnail_image_webp) }}" type="image/webp">
                                    <img class="xzoom img-fluid" id="xzoom-default"
                                         {{$product->thumbnail_image_attribute}} src="{{ asset($product->thumbnail_image) }}"
                                         xoriginal="{{ asset($product->thumbnail_image) }}"/>
                                <div class="slider-xzoom xzoom-thumbs">
                                    @foreach($product->activeGalleries as $gallery)
                                    @if($loop->iteration == 1)
                                        <a href="{{asset($gallery->image)}}">{!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute', 'xzoom-gallery img-fluid') !!}</a>
                                    @endif
                                    <a href="{{asset($gallery->image)}}">{!! Helper::printImage($gallery, 'image','image_webp','image_attribute', 'xzoom-gallery img-fluid') !!}</a>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-5 product_details_info">
                <div class="info_wrapper">
                    <h3>
                        {{ @$product->title }}
                    </h3>
                    <ul class="highlights_area">
                        @if (@$product->capacity)
                        <li>
                            <div class="left">
                                Capacity
                            </div>
                            <div class="right">
                                :  <span>{{$product->capacity}}</span>
                            </div>
                        </li>
                            
                        @endif
                       
                        @if (@$product->availability)
                        <li>
                            <div class="left">
                                Availability
                            </div>
                            <div class="right">
                                :  <span>{{ $product->availability}}</span>
                            </div>
                        </li>
                        @endif
                        @if (@$product->color)
                        <li>
                            <div class="left">
                                Colour
                            </div>
                            <div class="right">
                                :  <span>{{ $product->color->title}}</span>
                            </div>
                        </li>
                        @endif
                    </ul>
                    <div class="rate_details_wrapper">
                        @if($averageRatings >0)
                        <div class="rate_area">
                            <i class="fa-solid fa-star"></i> {{ $averageRatings }}
                        </div>
                        @endif
                        <p>
                            {{ $totalReviews }} Reviews
                        </p>
                    </div>
                    {!! @$product->description !!}
                    @if($similarProducts->isNotEmpty())
                    <div class="color_wrapper_slider">
                        @foreach($similarProducts as $similaProduct)
                        <div class="color_item">
                            <a href="{{ url('product/'.$similaProduct->short_url) }}" class="position-relative">
                                @isset($similaProduct->color)
                                <div class="product-color {{ $similaProduct->color->title }}"  style="background-color: {{ $similaProduct->color->code }}">
                                </div>
                                @endisset
                                <div class="img-color">
                                    {!! Helper::printImage($similaProduct, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute') !!}
                                </div>
                                <div class="color_name">
                                    {{ $similaProduct->color->title }}
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    <ul class="price_area">
                        @if(Helper::offerPrice($product->id)!='')
                        <li>{{Helper::defaultCurrency().' '.number_format(Helper::offerPriceAmount($product->id),2)}}</li>
                        <li>{{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}</li>
                    @else
                    <li>{{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}</li>
                    <li></li>
                    @endif
                    </ul>
                    <div class="quantity_parice_order_area">
                        <div class="quantity-counter">
                            <button class="btn btn-quantity-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                            <input type="number" class="input-number__input form-control2 form-control-lg qty" title="Qty" data-id="{{$product->id}}"  min="1" max="100" step="1" value="1"  name="quantity" readonly>
                            <button class="btn btn-quantity-up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                        </div>
                        <div class="d-flex button_mb_flex">
                            <a href="javascript:void(0)" data-id="{{$product->id}}" class="primary_btn cartBtn {{ ($product->availability=='In Stock' && $product->stock!=0)?'cart-action':'out-of-stock' }}">
                                <i class="fa-solid fa-cart-shopping"></i> Add To Cart
                            </a>
                            <a href="" data-bs-target="#bulk_order_form_pop" data-bs-toggle="modal" data-bs-dismiss="modal" class="secondary_btn">Bulk Enquiry</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="key_features_section">
               
            <div class="row">
                @if($product->activeOverviews->isNotEmpty())
                <div class="col-12">
                    <h1>Key Features </h1>
                    <ul class="key_features_list">
                        @foreach($product->activeOverviews as $overview)
                                <li>{!! $overview->title !!}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if($product->activeKeyfeatures->isNotEmpty())
                    <div class="col-12 g-0">
                        <div class="key_features_slider">
                            @foreach($product->activeKeyfeatures->sortBy('sort_order') as $keyFeature)
                            <div class="key_features_slider_card">
                                <div class="key_features_top_img">
                                    {!! Helper::printImage($keyFeature, 'image','image_webp','image_attribute','d-block w-100') !!}
                                    @if($keyFeature->video_url)
                                    <div class="video_btn_box">
                                        <a href="{{ $keyFeature->video_url }}" data-fancybox="group">
                                            <button type="button" class="video-btn">
                                                <img class="img-fluid"src="{{ asset('frontend/images/svg/play.svg')}}" alt="">
                                            </button>
                                        </a>
                                    </div>
                                    @endif
                                </div>
                                <div class="key_features_body">
                                    <h6>{{ $keyFeature->title }}</h6>
                                    <div class="textArea">
                                        {!! $keyFeature->description !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        @if($product->specification_title)
            <div class="specifications_section">
                <div class="row">
                    <div class="col-12">
                        <h1>{{ $product->specification_title }} </h1>
                    </div>
                    <div class="col-xl-7 specification_img pe-xl-4">
                        @if($product->featured_image)
                        {!! Helper::printImage($product, 'featured_image','featured_image_webp','featured_image_attribute', 'd-block w-100') !!}
                        @endif
                    </div>
                    <div class="col-xl-5 specification_info">
                        <div>
                            {!! $product->specification_description !!}
                            @if($product->product_manual)
                                <a download href="{{ asset($product->product_manual) }}">
                                    <div class="buttons">
                                        <div class="icon">
                                            <img src="{{asset('frontend/images/svg/pdf-icon.svg')}}" alt="">
                                        </div>
                                        <p>
                                            Product Manual
                                            <span>DOWNLOAD</span>
                                        </p>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @if($specifications->isNotEmpty())
                    <div class="row">
                        <div class="col-12">
        
                            <div class="accordion" id="accordionExample">
                                @foreach($specifications as $specification)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{$loop->iteration}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse{{$loop->iteration}}" aria-expanded="true"
                                                aria-controls="collapse{{$loop->iteration}}">
                                            <div class="line"></div>
                                            <div class="head">
                                                <img src="{{asset('frontend/images/svg/mega_menu_list.svg')}}"
                                                     alt="">
                                                {{ $specification->title }}
                                            </div>
                                        </button>
                                    </h2>
                                    @if($specification->specifications->isNotEmpty())
                                        <div id="collapse{{$loop->iteration}}"
                                             class="accordion-collapse collapse {{$loop->iteration == 1 ? 'show' : ''}}"
                                             aria-labelledby="heading{{$loop->iteration}}"
                                             data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    @foreach($specification->specifications as $speci_val)
                                                        <li>
                                                            <div class="left">
                                                                <div class="th">
                                                                    {{ $speci_val->title }}
                                                                </div>
                                                            </div>
                                                            <div class="right">
                                                                <div class="td">
                                                                    {{ $speci_val->value }}
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            </div>
        
                        </div>
                    </div>
                @endif
            </div>
        @endif
        <div class="review_section">
            <div class="row">
                <div class="col-12">
                    <h1>Review </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 ratings_reviews_section">
                    <div class="ratings_reviews_left">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <h4>{{ $averageRatings }}</h4>
                            <div class="my-rating-readonly" data-rating="4.5"></div>
                            <h6>{{ $totalRatings }} Ratings & {{ $totalReviews }} Reviews</h6>
                        </div>
                    </div>
                    <div class="ratings_reviews_right_bar">
                        <ul>
                            @for($i=5;$i>=1;$i--)
                            <li>
                                <div class="ratings_reviews_star">
                                    <div class="my-rating-readonly" data-rating="{{ $i }}"></div>
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
                    </div>
                </div>
                <div class="col-lg-5 ratings_reviews_form">
                    <div class="head">
                        <h4>Write A Review</h4>
                        <div class="my-rating" data-rating="0"></div>
                    </div>
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Name*">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <textarea name="" class="form-control form-review" placeholder="Review*"></textarea>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button class="btn">SUBMIT</button>
                        </div>
                    </form>
                </div>
                @if($reviews->isNotEmpty())
                <input type="hidden" name="product_id" id="product_id"
                value="{{$product->id}}">
                <div class="col-12 reviewsList">
                    <h6>Review</h6>
                    <input type="hidden" name="review_offset" id="review_offset"
                    value="{{ $review_offset }}">
                    <ul>
                        @include('web.includes._review_inner',[$reviews, $totalRatings])
                   </ul>
                   
                </div>
                @endif
            </div>
        </div>        


        @if($relatedProducts->isNotEmpty())
            <div class="row recently-viewed">
                <div class="col-12 text-center">
                    <h1>Related Products</h1>
                    <h6 class="subtext">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tu enim ista
                        lenius,
                        hic Stoicorum more nos </h6>
                </div>
                <div class="col-12 g-0">
                    <div class="recently-viewed-slider">
                        @foreach($relatedProducts as $relatedProduct)
                            @include('web.includes.product_box', ['product'=>$relatedProduct])
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
<div class="modal fade login_create" id="bulk_order_form_pop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <i class="fa-solid fa-list"></i> Bulk Enquiry</h5>
                <button type="button" class="btn " data-bs-dismiss="modal" aria-label="Close"><img class="img-fluid" src="{{ asset('frontend/images/svg/colse_login.svg')}}" alt=""></button>
            </div>
            <div class="modal-body">
                <form  action="" method="post" id="bulkenquiryForm" name="bulkenquiryForm">
                    <div class="row">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name*">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email*">
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" id="phone"class="form-control" placeholder="Phone*">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" class="form-control form-message" placeholder="Message*"></textarea>
                            <!-- <input type="password" class="form-control" placeholder="Password*"> -->
                        </div>
                        <input type="hidden" name="subject" value="subject">

                        <input type="hidden" name="type" value="product">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="form-group">    
                            <button class="btn primary_btn form_submit_btn" data-url="/enquiry">Send</button>
                        </div>
                        
                                
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


