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
                                        @if($row->attributes['mount'] == 'Yes')
                                        Mount :
                                            <span> With Mount</span>
                                        @elseif($row->attributes['mount'] == 'No')
                                            <span> No Mount</span>
                                        @endif
                                    </li>
                                    @endif
                                    @if($row->attributes['size'] != null)
                                    <li>
                                        @php
                                        $size = App\Models\Size::find($row->attributes['size']);
                                    @endphp
                                        Size : 
                                        <span> {{ $size->title }}</span>
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

                                @if(Helper::offerPrice($product->id)!='')
                                <li>
                                    @php
                                        $offerId =Helper::offerId($product->id);
                                    @endphp
                                    {{Helper::defaultCurrency().' '.number_format(Helper::offerPriceSize($product->id,$row->attributes['size'],$offerId),2)}}
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
                            @php
                                $productPrice = App\Models\ProductPrice::where('product_id',$product->id)->where('size_id',$row->attributes['size'])->first();
                                $stock = [];
                                $display = 'd-none';
                                $class = 'inStock';
                              //push stock in array
                              foreach ($productPrice as $key => $value) {
                                $istock[$productPrice->id] = $productPrice->availability;
                              }
                              if(in_array('Out of Stock', $istock)){
                                $display = 'block';
                                $class = 'outOfStock';
                              }
                            @endphp
                            
                              <div class="productNameStock productDetailsInfo" @if($productPrice->availability=='In Stock' && $productPrice->stock!=0)  hidden @else  @endif>
                              <div class=" stock outOfStock outstock">  Out of Stock </div> </div>
                         
                                <div class="quantity-counter " @if($productPrice->availability=='In Stock' && $productPrice->stock!=0)   @else  hidden @endif>
                                    <button class="btn btn-quantity-down">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </button>
                                    <input type="number" class="input-number__input form-control2 form-control-lg cartQuantity" min="1" max="100" step="1" value="{{$row->quantity}}"data-id="{{$row->id}}" data-size ={{$row->attributes['size']}} data-product_id = {{$row->attributes['product_id']}}>
                                    <button class="btn btn-quantity-up">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </button>
                                </div>
                            </div>
                            <div class="total_price_btns">
                                <div class="total_price">
                                    
                                    <h6 class="price{{$row->id}}">  {{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*number_format($row->price * $row->quantity,2))}}</h6>
                                </div>
                                <div class="btns_area">
                                    @if(Auth::guard('customer')->check())
                                        <a data-id="{{$product->id}}" data-cart_id="{{$row->id}}" data-size ="{{$row->attributes['size']}}"
                                            class="btn_cart my_wishlist  {{ (Auth::guard('customer')->check())?'wishlist-action':'login-popup' }}"
                                            id="wishlist_check_{{$product->id}}"
                                            href="javascript:void(0) "><i class="fa-solid fa-heart"></i></a>
                                    @endif
                                    <a class="btn_cart remove-cart-item" href="javascript:void(0)" data-id="{{$row->id}}"  id="{{$row->id}}" ><i class="fa-solid fa-xmark"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="update_cart">
                        <br>
                        
                        <a class="btn primary_btn {{$display}}" style="color:red">Cart contain out of stock products</a>
                    </div>
                </div>
              
              
                <div class="col-lg-4 sticky-lg-top sticky-lg-top-110 " >
                    <div class="order_summary">
                    @include('web.includes.order_summary',['button_class' => $class])
                    </div>
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

@if(@$recently_viewed_products->isNotEmpty())
    @include('web.includes.recently_viewed_products',['recentlyViewedProducts' => $recently_viewed_products])
    @endif
@endsection


