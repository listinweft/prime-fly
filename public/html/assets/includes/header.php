<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To ARTEMYST</title>


    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/star-rating-svg.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/xzoom/1.0.15/xzoom.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="http:////code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body id="go-to-top">



<!--Top Header Start-->

<section class="topHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-3 hamburgerMenuArea">
                <a class="" data-bs-toggle="offcanvas" href="#hamburgerMenu" role="button"
                   aria-controls="offcanvasExample">
                    <img class="img-fluid" src="assets/images/hamburgerMenuIcon.png" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-6 artemyst">
                <a href="index.php">
                    <img class="img-fluid artemystLogo" src="assets/images/artemystLogo.png" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-3 topRightArea">
                <ul class="topRightAreaUl">
                    <li>
                        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#searchTop"
                           aria-controls="offcanvasTop">
                            <img class="img-fluid" src="assets/images/search.png" alt="">
                        </a>
                    </li>
                    <li class="currency">
                        <img class="img-fluid language-flag" src="assets/images/currency/aed.png" alt="">
                        <select id="language-selector">
                            <option data-img="assets/images/currency/aed.png">
                                AED
                            </option>
                            <option data-img="assets/images/currency/usd.png">
                                USD
                            </option>
                        </select>
                    </li>
                    <li class="cart">
                        <a class="position-relative" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#cartListRight" aria-controls="offcanvasRight">
                            <img class="img-fluid" src="assets/images/bag.png" alt="">
                            <span class="position-absolute top-0 start-100  badge rounded-pill bg-danger">
                                23
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <img class="img-fluid" src="assets/images/wishlist.png" alt="">
                        </a>
                    </li>
                    <li class="login">
                        <div class="dropdown">
                            <a class="userBox dropdown-toggle" type="button" id="dropdownMenuButton1"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-fluid icon" src="assets/images/user.png" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="register.php">Register</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--Top Header End-->

<!--Main Menu Start-->

<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active"><a class="nav-link" href="product-listing.php">Shop All </a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php"> Portraits </a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php"> Landscapes </a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php"> Objects </a></li>
                    <li class="nav-item"><a class="nav-link" href="errorPage.php"> Best seller </a></li>
<!--                    <li class="nav-item dropdown ">-->
<!--                        <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown"> Media </a>-->
<!--                        <ul class="dropdown-menu dropdown-menu-end single_drop">-->
<!--                            <li><a class="dropdown-item" href="blog.php"> Blog</a></li>-->
<!--                            <li><a class="dropdown-item" href="portfolio.php"> Portfolio </a></li>-->
<!--                            <li><a class="dropdown-item" href="errorPage.php"> Videos </a></li>-->
<!--                        </ul>-->
<!--                    </li>-->
                    <li class="nav-item"><a class="nav-link" href="blog.php"> New arrivals </a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!--Main Menu End-->


<!-- Hamburger Menu Start -->

<div class="offcanvas offcanvas-start hamburgerMenu" tabindex="-1" id="hamburgerMenu" aria-labelledby="offcanvasExampleLabel"
     data-bs-backdrop="true">
    <div class="offcanvas-header">
        <a href="">
            <img class="img-fluid artemystLogo" src="assets/images/artemystLogo.png" alt="">
        </a>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <nav class="navbar mobile-menubar">
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="product-listing.php">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-01.png" alt="">
                            </div>
                            Shop All
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="errorPage.php">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-02.png" alt="">
                            </div>
                            Objects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product-listing.php">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-03.png" alt="">
                            </div>
                            Best Seller
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product-listing.php">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-04.png" alt="">
                            </div>
                            New Arrivals
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="shop-page.html" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-05.png" alt="">
                            </div>
                            Colors
                        </a>
                        <ul class="dropdown-menu">
                            <div class="colorWrapper">
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10200">
                                        <label class="colorBox" style="background: #292929" for="flexCheckDefault10200">
                                        </label>
                                    </div>
                                </div>
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10300">
                                        <label class="colorBox" style="background: #FFFFFF" for="flexCheckDefault10300">
                                        </label>
                                    </div>
                                </div>
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10400">
                                        <label class="colorBox" style="background: #71A9BA" for="flexCheckDefault10400">
                                        </label>
                                    </div>
                                </div>
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10500">
                                        <label class="colorBox" style="background: #637372" for="flexCheckDefault10500">
                                        </label>
                                    </div>
                                </div>
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10600">
                                        <label class="colorBox" style="background: #F5F4DF" for="flexCheckDefault10600">
                                        </label>
                                    </div>
                                </div>
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10700">
                                        <label class="colorBox" style="background: #75829D" for="flexCheckDefault10700">
                                        </label>
                                    </div>
                                </div>
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10800">
                                        <label class="colorBox" style="background: #BDB8CE" for="flexCheckDefault10800">
                                        </label>
                                    </div>
                                </div>
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault10900">
                                        <label class="colorBox" style="background: #FBC9CC" for="flexCheckDefault10900">
                                        </label>
                                    </div>
                                </div>

                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault101000">
                                        <label class="colorBox" style="background: #EF7F55" for="flexCheckDefault101000">
                                        </label>
                                    </div>
                                </div>
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault101100">
                                        <label class="colorBox" style="background: #BDC39F" for="flexCheckDefault101100">
                                        </label>
                                    </div>
                                </div>
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault101200">
                                        <label class="colorBox" style="background: #E1C564" for="flexCheckDefault101200">
                                        </label>
                                    </div>
                                </div>
                                <div class="colorItem">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault101300">
                                        <label class="colorBox" style="background: #C4CACE" for="flexCheckDefault101300">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="shop-page.html" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-06.png" alt="">
                            </div>
                            Shapes
                        </a>
                        <ul class="dropdown-menu" style="">
                            <li class="has-megasubmenu">
                                <a class="dropdown-item " href="#" >
                                    <div class="iconBox">
                                        <img class="img-fluid" src="assets/images/menu/menu-07.png" alt="">
                                    </div>
                                    Portraits
                                </a>
                            </li>
                            <li class="has-megasubmenu">
                                <a class="dropdown-item " href="#" >
                                    <div class="iconBox">
                                        <img class="img-fluid" src="assets/images/menu/menu-08.png" alt="">
                                    </div>
                                    Landscapes
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.php">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-09.png" alt="">
                            </div>
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-010.png" alt="">
                            </div>
                            Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my-account.php">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-011.png" alt="">
                            </div>
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactUs.php">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-012.png" alt="">
                            </div>
                            Contact us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="terms-and-conditions.php">
                            <div class="iconBox">
                                <img class="img-fluid" src="assets/images/menu/menu-013.png" alt="">
                            </div>
                            Terms and Conditions
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="connectArea">
            <h6>Connect With Us</h6>
            <div class="d-flex align-items-center">
                <div class="list">
                    <a href="">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
                <div class="list">
                    <a href="">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                </div>
                <div class="list">
                    <a href="">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                </div>
                <div class="list">
                    <a href="">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hamburger Menu End -->

<!--Search Start-->

<div class="offcanvas offcanvas-top searchTop" tabindex="-1" id="searchTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-body  d-flex align-items-center">
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-12">
                    <form class="d-flex">
                        <input class="searchInput " type="search" placeholder="Search" aria-label="Search">
                        <button class="btn primary_btn" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Search End-->

<!--Cart List Start-->

<div class="offcanvas offcanvas-end cartListRight" tabindex="-1" id="cartListRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel"><img src="assets/images/cartRight.jpg" alt=""> Your cart <span>( 6 Items )</span></h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="orderProductSummary">
            <div class="item">
                <div class="leftImgDetails">
                    <div class="imgBox">
                        <a href="">
                            <img class="img-fluid" src="assets/images/product/product04.jpg" loading="lazy" alt="">
                        </a>
                    </div>
                    <div class="details">
                        <div>
                            <a href="">
                                <h5>
                                    Lorem ipsum dolor.
                                </h5>
                                <ul>
                                    <li>
                                        Shape : <span>Landscape</span>
                                    </li>
                                    <li>
                                        color : <span>Red</span>
                                    </li>
                                    <li>
                                        Size : <span>50 X 50</span>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="price">
                    <ul class="price_area">
                        <li>AED 250/- </li>
                        <li>AED 265/-  </li>
                    </ul>
                    <div class="qntyClose">
                        <div class="quantity-counter">
                            <button class="btn btn-quantity-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                            <input type="number" class="input-number__input form-control2 form-control-lg" min="1" max="100" step="1" value="1">
                            <button class="btn btn-quantity-up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                        </div>
                        <a href="" class="closeBtn">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="leftImgDetails">
                    <div class="imgBox">
                        <a href="">
                            <img class="img-fluid" src="assets/images/product/product03.jpg" loading="lazy" alt="">
                        </a>
                    </div>
                    <div class="details">
                        <div>
                            <a href="">
                                <h5>
                                    Lorem ipsum dolor.
                                </h5>
                                <ul>
                                    <li>
                                        Shape : <span>Landscape</span>
                                    </li>
                                    <li>
                                        color : <span>Red</span>
                                    </li>
                                    <li>
                                        Size : <span>50 X 50</span>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="price">
                    <ul class="price_area">
                        <li>AED 250/- </li>
                        <li>AED 265/-  </li>
                    </ul>
                    <div class="qntyClose">
                        <div class="quantity-counter">
                            <button class="btn btn-quantity-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                            <input type="number" class="input-number__input form-control2 form-control-lg" min="1" max="100" step="1" value="1">
                            <button class="btn btn-quantity-up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                        </div>
                        <a href="" class="closeBtn">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="leftImgDetails">
                    <div class="imgBox">
                        <a href="">
                            <img class="img-fluid" src="assets/images/product/product01.jpg" loading="lazy" alt="">
                        </a>
                    </div>
                    <div class="details">
                        <div>
                            <a href="">
                                <h5>
                                    Lorem ipsum dolor.
                                </h5>
                                <ul>
                                    <li>
                                        Shape : <span>Landscape</span>
                                    </li>
                                    <li>
                                        color : <span>Red</span>
                                    </li>
                                    <li>
                                        Size : <span>50 X 50</span>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="price">
                    <ul class="price_area">
                        <li>AED 250/- </li>
                        <li>AED 265/-  </li>
                    </ul>
                    <div class="qntyClose">
                        <div class="quantity-counter">
                            <button class="btn btn-quantity-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                            <input type="number" class="input-number__input form-control2 form-control-lg" min="1" max="100" step="1" value="1">
                            <button class="btn btn-quantity-up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                        </div>
                        <a href="" class="closeBtn">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="leftImgDetails">
                    <div class="imgBox">
                        <a href="">
                            <img class="img-fluid" src="assets/images/product/product05.jpg" loading="lazy" alt="">
                        </a>
                    </div>
                    <div class="details">
                        <div>
                            <a href="">
                                <h5>
                                    Lorem ipsum dolor.
                                </h5>
                                <ul>
                                    <li>
                                        Shape : <span>Landscape</span>
                                    </li>
                                    <li>
                                        color : <span>Red</span>
                                    </li>
                                    <li>
                                        Size : <span>50 X 50</span>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="price">
                    <ul class="price_area">
                        <li>AED 250/- </li>
                        <li>AED 265/-  </li>
                    </ul>
                    <div class="qntyClose">
                        <div class="quantity-counter">
                            <button class="btn btn-quantity-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                            <input type="number" class="input-number__input form-control2 form-control-lg" min="1" max="100" step="1" value="1">
                            <button class="btn btn-quantity-up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                        </div>
                        <a href="" class="closeBtn">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="leftImgDetails">
                    <div class="imgBox">
                        <a href="">
                            <img class="img-fluid" src="assets/images/product/product06.jpg" loading="lazy" alt="">
                        </a>
                    </div>
                    <div class="details">
                        <div>
                            <a href="">
                                <h5>
                                    Lorem ipsum dolor.
                                </h5>
                                <ul>
                                    <li>
                                        Shape : <span>Landscape</span>
                                    </li>
                                    <li>
                                        color : <span>Red</span>
                                    </li>
                                    <li>
                                        Size : <span>50 X 50</span>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="price">
                    <ul class="price_area">
                        <li>AED 250/- </li>
                        <li>AED 265/-  </li>
                    </ul>
                    <div class="qntyClose">
                        <div class="quantity-counter">
                            <button class="btn btn-quantity-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                            <input type="number" class="input-number__input form-control2 form-control-lg" min="1" max="100" step="1" value="1">
                            <button class="btn btn-quantity-up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                        </div>
                        <a href="" class="closeBtn">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="leftImgDetails">
                    <div class="imgBox">
                        <a href="">
                            <img class="img-fluid" src="assets/images/product/product02.jpg" loading="lazy" alt="">
                        </a>
                    </div>
                    <div class="details">
                        <div>
                            <a href="">
                                <h5>
                                    Lorem ipsum dolor.
                                </h5>
                                <ul>
                                    <li>
                                        Shape : <span>Landscape</span>
                                    </li>
                                    <li>
                                        color : <span>Red</span>
                                    </li>
                                    <li>
                                        Size : <span>50 X 50</span>
                                    </li>
                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="price">
                    <ul class="price_area">
                        <li>AED 250/- </li>
                        <li>AED 265/-  </li>
                    </ul>
                    <div class="qntyClose">
                        <div class="quantity-counter">
                            <button class="btn btn-quantity-down">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                            <input type="number" class="input-number__input form-control2 form-control-lg" min="1" max="100" step="1" value="1">
                            <button class="btn btn-quantity-up">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                            </button>
                        </div>
                        <a href="" class="closeBtn">
                            <i class="fa-solid fa-xmark"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas-footer">
        <div class="sub_total">
            <div class="sub_left">
                <h6>Subtotal</h6>
            </div>
            <div class="sub_right">
                <h5>AED 15710.00</h5>
            </div>
        </div>
        <div class="btnsBox">
            <a href="checkout.php" class="primary_btn checkout_btn">Proceed To Checkout</a>
            <a href="cart.php" class="primary_btn login">View Cart</a>
        </div>
    </div>
</div>

<!--Cart List End-->