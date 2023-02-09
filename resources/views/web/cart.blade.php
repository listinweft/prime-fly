@extends('web.layouts.main')
@section('content')
@include('web.includes.banner',[$banner, 'type'=> 'cart'])
@if (Session::has('session_key') && !Cart::session($sessionKey)->isEmpty())
    <section class="my_cart_section">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 cart_left">
                    <h3>My CART</h3>
                    <span>( {{ Helper::getCartItemCount() }} Items) <br></span>
                    <br>
                    @foreach(Cart::session($sessionKey)->getContent()->sort() as $row)
                        @php
                            $product = App\Models\Product::find($row->id);
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
                                        <h6>{{ $product->title }}</h6>
                                    </a>
                                </div>
                            </div>
                        </a>
                        <div class="right">
                            <div class="price_offer_quantity">
                                <ul class="price_area">
                                    @if(Helper::offerPrice($product->id)!='')
                                    <li>{{Helper::defaultCurrency().' '.number_format(Helper::offerPriceAmount($product->id),2)}}</li>
                                    <li>{{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}</li>
                                @else
                                <li>{{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}</li>
                                <li></li>
                                @endif
                                </ul>
                                <div class="quantity-counter">
                                    <button class="btn btn-quantity-down">
                                        <svg xmlns="http://www.w3.org/2000/svg" 
                                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                    </button>
                                    <input type="number" class="input-number__input form-control2 form-control-lg cartQuantity" min="1" max="100" step="1"  name="quantity"
                                    value="{{$row->quantity}}" title="Qty" data-id="{{$row->id}}">
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
                                        <a  data-id="{{$product->id}}"  href="javascript:void(0)" class="icon_box btn_cart my_wishlist {{ (Auth::guard('customer')->check())?'wishlist-action':'login-popup' }}"
                                            data-bs-toggle="popover"  id="wishlist_check_{{$product->id}}" 
                                           data-bs-placement="left" data-bs-trigger="hover" data-bs-content="Wishlist"><i class="fa-solid fa-heart"></i></a>
                                        <a class="btn_cart my_wishlist add_compare_product
                                        {{Session::exists('compare_products')? (in_array($product->id, array_column(Session::get('compare_products'), 'product_id'))? 'fill':''):'' }} "  data-id="{{ $product->id }}"  href="javascript:void(0)">
                                        <i class="fa-solid fa-code-compare" id="my_compare"></i></a>

                                        <a class="btn_cart my_wishlist remove-cart-item"    data-id="{{$row->id}}"  href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>
                                    @else
                                    <a class="btn_cart my_wishlist add_compare_product
                                    {{Session::exists('compare_products')? (in_array($product->id, array_column(Session::get('compare_products'), 'product_id'))? 'fill':''):'' }} "  data-id="{{ $product->id }}"  href="javascript:void(0)">
                                    <i class="fa-solid fa-code-compare" id="my_compare"></i></a>
                                    <a class="btn_cart my_wishlist remove-cart-item"    data-id="{{$row->id}}"  href="javascript:void(0)"><i class="fa-solid fa-xmark"></i></a>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="update_cart">
                        <a href="{{url('products')}}"><i
                        class="fa-solid fa-arrow-left-long"></i>Continue Shopping</a>
                    </div>

                </div>
                <div class="col-lg-4 sticky-lg-top sticky-lg-top-110">
                    @include('web.includes.order_summary')
                  
                </div>
            </div>
        </div>
       
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
    @endif
    </section>
@else
<section class="emptyCart">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-center">
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


{{-- <div class="btn-group  compare_btn_test compare_count_item dropup d-none" id="compare_count">
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
                <img src="assets/images/products/products_04(1000).png" class="d-block w-100" alt="...">
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
                <img src="assets/images/products/products_03(1000).png" class="d-block w-100" alt="...">
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
                <img src="assets/images/products/products_04(1000).png" class="d-block w-100" alt="...">
            </picture>
            <div class="p_name">
                Air Fryer ME-AF993B
            </div>
        </div>
    </li>
  </ul>
</div> --}}

<div class="modal fade confirm_remove" id="removeCartItemModal" data-bs-backdrop="static" data-bs-keyboard="false"
tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
   <div class="modal-content">
       <div class="modal-body text-center">
           <p>Are you sure you want to remove this item?</p>
           <button type="button" class="btn btn-secondary cancel-remove-cart-item" data-bs-dismiss="modal">
               Cancel
           </button>
           <button type="button" class="btn btn-primary remove-cart-item" data-id="">Remove</button>
       </div>
   </div>
</div>
</div>

@if($featuredProducts->isNotEmpty())
<div class="row recently-viewed">
    <div class="col-12 text-center">
        <h1>Featured Products</h1>
       
    </div>
    <div class="col-12 g-0">
        <div class="recently-viewed-slider">
            @foreach($featuredProducts as $featuredProduct)
                @include('web.includes.product_box', ['product'=>$featuredProduct])
            @endforeach
        </div>
    </div>
</div>
@endif
@endsection