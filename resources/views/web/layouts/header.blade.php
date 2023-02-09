<section class="top_header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul>
                    @if($address->whatsapp_number)
                        <li>
                            <a href="https://wa.me/{{$address->whatsapp_number}}" target="_blank">
                                <div class="icon">
                                    <img class="img-fluid w-100 stand"
                                         src="{{asset('frontend/images/svg/top_whatsapp.svg')}}" alt="">
                                    <img class="img-fluid w-100 onhover"
                                         src="{{asset('frontend/images/svg/top_whatsapp_hover.svg')}}" alt="">
                                </div>
                                <p>
                                    {{$address->whatsapp_number}}
                                </p>
                            </a>
                        </li>
                    @endif
                    @if($address->phone)
                        <li>
                            <a href="tel:{{$address->phone}}" target="_blank">
                                <div class="icon">
                                    <img class="img-fluid w-100 stand"
                                         src="{{asset('frontend/images/svg/top_call.svg')}}"
                                         alt="">
                                    <img class="img-fluid w-100 onhover"
                                         src="{{asset('frontend/images/svg/top_call_hover.svg')}}" alt="">
                                </div>
                                <p>
                                    {{$address->phone}}
                                </p>
                            </a>
                        </li>
                    @endif
                </ul>
                <div class="social">
                    @if($address->facebook_url)
                        <a href="{{$address->facebook_url}}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    @endif
                    @if($address->instagram_url)

                        <a href="{{$address->instagram_url}}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    @endif
                    @if($address->twitter_url)

                        <a href="{{$address->twitter_url}}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    @endif
                    @if($address->linkedin_url)

                        <a href="{{$address->linkedin_url}}" target="_blank"><i
                                class="fa-brands fa-linkedin-in"></i></a>
                    @endif
                    @if($address->snapchat_url)
                        <a href="{{$address->snapchat_url}}" target="_blank"><i class="fa-brands fa-snapchat"></i></a>
                    @endif
                    @if($address->pinterest_url)
                        <a href="{{$address->pinterest_url}}" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
                    @endif

                    @if($address->youtube_url)
                        <a href="{{$address->youtube_url}}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>


<nav class="navbar mobile-menubar" >
    <div class="w-100 d-flex justify-content-between mt-5">
        <a class="mobile-logo-area" href="{{url('/')}}"> <img class="mobile-nav-logo" src="{{ asset('frontend/images/mebashi.svg')}}" alt=""></a>

        <button class="btn btn-menu-close">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
    </div>
    @if($menus->isNotEmpty())

    <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav ms-auto">
                @foreach($menus as $menu)
                    @php
                        $subMenu = App\Models\MenuDetail::active()->where('menu_id',$menu->id)->first();
                    @endphp
                    @if($subMenu==NULL)
                        @if($menu->menu_type=="category")
                        @dump($menu->menu_type)
                        @else
                        @endif
                    @else
                    @endif
                @endforeach


        </ul>

    </div>
    @endif
</nav>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('frontend/images/mebashi.svg')}}" alt=""></a>

            <div class="search-menu-btn">
                <ul>
                    <!-- <li class="nav-item icon_space">
                        <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"  class="header_icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                    </li> -->
                    @if($address->whatsapp_number)
                        <li class="cl_wts_icon">
                            <a href="https://wa.me/{{$address->whatsapp_number}}" target="_blank">
                                <div class="icon">
                                    <img class="img-fluid w-100 " src="{{ asset('frontend/images/svg/mobile_whatsapp.svg')}}" alt="">
                                </div>
                            </a>
                        </li>
                    @endif
                    @if($address->phone)
                        <li class="cl_wts_icon">
                            <a href="tel:{{$address->phone}}" target="blank">
                                <div class="icon">
                                    <img class="img-fluid w-100 " src="{{ asset('frontend/images/svg/mobile_call.svg')}}" alt="">
                                </div>
                            </a>
                        </li>
                    @endif
                </ul>



                <button class="navbar-toggler btn-menu-open" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
                    <span class="navbar-toggler-icon">
                        <img src="{{ asset('frontend/images/svg/breadcrumbs.svg')}}" alt="">
                    </span>
                </button>
            </div>
            <div class="collapse navbar-collapse menubar" id="main_nav">
                <ul class="navbar-nav ms-auto">
                    @foreach($menus as $menu)
                    @php
                        $subMenu = App\Models\MenuDetail::active()->where('menu_id',$menu->id)->first();
                    @endphp
                    @if($subMenu==NULL)
                        @if($menu->menu_type=="category")
                       
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url($menu->url) }}"> {{$menu->title}} </a>
                            </li>
                        @endif
                    @else
                    <li class="nav-item dropdown has-megamenu ">
                        <a class="nav-link dropdown-toggle arrow" href="#" data-bs-toggle="dropdown"> {{$menu->title}}  </a>
                        <div class="dropdown-menu megamenu" role="menu">
                            <div class="row">
                                <div class="col-md-4 megamenu_img">
                                  @php
                                      $category = App\Models\Category::active()->where('id',$menu->category_id)->first();
                                  @endphp
                                         {!! Helper::printImage($category, 'image','image_webp','image_attribute','d-block w-100') !!}
                                </div>
                                <div class="col-md-8 megamenu_list">
                                    <div>
                                    
                                        <ul>
                                            @foreach(explode(',',$subMenu->category_id) as $catItems)

                                            @if($menu->menu_type=="category")
                                                @php $link = url('category/'.Helper::categoryUrl($catItems))@endphp
                                            @else
                                                @php $link = url($menu->url)@endphp
                                            @endif

                                            <li>
                                                <i class="fa-solid fa-circle"></i>
                                                <a href="{{$link}}">{{Helper::categoryName($catItems)}}</a>
                                            </li>
                                        @endforeach
                                        <br>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    <li class="nav-item icon_space">
                        <a href="" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"  class="header_icon">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                    </li>
                    <li class="nav-item icon_space ">
                        <a href="{{ url('cart') }}" class="header_icon">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill cart-count">
                                {{ Helper::getCartItemCount()}}
                            </span>
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </li>
                    @if(Auth::guard('customer')->check())
                    <li class="nav-item icon_space">
                        <a href="{{url('customer/account/wishlist')}}" class="header_icon">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    </li>
                            <li class="nav-item icon_space loginIconShow">
                                <a href="" data-bs-toggle="modal" data-bs-target="" class="header_icon">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                                <ul class="dropdown-menu loginDrop" aria-labelledby="dropdownMenuLink"
                                    id="socialDropContent">
                                    <li><a href="{{url('customer/account/profile')}}">My Account</a></li>
                                <li><a href="{{url('logout')}}">Logout</a></li>
                            </ul>
                        </li>

                        @else
                            <li class="nav-item icon_space">
                                <a href="" data-bs-toggle="modal" data-bs-target="#login_form_pop" class="header_icon">
                                    <i class="fa-solid fa-user"></i>
                                </a>
                            </li>
                        @endif

                        
                </ul>
            </div>
        </nav>
    </div>
</header>
