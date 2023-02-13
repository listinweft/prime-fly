@extends('web.layouts.main')
@section('content')
@include('web.includes.banner')
<div class="relatedProducts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Recently Viewed</h3>
                <section id="demos">
                    <div class="relatedSlider owl-carousel owl-theme ">
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo"src="{{ asset('frontend/images/product/product01.jpg')}}" loading="lazy"  alt="">
                                            </a>
                                        </div>
                                        <div class="cartWishlistBox">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
                                                        <div class="textIcon">
                                                            Wishlist
                                                        </div>
                                                        <div class="iconBox">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
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
                                                <img class="img-fluid"src="{{ asset('frontend/images/productListLogo.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a href="product-details.php">
                                        <div class="pro-name">
                                            Lorem Ipsum is simply dummy text of the printing
                                        </div>
                                        <ul class="price-area">
                                            <li class="offer">
                                                AED 10055
                                            </li>
                                            <li>
                                                AED 8000
                                            </li>
                                        </ul>
                                        <ul class="type-review">
                                            <li>
                                                Landscape
                                            </li>
                                            <li class="review">
                                                <i class="fa-solid fa-star"></i> 4.5
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo"src="{{ asset('frontend/images/product/product02.jpg')}}" loading="lazy"  alt="">
                                            </a>
                                        </div>
                                        <div class="cartWishlistBox">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
                                                        <div class="textIcon">
                                                            Wishlist
                                                        </div>
                                                        <div class="iconBox">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
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
                                                <img class="img-fluid"src="{{ asset('frontend/images/productListLogo.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a href="product-details.php">
                                        <div class="pro-name">
                                            Lorem Ipsum is simply dummy text of the printing
                                        </div>
                                        <ul class="price-area">
                                            <li class="offer">
                                                AED 10055
                                            </li>
                                            <li>
                                                AED 8000
                                            </li>
                                        </ul>
                                        <ul class="type-review">
                                            <li>
                                                Landscape
                                            </li>
                                            <li class="review">
                                                <i class="fa-solid fa-star"></i> 4.5
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo"src="{{ asset('frontend/images/product/product03.jpg')}}" loading="lazy"  alt="">
                                            </a>
                                        </div>
                                        <div class="cartWishlistBox">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
                                                        <div class="textIcon">
                                                            Wishlist
                                                        </div>
                                                        <div class="iconBox">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
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
                                                <img class="img-fluid"src="{{ asset('frontend/images/productListLogo.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a href="product-details.php">
                                        <div class="pro-name">
                                            Lorem Ipsum is simply dummy text of the printing
                                        </div>
                                        <ul class="price-area">
                                            <li class="offer">
                                                AED 10055
                                            </li>
                                            <li>
                                                AED 8000
                                            </li>
                                        </ul>
                                        <ul class="type-review">
                                            <li>
                                                Landscape
                                            </li>
                                            <li class="review">
                                                <i class="fa-solid fa-star"></i> 4.5
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo"src="{{ asset('frontend/images/product/product05.jpg')}}" loading="lazy"  alt="">
                                            </a>
                                        </div>
                                        <div class="cartWishlistBox">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
                                                        <div class="textIcon">
                                                            Wishlist
                                                        </div>
                                                        <div class="iconBox">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
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
                                                <img class="img-fluid"src="{{ asset('frontend/images/productListLogo.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a href="product-details.php">
                                        <div class="pro-name">
                                            Lorem Ipsum is simply dummy text of the printing
                                        </div>
                                        <ul class="price-area">
                                            <li class="offer">
                                                AED 10055
                                            </li>
                                            <li>
                                                AED 8000
                                            </li>
                                        </ul>
                                        <ul class="type-review">
                                            <li>
                                                Landscape
                                            </li>
                                            <li class="review">
                                                <i class="fa-solid fa-star"></i> 4.5
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo"src="{{ asset('frontend/images/product/product07.jpg')}}" loading="lazy"  alt="">
                                            </a>
                                        </div>
                                        <div class="cartWishlistBox">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
                                                        <div class="textIcon">
                                                            Wishlist
                                                        </div>
                                                        <div class="iconBox">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
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
                                                <img class="img-fluid"src="{{ asset('frontend/images/productListLogo.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a href="product-details.php">
                                        <div class="pro-name">
                                            Lorem Ipsum is simply dummy text of the printing
                                        </div>
                                        <ul class="price-area">
                                            <li class="offer">
                                                AED 10055
                                            </li>
                                            <li>
                                                AED 8000
                                            </li>
                                        </ul>
                                        <ul class="type-review">
                                            <li>
                                                Landscape
                                            </li>
                                            <li class="review">
                                                <i class="fa-solid fa-star"></i> 4.5
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo"src="{{ asset('frontend/images/product/product03.jpg')}}" loading="lazy"  alt="">
                                            </a>
                                        </div>
                                        <div class="cartWishlistBox">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
                                                        <div class="textIcon">
                                                            Wishlist
                                                        </div>
                                                        <div class="iconBox">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
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
                                                <img class="img-fluid"src="{{ asset('frontend/images/productListLogo.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a href="product-details.php">
                                        <div class="pro-name">
                                            Lorem Ipsum is simply dummy text of the printing
                                        </div>
                                        <ul class="price-area">
                                            <li class="offer">
                                                AED 10055
                                            </li>
                                            <li>
                                                AED 8000
                                            </li>
                                        </ul>
                                        <ul class="type-review">
                                            <li>
                                                Landscape
                                            </li>
                                            <li class="review">
                                                <i class="fa-solid fa-star"></i> 4.5
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo"src="{{ asset('frontend/images/product/product05.jpg')}}" loading="lazy"  alt="">
                                            </a>
                                        </div>
                                        <div class="cartWishlistBox">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
                                                        <div class="textIcon">
                                                            Wishlist
                                                        </div>
                                                        <div class="iconBox">
                                                            <i class="fa-regular fa-heart"></i>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" class="my_wishlist">
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
                                                <img class="img-fluid"src="{{ asset('frontend/images/productListLogo.png')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a href="product-details.php">
                                        <div class="pro-name">
                                            Lorem Ipsum is simply dummy text of the printing
                                        </div>
                                        <ul class="price-area">
                                            <li class="offer">
                                                AED 10055
                                            </li>
                                            <li>
                                                AED 8000
                                            </li>
                                        </ul>
                                        <ul class="type-review">
                                            <li>
                                                Landscape
                                            </li>
                                            <li class="review">
                                                <i class="fa-solid fa-star"></i> 4.5
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<!--Home Collection Start-->
    <section class="collectionsArea">
        <div class="collectionsBgback">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="subHeading">Our Collections</h6>
                    <h2 class="mainHeading"> {!! $ourcollection->title !!} </h2>
                    <div class="headingText">
                        <p>
                        {!! $ourcollection->description !!}
                        </p>
                    </div>
                </div>
                <div class="col-12 pt-60">
                    <div class="collectionsAreaWrapper">
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage($ourcollection, 'mobile_image', 'mobile_image_webp', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5>Lorem ipsum dolor sit.</h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing
                                    </p>
                                    <a class="primary_btn" href="">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage($ourcollection, 'mobile_image1', 'mobile_image_webp1', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5>Lorem Ipsum</h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing
                                    </p>
                                    <a class="primary_btn" href="">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage($ourcollection, 'mobile_image2', 'mobile_image_webp2', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5>Lorem Ipsum</h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing
                                    </p>
                                    <a class="primary_btn" href="">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage($ourcollection, 'mobile_image3', 'mobile_image_webp3', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5>Lorem Ipsum</h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing
                                    </p>
                                    <a class="primary_btn" href="">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage($ourcollection, 'mobile_image4', 'mobile_image_webp4', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5>Lorem Ipsum</h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing
                                    </p>
                                    <a class="primary_btn" href="">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="collectionsAreaItems">
                        {!! Helper::printImage($ourcollection, 'mobile_image5', 'mobile_image_webp5', '', 'img-fluid') !!}
                            <div class="overlayBox">
                                <div class="wrapperCnt">
                                    <h5>Lorem Ipsum</h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing
                                    </p>
                                    <a class="primary_btn" href="">
                                        Explore More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--Home Collection End-->

<!--Home Shop By Theme Start-->
    <div class="shopSection">
        <div class="container">
            <div class="col-12 text-center">
                <h6 class="subHeading">Our Themes</h6>
                <h2 class="mainHeading">Shop By Themes</h2>
                <div class="headingText">
                    <p>
                        Artemyst has made it easy to decorate your home with the art you love. We've created a wide range of beautiful designs for all tastes.
                    </p>
                </div>
            </div>
            <div class="col-12 pt-60">
                <div class="shopSectionWrapper">
                    <div class="shopSectionItem shopSectionItemBg1">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-01.jpg')}}" alt="">
                            </div>
                            <h5>Portraits</h5>
                            <h6>17 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg2">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-02.jpg')}}" alt="">
                            </div>
                            <h5>Landscapes</h5>
                            <h6>23 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg3">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-03.jpg')}}" alt="">
                            </div>
                            <h5>Seascapes</h5>
                            <h6>27 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg4">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-04.jpg')}}" alt="">
                            </div>
                            <h5>Flowers</h5>
                            <h6>32 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg5">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-05.jpg')}}" alt="">
                            </div>
                            <h5>Animals</h5>
                            <h6>12 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg6">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-06.jpg')}}" alt="">
                            </div>
                            <h5>Birds</h5>
                            <h6>30 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg1">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-06.jpg')}}" alt="">
                            </div>
                            <h5>Birds</h5>
                            <h6>30 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg2">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-04.jpg')}}" alt="">
                            </div>
                            <h5>Flowers</h5>
                            <h6>32 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg3">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-01.jpg')}}" alt="">
                            </div>
                            <h5>Portraits</h5>
                            <h6>17 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg4">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-02.jpg')}}" alt="">
                            </div>
                            <h5>Landscapes</h5>
                            <h6>23 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg5">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-03.jpg')}}" alt="">
                            </div>
                            <h5>Seascapes</h5>
                            <h6>27 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg6">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-05.jpg')}}" alt="">
                            </div>
                            <h5>Animals</h5>
                            <h6>12 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg1">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-02.jpg')}}" alt="">
                            </div>
                            <h5>Landscapes</h5>
                            <h6>23 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg2">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-01.jpg')}}" alt="">
                            </div>
                            <h5>Portraits</h5>
                            <h6>17 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg3">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-06.jpg')}}" alt="">
                            </div>
                            <h5>Birds</h5>
                            <h6>30 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg4">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-04.jpg')}}" alt="">
                            </div>
                            <h5>Flowers</h5>
                            <h6>32 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg5">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-05.jpg')}}" alt="">
                            </div>
                            <h5>Animals</h5>
                            <h6>12 Items</h6>
                        </div>
                    </div>
                    <div class="shopSectionItem shopSectionItemBg6">
                        <div class="wrapper">
                            <div class="imgBox">
                                <img class="img-fluid"src="{{ asset('frontend/images/themes/themes-03.jpg')}}" alt="">
                            </div>
                            <h5>Seascapes</h5>
                            <h6>27 Items</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Home Shop By Theme End-->

<!--Home Services Start-->
    <section class="serviceHome">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="subHeading">Our Selection</h6>
                    <h2 class="mainHeading">Find Your Inspiration</h2>
                    <div class="headingText">
                        <p>
                            Our goal is to keep things fresh and bring you inspired canvases with new styles and themes.
                        </p>
                    </div>
                </div>
                <div class="col-12 pt-60">
                    <div class="selectionWrapper">
                        <div class="item">
                            <div class="product-image-wrapper">
                                <img class="img-fluid"src="{{ asset('frontend/images/product/product03.jpg')}}" alt="">
                            </div>
                            <div class="cntOverlay">
                                <div class="w-100">
                                    <a href="">
                                        <h6>Contemporary Art</h6>
                                        <p>Poster Art</p>
                                        <div class="starPrice">
                                            <div class="my-rating-readonly" data-rating="4"></div>
                                            <div class="price">
                                                <ul>
                                                    <li class="offer">$ 10055</li>
                                                    <li>$ 80000</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image-wrapper">
                                <img class="img-fluid"src="{{ asset('frontend/images/product/product01.jpg')}}" alt="">
                            </div>
                            <div class="cntOverlay">
                                <div class="w-100">
                                    <a href="">
                                        <h6>Contemporary Art</h6>
                                        <p>Poster Art</p>
                                        <div class="starPrice">
                                            <div class="my-rating-readonly" data-rating="4"></div>
                                            <div class="price">
                                                <ul>
                                                    <li class="offer">$ 1055</li>
                                                    <li>$ 800</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image-wrapper">
                                <img class="img-fluid"src="{{ asset('frontend/images/product/product02.jpg')}}" alt="">
                            </div>
                            <div class="cntOverlay">
                                <div class="w-100">
                                    <a href="">
                                        <h6>Contemporary Art</h6>
                                        <p>Poster Art</p>
                                        <div class="starPrice">
                                            <div class="my-rating-readonly" data-rating="4"></div>
                                            <div class="price">
                                                <ul>
                                                    <li class="offer">$ 1055</li>
                                                    <li>$ 800</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image-wrapper">
                                <img class="img-fluid"src="{{ asset('frontend/images/product/product04.jpg')}}" alt="">
                            </div>
                            <div class="cntOverlay">
                                <div class="w-100">
                                    <a href="">
                                        <h6>Contemporary Art</h6>
                                        <p>Poster Art</p>
                                        <div class="starPrice">
                                            <div class="my-rating-readonly" data-rating="4"></div>
                                            <div class="price">
                                                <ul>
                                                    <li class="offer">$ 1055</li>
                                                    <li>$ 800</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image-wrapper">
                                <img class="img-fluid"src="{{ asset('frontend/images/product/product05.jpg')}}" alt="">
                            </div>
                            <div class="cntOverlay">
                                <div class="w-100">
                                    <a href="">
                                        <h6>Contemporary Art</h6>
                                        <p>Poster Art</p>
                                        <div class="starPrice">
                                            <div class="my-rating-readonly" data-rating="4"></div>
                                            <div class="price">
                                                <ul>
                                                    <li class="offer">$ 1055</li>
                                                    <li>$ 800</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image-wrapper">
                                <img class="img-fluid"src="{{ asset('frontend/images/product/product06.jpg')}}" alt="">
                            </div>
                            <div class="cntOverlay">
                                <div class="w-100">
                                    <a href="">
                                        <h6>Contemporary Art</h6>
                                        <p>Poster Art</p>
                                        <div class="starPrice">
                                            <div class="my-rating-readonly" data-rating="4"></div>
                                            <div class="price">
                                                <ul>
                                                    <li class="offer">$ 1055</li>
                                                    <li>$ 800</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image-wrapper">
                                <img class="img-fluid"src="{{ asset('frontend/images/product/product07.jpg')}}" alt="">
                            </div>
                            <div class="cntOverlay">
                                <div class="w-100">
                                    <a href="">
                                        <h6>Contemporary Art</h6>
                                        <p>Poster Art</p>
                                        <div class="starPrice">
                                            <div class="my-rating-readonly" data-rating="4"></div>
                                            <div class="price">
                                                <ul>
                                                    <li class="offer">$ 1055</li>
                                                    <li>$ 800</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="product-image-wrapper">
                                <img class="img-fluid"src="{{ asset('frontend/images/product/product02.jpg')}}" alt="">
                            </div>
                            <div class="cntOverlay">
                                <div class="w-100">
                                    <a href="">
                                        <h6>Contemporary Art</h6>
                                        <p>Poster Art</p>
                                        <div class="starPrice">
                                            <div class="my-rating-readonly" data-rating="4"></div>
                                            <div class="price">
                                                <ul>
                                                    <li class="offer">$ 1055</li>
                                                    <li>$ 800</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--Home Services End-->

<!--Home Testimonial Start-->
    <section class="testimonialSection">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="subHeading">{{$homeHeadings->title}}</h6>
                    <h2 class="mainHeading">{{$homeHeadings->subtitle}}</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-10 col-12 pt-60">
               
                    <div class="testimonialsSlider">
                    @foreach( $testimonials as $blog)
                        <div class="testimonialsCard">
                            <div class="testimonialsProfile">
                                <div class="leftPhoto">
                                {!! Helper::printImage($blog, 'image', 'image_webp', '', 'img-fluid') !!}
                                </div>
                                <div class="rightDetails">
                                    <h3>{{ $blog->name }}</h3>
                                    <h6>{{ $blog->designation }}</h6>
                                    <div class="reviewIconStar">
                                        <div class="icon">
                                            <img class="imgBox"src="{{ asset('frontend/images/google.png')}}" alt="">
                                        </div>
                                        <div class="my-rating-readonly" data-rating={{$blog->rating}}></div>
                                    </div>
                                </div>
                            </div>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                                took a galley of type and scrambled it to make a type specimen book  industry's standard
                                dummy text ever since the 1500s. Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                                a type specimen book  industry's standard dummy text ever since the 1500s.
                            </p>
                        </div>
                        @endforeach
                        
                       
                    </div>
                    
                </div>
                <div class="col-12 text-center mt-md-5">
                    <a href="" class="primary_btn">Add Your Review</a>
                </div>
            </div>
        </div>
    </section>
<!--Home Testimonial End-->
@endsection
@push('scripts')
    
@endpush