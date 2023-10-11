<section class="col-12 header">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                <a href="{{ url('/') }}"><img class="logo" src="{{ asset('frontend/images/logo.png') }}" /></a>
               
                    <ul class="d-flex justify-content-between liststyle-none mb-0 p-0">
                        <li><a href="">About Us</a></li>
                        <li><a href="journals.html">Journals</a></li>
                        <li><a href="events.html">Events</a></li>
                        <li><a href="{{ url('faq') }}">FAQ</a></li>
                        <li><a href="{{ url('blogs') }}">Blogs</a></li>
                        <li><a href="{{ url('contact') }}">Contact Us</a></li>
                    </ul>
                    <div>
                        
                       

                        @if(Auth::guard('customer')->check())
                        <a href="{{ url('logout') }}" class="common-btn">Log Out</a>
                        <!-- User is logged in, display logout button -->
                        
                            @else
                                <!-- User is not logged in, display login button -->
                                <a href="{{ url('login') }}" class="common-btn">Log In</a>
                            @endif


                    </div>
                </div>
            </div>
        </section>