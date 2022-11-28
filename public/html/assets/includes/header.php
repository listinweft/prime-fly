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

    <!--    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!--    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">-->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body id="go-to-top">

<!--Top Header Start-->

<section class="topHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 hamburgerMenuArea">
                <a class="" data-bs-toggle="offcanvas" href="#hamburgerMenu" role="button"
                   aria-controls="offcanvasExample">
                    <img class="img-fluid" src="assets/images/hamburgerMenuIcon.png" alt="">
                </a>
            </div>
            <div class="col-lg-4 artemyst">
                <a href="">
                    <img class="img-fluid artemystLogo" src="assets/images/artemystLogo.png" alt="">
                </a>
            </div>
            <div class="col-lg-4 topRightArea">
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
                        <a class="position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartListRight" aria-controls="offcanvasRight">
                            <img class="img-fluid" src="assets/images/bag.png" alt="">
                            <span class="position-absolute top-0 start-100  badge rounded-pill bg-danger">
                                23
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img class="img-fluid" src="assets/images/wishlist.png" alt="">
                        </a>
                    </li>
                    <li class="login">
                        <div class="dropdown">
                            <a class="userBox dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-fluid icon" src="assets/images/user.png" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Login</a></li>
                                <li><a class="dropdown-item" href="#">Register</a></li>
                            </ul>
                        </div>
<!--                        <a class="userBox" href="">-->
<!--                            <img class="img-fluid icon" src="assets/images/user.png" alt="">-->
<!--                        </a>-->
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!--Top Header End-->


<!-- Hamburger Menu Start -->

<div class="offcanvas offcanvas-start" tabindex="-1" id="hamburgerMenu" aria-labelledby="offcanvasExampleLabel"
     data-bs-backdrop="true">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists,
            etc.
        </div>
        <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown">
                Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Hamburger Menu End -->

<!--Search Start-->

<div class="offcanvas offcanvas-top" tabindex="-1" id="searchTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasTopLabel">Offcanvas top</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        ...
    </div>
</div>

<!--Search End-->

<!--Cart List Start-->

<div class="offcanvas offcanvas-end" tabindex="-1" id="cartListRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasRightLabel">Offcanvas right</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        ...
    </div>
</div>

<!--Cart List End-->