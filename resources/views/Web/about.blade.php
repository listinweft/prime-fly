@extends('web.layouts.main')
@section('content')
    {{-- @include('web.includes.banner') --}}

    <!--Inner Banner Start-->
    <section class="innerBanner">
        <div class="innerBannerImageArea">
            <img class="bannerImg img-fluid" src="{{ asset('frontend/images/banner/banner-07.jpg') }}" alt="">
        </div>
        <div class="innerBannerDetails">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>About Us</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><img
                                            src="{{ asset('frontend/images/home.png') }}" alt=""></a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Inner Banner End-->

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
                        <p>
                            {{ @$about->description }}
                        <h4>
                            {{ @$about->description }}
                        </h4>
                        <p>
                            {{ @$about->description }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="textArea">
                        <p>
                            {{ @$about->description }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="textArea">
                        <p>
                            {{ @$about->description }}
                        </p>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="textArea">
                        <!--                        <p>-->
                        <!--                            Our clients are our prime priority and we always strive to provide exceptional service-->
                        <!--                            quality beyond customer expectations. Whether it’s a simple audio upgrade or a complete-->
                        <!--                            custom fabricated system upgrade, we take great care in providing our clients with exactly-->
                        <!--                            what they want. Discover the unique blend of high proficiency in the installations combined-->
                        <!--                            with the passion to create highly personalized experiences and be confident that your vehicle-->
                        <!--                            is in the best possible hands.-->
                        <!--                        </p>-->
                        <ul>
                            <li>
                                {{ @$about->description }}
                            </li>
                            <li>
                                {{ @$about->description }}
                            </li>
                            <li>
                                {{ @$about->description }}
                            </li>
                            <li>
                                {{ @$about->description }}
                            </li>

                            <li>
                                {{ @$about->description }}
                            </li>
                            <li>
                                {{ @$about->description }}
                            </li>
                        </ul>
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

    <section class="aboutPageShopCategory">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="subHeading">Our Category</h6>
                    <h2 class="mainHeading">Shop By Category</h2>
                    <div class="headingText">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 sliderClass position-relative">
                    <div class="sliderNavShopCategory">
                    </div>
                    <div class="shopCategorySlider">
                        <div class="shopSectionItem shopSectionItemBg1">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-01.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Portraits</h5>
                                <h6>17 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg2">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images//themes/theme-02.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Landscapes</h5>
                                <h6>23 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg3">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-03.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Seascapes</h5>
                                <h6>27 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg4">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-04.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Flowers</h5>
                                <h6>32 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg5">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-05.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Animals</h5>
                                <h6>12 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg6">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-06.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Birds</h5>
                                <h6>30 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg7">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-06.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Birds</h5>
                                <h6>30 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg8">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-04.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Flowers</h5>
                                <h6>32 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg9">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-01.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Portraits</h5>
                                <h6>17 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg10">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-02.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Landscapes</h5>
                                <h6>23 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg11">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-03.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Seascapes</h5>
                                <h6>27 Items</h6>
                            </div>
                        </div>
                        <div class="shopSectionItem shopSectionItemBg12">
                            <div class="wrapper">
                                <div class="imgBox">
                                    <img class="img-fluid" src="{{ asset('frontend/images/themes/theme-05.jpg') }}"
                                        alt="">
                                </div>
                                <h5>Animals</h5>
                                <h6>12 Items</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!--About Us Page End -->
