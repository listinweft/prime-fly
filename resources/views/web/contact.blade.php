
@extends('web.layouts.main')
@section('content')
  @include('web.includes.banner',[$banner, 'type'=> 'Contact'])
  <style>
        .invalid-feedback{
            color: #FFFFFF !important;
        }
    </style>
    <section class="contact_page">
        <div class="container">
            <div class="row align-items-start">
                @if($contactAddresses->isNotEmpty())
                    <div class="col-xl-8">
                        <h1>Contact Us</h1>
                        @foreach( $contactAddresses as $address)
                            <div class="contact_card">
                                <h5>{{ $address->location }}</h5>
                                <div class="contact_wrapper">
                                    @if($address->address != '' || $address->address != NUll)
                                        <div class="contact_info">
                                            <div class="cnt">
                                                <img src="{{asset('frontend/images/svg/contact-location.svg')}}" alt="">
                                                {!! $address->address !!}
                                            </div>
                                        </div>
                                    @endif
                                    @if($address->address != '' || $address->address != NUll)
                                        <div class="contact_info">
                                            <div class="cnt">
                                                <img src="{{asset('frontend/images/svg/contact-clock.svg')}}" alt="">
                                                <h6>Working Time</h6>
                                                {!! $address->working_time !!}
                                            </div>
                                        </div>
                                    @endif
                                    @if($address->email != '' || $address->email != NUll || $address->alternate_email != '' || $address->alternate_email != NUll)
                                        <div class="contact_info">
                                            <div class="cnt">
                                                <img src="{{asset('frontend/images/svg/contact-mail.svg')}}" alt="">
                                                <ul>
                                                    @if($address->email != '' || $address->email != NUll)
                                                        <li><a href="mailto:{{ $address->email }}">{{ $address->email }}</a></li>
                                                    @endif
                                                    @if($address->alternate_email != '' || $address->alternate_email != NUll)
                                                        <li><a href="mailto:{{ $address->alternate_email }}">{{ $address->alternate_email }}</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    @if($address->whatsapp_number != '' || $address->whatsapp_number != NUll)
                                        <div class="contact_info">
                                            <div class="cnt">
                                                <img src="{{asset('frontend/images/svg/contact-whatsapp.svg')}}" alt="">
                                                <ul>
                                                    <li>
                                                        <a target="_blank" href="{{ 'https://wa.me/'.str_replace(' ', '', $address->whatsapp_number) }}" class="whatsapp">{{$address->whatsapp_number}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    @if($address->phone != '' || $address->phone != NUll || $address->alternate_phone != '' || $address->alternate_phone != NUll)
                                        <div class="contact_info">
                                            <div class="cnt">
                                                <img src="{{asset('frontend/images/svg/contact-call.svg')}}" alt="">
                                                <ul>
                                                    @if($address->phone != '' || $address->phone != NUll)
                                                        <li><a href="tel:{{ $address->phone }}"  class="strong">{{ $address->phone }}</a></li>
                                                    @endif
                                                    @if($address->alternate_phone != '' || $address->alternate_phone != NUll)
                                                        <li><a href="tel:{{ $address->alternate_phone }}" class="strong">{{ $address->alternate_phone }}</a></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="contact_info">
                                        <div class="cnt">
                                            <div class="social">
                                                @if($address->facebook_url != '' || $address->facebook_url != NUll)
                                                    <a href="{{ $address->facebook_url }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                                @endif
                                                @if($address->instagram_url != '' || $address->instagram_url != NUll)
                                                    <a href="{{ $address->instagram_url }}" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                                @endif
                                                @if($address->twitter_url != '' || $address->twitter_url != NUll)
                                                    <a href="{{ $address->twitter_url }}" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                                @endif
                                                @if($address->linkedin_url != '' || $address->linkedin_url != NUll)
                                                    <a href="{{ $address->linkedin_url }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                                                @endif
                                                @if($address->snapchat_url != '' || $address->snapchat_url != NUll)
                                                    <a href="{{ $address->snapchat_url }}" target="_blank"><i class="fa-brands fa-snapchat"></i></a>
                                                @endif
                                                @if($address->pinterest_url != '' || $address->pinterest_url != NUll)
                                                    <a href="{{ $address->pinterest_url }}" target="_blank"><i class="fa-brands fa-pinterest"></i></a>
                                                @endif
                                                @if($address->youtube_url != '' || $address->youtube_url != NUll)
                                                    <a href="{{ $address->youtube_url }}" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($address->google_map != '' || $address->google_map != NUll)
                                    <div class="map">
                                        <iframe src="{{ $address->google_map }}"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                    @else
                                    <div class="map">
                                       
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="col-xl-4 sticky-lg-top sticky-lg-top-110">
                    <div class="form_wrapper">
                        <h1>Request More Info</h1>
                        <form action="{{ url('contact') }}" method="post" id="requestMoreInfoForm" name="requestMoreInfoForm">
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" name="name" required class="form-control nameField required" placeholder="Name*">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" required class="form-control required" placeholder="Email*">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" required class="form-control phoneField required" placeholder="Phone*">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" required class="form-control required" placeholder="Subject*">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" required class="form-control form-message required" placeholder="Message*"></textarea>
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <input type="hidden" name="type" value="contact">
                                    <button class="btn form_submit_btn" data-url="/enquiry">SUBMIT</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
