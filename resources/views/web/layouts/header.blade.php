<section class="col-12 header">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                <a href="{{ url('/') }}"><img class="logo" src="{{ asset('frontend/images/logo.png') }}" />
            </a>
               
                    <ul class="menu-container d-lg-flex justify-content-between liststyle-none mb-0 p-0">
                        <li><a href="{{ url('about') }}">About Us</a></li>
                        <li><a href="{{ url('blogs') }}">Blogs</a></li>
                        @if(Auth::guard('customer')->check())
                        <li><a href="{{ url('journals') }}">Journals</a></li>
                        <li><a href="{{ url('events') }}">Events</a></li>
                        @endif
                       
                        <li><a href="{{ url('faq') }}">FAQ</a></li>
                      
                       
                       
                        <li><a href="{{ url('contact') }}">Contact Us</a></li>

                        <!-- <a href="#0" class="common-btn mt-4 d-sm-none">Log In</a> -->

                        @if(Auth::guard('customer')->check())

                                                        @php
                                        $user = Auth::guard('customer')->user();
                                        $customer = $user->customer;
                                    @endphp
     
                   
                        <a href="#0">
                        <div class="user-login-box mob-login mt-4 d-sm-none">
                            <div class="user-login-image"><img src="{{ asset('frontend/images/default-user.png') }}" alt=""></div>

                            
                            <div class="user-login-name">{{$customer->first_name}}</div>
                            <div class="user-account-dropdown"><i class="bi bi-chevron-down"></i></div>
                        </div>
                        </a>
                        <ul class="is-user-login">
                            <li><a href="{{ route('customer.account') }}">My Account</a></li>
                            <li><a href="{{ url('logout') }}">Log Out</a></li>
                        </ul>
                        <!-- <a href="{{ url('logout') }}" class="common-btn mt-4 d-sm-none">Log Out</a> -->
                        <!-- User is logged in, display logout button -->
                        
                            @else
                                <!-- User is not logged in, display login button -->
                                <a href="{{ url('login') }}" class="common-btn mt-4 d-sm-none">Log In</a>
                            @endif
                        <!-- <div class="user-login-box mt-4 d-sm-none">
                            <div class="user-login-image"><img src="{{ asset('frontend/images/default-user.png') }}" alt=""></div>
                            <div class="user-login-name">Grace Kelly</div>
                        </div> -->
                    </ul>
                    <div class="d-flex align-items-center">
                        
                       

                        @if(Auth::guard('customer')->check())

                        
                                        @php
                                        $user = Auth::guard('customer')->user();
                                        $customer = $user->customer;
                                    @endphp
     
                        <!-- <a href="{{ url('logout') }}" class="common-btn d-none d-sm-block">Log Out</a> -->
                        
                        <div class="user-login-box d-none d-sm-block">
                            <div class="user-login-image">@if (!empty(Helper::printImage($user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid')))
                                    {!! Helper::printImage($user, 'profile_image', 'profile_image_webp', 'image_attribute', 'img-fluid') !!}
                                @else
                                    <img src="{{ asset('frontend/images/default-user.png') }}" alt="" class="img-fluid">
                                @endif</div>
                            <div class="user-login-name">{{$customer->first_name}}</div>
                            <div class="is-user-nav">
                                <ul>
                                    <li><a href="{{ route('customer.account') }}"><span><i class="bi bi-person-circle"></i></span> My Account</a></li>
                                    <li><a href="{{ url('logout') }}"><span><i class="bi bi-box-arrow-right"></i></span> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- User is logged in, display logout button -->
                        
                            @else
                                <!-- User is not logged in, display login button -->
                                <a href="{{ url('login') }}" class="common-btn d-none d-sm-block">Log In</a>
                            @endif
                        <div class="toggle-icon d-lg-none">
                            <div class="toggle-bar one"></div>
                            <div class="toggle-bar two"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="backdrop d-lg-none"></div>
        </section>