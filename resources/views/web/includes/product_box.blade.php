<div class="col-6 product_card_flex" title="{{ $product->brand ?$product->brand->title.' - ': '' }}
{{ $product->title }} {{ $product->measurementUnit ? ' ' .$product->quantity.$product->measurementUnit->symbol: '' }}">
    <div class="product_item_card">
        <div class="buttons_box">
            <ul>
                <li>
                    <a href="javascript:void(0)" class="icon_box my_wishlist add_compare_product
                    {{Session::exists('compare_products')? (in_array($product->id, array_column(Session::get('compare_products'), 'product_id'))? 'fill':''):'' }}"
                       data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover"
                       data-bs-content="Compare" data-id="{{ $product->id }}">
                        <div class="comprae_icon">
                            <i class="fa-solid fa-code-compare"></i>
                        </div>
                    </a>
                </li>
                <li>
                    <a data-id="{{$product->id}}"  href="javascript:void(0)" class="icon_box my_wishlist {{ (Auth::guard('customer')->check())?'wishlist-action':'login-popup' }}"
                         data-bs-toggle="popover"  id="wishlist_check_{{$product->id}}" 
                        data-bs-placement="left" data-bs-trigger="hover" data-bs-content="Wishlist">
                        <span
                            id="wishlist_check_span_{{$product->id}}"
                            class="wishlist-image {{ (Auth::guard('customer')->check())?((app('wishlist')->get($product->id))?'fill':''):'' }}">
                        <i class="fa-solid fa-heart"></i></span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" data-id="{{$product->id}}"
                     class="icon_box my_wishlist cartBtn {{ ($product->availability=='In Stock' && $product->stock!=0)?'cart-action':'out-of-stock' }}" 
                     data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover" data-bs-content="Cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="product_item_body">
            <div class="product_top">
                <div class="sale_new_tag_wrapper">
                    @foreach($product->product_categories as $product_category)
                        <div class="product_tag">
                            <a href="{{ url('category/'.$product_category->short_url) }}">
                                <p>{{ $product_category->title }}</p>
                            </a>
                        </div>
                        @endforeach
                        @if($product->availability=='Out of Stock')
                        <div class="sale">
                            Out of Stock     
                        </div>
                        @else
                        <div class="sale">
                            Sale  
                        </div>
                        @endif
                        @if($product->new_arrival=='Yes')
                        <div class="new">
                            New     
                        </div>
                        @endif
                </div>
              
                {{-- <div class="compare">
                    <a href="javascript:void(0)" class="my_wishlist add_compare_product
                    {{Session::exists('compare_products')? (in_array($product->id, array_column(Session::get('compare_products'), 'product_id'))? 'fill':''):'' }}"
                       data-bs-toggle="popover" data-bs-placement="left" data-bs-trigger="hover"
                       data-bs-content="Compare" data-id="{{ $product->id }}">
                        <div class="comprae_icon">
                            <i class="fa-solid fa-code-compare"></i>
                        </div>
                    </a>
                </div> --}}
            </div>
            <a href="{{ url('/product/'.$product->short_url) }}">
                <div class="product_item_top_image">
                    <br><br>
                    {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                </div>
            </a>
            <div class="product_item_cnt text-center">
                <a href="{{ url('/product/'.$product->short_url) }}" class="text">
                    <h5>{{ $product->title }}</h5>
                </a>
                @if(Helper::averageRating($product->id)>0)
                <div class="rate_area">
                    <i class="fa-solid fa-star"></i>{{ Helper::averageRating($product->id) }}                                                                                           
                </div>
                @endif
                <ul class="price_area">
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
            </div>
        </div>
    </div>
</div>
