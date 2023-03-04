

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
                    {!! Helper::printImage(@$defaultCurrency, 'image', 'image_webp', '', 'img-fluid') !!}
                        <select id="language-selector" class="currency-selection">
                        @foreach($currencies as $currency)
                                        <option data-id='{{ $currency->id}}' data-code='{{ $currency->code}}'
                                        {{ $defaultCurrency->code == $currency->code ? 'selected': '' }}
                                        >{{ $currency->code}}</option>
                                    @endforeach
                        </select>
                    </li>

                    <li class="cart">
                        <a class="position-relative" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#cartListRight" aria-controls="offcanvasRight">
                            <img class="img-fluid" src="{{ asset('frontend/images/bag.png')}}" alt="">
                            <span class="position-absolute top-0 start-100  badge rounded-pill bg-danger cart-count">
                                {{ Helper::getCartItemCount()}}
                            </span>
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
        <a href="">
            <img class="img-fluid artemystLogo"  src="{{ asset('frontend/images/artemystLogo.png')}}" alt="">
        </a>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <nav class="navbar mobile-menubar">
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="navbar-nav ms-auto">
                    @if($sideMenus->isNotEmpty())
                        @foreach($sideMenus as $side_menu)
                            @php
                            $subSideMenu = App\Models\SideMenuDetail::active()->where('menu_id',$side_menu->id)->first();
                            @endphp
                           @if($subSideMenu==NULL)
                                @if($side_menu->menu_type=="color")
                                @endif
                                @if($side_menu->menu_type=="shape")
                                @endif
                                @if($side_menu->menu_type=="static")
                                    <li class="nav-item">
                                        <a class="nav-link"  href="{{ url($side_menu->url) }}">
                                            <div class="iconBox">
                                                {!! Helper::printImage($side_menu,'image','image_webp','image_attribute','img-fulid') !!}
                                            </div>
                                            {{$side_menu->title}}
                                        </a>
                                    </li>
                                 @endif
                            @else
                            @if($side_menu->menu_type=="color")
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="shop-page.html" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="iconBox">
                                        {!! Helper::printImage($side_menu,'image','image_webp','image_attribute','img-fluid') !!}

                                    </div>
                                    {{$side_menu->title}}
                                    @php
                                    $sideMenuDetails = App\Models\SideMenuDetail::active()->where('menu_id',$side_menu->id)->get();
                                    $colorId = [];
                                    foreach($sideMenuDetails as $sideMenuDetail){
                                        $colorId[] = $sideMenuDetail->color_id;
                                    }
                                    $colorItems = App\Models\Color::whereIn('id',$colorId)->get();
                                    @endphp
                                </a>
                                <ul class="dropdown-menu">
                                    <div class="colorWrapper">
                                        @foreach ($colorItems as $color_item)
                                        <a href="{{url('color/'.$color_item->id)}}" class="colorItemFilterClick ">
                                            <div class="colorBox" style="background:{{$color_item->code}}">
                                            </div>
                                            {{$color_item->title}}
                                        </a>

                                        @endforeach

                                    </div>
                                </ul>
                            </li>
                            @endif
                            @if($side_menu->menu_type=="shape")

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{url('products')}}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="iconBox">
                                        {!! Helper::printImage($side_menu,'image','image_webp','image_attribute','img-fluid') !!}
                                    </div>
                                    {{$side_menu->title}}
                                </a>
                                @php
                                $sideMenuDetails = App\Models\SideMenuDetail::active()->where('menu_id',$side_menu->id)->get();
                                @endphp

                                <ul class="dropdown-menu" style="">
                                    @foreach ($sideMenuDetails as $side_menu_detail)
                                    <li class="has-megasubmenu">
                                        @php
                                        $shape = App\Models\Shape::find($side_menu_detail->shape_id)->first();
                                        @endphp
                                        <a href="{{url('shape/'.$shape->id)}}" class="dropdown-item ">
                                            <div class="iconBox">
                                                {!! Helper::printImage($side_menu_detail,'image','image_webp','image_attribute','img-fluid') !!}
                                                {{-- <img class="img-fluid"  src="{{ asset('frontend/images/menu/menu-08.png')}}" alt=""> --}}
                                            </div>
                                            <h6>{{$shape->title}}</h6>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>

                            </li>
                            @endif
                            @endif
                        @endforeach
                    @endif

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
                <a href="{{url('/')}}">
                    <img class="img-fluid headerArtemystLogo"  src="{{ asset('frontend/images/artemystLogo.png')}}" alt="">
                </a>
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{url('products')}}">Shop now </a></li>

                    <li class="nav-item dropdown has-megamenu">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Shapes</a>
                        <div class="dropdown-menu megamenu" role="menu">
                            <div class="container bg-green pt-0 pb-0">
                                <div class="row justify-content-center">
                                    <div class="col-xl-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="shapeWrapper">
                                                    @foreach ($shapes as $shape)
                                                    <div class="shapeItem">
                                                        <a href="{{url('shape/'.$shape->id)}}">
                                                            {!! Helper::printImage($shape,'image','image_webp','image_attribute','img-fluid') !!}
                                                            <h6>{{$shape->title}}</h6>
                                                        </a>
                                                    </div>

                                                    @endforeach

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
                                                    @foreach ($colors as $color)
                                                    <a href="{{url('color/'.$color->id)}}" class="colorItemFilterClick ">
                                                        <div class="colorBox" style="background:{{$color->code}}">
                                                        </div>
                                                        {{$color->title}}
                                                    </a>

                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
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

                        <li class="cart">

                            <a class="position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartListRight" aria-controls="offcanvasRight">
                                <img class="img-fluid"  src="{{ asset('frontend/images/bag.png')}}" alt="">
                                <span class="position-absolute top-0 start-100  badge rounded-pill bg-danger cart-count">
                                    {{ Helper::getCartItemCount()}}
                            </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/')}}">
                                <img class="img-fluid"  src="{{ asset('frontend/images/wishlist.png')}}" alt="">
                            </a>
                        </li>
                        <li class="login">
                            <div class="dropdown">
                                <a class="userBox dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="img-fluid icon"  src="{{ asset('frontend/images/user.png')}}" alt="">
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{url('login')}}">Login</a></li>
                                    <li><a class="dropdown-item" href="{{url('register')}}">Register</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
