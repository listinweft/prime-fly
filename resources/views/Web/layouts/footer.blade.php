
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-6 order-1">
                <a class="logo" href="index.php">
                    <img class="img-fluid"src="{{ asset('frontend/images/artemyst-logoWhite.png')}}" alt="">
                </a>
                <ul class="list">
                    <li>
                        <a href="aboutUs.php">Our Story</a>
                    </li>
                    <li>
                        <a href="errorPage.php">Sustainability</a>
                    </li>
                    <li>
                        <a href="errorPage.php">Art for Business</a>
                    </li>
                    <li>
                        <a class="strong" href="my-account.php">My Account</a>
                    </li>
                </ul>

                <div class="socialArea">
                    <h6>Connect With Us</h6>
                    <div class="iconBox">
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                        <a href=""><i class="fa-brands fa-linkedin"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6 order-lg-2 mt-lg-0 mt-5 order-3">
                <h6>Help</h6>
                <ul class="list">
                    <li>
                        <a href="">FAQ's</a>
                    </li>
                    <li>
                    
                        <a href="{{url('privacy-policy')}}">Privacy policy</a>
                    </li>
                    <li>
                    <a href="{{url('terms-and-conditions')}}">Terms and condition</a>
                    </li>
                    <li>
                    <a href="{{url('return-policy')}}">Return & Refund Policy</a>
                       
                    </li>
                    <li>
                        <a href="errorPage.php">Payment</a>
                    </li>
                    <li>
                        <a href="contactUs.php">Support Center</a>
                    </li>
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
<!--                    <img class="img-fluid paymentImg"src="{{ asset('frontend/images/securepayment.png')}}" alt="">-->
            </div>
            <div class="col-lg-3 col-6 mt-lg-0 mt-5 order-lg-3 order-4">
                <h6>Discover</h6>
                <ul class="list">
                    <li>
                        <a href="">Art Prints</a>
                    </li>
                    <li>
                        <a href="">Prints with Wooden Frame</a>
                    </li>
                    <li>
                        <a href="">Prints with Aluminium Frame</a>
                    </li>
                    <li>
                        <a href="">Canvas Prints</a>
                    </li>
                    <li>
                        <a href="">Framed Canvas Prints</a>
                    </li>
                    <li>
                        <a href="">Need Something Printed?</a>
                    </li>
                    <img class="img-fluid googleImg"src="{{ asset('frontend/images/googleFooter.png')}}" alt="">
                </ul>
            </div>
            <div class="col-lg-3 col-6 order-lg-4 order-lg-2 order-2">
                <h6>Contact</h6>
                <ul class="list">
                    <li>
                    {!! $siteInformation->contact!!}
                    </li>
                    
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
                            All Rights Reserved by ARTEMYST 2022
                        </li>
                        <li>
                            Designed By <a href=""><img class="img-fluid"src="{{ asset('frontend/images/pentacodeLogo.png')}}" alt=""></a>
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
                       <a href="" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartListRight" aria-controls="offcanvasRight">
                           <img class="img-fluid"src="{{ asset('frontend/images/bottom-01.png')}}" alt="">
                           <p>Cart</p>
                       </a>
                   </li>
                    <li>
                        <div class="dropdown">
                            <a class=" dropdown-toggle text-center" type="button" id="dropdownMenuButton1"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="img-fluid "src="{{ asset('frontend/images/bottom-02.png')}}" alt="">
                                <p>Account</p>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><a class="dropdown-item" href="register.php">Register</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="index.php">
                            <img class="img-fluid"src="{{ asset('frontend/images/bottom-05.png')}}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="category.php">
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
<script  src="{{ asset('frontend/js/scripts.min.js')}}"></script>
<script  src="{{ asset('frontend/js/custom.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
@if(Session::has('success'))
<script>
setTimeout(function () {
    Toast.fire({title: "Done it!", text: '{{ Session::get('success')}}', icon: 'success'});
    // toastr['success'](
    //     'Your Email Verified Successfully',
    //     {
    //         closeButton: true,
    //         tapToDismiss: false
    //     }
    // );
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

<!--    <script src="assets/owlcarousel/owl.carousel.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xzoom/1.0.15/xzoom.min.js"></script>
<script src="{{ asset('frontend/xzoom/js/setup.js')}}"></script>



<script  src="{{ asset('frontend/js/scripts.min.js')}}"></script>
<script  src="{{ asset('frontend/js/custom.js')}}"></script>


<!--    <script src="https://code.jquery.com/jquery-2.2.4.min.js')}}"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.js"></script>

<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })
    var swal = Swal.mixin({
        backdrop: true, showConfirmButton: true,
    });
    var Toast = Swal.mixin({
        toast: true, position: 'top-end', showConfirmButton: false, timer: 3000
    });
</script>
</body>
</html>
