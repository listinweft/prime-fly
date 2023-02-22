@extends('web.layouts.main')
@section('content')


<!--Inner Banner Start-->
<section class="innerBanner">
    <div class="innerBannerImageArea">
    {!! Helper::printImage($banner, 'desktop_banner', 'desktop_banner_webp', '', 'img-fluid') !!}
    </div>
    <div class="innerBannerDetails">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Products</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><img src="{{asset('frontend/images/home.png')}}"
                                                                                 alt=""></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
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
                    <h4>Latest Products</h4>
                    <p>Lorem Ipsum is simply dummy text</p>
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
                            <select class="formSelect" name="" id="">
                            @foreach(['none'=>'None','new'=>'Latest','best'=>'Popular','featured'=>'Most Relevant','asc'=>'Product: A-Z','desc'=>'Product: Z-A'] as $sortValue => $sortTitle)
                                <option value="{{ $sortValue }}"
                                    {{ $sortValue == $sort_value?'selected':'' }}>{{$sortTitle}}</option>
                            @endforeach
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tagArea">
                <h6>Product Tags</h6>
                
                <div class="tagWrapper">


                    <div class="fltr sort_details filterItems">
                        <div class="txt" id="filterResult">
                         tags
                        </div>
                        <button class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                        
                    </div>
                    
                   
                    <a href="javascript:void(0)" class="clear ms-lg-auto">Clear All</a>
                    
                    
                    
                </div>
            </div>
              <div class="productListingWrapper">
             
              @include('web.includes.product_list')
              
                 </div>

           
        </div>
    </div>
</section>


@endsection
@push('scripts')
    
@endpush


