

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
           
            <div class="col-lg-4 col-3 topRightArea">
                <ul class="topRightAreaUl">
                    <li>
                        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#searchTop"
                           aria-controls="offcanvasTop">
                            <img class="img-fluid" src="{{ asset('frontend/images/search.png')}}" alt="">
                        </a>
                    </li>
                  

                   
                    @if(Auth::guard('customer')->check())
                        <li>
                            <a href="{{url('customer/account/wishlist')}}">
                                <img class="img-fluid" src="{{ asset('frontend/images/wishlist.png')}}" alt="">
                            </a>
                        </li>
                    @endif
                 
                    <li class="login">
                        <div class="dropdown">
                            <a class="userBox dropdown-toggle" type="button" id="dropdownMenuButton1"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-fluid icon" src="{{ asset('frontend/images/user.png')}}" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                @if(Auth::guard('customer')->check())
                                <li><a class="dropdown-item" href="{{ url('customer/account/profile') }}">My Account</a></li>
                                <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                                @else
                                <li><a class="dropdown-item" href="{{ url('login') }}">Login</a></li>
                                <li><a class="dropdown-item" href="{{ url('register') }}">Register</a></li>
                                @endif
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
         
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <nav class="navbar mobile-menubar">
            <div class="collapse navbar-collapse" id="main_nav">
              
            </div>
        </nav>

        <div class="connectArea">
            <h6>Connect With Us</h6>
            <div class="d-flex align-items-center">
                @if($siteInformation->instagram_url)
                    <div class="list">
                        <a href="{{$siteInformation->instagram_url}}">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                @endif
                @if($siteInformation->facebook_url)
                    <div class="list">
                        <a href="{{$siteInformation->facebook_url}}">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </div>
                @endif
                @if($siteInformation->linkedin_url)
                    <div class="list">
                        <a href="{{$siteInformation->linkedin_url}}">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </div>
                @endif
                @if($siteInformation->twitter_url)
                <div class="list">
                    <a href="{{$siteInformation->twitter_url}}">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </div>
                @endif
                @if($siteInformation->youtube_url)
                <div class="list">
                    <a href="{{$siteInformation->youtube_url}}">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </div>
                @endif
                @if($siteInformation->pinterest_url)
                <div class="list">
                    <a href="{{$siteInformation->pinterest_url}}">
                        <i class="fa-brands fa-pinterest"></i>
                    </a>
                </div>
                @endif
                @if($siteInformation->snapchat_url)
                <div class="list">
                    <a href="{{$siteInformation->snapchat_url}}">
                    <i class="fa-brands fa-snapchat"></i>
                    </a>
                </div>
                @endif
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
                    <form class="d-flex position-relative">
                        <input class="searchInput" type="search" placeholder="Search" id="main-search" aria-label="Search">
                        <button class="btn primary_btn" id="searchBtn" type="submit">Search</button>

                        <div class="searchResult">
                            <ul id="search-result-append-here"></ul>
                        </div>
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
              
                <ul class="navbar-nav m-auto">
                   

                  
                  
                    @foreach ($menus as $menu)
                    <li class="nav-item active"><a class="nav-link" href="{{url($menu->url)}}">{{$menu->title}} </a></li>
                    @endforeach
                </ul>
                <div class="topRightArea">
                    <ul class="topRightAreaUl">
                        <li>
                            <a type="button" data-bs-toggle="offcanvas" data-bs-target="#searchTop" aria-controls="offcanvasTop">
                                <img class="img-fluid"  src="{{ asset('frontend/images/search.png')}}" alt="">
                            </a>
                        </li>

                      
                        @if(Auth::guard('customer')->check())
                            <li>
                                <a href="{{url('customer/account/wishlist')}}">
                                    <img class="img-fluid" src="{{ asset('frontend/images/wishlist.png')}}" alt="">
                                </a>
                            </li>
                        @endif
                        <li class="login">
                            <div class="dropdown">
                                <a class="userBox dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="img-fluid icon"  src="{{ asset('frontend/images/user.png')}}" alt="">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    @if(Auth::guard('customer')->check())
                                    <li><a class="dropdown-item" href="{{ url('customer/account/profile') }}">My Account</a></li>
                                    <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                                    @else
                                    <li><a class="dropdown-item" href="{{ url('login') }}">Login</a></li>
                                    <li><a class="dropdown-item" href="{{ url('register') }}">Register</a></li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
