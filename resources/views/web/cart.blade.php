@extends('web.layouts.main')
@section('content')
@include('web.includes.banner',[$banner, 'title'=> 'Cart','type'=> 'cart'])



@if (Session::has('session_key') && !Cart::session($sessionKey)->isEmpty())


<section class="my_cart_section">
    @if (!Cart::session($sessionKey)->isEmpty())
        <div class="container position-relative">
            <div class="row align-items-start">
                <h5>( {{ Helper::getCartItemCount() }} Items) <br> <br></h5>
                <br>
                <div class="col-lg-8 cart_left">
                    @foreach(Cart::session($sessionKey)->getContent()->sort() as $row)
                    @php
                    $product = App\Models\Product::find($row->attributes['product_id']);
                    @endphp
                    <div class="my_cart_list">
                        <div class="my_cart_product_card">
                            <div class="product_image">
                                <a href="{{ url('/product/'.$product->short_url) }}">
                                    {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                </a>
                            </div>
                            <div class="product_name">
                                <a href="{{ url('/product/'.$product->short_url) }}">
                                    <h6>
                                        {{ $product->title }}
                                    </h6>
                                </a>
                                <ul>
                                    <li>
                                        Type :
                                       
                                            <span> {{ $product->productType->title }}</span>
                                   
                                    </li>
                                    @if($row->attributes['frame'] != null)
                                    <li>
                                        Frame Colour :
                                    @php
                                        $frame = App\Models\Frame::find($row->attributes['frame']);
                                    @endphp
                                        <span> {{ $frame->title }}</span>
                                    </li>
                                    @endif
                                    @if($row->attributes['mount'] != null)
                                    <li>
                                        Mount : 
                                        @if($row->attributes['mount'] == 'Yes')
                                            <span> With Mount</span>
                                        @else
                                            <span> No Mount</span>
                                        @endif
                                    </li>
                                    @endif
                                  
                                </ul>
                            </div>
                        </div>
                        <div class="right">
                            <div class="price_offer_quantity">
                                <ul class="price_area">
                                    @php
                            $price = \App\Models\ProductPrice::where('product_id',$product->id)->where('size_id',$row->attributes['size'])->first();
                        @endphp
                            <!-- <li class="offer">
                            @if(Helper::offerPrice($product->id)!='')
                            </li>
                            @endif -->
                            @if(Helper::offerPrice($product->id)!='')
                            <li>
                                {{Helper::defaultCurrency().' '.number_format(Helper::offerPriceAmount($product->id),2)}}
                            </li>
                            <li>
                                {{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$price->price,2)}}
                            </li>                  
                            @else
                            <li>
                                {{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$price->price,2)}}
                            </li>
                            <li></li>
                            @endif
                                </ul>
                                <div class="quantity-counter">
                                    <button class="btn btn-quantity-down">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </button>
                                    <input type="number" class="input-number__input form-control2 form-control-lg cartQuantity" min="1" max="100" step="1" value="{{$row->quantity}}"data-id="{{$row->id}}">
                                    <button class="btn btn-quantity-up">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="total_price_btns">
                                <div class="total_price">
                                    <h6 class="price{{$product->id}}">{{Helper::defaultCurrency()}} {{number_format($row->price * $row->quantity,2)}}</h6>
                                </div>
                                <div class="btns_area">
                                    @if(Auth::guard('customer')->check())
                                        <a data-id="{{$product->id}}"
                                            class="btn_cart my_wishlist  {{ (Auth::guard('customer')->check())?'wishlist-action':'login-popup' }}"
                                            id="wishlist_check_{{$product->id}}"
                                            href="javascript:void(0) "><i class="fa-solid fa-heart"></i></a>
                                    @endif
                                    <a class="btn_cart remove-cart-item" href="javascript:void(0)" data-id="{{$row->id}}"   ><i class="fa-solid fa-xmark"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4 sticky-lg-top sticky-lg-top-110">
                    @include('web.includes.order_summary')
                   
                </div>
            </div>
        </div>
    @endif
</section>

@else
<section class="emptyCart">
    <div class="container">
        <div class="row">
            <div class="col-md-3"> 
                <br>
                <br>
            </div>
            <div class="col-md-6 text-center">
                <br>
                <br>
                <picture>
                    <img class="img-fluid mb-4" src="{{asset('frontend/images/emptyCart.png')}}" alt="">
                </picture>
                <br>
                <a href="{{ url('/') }}" class="conShop">
                    <i class="fa-sharp fa-solid fa-arrow-left-long"></i>
                    Continue Shopping <br>
                    <br>
                </a>
                <br>
            </div>
            <div class="col-md-3">
                <br>
            </div>
        </div>
    </div>
</section>
@endif
@if(@$recently_viewed_products)
<section class="recommended-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h4>Recently Viewed Products</h4>
                </div>
                <div class="recommended-slider">

                    @foreach($recently_viewed_products as $recent_product)

                        @include('web.includes.product_card',['product'=>$recent_product->product])

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif`
@endsection