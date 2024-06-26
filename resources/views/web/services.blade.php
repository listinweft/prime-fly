@extends('web.layouts.main')
@section('content')

<section class="col-12 locationbanner p-0">
           <div class="d-flex justify-content-end">
              <div class="locinner_bannerimg">
                <img src="{{ asset('frontend/img/support.png')}}" class="w-100" alt="Meet and Greet" />
                <div class="loc-text text-center">
                    <div class="container">
                        <h1>SERVICES</h1>
                    </div> 
                </div>
              </div>
           </div> 
         </section>          
         <section class="col-12 service-section">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-7 section-head text-center mb-4"  data-aos="fade-up" data-aos-duration="600">
                   
                  <p>Our airport services include Meet-and-greet service, comfortable lounges, protective baggage wrapping, 
                    excellent luggage assistance, and even viewer gallery tickets for layovers.</p>
                </div>
                <div class="col-lg-10 service-slider" data-aos="fade-up" data-aos-duration="600">
                   <div class="row justify-content-center">
                    <div class="col-lg-3 servce_listing_grid">
                        <div class="item"> 
                            <a href="#">
                                <img src="{{ asset('frontend/img/meet_greet.svg')}}" alt="Service">
                                <h4>Meet &amp; Greet</h4>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 servce_listing_grid">
                    <div class="item">
                      <a href="#"> 
                        <img src="{{ asset('frontend/img/baggage.svg')}} " alt="Service"/>
                        <h4>Baggage Wrapping</h4>
                      </a>
                    </div>
                    </div>
                    <div class="col-lg-3 servce_listing_grid">
                    <div class="item">
                      <a href="#"> 
                        <img src="{{ asset('frontend/img/car_parking.svg')}}" alt="Service"/>
                        <h4>Car Parking</h4>
                      </a>
                    </div>
                    </div>
                    <div class="col-lg-3 servce_listing_grid">
                    <div class="item">
                      <a href="#"> 
                        <img src="{{ asset('frontend/img/porter.svg')}}" alt="Service"/>
                        <h4>Porter</h4>
                      </a>
                    </div>
                    </div>
                    <div class="col-lg-3 servce_listing_grid">
                        <div class="item">
                        <a href="#"> 
                            <img src="{{ asset('frontend/img/airport_entry.svg')}}" alt="Service"/>
                            <h4>Airport Entry Ticketing</h4>
                        </a>
                        </div> 
                    </div> 
                   </div>
                </div>
              </div>
            </div>
         </section> 
    @endsection

