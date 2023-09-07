<!-- 
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6 order-1">
               
                <ul class="list">
                    <li>
                        <a href="{{url('about')}}">Our Story</a>
                    </li>
                  
                    <li>
                        <a href="{{url('products')}}">Shop Now</a>
                    </li>
                    @if(Auth::guard('customer')->check())
                        <li>
                            <a class="strong" href="{{ url('customer/account/profile') }}">My Account</a>
                        </li>
                    @endif
                </ul>

                <div class="socialArea">
                      @if($siteInformation->instagram_url)
                    <h6>Connect With Us</h6>
                      @endif
                    <div class="iconBox">
                        @if($siteInformation->instagram_url)
                            <a href="{{$siteInformation->instagram_url}}"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                        @if($siteInformation->facebook_url)
                            <a href="{{$siteInformation->facebook_url}}"><i class="fa-brands fa-facebook"></i></a>
                        @endif
                        @if($siteInformation->linkedin_url)
                            <a href="{{$siteInformation->linkedin_url}}"><i class="fa-brands fa-linkedin"></i></a>
                        @endif
                        @if($siteInformation->twitter_url)
                            <a href="{{$siteInformation->twitter_url}}"><i class="fa-brands fa-twitter"></i></a>
                        @endif
                        @if($siteInformation->snapchat_url)
                            <a href="{{$siteInformation->twitter_url}}"><i class="fa-brands fa-snapchat"></i></a>
                        @endif
                        @if($siteInformation->youtube_url)
                            <a href="{{$siteInformation->youtube_url}}"><i class="fa-brands fa-youtube"></i></a>
                        @endif
                        @if($siteInformation->pinterest_url)
                            <a href="{{$siteInformation->pinterest_url}}"><i class="fa-brands fa-pinterest"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 order-lg-2 mt-lg-0 mt-5 order-3">
                <h6>Help</h6>
                <ul class="list">
                @if($siteInformation->faq)
                    <li>
                        <a href="{{url('faq')}}">FAQ's</a>
                    </li>

                    @endif
                    @if($siteInformation->privacy_policy)
                    <li>

                        <a href="{{url('privacy-policy')}}">Privacy policy</a>
                    </li>
                    @endif
                    @if($siteInformation->terms_and_conditions)
                    <li>
                    <a href="{{url('terms-and-conditions')}}">Terms and condition</a>
                    </li>
                    @endif
                    @if($siteInformation->return_policy)
                    <li>
                    <a href="{{url('return-policy')}}">Return & Refund Policy</a>

                    </li>

                    @endif
                    @if($siteInformation->payment_policy)
                    <li>
                        <a href="{{url('payment-policy')}}">Payment Policy</a>
                    </li>
                    @endif
                    @if($siteInformation->contact)
                    <li>
                        <a href="{{url('contact')}}">Contact Centre</a>
                    </li>
                    @endif

                    @if($siteInformation->shipping_policy)
                    
                    <li>
                        <a href="{{url('shipping-policy')}}">Shipping Policy</a>
                    </li>
                    @endif
                </ul>
                <div class="paymentAreaBox">
                    <h6>
                        Secure Payment
                    </h6>
                    <div class="imgBox">
                        <img class="img-fluid"src="{{ asset('frontend/images/icon-02.png')}}" alt="">
                        <img class="img-fluid"src="{{ asset('frontend/images/icon-03.png')}}" alt="">
                        <img class="img-fluid"src="{{ asset('frontend/images/icon-04.png')}}" alt="">
                        <img class="img-fluid"src="{{ asset('frontend/images/icon-05.png')}}" alt="">
                        <img class="img-fluid"src="{{ asset('frontend/images/icon-06.png')}}" alt="">
                        
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-6 mt-lg-0 mt-5 order-lg-3 order-4">
                <h6>Discover</h6>
                <ul class="list">
                    
                   
                   
                     <img class="img-fluid googleImg"src="{{ asset('frontend/images/googleFooter.png')}}" alt="">
                </ul>
            </div>
            <div class="col-lg-3 col-6 order-lg-4 order-lg-2 order-2">
                <h6>Contact</h6>
                <ul class="list">
                    <li>{!! @$siteInformation->address!!}</li>
                    <li><span>Ph  &emsp;:</span><a href="mailto:{!! @$siteInformation->phone !!}"> {!! @$siteInformation->phone!!}</a></li>
                    <li><span>Mail :</span><a href="mailto:{!! @$siteInformation->email !!}">{!! @$siteInformation->email!!}</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copy">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul>
                        <li>
                            All Rights Reserved by Emirati 2023
                        </li>
                        <li>
                            Designed By <a href="">Weft Technologies</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<section class="fixedBottomBar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="listWrapper">
                   
                    <li>
                        <div class="dropdown">
                            <a class=" dropdown-toggle text-center" type="button" id="dropdownMenuButton1"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-fluid "src="{{ asset('frontend/images/bottom-02.png')}}" alt="">
                                <p>Account</p>
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
                    <li>
                        <a href="{{url('/')}}">
                            <img class="img-fluid"src="{{ asset('frontend/images/bottom-05.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="{{('products')}}">
                            <img class="img-fluid"src="{{ asset('frontend/images/bottom-03.png')}}" alt="">
                            <p>Category</p>
                        </a>
                    </li>
                    <li class="chat">
                        <div class="dropdown">
                            <a class=" dropdown-toggle text-center" type="button" id="dropdownMenuButton1"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-fluid "src="{{ asset('frontend/images/bottom-04.png')}}" alt="">
                                <p>Chat</p>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="tel:00970-000000000"><i class="fa-brands fa-whatsapp"></i></a></li>
                                <li><a class="dropdown-item" href="https://wa.me/00970-000000000"><i class="fa-solid fa-phone-volume"></i></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> --}}
<script>
    function goToByScroll(id){
        $('html,body').animate({scrollTop: $("#"+id).offset().top-0},'slow');
    }
</script>
<script src="https://kit.fontawesome.com/99358fb784.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<script  src="{{ asset('frontend/js/jquery.star-rating-svg.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script  src="{{ asset('frontend/js/form-select2_new.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xzoom/1.0.15/xzoom.min.js"></script>
<script src="{{ asset('frontend/xzoom/js/setup.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script>
    function goToByScroll(id){
        $('html,body').animate({scrollTop: $("#"+id).offset().top-0},'slow');
    }
</script>

<script src="https://kit.fontawesome.com/99358fb784.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>

<script  src="{{ asset('frontend/js/jquery.star-rating-svg.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script  src="{{ asset('frontend/js/form-select2_new.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xzoom/1.0.15/xzoom.min.js"></script>
<script src="{{ asset('frontend/xzoom/js/setup.js')}}"></script>



{{--<script  src="{{ asset('frontend/js/scripts.min.js')}}"></script>--}}
<script  src="{{ asset('frontend/js/custom.js')}}"></script>
<script  src="{{ asset('frontend/js/scripts.js')}}"></script>
<script  src="{{ asset('frontend/js/demo.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.5.0/dist/sweetalert2.all.min.js"></script>

<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    var swal = Swal.mixin({
        backdrop: true, showConfirmButton: true,
    });
    var Toast = Swal.mixin({
        toast: true, position: 'top-end', showConfirmButton: false, timer: 3000,
    });
</script>
@if(Session::has('success'))



<script>

setTimeout(function () {
    Toast.fire({title: "", text: '{{ Session::get('success')}}', icon: 'success'});

});
</script>
@endif
@if(Session::has('error'))
<script>
setTimeout(function () {
     Toast.fire({title: "Error !", text: '{{ Session::get('error')}}', icon: 'error'});

});
</script>
@endif
</body>
</html> -->
