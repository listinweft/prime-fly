@extends('web.layouts.main')
@section('content')


<!--Inner Banner Start-->
@include('web.includes.banner',[$banner, 'type'=> 'product','title'=>'Products'])
<!--Inner Banner End-->

<!--Product Listing Page Start-->

<section class="productListingPage">
    <div class="row g-0 align-items-start">
        <div class="col-lg-3 sticky-lg-top sticky-lg-top-110 desk_filter_box">
            <div class="offcanvas offcanvas-start category_canvas" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-body">
                    <div class="category_area">
                        <h6 class="heading">
                            <div> Filter</div>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </h6>
                        <div class="ProductListCategory">
                            @include('web.includes.product_filter')
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-9 productListingArea">
       
            <div class="topSortDetails">
                <div>
                    <h4>Products</h4>
                    <p></p>
                </div>
                <div class="sortSearchBox">
                    <a class="btn primary_btn primary_btn_mb" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                        <img src="{{asset('frontend/images/sort.png')}}" alt="...">
                        Filter
                    </a>
                    <ul>
                        <li>
                            <a type="button" data-bs-toggle="offcanvas" data-bs-target="#searchTop"
                               aria-controls="offcanvasTop">
                                <img class="img-fluid" src="{{asset('frontend/images/search.png')}}" alt="">
                            </a>
                        </li>
                        <li>
                            <img class="img-fluid" src="{{asset('frontend/images/sort.png')}}" alt="">
                            <p>Sort By</p>
                            <select class="formSelect" name="sort_order_drop" id="sort_order_drop">
                            @foreach(['none'=>'None','new'=>'Latest','best'=>'Popular','featured'=>'Most Relevant','asc'=>'Product: A-Z','desc'=>'Product: Z-A'] as $sortValue => $sortTitle)
                                <option class="font" value="{{ $sortValue }}"
                                    {{ $sortValue == $sort_value?'selected':'' }}
                                >{{$sortTitle}}</option>
                            @endforeach
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tagArea">
                <h6></h6>
                
                <div class="tagWrapper filterItems" id="filterResult">
                    
                    
                </div>
                <a href="javascript:void(0)" class="clear ms-lg-auto">clear all</a>
            </div>

              <div class="productListingWrapper productList">
             
              @include('web.includes.product_list')
              
                 </div>

           
        </div>
    </div>
</section>


@endsection
@push('scripts')
    
@endpush


