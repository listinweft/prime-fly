@extends('web.layouts.main')
@section('content')
    
@include('web.includes.banner',[$banner, 'title'=> 'Contact Us','type'=> 'Contact Us'])


  

    <!--Blog Listing Page Start-->
    <section class="contactUsPage">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="subHeading">{!! @$contact->contact_request_title !!}</h6>
                    <h2 class="mainHeading">{!! @$contact->contact_page_title !!}</h2>
                    <div class="headingText">
                        <p>
                            {!! @$contact->description !!}
                        </p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="contactWrapper">
                        <div class="contactItem text-center">
                            <div class="iconBox">
                                {!! Helper::printImage($contact, 'phone_image', 'phone_image_webp' ,'', 'img-fluid') !!}
                            </div>
                            <h5>Call Us</h5>
                            <ul>
                                <li>
                                    <a href="tel:+971000000000">{{ @$contact->phone }}</a>
                                </li>
                                <li>
                                    <a href="tel:+971000000000">{{ @$contact->alternate_phone }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="contactItem text-center">
                            <div class="iconBox">
                                {!! Helper::printImage($contact, 'address_image','address_image_webp' ,'', 'img-fluid') !!}
                            </div>
                            <h5>Locate Us</h5>
                            <ul>
                                <li>
                                    {!! @$contact->address !!}
                                </li>
                            </ul>
                        </div>
                        <div class="contactItem text-center">
                            <div class="iconBox">
                                {!! Helper::printImage($contact, 'email_image', 'email_image_webp' ,'', 'img-fluid') !!}
                            </div>
                            <h5>Email Us</h5>
                            <ul>
                                <li>
                                    <a href="mailto:info@artemyst.com">{{ @$contact->email }}</a>
                                </li>
                                <li>
                                    <a href="mailto:sales@artemyst.com">{{ @$contact->alternate_email }}</a>
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
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8587.210954799328!2d55.25341403158094!3d25.187116237053157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f69d8ffc92625%3A0x87fe1fd8aa716eb7!2sWME%20Global!5e0!3m2!1sen!2sin!4v1670240944632!5m2!1sen!2sin"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-6  ps-0">
                    <div class="formArea">
                        <h5>Enquire Now</h5>
                        <form method="post" id="enquiry" action="{{ url('contact') }}" name="enquiry">
                            <div class="row">
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Full Name</label>
                                        <img src="{{ asset('frontend/images/loginUser.png') }}" alt="">
                                        <input type="text" class="form-control nameField required"
                                            placeholder="Full Name" name="name" required>
                                        <span class="invalidMessage"></span>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <img src="{{ asset('frontend/images/icon-email.png') }}" alt="">
                                        <input type="text" class="form-control required" placeholder="Email Address"
                                            name="email" required>
                                        <span class="invalidMessage"></span>
                                    </div>
                                </div>
                                <div class=" col-12">
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <img src="{{ asset('frontend/images/icon-phone.png') }}" alt="">
                                        <input type="number" class="form-control phoneField required"
                                            placeholder="+1 000 000 00" name="phone" required>
                                        <span class="invalidMessage"></span>

                                    </div>
                                </div>
                                <div class="col-12 message">
                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <img src="{{ asset('frontend/images/icon-pen.png') }}" alt="">
                                        <textarea class="form-control form-message required" placeholder="Say Something" name="message" required></textarea>
                                        <span class="invalidMessage"></span>

                                    </div>
                                </div>
                                <div class="col-12x ">
                                    <div class="form-group d-flex align-items-end">
                                        <input type="hidden" name="type" value="contact">
                                        <button type="submit" class="primary_btn form_submit_btn"
                                            data-url="/enquiry">Submit</button>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>
    </section>
@endsection
<!--Contact Page End -->
