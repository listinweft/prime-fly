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
                   @foreach ($categorys as $category)
                    <div class="col-lg-3 servce_listing_grid">
                   

                        <div class="item"> 
                            <a href="{{ url('service/'.@$category->short_url) }}">
                            {!! Helper::printImage(@$category, 'image', 'image_webp', '', 'img-fluid') !!}
                                <h4>{{$category->title}}</h4>
                            </a>
                        </div>

                       

                    </div>
                    @endforeach
                   
                    
                    
                </div>
              </div>
            </div>
         </section> 
    @endsection

