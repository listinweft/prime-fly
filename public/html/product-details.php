<?php include('assets/includes/header.php') ?>


<!--Inner Banner Start-->
<section class="innerBanner innerBannerProducts">
    <div class="innerBannerImageArea">
        <img class="bannerImg img-fluid" src="assets/images/banner/banner-09.jpg" alt="">
    </div>
    <div class="innerBannerDetails">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Product Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><img src="assets/images/home.png" alt=""></a></li>
                            <li class="breadcrumb-item"><a href="product-listing.php">Products</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Inner Banner End-->

<!--Product Details Page Start-->

<section class="productDetailsPage">
    <div class="container">
        <div class="row justify-content-between align-items-start">
            <div class="col-xxl-5  col-lg-5 product_details_gallery art-prints">
                <div class="row sliderWrapperArea ">
                    <div class=" col-9 productDetailsLeftSecond " >
                        <div class="productDetailsLargeImages">
<!--                            <div class="item position-relative">-->
<!--                                <div class="fotorama__stage__frame fotorama__loaded magnify-wheel-loaded fotorama__active" >-->
<!--                                    <div class="fotorama__html">-->
<!--                                        <img class="art-prints fotorama__img" src="https://image.drawdeck.com/catalog/product/cache/c990ca6a58d31f9a3644f6bd076a6b08/l/a/lazyday_090222.jpg" aria-hidden="false">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="item position-relative">
                                <div class="fotorama__stage__frame fotorama__loaded magnify-wheel-loaded" >
                                    <div class="fotorama__html">
                                        <img class="art-prints fotorama__img" src="assets/images/product/product02.jpg" aria-hidden="false">
                                    </div>
                                </div>
                            </div>
                            <div class="item position-relative">
                                <div class="fotorama__stage__frame fotorama__loaded magnify-wheel-loaded" >
                                    <div class="fotorama__html">
                                        <img class="fotorama__img" src="assets/images/frame/art-prints.jpg" aria-hidden="false">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-3 productDetailsLeftFirst" >
                        <div class="productDetailsThumbs">
<!--                            <div class="fotorama__nav__frame">-->
<!--                                <div class="fotorama__thumb fotorama_horizontal_ratio fotorama__loaded fotorama__loaded--img">-->
<!--                                    <img src="https://image.drawdeck.com/catalog/product/cache/c990ca6a58d31f9a3644f6bd076a6b08/l/a/lazyday_090222.jpg" class="fotorama__img">-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="fotorama__nav__frame ">
                                <div class="fotorama__thumb fotorama_vertical_ratio fotorama__loaded fotorama__loaded--img">
                                    <img src="assets/images/product/product02.jpg" class="fotorama__img">
                                </div>
                            </div>
                            <div class="fotorama__nav__frame ">
                                <div class="fotorama__thumb fotorama_vertical_ratio fotorama__loaded fotorama__loaded--img">
                                    <img src="assets/images/frame/art-prints.jpg" class="fotorama__img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-7 col-lg-7 productDetailsInfo ps-xxl-5 ps-xl-4">
                <div class="productNameStock">
                    <div class="name">
                        <h4>Lorem ipsum dolor sit amet.</h4>
                    </div>
<!--                    <div class="stock">-->
<!--                        In Stock-->
<!--                    </div>-->
                    <div class="stock outOfStock">
                        out of stock
                    </div>
                </div>
                <div class="productRatingPrice">
                    <div class="rating">
                        <h6>1,098 Ratings</h6>
                        <div class="rate_area">
                            <i class="fa-solid fa-star"></i> 4.5
                        </div>
                    </div>
                    <div class="price">
                        <h5>AED 12020.28</h5>
                    </div>
                </div>
                <div class="productCode">
                    <h5>
                        Product Code : <strong>ART345699</strong>
                    </h5>
                </div>
                <div class="textArea">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.
                    </p>
                    <ul>
                        <li>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </li>
                        <li>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        </li>
                    </ul>
                </div>

                <div class="relatedProductsTypesSelect">
                    <h5>
                        Select Product Type
                    </h5>
                    <div class="relatedProductsTypesWrapper">
                        <div class="item active">
                            <a href="product-details.php">
                                <img class="img-fluid" src="assets/images/productTypes/type-00.jpg" alt="">
                                <p>Print Only</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="product-details-canvas.php">
                                <img class="img-fluid" src="assets/images/productTypes/type-01.jpg" alt="">
                                <p>Canvas</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="product-details-stretched-canvas.php">
                                <img class="img-fluid" src="assets/images/productTypes/type-02.jpg" alt="">
                                <p>Stretched Canvas</p>
                            </a>
                        </div>
                        <div class="item">
                            <a href="product-details-framed-canvas.php">
                                <img class="img-fluid" src="assets/images/productTypes/type-03.jpg" alt="">
                                <p>Framed Canvas</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="relatedProductsTypesSelect">
                    <h5>
                        Select Size <span>(Size in cms)</span>
                    </h5>
                    <div class="relatedProductsTypesWrapper sizeSection">
                        <div class="item active">
                            <div class="sizeImageBox">
                                <img class="img-fluid" src="assets/images/productTypes/50_50.png" alt="">
                            </div>
                            <p>50 X 50</p>
                        </div>
                        <div class="item">
                            <div class="sizeImageBox">
                                <img class="img-fluid" src="assets/images/productTypes/75_75.png" alt="">
                            </div>
                            <p>75 X 75</p>
                        </div>
                        <div class="item disabledItem">
                            <div class="sizeImageBox">
                                <img class="img-fluid" src="assets/images/productTypes/40_40.png" alt="">
                            </div>
                            <p>40 X 50</p>
                        </div>
                        <div class="item">
                            <div class="sizeImageBox">
                                <img class="img-fluid" src="assets/images/productTypes/60_75.png" alt="">
                            </div>
                            <p>60 X 75</p>
                        </div>
                    </div>
                </div>

<!--                <div class="relatedProductsTypesSelect">-->
<!--                    <h5>-->
<!--                        Select Frame Color-->
<!--                    </h5>-->
<!--                    <div class="relatedProductsTypesWrapper">-->
<!--                        <div class="item active">-->
<!--                            <div class="colorBox" style="background: #FFFFFF">-->
<!---->
<!--                            </div>-->
<!--                            <p>White</p>-->
<!--                        </div>-->
<!--                        <div class="item ">-->
<!--                            <div class="colorBox" style="background: #000000">-->
<!---->
<!--                            </div>-->
<!--                            <p>Black</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="totalBox">
                    <h5>
                        Total
                    </h5>
                    <div class="priceQuantityArea">
                        <div class="priceArea">
                            <h3>AED 12020.28</h3>
                            <h6>
                                AED 13020.28
                            </h6>
                        </div>
                        <div class="quantity_parice_order_area">
                            <div class="quantity-counter">
                                <button class="btn btn-quantity-down">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </button>
                                <input type="number" disabled class="input-number__input form-control2 form-control-lg" min="1" max="100" step="1" value="1">
                                <button class="btn btn-quantity-up">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="btnsArea">
                       <a href="javascript:void(0)" data-id="{{$product->id}}" class="primary_btn cartBtn {{ ($product->availability=='In Stock' && $product->stock!=0)?'cart-action':'out-of-stock' }}">Add to Cart</a>
                        <a class="primary_btn secondary_btn" href="" data-bs-target="#bulk_order_form_pop" data-bs-toggle="modal" data-bs-dismiss="modal" >Bulk Enquiry</a>
                    </div>
                </div>

                <div class="tagArea">
                    <h6>Product Tags</h6>
                    <div class="tag">Abstract</div>
                    <div class="tag">Art</div>
                    <div class="tag">Canvas</div>
                    <div class="tag">Acrylic</div>
                    <div class="tag">Portrait</div>
                    <div class="tag">Nature</div>
                </div>

            </div>
        </div>
        <div class="moreDetails">
            <div class="row">
                <div class="col-12">
                    <h4>
                        About This Item
                    </h4>
                    <div class="textArea">
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                            of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                            but also the leap into electronic typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.
                        </p>
                        <ul>
                            <li>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                the industry's
                            </li>
                            <li>
                                It has survived not only five centuries,
                                but also the leap into electronic typesetting, remaining essentially unchanged.
                            </li>
                            <li>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </li>
                            <li>
                                It has survived not only five centuries,
                                but also the leap into electronic typesetting, remaining essentially unchanged.
                            </li>
                            <li>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                the industry's
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-5">
                    <img class="img-fluid" src="assets/images/moreDetails.jpg" alt="">
                </div>
                <div class="col-lg-5 right ps-xl-5">
                    <div class="textArea">
                        <div>
                            <h3>
                                Lorem Ipsum is simply dummy text
                            </h3>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book. It has
                                survived not only five centuries, but also the leap into electronic typesetting,
                                remaining essentially unchanged.
                            </p>
                            <ul>
                                <li>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                    the industry's
                                </li>
                                <li>
                                    It has survived not only five centuries,
                                    but also the leap into electronic typesetting, remaining essentially unchanged.
                                </li>
                                <li>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </li>
                                <li>
                                    It has survived not only five centuries,
                                    but also the leap into electronic typesetting, remaining essentially unchanged.
                                </li>
                                <li>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                                    the industry's
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Product Details Page End -->

<!--Reviews Section Start-->

<section class="reviewSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pe-xl-5">
                <div class="reviewDetailsLeft">
                    <div class="left">
                        <h5>Customer Reviews</h5>
                        <p>What others think about the item</p>
                        <h6>162 Customer Ratings</h6>
                        <div class="my-rating-readonly" data-rating="4"></div>
                    </div>
                    <div class="right">
                        <h5><img src="assets/images/star.png" alt="">4.5</h5>
                        <p>Average customer rating</p>
                    </div>
                </div>
                <div class="ratings_reviews_right_bar">
                    <h6>Reviews</h6>
                    <ul>
                        <li>
                            <div class="ratings_reviews_star">
                                <p>5<img src="assets/images/star.png" alt=""></p>
                            </div>
                            <div class="ratings_reviews_bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>
                                    106
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="ratings_reviews_star">
                                <p>4<img src="assets/images/star.png" alt=""></p>
                            </div>
                            <div class="ratings_reviews_bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>
                                    56
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="ratings_reviews_star">
                                <p>3<img src="assets/images/star.png" alt=""></p>
                            </div>
                            <div class="ratings_reviews_bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>
                                    0
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="ratings_reviews_star">
                                <p>2<img src="assets/images/star.png" alt=""></p>
                            </div>
                            <div class="ratings_reviews_bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>
                                    5
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="ratings_reviews_star">
                                <p>1<img src="assets/images/star.png" alt=""></p>
                            </div>
                            <div class="ratings_reviews_bar">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p>
                                    0
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="formArea">
                    <div class="head">
                        <h5>Write A Review</h5>
                        <div class="my-rating" data-rating="0"></div>
                    </div>
                    <div class="row">
                        <div class=" col-12">
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <img src="assets/images/loginUser.png" alt="">
                                <input type="text" class="form-control" placeholder="Full Name">
                            </div>
                        </div>
                        <div class=" col-12">
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <img src="assets/images/icon-email.png" alt="">
                                <input type="text" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class="col-12 message">
                            <div class="form-group">
                                <label for="">Message</label>
                                <img src="assets/images/icon-pen.png" alt="">
                                <textarea class="form-control" placeholder="Say Something"></textarea>
                            </div>
                        </div>
                        <div class="col-12x ">
                            <div class="form-group d-flex align-items-end mb-0">
                                <button type="submit" class="primary_btn ">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Reviews Section End-->

<!-- Testimonial Start-->
<section class="testimonialSection productTestimonialSection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-12 pt-60">
                <div class="testimonialsSlider">
                    <div class="testimonialsCard">
                        <div class="testimonialsProfile">
                            <div class="leftPhoto">
                                <img class="img-fluid" src="assets/images/testimonail.png" alt="">
                            </div>
                            <div class="rightDetails">
                                <h3>Daisy Welch</h3>
                                <h6>Chief Branding Producer</h6>
                                <div class="reviewIconStar">
                                    <div class="icon">
                                        <img class="imgBox" src="assets/images/google.png" alt="">
                                    </div>
                                    <div class="my-rating-readonly" data-rating="5"></div>
                                </div>
                            </div>
                        </div>
                        <div class="textWrapper">
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
                    </div>
                    <div class="testimonialsCard">
                        <div class="testimonialsProfile">
                            <div class="leftPhoto">
                                <img class="img-fluid" src="assets/images/testimonail.png" alt="">
                            </div>
                            <div class="rightDetails">
                                <h3>Ishan Ali</h3>
                                <h6>Business Analyst</h6>
                                <div class="reviewIconStar">
                                    <div class="my-rating-readonly" data-rating="5"></div>
                                </div>
                            </div>
                        </div>
                        <div class="textWrapper">
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
                    </div>
                    <div class="testimonialsCard">
                        <div class="testimonialsProfile">
                            <div class="leftPhoto">
                                <img class="img-fluid" src="assets/images/testimonail.png" alt="">
                            </div>
                            <div class="rightDetails">
                                <h3>Daisy Welch</h3>
                                <h6>Chief Branding Producer</h6>
                                <div class="reviewIconStar">
                                    <div class="icon">
                                        <img class="imgBox" src="assets/images/google.png" alt="">
                                    </div>
                                    <div class="my-rating-readonly" data-rating="5"></div>
                                </div>
                            </div>
                        </div>
                        <div class="textWrapper">
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
                    </div>
                </div>
            </div>
            <div class="col-12 text-center mt-md-5">
                <a href="" class="primary_btn">Add Your Review</a>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial End-->

<div class="relatedProducts youMayAlsoLike">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>You May Also Like </h3>
                <section id="demos">
                    <div class="relatedSlider owl-carousel owl-theme ">
                        <div class="item">
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
                        </div>
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo" src="assets/images/product/product02.jpg" loading="lazy"  alt="">
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
                        </div>
                        <div class="item">
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
                                                <img class="product-image-photo" src="assets/images/product/product05.jpg" loading="lazy"  alt="">
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
                        </div>
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo" src="assets/images/product/product07.jpg" loading="lazy"  alt="">
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
                        </div>
                        <div class="item">
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
                                                <img class="product-image-photo" src="assets/images/product/product05.jpg" loading="lazy"  alt="">
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
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<div class="relatedProducts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3>Related Products</h3>
                <section id="demos">
                    <div class="relatedSlider owl-carousel owl-theme ">
                        <div class="item">
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
                        </div>
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo" src="assets/images/product/product02.jpg" loading="lazy"  alt="">
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
                        </div>
                        <div class="item">
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
                                                <img class="product-image-photo" src="assets/images/product/product05.jpg" loading="lazy"  alt="">
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
                        </div>
                        <div class="item">
                            <div class="product-item-info">
                                <div class="product-photo ">

                                    <div class="product-image-container w-100">
                                        <div class="product-image-wrapper">
                                            <a href="product-details.php" tabindex="-1">
                                                <img class="product-image-photo" src="assets/images/product/product07.jpg" loading="lazy"  alt="">
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
                        </div>
                        <div class="item">
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
                                                <img class="product-image-photo" src="assets/images/product/product05.jpg" loading="lazy"  alt="">
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
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>



<section class="bottomStickyBar">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="bottomItemWrapper">
                    <div class="imageName">
                        <div class="imgBox">
                            <img class="img-fluid" src="assets/images/product/product02.jpg" alt="">
                        </div>
                        <div class="name">
                            <p>
                                Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet.
                            </p>
                        </div>
                    </div>
                    <div class="qntyAddBtn">
                        <div class="quantity-counter">
                            <button class="btn btn-quantity-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                            <input type="number" disabled class="input-number__input form-control2 form-control-lg" min="1" max="100" step="1" value="1">
                            <button class="btn btn-quantity-up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                        </div>
                       <a href="javascript:void(0)" data-id="{{$product->id}}" class="primary_btn cartBtn {{ ($product->availability=='In Stock' && $product->stock!=0)?'cart-action':'out-of-stock' }}">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('assets/includes/footer.php') ?>
