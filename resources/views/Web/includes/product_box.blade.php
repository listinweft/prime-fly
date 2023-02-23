<div class="product-item-info">
                    <div class="product-photo ">

                            <div class="product-image-container w-100">
                                <div class="product-image-wrapper">
                                    <a href="{{ url('/product/'.$product->short_url) }}" tabindex="-1">
                                    {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100 product-image-photo') !!}
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
                                    <img class="img-fluid" src="{{ asset('frontend/images/productListLogo.png')}}" alt="">
                                   
                                  
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
                                    <i class="fa-solid fa-star"></i>{{ Helper::averageRating($product->id) 
                                </li>
                                @endif
                            </ul>
                        </a>
                    </div>
                </div>