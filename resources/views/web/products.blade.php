@extends('web.layouts.main')

@section('content')
    @include('web.includes.banner',[$banner,'type'=>'Products'])
    <section class="product_listing_page">
        <div class="container">
            <div class="row pb-3">
                <div class="col-xl-8 col-lg-8">
                    <h1 id="productListingTitle">{{$title}}</h1>
                    @if($offset>1)
                        <p>1-<span id="product_count">{{ $offset }} </span>
                            of <span id="total_product_count">{{$totalProducts}}</span>
                            results.
                        </p>
                    @endif
                </div>
                <div class="col-xl-4 col-lg-4 sort_wrapper">
                    <div class="sort_area">
                        <div class="left">
                            <img class="" src="{{ asset('frontend/images/svg/sort.svg')}}" alt="">
                            <p>SORT BY :</p>
                        </div>
                        <select name="sort_order_drop" id="sort_order_drop"
                                class="form-select">
                            @foreach(['none'=>'None','new'=>'Latest','best'=>'Popular','featured'=>'Most Relevant','asc'=>'Product: A-Z','desc'=>'Product: Z-A'] as $sortValue => $sortTitle)
                                <option class="font" value="{{ $sortValue }}"
                                    {{ $sortValue == $sort_value?'selected':'' }}
                                >{{$sortTitle}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 product-tag filteredContents" style="display: none;">
                    <h6>FILTERED BY:</h6>
                    <div class="sort_details filterItems" id="filterResult"></div>
                    <a href="javascript:void(0)" class="clear ms-lg-auto">Clear All</a>
                </div>
            </div>
            <div class="row align-items-start">
                @include('web.includes.product_filter')
                <div class="col-lg-8 productList">
                    @include('web.includes.product_list')
                </div>
            </div>
        </div>
    </section>
@endsection
