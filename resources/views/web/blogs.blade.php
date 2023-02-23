

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
                        <h1>Blogs</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><img src="assets/images/home.png" alt=""></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blogListingPage">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="subHeading">Our Blogs</h6>
                    <h2 class="mainHeading">Blogs</h2>
                    <div class="headingText">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                        </p>
                    </div>
                </div>
            </div>
            <div class="row pt-60 position-relative">
    @include('web._blog_list')

</section>
    @endsection
@push('scripts')
    
@endpush

