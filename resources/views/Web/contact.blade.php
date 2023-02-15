@extends('web.layouts.main')
@section('content')
{{-- @include('web.includes.banner') --}}



<!--Inner Banner Start-->
<section class="innerBanner">
    <div class="innerBannerImageArea">
        <img class="bannerImg img-fluid" src="{{ asset('frontend/images/banner/banner-04.jpg')}}" alt="">
    </div>
    <div class="innerBannerDetails">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Contact Us</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><img src="{{ asset('frontend/images/home.png')}}" alt=""></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Inner Banner End-->

<!--Blog Listing Page Start-->
<section class="contactUsPage">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h6 class="subHeading">{{@$contact->contact_request_title}}</h6>
                <h2 class="mainHeading">{{@$contact->title}}</h2>
                <div class="headingText">
                    <p>
                        {{@$contact->description}}
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="contactWrapper">
                    <div class="contactItem text-center">
                        <div class="iconBox">
                            {!! Helper::uploadFile($file, 'phone_image', 'img-fluid') !!}
                        </div>
                        <h5>Call Us</h5>
                        <ul>
                            <li>
                                <a href="tel:+971000000000">{{@$contact->phone}}</a>
                            </li>
                            <li>
                                <a href="tel:+971000000000">{{@$contact->alternate_phone}}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="contactItem text-center">
                        <div class="iconBox">
                            {!! Helper::uploadFile($file, 'address_image', 'img-fluid') !!}
                        </div>
                        <h5>Locate Us</h5>
                        <ul>
                            <li>
                                {{@$contact->address}}
                            </li>
                        </ul>
                    </div>
                    <div class="contactItem text-center">
                        <div class="iconBox">
                            {!! Helper::uploadFile($file, 'email_image', 'img-fluid') !!}
                        </div>
                        <h5>Email Us</h5>
                        <ul>
                            <li>
                                <a href="mailto:info@artemyst.com" >{{@$contact->email}}</a>
                            </li>
                            <li>
                                <a href="mailto:sales@artemyst.com" >{{@$contact->alternate_email}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Blog Listing Page End -->


<!--Contact Page Start -->

<section class="contactPageForm">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 ps-0 pe-0">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8587.210954799328!2d55.25341403158094!3d25.187116237053157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f69d8ffc92625%3A0x87fe1fd8aa716eb7!2sWME%20Global!5e0!3m2!1sen!2sin!4v1670240944632!5m2!1sen!2sin"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <div class="col-lg-6  ps-0">
                <div class="formArea">
                    <h5>Enquire Now</h5>
                    <div class="row">
                        <div class=" col-12">
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <img src="assets/images/loginUser.png" alt="">
                                <input type="text" class="form-control" placeholder="Full Name">
                                <span class="invalidMessage"> Given Data Error </span>
                            </div>
                        </div>
                        <div class=" col-12">
                            <div class="form-group">
                                <label for="">Email Address</label>
                                <img src="assets/images/icon-email.png" alt="">
                                <input type="text" class="form-control" placeholder="Email Address">
                            </div>
                        </div>
                        <div class=" col-12">
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <img src="assets/images/icon-phone.png" alt="">
                                <input type="number" class="form-control" placeholder="+1 000 000 00">
                            </div>
                        </div>
                        <div class="col-12 message">
                            <div class="form-group">
                                <label for="">Message</label>
                                <img src="assets/images/icon-pen.png" alt="">
                                <textarea class="form-control" placeholder="Say Something"></textarea>
                            </div>
                        </div>
                        <div class="col-12x ">
                            <div class="form-group d-flex align-items-end">
                                <button type="submit" class="primary_btn ">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!--Contact Page End -->
