<section class="col-12 header">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                <a href="{{ url('/') }}"><img class="logo" src="{{ asset('frontend/images/logo.png') }}" /></a>
               
                    <ul class="menu-container d-lg-flex justify-content-between liststyle-none mb-0 p-0">
                        <li><a href="{{ url('about') }}">About Us</a></li>
                        <li><a href="journals.html">Journals</a></li>
                        <li><a href="{{ url('event') }}">Events</a></li>
                        <li><a href="{{ url('faq') }}">FAQ</a></li>
                        <li><a href="{{ url('blogs') }}">Blogs</a></li>
                        <li><a href="{{ url('contact') }}">Contact Us</a></li>

                        <a href="#0" class="common-btn mt-4 d-sm-none">Log In</a>
                        <div class="user-login-box mt-4 d-sm-none">
                            <div class="user-login-image"><img src="{{ asset('frontend/images/user-login.png') }}" alt=""></div>
                            <div class="user-login-name">Grace Kelly</div>
                        </div>
                    </ul>
                    <div class="d-flex align-items-center">
                        <a href="#0" class="common-btn d-none d-sm-block">Log In</a>
                        <!-- <div class="user-login-box d-none d-sm-flex">
                            <div class="user-login-image"><img src="images/user-login.png" alt=""></div>
                            <div class="user-login-name">Grace Kelly</div>
                        </div> -->
                        <div class="toggle-icon d-lg-none">
                            <div class="toggle-bar one"></div>
                            <div class="toggle-bar two"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="backdrop d-lg-none"></div>
        </section>