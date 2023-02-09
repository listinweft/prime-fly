@extends('web.layouts.main')
@section('content')
    @include('web.includes.banner',[$banner,'type'=>'Compare'])
    <section class="compare_page">
        @if(@$products[0] )
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="compare_wrapper">
                        <div class="compare_head">
                            <div class="compare_wd compare_details">
                                <h4>Compare</h4>

                                <h6>{{ $products[0]->title }}
                                    <br>
                                    Vs Other
                                </h6>
                              
                                <h6 class="pt-5">
                                    {{ count(Session::get('compare_products')) }} items
                                </h6>
                            </div>
                          
                            @foreach($products as $product)
                                <div class="compare_wd compare_bg">
                                    @if(!$loop->first)
                                        <button class="btn close_btn close_compare_btn" data-id="{{ $product->id }}">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    @endif
                                    <a href="{{ url('/product/'.$product->short_url) }}">
                                    {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                    </a>
                                    <div class="p_name">{{ $product->title }}</div>
                                    <ul class="price_area">
                                        @if(Helper::offerPrice($product->id)!='')
                                        <li>{{Helper::defaultCurrency().' '.number_format(Helper::offerPriceAmount($product->id),2)}}</li>
                                        <li>{{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}</li>
                                    @else

                                    <li>{{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}</li>
                                    <li></li>
                                    @endif
                                    </ul>
                                </div>
                            @endforeach
                            
                        </div>
                        <div class="compare_head compare_detail_box">
                            <div class="compare_wd compare_details">
                                <h6>
                                    Title
                                </h6>
                            </div>
                            @foreach($products as $product)
                                <div class="compare_wd compare_bg">
                                    <ul class="list_details">
                                        <a href="{{ url('/product/'.$product->short_url) }}">
                                        <li>{{ $product->title }}</li>
                                        </a>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        <div class="compare_head compare_detail_box">
                            <div class="compare_wd compare_details">
                                <h6>
                                    Highlights
                                </h6>
                            </div>
                            @foreach($products as $product)
                            <div class="compare_wd compare_bg">
                                <ul class="list_details">
                                    @if (@$product->capacity)
                                    <li>
                                        Capacity : {{$product->capacity}}
                                    </li>
                                    @endif
                                    @if (@$product->warranty)
                                    <li>
                                        Warranty : {{$product->warranty}}
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="compare_head compare_detail_box">
                            <div class="compare_wd compare_details">
                                <h6>
                                    Features
                                </h6>
                            </div>
                            @foreach($products as $product)
                            <div class="compare_wd compare_bg">
                                <ul class="list_details">
                               
                                    
                                    <li>
                                        {!!$product->featured_description!!}
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="compare_head compare_detail_box">
                            <div class="compare_wd compare_details">
                                <h6>
                                    Key Features
                                </h6>
                            </div>
                            @foreach ($products as $product)
                                <div class="compare_wd compare_bg">
                                    @if($product->activeKeyfeatures->isNotEmpty())
                                    <ul class="list_details">
                                    @foreach($product->activeKeyfeatures->sortBy('sort_order') as $keyFeature)
                                        
                                                <li> 
                                                    {{ $keyFeature->title }} <br> <br>
                                                </li>
                                                @endforeach
                                            </ul>
                                     @endif
                                </div>
                            @endforeach
                            
                        </div>
                        <div class="compare_head compare_detail_box">
                            <div class="compare_wd compare_details">
                                <h6>
                                    Model Number
                                </h6>
                            </div>
                            @foreach ($products as $product)
                                <div class="compare_wd compare_bg">
                                    <ul class="list_details">
                                            
                                        @if (@$product->sku)
                                        <li>
                                            {{$product->sku}}
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                          
                            
                        </div>
                        <div class="compare_head compare_detail_box">
                            <div class="compare_wd compare_details">
                                <h6>
                                    Category
                                </h6>
                            </div>
                            @foreach ($products as $product)
                                <div class="compare_wd compare_bg">
                                        @foreach($product->product_categories as $product_category)
                                      
                                        <ul class="list_details">
                                            <li>
                                                {{ $product_category->title }}
                                            </li>
                                        </ul>
                                     @endforeach
                                </div>
                            @endforeach
                            
                        </div>
                        <div class="compare_head compare_detail_box">
                            <div class="compare_wd compare_details">
                                <h6 class="pt-5">
                                    items
                                </h6>
                            </div>
                            @foreach($products as $product)
                            <a href="{{ url('/product/'.$product->short_url) }}">
                                <div class="compare_wd compare_bg">
                                    {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                    <div class="p_name">
                                        {{ $product->title }}
                                    </div>
                                    </a>
                                    <ul class="price_area">
                                        @if(Helper::offerPrice($product->id)!='')
                                            <li>{{Helper::defaultCurrency().' '.number_format(Helper::offerPriceAmount($product->id),2)}}</li>
                                            <li>{{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}</li>
                                        @else
                                            <li>{{Helper::defaultCurrency().' '.number_format(Helper::defaultCurrencyRate()*$product->price,2)}}</li>
                                        <li></li>
                                        @endif
                                    </ul>
                                    <br>
                                    <a  href="javascript:void(0)" data-id="{{$product->id}}" class="primary_btn cartBtn {{ ($product->availability=='In Stock' && $product->stock!=0)?'cart-action':'out-of-stock' }}"><i class="fa-solid fa-cart-shopping"></i> Add To Cart</a>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
@endsection