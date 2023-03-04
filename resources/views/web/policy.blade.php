@extends('web.layouts.main')
@section('content')



    <section class="innerBanner">
        <div class="innerBannerImageArea">
        {!! Helper::printImage($banner, 'desktop_banner', 'desktop_banner_webp', '', 'img-fluid') !!}
        </div>
        <div class="innerBannerDetails">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>{{ $title }}</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                          
                                <li class="breadcrumb-item"><a href="index.php"><img src="{{asset('frontend/images/home.png')}}"></a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--Inner Banner End-->

<!--Team Conditions Start-->
    <section class="termsPage">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="subHeading">{{@$title}}</h6>
                    <h2 class="mainHeading">{{@$title}}</h2>
                </div>
            </div>
            <div class="row pt-60">
                <div class="col-12">
                    <div class="textArea">
                        <p>
                        <h1>  {!! $siteInformation->$field !!} </h1>
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--Team Conditions End -->




@endsection
@push('scripts')
    
@endpush
