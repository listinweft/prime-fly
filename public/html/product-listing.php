<?php include('assets/includes/header.php') ?>


<!--Inner Banner Start-->
<section class="innerBanner">
    <div class="innerBannerImageArea">
        <img class="bannerImg img-fluid" src="assets/images/banner/banner-09.jpg" alt="">
    </div>
    <div class="innerBannerDetails">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Products</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><img src="assets/images/home.png"
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

                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            <div class="form-check title">
                                                <label class="form-check-label label_bold" for="flexCheckDefault">
                                                    Category
                                                </label>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body">
                                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingOne1">
                                                        <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne1" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne1">
                                                            <div class="form-check">
                                                                <input class="form-check-input" checked type="checkbox" value="" id="flexCheckDefault01">
                                                                <label class="form-check-label" for="flexCheckDefault01">
                                                                    Category 1
                                                                </label>
                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapseOne1" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne1">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault02">
                                                                        <label class="form-check-label" for="flexCheckDefault02">
                                                                            Subcategory 1
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault03">
                                                                        <label class="form-check-label" for="flexCheckDefault03">
                                                                            Subcategory 2
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault04">
                                                                        <label class="form-check-label" for="flexCheckDefault04">
                                                                            Subcategory 3
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault05">
                                                                        <label class="form-check-label" for="flexCheckDefault05">
                                                                            Subcategory 4
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo2">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo2" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault100">
                                                                <label class="form-check-label" for="flexCheckDefault100">
                                                                    Category 2
                                                                </label>
                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapseTwo2" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo2">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault101">
                                                                        <label class="form-check-label" for="flexCheckDefault101">
                                                                            Subcategory 1
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault102">
                                                                        <label class="form-check-label" for="flexCheckDefault102">
                                                                            Subcategory 2
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault103">
                                                                        <label class="form-check-label" for="flexCheckDefault103">
                                                                            Subcategory 3
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault104">
                                                                        <label class="form-check-label" for="flexCheckDefault104">
                                                                            Subcategory 4
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault105">
                                                                        <label class="form-check-label" for="flexCheckDefault105">
                                                                            Subcategory 5
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree3">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree3" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault200">
                                                                <label class="form-check-label" for="flexCheckDefault200">
                                                                    Category 3
                                                                </label>
                                                            </div>
                                                        </button>
                                                    </h2>
                                                    <div id="panelsStayOpen-collapseThree3" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree3">
                                                        <div class="accordion-body">
                                                            <ul>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault201">
                                                                        <label class="form-check-label" for="flexCheckDefault201">
                                                                            Subcategory 1
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault202">
                                                                        <label class="form-check-label" for="flexCheckDefault202">
                                                                            Subcategory 2
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault203">
                                                                        <label class="form-check-label" for="flexCheckDefault203">
                                                                            Subcategory 3
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="true" aria-controls="panelsStayOpen-collapseTwo">
                                            <div class="form-check title">
                                                <label class="form-check-label label_bold" for="flexCheckDefault">
                                                    Color
                                                </label>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body">
                                            <div class="colorWrapper">
                                                <a href="javascript:void(0)" class="colorItem colorItemFilterClick">
                                                    <div class="colorBox" style="background: #292929">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #FFFFFF">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #71A9BA">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #637372">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #F5F4DF">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #75829D">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #BDB8CE">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #FBC9CC">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #EF7F55">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #BDC39F">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #E1C564">
                                                    </div>
                                                </a>
                                                <a href="javascript:void(0)" class="colorItemFilterClick">
                                                    <div class="colorBox" style="background: #C4CACE">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="true" aria-controls="panelsStayOpen-collapseThree">
                                            <div class="form-check title">
                                                <label class="form-check-label label_bold" for="flexCheckDefault">
                                                    Price
                                                </label>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                                        <div class="priceRagerArea">
                                            <div class="slider-range-wrap">
                                                <div class="currencyBox">AED</div>
                                                <div id="slider-range"></div>
                                                <div class="d-flex align-items-center justify-content-between w-100">
                                                    <span class="min-range">100</span>
                                                    <span class="max-range">1,000</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="true" aria-controls="panelsStayOpen-collapseFour">
                                            <div class="form-check title">
                                                <label class="form-check-label label_bold" for="flexCheckDefault">
                                                    SHAPE
                                                </label>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFour">
                                        <div class="shapeArea">
                                            <a href="javascript:void(0)" class="shapeFilterClick">
                                                <img class="Img-fluid" src="assets/images/shapePortrait.jpg" alt="">
                                                <h6>Portrait</h6>
                                            </a>
                                            <a href="javascript:void(0)" class="shapeFilterClick">
                                                <img class="Img-fluid" src="assets/images/shapeLandscape.jpg" alt="">
                                                <h6>Landscape</h6>
                                            </a>
                                            <a href="javascript:void(0)" class="shapeFilterClick">
                                                <img class="Img-fluid" src="assets/images/shapeSquare.jpg" alt="">
                                                <h6>Square</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-headingFive">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="true" aria-controls="panelsStayOpen-collapseFive">
                                            <div class="form-check title">
                                                <label class="form-check-label label_bold" for="flexCheckDefault">
                                                    Product tags
                                                </label>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFive">
                                        <div class="productTagArea">
                                            <a href="javascript:void(0)" class="tagFilterClick">
                                                Seascape
                                            </a>
                                            <a href="javascript:void(0)" class="tagFilterClick">
                                                Canvas
                                            </a>
                                            <a href="javascript:void(0)" class="tagFilterClick">
                                                Acrylic
                                            </a>
                                            <a href="javascript:void(0)" class="tagFilterClick">
                                                Art
                                            </a>
                                            <a href="javascript:void(0)" class="tagFilterClick">
                                                Abstract
                                            </a>
                                            <a href="javascript:void(0)" class="tagFilterClick">
                                                Contemporary
                                            </a>
                                            <a href="javascript:void(0)" class="tagFilterClick">
                                                Texture
                                            </a>
                                            <a href="javascript:void(0)" class="tagFilterClick">
                                                Illustration
                                            </a>
                                            <a href="javascript:void(0)" class="tagFilterClick">
                                                Gestural
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <img src="assets/images/sort.png" alt="...">
                        Filter
                    </a>
                    <ul>
                        <li>
                            <a type="button" data-bs-toggle="offcanvas" data-bs-target="#searchTop"
                               aria-controls="offcanvasTop">
                                <img class="img-fluid" src="assets/images/search.png" alt="">
                            </a>
                        </li>
                        <li>
                            <img class="img-fluid" src="assets/images/sort.png" alt="">
                            <p>Sort By</p>
                            <select class="formSelect" name="" id="">
                                <option value="">New Products</option>
                                <option value="">A - Z</option>
                                <option value="">Z - A</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tagArea">
                <h6>Product Tags</h6>
                <div class="tagWrapper">
                    <div class="fltr">
                        <div class="txt">
                            Tag line
                        </div>
                        <button class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="fltr">
                        <div class="txt">
                            Tag line
                        </div>
                        <button class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="fltr">
                        <div class="txt">
                            Tag line
                        </div>
                        <button class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="fltr">
                        <div class="txt">
                            Tag line
                        </div>
                        <button class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="productListingWrapper">
                <div class="product-item-info">
                    <div class="product-photo ">

                            <div class="product-image-container w-100">
                                <div class="product-image-wrapper">
                                    <a href="product-details.php" tabindex="-1">
                                        <img class="product-image-photo" src="assets/images/product/product01.jpg" loading="lazy"  alt="">
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
                                        <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product02.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
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
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product03.jpg" loading="lazy"  alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
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
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product04.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
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
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product05.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
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
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product06.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details">
                        <a href="">
                            <div class="pro-name">
                                Lorem Ipsum is simply dummy text of the printing
                            </div>
                            <ul class="price-area">
                                <li class="offer">
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product07.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details">
                        <a href="">
                            <div class="pro-name">
                                Lorem Ipsum is simply dummy text of the printing
                            </div>
                            <ul class="price-area">
                                <li class="offer">
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product08.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details">
                        <a href="">
                            <div class="pro-name">
                                Lorem Ipsum is simply dummy text of the printing
                            </div>
                            <ul class="price-area">
                                <li class="offer">
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product09.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
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
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product010.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details">
                        <a href="">
                            <div class="pro-name">
                                Lorem Ipsum is simply dummy text of the printing
                            </div>
                            <ul class="price-area">
                                <li class="offer">
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product03.jpg" loading="lazy"  alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details">
                        <a href="">
                            <div class="pro-name">
                                Lorem Ipsum is simply dummy text of the printing
                            </div>
                            <ul class="price-area">
                                <li class="offer">
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product04.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details">
                        <a href="">
                            <div class="pro-name">
                                Lorem Ipsum is simply dummy text of the printing
                            </div>
                            <ul class="price-area">
                                <li class="offer">
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product05.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-details">
                        <a href="">
                            <div class="pro-name">
                                Lorem Ipsum is simply dummy text of the printing
                            </div>
                            <ul class="price-area">
                                <li class="offer">
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                    <img class="product-image-photo" src="assets/images/product/product06.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
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
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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
                <div class="product-item-info">
                    <div class="product-photo ">
                        <div class="product-image-container w-100">
                            <div class="product-image-wrapper">
                                <a href="product-details.php" tabindex="-1">
                                <img class="product-image-photo" src="assets/images/product/product07.jpg" loading="lazy" alt="">
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
                                    <img class="img-fluid" src="assets/images/productListLogo.png" alt="">
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
                                    AED 1055
                                </li>
                                <li>
                                    AED 800
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

            <div class="row">
                <div class="col-12 text-center">
                    <a class="primary_btn" href="">Load More</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Product Listing Page End -->


<?php include('assets/includes/footer.php') ?>
