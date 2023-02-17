

<!--Top Header Start-->

<section class="topHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-3 hamburgerMenuArea">
                <a class="" data-bs-toggle="offcanvas" href="#hamburgerMenu" role="button"
                   aria-controls="offcanvasExample">
                    <img class="img-fluid" src="{{ asset('frontend/images/hamburgerMenuIcon.png')}}" alt="">
                </a>
            </div>
            <div class="col-lg-4 col-6 artemyst">
                <a href="{{url('/')}}">
                    {!! Helper::printImage(@$siteInformation, 'logo','logo_webp','logo_attribute','img-fluid artemystLogo') !!}
                    {{-- <img class="img-fluid artemystLogo" src="{{ asset('frontend/images/artemystLogo.png')}}" alt=""> --}}
                </a>
            </div>
            <div class="col-lg-4 col-3 topRightArea">
                <ul class="topRightAreaUl">
                    <li>
                        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#searchTop"
                           aria-controls="offcanvasTop">
                            <img class="img-fluid" src="{{ asset('frontend/images/search.png')}}" alt="">
                        </a>
                    </li>
                    <li class="currency">
                        <img class="img-fluid language-flag" src="{{ asset('frontend/images/currency/aed.png')}}" alt="">
                        <select id="language-selector">
                            <option data-img="{{ asset('frontend/images/currency/aed.png')}}">
                                AED
                            </option>
                            <option data-img="{{ asset('frontend/images/currency/usd.png')}}">
                                USD
                            </option>
                        </select>
                    </li>
                    <li class="cart">
                        <a class="position-relative" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#cartListRight" aria-controls="offcanvasRight">
                            <img class="img-fluid" src="{{ asset('frontend/images/bag.png')}}" alt="">
                            <span class="position-absolute top-0 start-100  badge rounded-pill bg-danger">
                                23
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="index.php">
                            <img class="img-fluid" src="{{ asset('frontend/images/wishlist.png')}}" alt="">
                        </a>
                    </li>
                    <li class="login">
                        <div class="dropdown">
                            <a class="userBox dropdown-toggle" type="button" id="dropdownMenuButton1"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-fluid icon" src="{{ asset('frontend/images/user.png')}}" alt="">
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
<div class="offcanvas offcanvas-start hamburgerMenu" tabindex="-1" id="hamburgerMenu" aria-labelledby="offcanvasExampleLabel"
     data-bs-backdrop="true">
    <div class="offcanvas-header">
        <a href="">
            <img class="img-fluid artemystLogo"  src="{{ asset('frontend/images/artemystLogo.png')}}" alt="">
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
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-01.png')}}" alt="">
                            </div>
                            Shop All
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="errorPage.php">
                            <div class="iconBox">
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-02.png')}}" alt="">
                            </div>
                            Objects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product-listing.php">
                            <div class="iconBox">
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-03.png')}}" alt="">
                            </div>
                            Best Seller
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product-listing.php">
                            <div class="iconBox">
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-04.png')}}" alt="">
                            </div>
                            New Arrivals
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="shop-page.html" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="iconBox">
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-05.png')}}" alt="">
                            </div>
                            Colors
                        </a>
                        <ul class="dropdown-menu">
                            <div class="colorWrapper">
                                <a href="product-listing.php" class="colorItem colorItemFilterClick">
                                    <div class="colorBox" style="background: #292929">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #FFFFFF">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #71A9BA">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #637372">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #F5F4DF">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #75829D">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #BDB8CE">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #FBC9CC">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #EF7F55">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #BDC39F">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #E1C564">
                                    </div>
                                </a>
                                <a href="product-listing.php" class="colorItemFilterClick">
                                    <div class="colorBox" style="background: #C4CACE">
                                    </div>
                                </a>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="shop-page.html" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="iconBox">
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-06.png')}}" alt="">
                            </div>
                            Shapes
                        </a>
                        <ul class="dropdown-menu" style="">
                            <li class="has-megasubmenu">
                                <a class="dropdown-item " href="#" >
                                    <div class="iconBox">
                                        <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-07.png')}}" alt="">
                                    </div>
                                    Portraits
                                </a>
                            </li>
                            <li class="has-megasubmenu">
                                <a class="dropdown-item " href="#" >
                                    <div class="iconBox">
                                        <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-08.png')}}" alt="">
                                    </div>
                                    Landscapes
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('about')}}">
                            <div class="iconBox">
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-09.png')}}" alt="">
                            </div>
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog.php">
                            <div class="iconBox">
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-010.png')}}" alt="">
                            </div>
                            Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my-account.php">
                            <div class="iconBox">
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-011.png')}}" alt="">
                            </div>
                            Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('contact')}}">
                            <div class="iconBox">
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-012.png')}}" alt="">
                            </div>
                            Contact us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="terms-and-conditions.php">
                            <div class="iconBox">
                                <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-013.png')}}" alt="">
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
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="collapse navbar-collapse" id="main_nav">
                <a href="index.php">
                    <img class="img-fluid headerArtemystLogo"  src="{{ asset('frontend/images/artemystLogo.png')}}" alt="">
                </a>
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active"><a class="nav-link" href="product-listing.php">Shop All </a></li>
                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Shapes</a>
                        <div class="dropdown-menu megamenu" role="menu">
                            <div class="container bg-green pt-0 pb-0">
                                <div class="row justify-content-center">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="shapeWrapper">
                                                    <div class="shapeItem">
                                                        <a href="">
                                                            <img class="img-fluid" src="{{ asset('frontend/images/themes/themes-01.jpg')}}" alt="">
                                                            <h6>Portraits</h6>
                                                        </a>
                                                    </div>
                                                    <div class="shapeItem">
                                                        <a href="">
                                                            <img class="img-fluid" src="{{ asset('frontend/images/themes/themes-01.jpg')}}" alt="">
                                                            <h6>Landscapes</h6>
                                                        </a>
                                                    </div>
                                                    <div class="shapeItem">
                                                        <a href="">
                                                            <img class="img-fluid" src="{{ asset('frontend/images/themes/themes-01.jpg')}}" alt="">
                                                            <h6>Square</h6>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Color</a>
                        <div class="dropdown-menu megamenu" role="menu">
                            <div class="container bg-green">
                                <div class="row justify-content-center">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="colorWrapper">
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #292929">
                                                        </div>
                                                        Color 1
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #FFFFFF">
                                                        </div>
                                                        Color Color 2
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #71A9BA">
                                                        </div>
                                                        Color 3
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #637372">
                                                        </div>
                                                        Color 4
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #292929">
                                                        </div>
                                                        Color 1
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #FFFFFF">
                                                        </div>
                                                        Color Color 2
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #71A9BA">
                                                        </div>
                                                        Color 3
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #637372">
                                                        </div>
                                                        Color 4
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #292929">
                                                        </div>
                                                        Color 1
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #FFFFFF">
                                                        </div>
                                                        Color Color 2
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #71A9BA">
                                                        </div>
                                                        Color 3
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #637372">
                                                        </div>
                                                        Color 4
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #292929">
                                                        </div>
                                                        Color 1
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #FFFFFF">
                                                        </div>
                                                        Color Color 2
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #71A9BA">
                                                        </div>
                                                        Color 3
                                                    </a>
                                                    <a href="javascript:void(0)" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background: #637372">
                                                        </div>
                                                        Color 4
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
{{--                    <li class="nav-item"><a class="nav-link" href="index.php"> Portraits </a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="index.php"> Landscapes </a></li>--}}
                    <li class="nav-item"><a class="nav-link" href="index.php"> Objects </a></li>
                    <li class="nav-item"><a class="nav-link" href="errorPage.php"> Best seller </a></li>
                    <li class="nav-item"><a class="nav-link" href="blog.php"> New arrivals </a></li>
                </ul>
                <div class="topRightArea">
                    <ul class="topRightAreaUl">
                        <li>
                            <a type="button" data-bs-toggle="offcanvas" data-bs-target="#searchTop" aria-controls="offcanvasTop">
                                <img class="img-fluid"  src="{{ asset('frontend/images/search.png')}}" alt="">
                            </a>
                        </li>
                        <li class="cart">
                            <a class="position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartListRight" aria-controls="offcanvasRight">
                                <img class="img-fluid"  src="{{ asset('frontend/images/bag.png')}}" alt="">
                                <span class="position-absolute top-0 start-100  badge rounded-pill bg-danger">
                                23
                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="index.php">
                                <img class="img-fluid"  src="{{ asset('frontend/images/wishlist.png')}}" alt="">
                            </a>
                        </li>
                        <li class="login">
                            <div class="dropdown">
                                <a class="userBox dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="img-fluid icon"  src="{{ asset('frontend/images/user.png')}}" alt="">
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
    </nav>
</header>
