@extends('web.layouts.main')
@section('content')

@include('web.includes.banner',[$banner, 'title'=> 'About Us','type'=> 'about']) 



    <!--About Us Page Start-->
    <section class="aboutUsPage">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-5 position-relative pb-50">
                    <div class="aboutImageBox">
                        {!! Helper::printImage($about, 'image', 'image_webp', '', 'img-fluid') !!}
                    </div>
                    <div class="artLog">
                        <img class="img-fluid artemystLogo" src="{{ asset('frontend/images/artemystLogo.png') }}"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <h6 class="subHeading">{{ @$about->subtitle }}</h6>
                    <h2 class="mainHeading">{{ @$about->title }}</h2>
                    <div class="textArea">
                        
                            {!! @$about->description !!}
                        
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="textArea">
                        {!! @$about->description !!}
                      
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="aboutAdd">
        <a href="#">
            {!! Helper::printImage($about, 'banner_image', 'banner_image_webp', '' , 'img-fluid') !!}
        </a>
    </section>
    @if(@$themes)
        <section class="aboutPageShopCategory">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        {{-- <h6 class="subHeading">{!! @$home_heading->subtitle !!}</h6> --}}
                        <h6 class="subHeading">{{ @$catHomeHeadings->subtitle }} </h6>
                        <h2 class="mainHeading">{!! @$catHomeHeadings->title !!}</h2>
                        <div class="headingText">
                            <p>
                                {!! @$catHomeHeadings->description !!}
                            
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-lg-12 sliderClass position-relative">
                        <div class="sliderNavShopCategory">
                        </div>
                        <div class="shopCategorySlider">
                            @php
                            $n =1;
                        @endphp
                        @foreach ($themes as $theme)
                        <a href="{{url('category/'.$theme->short_url)}}">
                            <div class="shopSectionItem shopSectionItemBg{{$n}}">
                                <div class="wrapper">
                                    <div class="imgBox">
                                        {!! Helper::printImage(@$theme, 'image', 'image_webp', '', 'img-fluid') !!}
                                    </div>
                                    <h5>{{$theme->title}}</h5>
                                    @php
                                     $productCategory = \DB::table('product_category')->where('id',$theme->id)->get();
                                     //count of products under category id
                                     $prdoucts = \App\Models\Product::where('copy','no')->get();
                                $productIds = $prdoucts->pluck('id')->toArray();
                                     $count = \DB::table('product_category')->where('category_id',$theme->id)->whereIn('product_id',$productIds)->count();
                                    @endphp
                                  
                                    <h6>{{@$count }} items</h6>
                                </div>
                            </div>
                        </a>
                            @php
                            $n++;
                            if($n==6){
                                $n=1;
                            }
                        @endphp
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
<!--About Us Page End -->
