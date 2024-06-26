@extends('web.layouts.main')
@section('content')
<section class="col-12 locationbanner p-0">
           <div class="d-flex justify-content-end">
              <div class="locinner_bannerimg">
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
                  <div class="airport_list_grid text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <a href="">
                      <div class="airtport_list_thumb">
                        <img src="{{ asset('frontend/img/cochin.png')}}" alt="Cochin">
                        <h3>COK</h3>
                      </div>
                      <h4>CIAL</h4>
                      <p>Cochin International Airport</p>
                    </a> 
                  </div>
                  <div class="airport_list_grid text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <a href=""> 
                    <div class="airtport_list_thumb">
                      <img src="{{ asset('frontend/img/kannur.png')}}" alt="Cochin">
                      <h3>CNN</h3>
                    </div>
                    <h4>KIAL</h4>
                    <p>Kannur International Airport</p>
                    </a>
                  </div>
                  <div class="airport_list_grid text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <a href="">
                    <div class="airtport_list_thumb">
                      <img src="{{ asset('frontend/img/jaipure.png')}}" alt="Cochin">
                      <h3>JAI</h3>
                    </div>
                    <h4>JAI</h4>
                    <p>Jaipur International Airport</p>
                    </a>
                  </div>
                  <div class="airport_list_grid text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <a href="">
                    <div class="airtport_list_thumb">
                      <img src="{{ asset('frontend/img/manglore.png')}}" alt="Cochin">
                      <h3>IXE</h3>
                    </div>
                    <h4>IXE</h4>
                    <p>Mangalore International Airport</p>
                    </a>
                  </div>
                  <div class="airport_list_grid text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                    <a href="">
                    <div class="airtport_list_thumb">
                      <img src="{{ asset('frontend/img/irx.png')}}" alt="Cochin">
                      <h3>IXR</h3>
                    </div>
                    <h4>IXR</h4>
                    <p>Birsa Munda Airport, Ranchi</p>
                    </a>
                  </div>
                  <div class="airport_list_grid text-center aos-init" data-aos="fade-up" data-aos-duration="1000">
                    <a href="">
                    <div class="airtport_list_thumb">
                      <img src="{{ asset('frontend/img/rxr.png')}}" alt="Cochin">
                      <h3>RPR</h3>
                    </div>
                    <h4>RPR</h4>
                    <p>Cochin International Airport</p>
                    </a>
                </div>
                <div class="airport_list_grid text-center aos-init" data-aos="fade-up" data-aos-duration="1000">
                  <a href="">
                  <div class="airtport_list_thumb">
                    <img src="{{ asset('frontend/img/ccj.png')}}" alt="Cochin">
                    <h3>CCJ</h3>
                  </div>
                  <h4>CCJ</h4>
                  <p>Calicut International Airport</p>
                  </a>
                </div>
                <div class="airport_list_grid text-center aos-init" data-aos="fade-up" data-aos-duration="1000">
                  <a href="">
                  <div class="airtport_list_thumb">
                    <img src="{{ asset('frontend/img/chennai.png')}}" alt="Cochin">
                    <h3>MAA</h3>
                  </div>
                  <h4>MAA</h4>
                  <p>Chennai International Airport</p>
                  </a>
                </div>
                <div class="airport_list_grid text-center aos-init" data-aos="fade-up" data-aos-duration="1000">
                  <a href="">
                  <div class="airtport_list_thumb">
                    <img src="{{ asset('frontend/img/coimbatore.png')}}" alt="Cochin">
                    <h3>CJB</h3>
                  </div>
                  <h4>CJB</h4>
                  <p>Coimbatore International Airport</p>
                  </a>
                </div>
                <div class="airport_list_grid text-center aos-init" data-aos="fade-up" data-aos-duration="1000">
                  <a href="">
                  <div class="airtport_list_thumb">
                    <img src="{{ asset('frontend/img/coimbatore.png')}}" alt="Cochin">
                    <h3>CJB</h3>
                  </div>
                  <h4>CJB</h4>
                  <p>Coimbatore International Airport</p>
                  </a>
                </div>
                
                </div>
              </div>
            </div>
          </div>
         </section>

    @endsection
