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
                        @php
                        $productPrice = \App\Models\ProductPrice::where('product_id',$product->id)->where('availability','In Stock')->where('stock','!=',0)->first();
                        $class = '';
                        if ($productPrice->availability=='In Stock' && $productPrice->stock!=0) {
                            $class = 'cart-action';
                        }
                        else{
                            $class = 'out-of-stock';
                        }
                        @endphp
                    
                        <li>
                            <a href="javascript:void(0)" class="my_wishlist {{ (Auth::guard('customer')->check())?'wishlist-action':'login-popup' }}
                                    {{ (Auth::guard('customer')->check())?((app('wishlist')->get($product->id))?'fill':''):'' }}"  data-id="{{$product->id}}" data-size="{{$productPrice->size_id}}"  data-product_type_id="{{$product->product_type_id}}"
                                    data-bs-toggle="popover"  id="wishlist_check_{{$product->id}}" 
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
                            @php
                                if($product->frame_color != null){
                                    $frameID = explode(',',$product->frame_color);
                                    $frameColor = \App\Models\Frame::whereIn('id',$frameID)->first()->id;
                                }
                                else{
                                    $frameColor = null;
                                }
                            @endphp
                          
                            <a href="javascript:void(0)" class="my_wishlist  cartBtn {{$class}}" data-frame="{{$frameColor}}" data-mount="Yes" data-id="{{$product->id}}" data-size="{{$productPrice->size_id}}"  data-product_type_id="{{$product->product_type_id}}">
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
                        <!-- {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!} -->
                    
                        <img class="img-fluid" src="{{ asset('frontend/images/productListLogo.png') }}" alt="">
                    </div>
                </div>
            </div>
    </div>
        <div class="product-details">
            <a href="{{ url('/product/'.$product->short_url) }}">
                <div class="pro-name">
                {{ ucfirst($product->title) }}
            </div>
            <ul class="price-area">
                
                
              
              
              
              
                                </ul>
                                <ul class="type-review">
                              
                                </ul>
                            </a>
                        </div>
                </div>
