@extends('web.layouts.main')
@section('content')
<section class="col-12 locationbanner p-0">
           <div class="d-flex justify-content-end">
              <div class="locinner_bannerimg w-100">
                <img src="{{ asset('frontend/img/support.png')}}" class="w-100" alt="Meet and Greet" />
                <div class="loc-text text-center">
                    <div class="container">
                        <h1>LOCATIONS</h1>
                    </div> 
                </div>
              </div>
           </div> 
         </section>          
         <section class="col-12 airport_list_section">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5 section-head text-center mb-4" data-aos-duration="600" class="aos-init aos-animate">
                <h2 data-aos="fade-up" >Our Airports</h2>
                <p data-aos="fade-up" >We take pride in offering top-notch airport services that 
                  cater to all scales of airports.</p>
              </div>
              <div class="col-lg-10 airport_lists">
                <div class="d-flex flex-wrap">

                @foreach ($locations as $location)
                  <div class="airport_list_grid text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                  <a href="{{ url('location/' . @$location->title) }}">
                      <div class="airtport_list_thumb">
                      {!! Helper::printImage(@$location, 'desktop_banner', 'desktop_banner_webp', '', 'img-fluid') !!}
                      <h3>{{ $location->code }}</h3>
              </div>
              <h4>{{ $location->code }}</h4>
              <p>{{ $location->title }} {{ $location->travel_sector }}   Airport</p>
                    </a> 
                  </div>
                  @endforeach
                 
                
                </div>
              </div>
            </div>
          </div>
         </section>

    @endsection
