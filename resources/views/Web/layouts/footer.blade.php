
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

