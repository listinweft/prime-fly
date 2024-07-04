@extends('web.layouts.main')
@section('content')
<section class="col-12 primefly_section about_main">
          <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-7 primefly_feature_content">
                  <h2 data-aos="fade-up" data-aos-duration="600">Primefly</h2>
                  <p data-aos="fade-up" data-aos-duration="800">Primefly is an exclusive airport hospitality service provided by Speedwings. They provide services such as meet 
                    and greet, parking, cloakroom, check-in assistance, and baby/elder sitting within the airport premises. 
                    They have been operating in most parts of India for the past 25 years and have earned the trust of millions of passengers.. </p>
                </div>
                <div class="company-counter" data-aos="fade-up" data-aos-duration="1000">
                  <div class="company-counter-item">
                      <div class="company-counter-item-wraper">
                          <div class="company-counter-item-icon"><img src="{{ asset('frontend/img/trust.webp')}}" alt=""></div>
                          <div class="company-counter-item-content">
                              <h4 class="count adon" data-count="25" data-adon="+">25+</h4>
                              <span>Years of Trust</span>
                          </div>
                      </div>
                  </div>
                  <div class="company-counter-item">
                      <div class="company-counter-item-wraper">
                          <div class="company-counter-item-icon"><img src="{{ asset('frontend/img/happy-customer.webp')}}" alt=""></div>
                          <div class="company-counter-item-content">
                              <h4 class="count adon" data-count="22" data-adon="+">22+</h4>
                              <span>Lakhs Customers</span>
                          </div>
                      </div>
                  </div>
              </div>
              </div>
          </div>
          <div class="col-lg-12 places"> 
            <img src="{{ asset('frontend/img/places.webp')}}" class="w-100 place_vector" alt="Place" />
            <img src="{{ asset('frontend/img/cloud.webp')}}" class="cloud-left" alt="cloud"/>
            <img src="{{ asset('frontend/img/cloud2.webp')}}" class="cloud-right" alt="cloud"/>
          </div>
         </section>
         <section class="col-12 about-who">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-6 who_illlstrater">
                                <img src="{{ asset('frontend/img/about.png')}}" class="w-100" alt="cloud"/>
                            </div>
                            <div class="col-lg-5 who_content">
                                <h3>Who <br> We Are</h3>    
                                <h4>We Provide Quality Service with No Compromise</h4>
                                <p>Pulvinar vel egestas lectus cras scelerisque massa. Magna augue lobortis aliquet felis 
                                    nunc pellentesque aliquam amet sit. Diam diam volutpat feugiat leo magna senectus 
                                    cursus dictum. Libero morbi consectetur sed bibendum urna massa lectus placerat sed. 
                                    Ac faucibus ut hendrerit dapibus sagittis feugiat molestie. Ultricies eu purus pharetra 
                                    quam nullam consequat habitant aliquam dapibus. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
         <section class="col-12 about-why">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-5 why-content">
                        <h3>Why us</h3>
                        <p>Pulvinar vel egestas lectus cras scelerisque massa. Magna augue lobortis aliquet felis nunc pellentesque 
                            aliquam amet sit. Diam diam volutpat feugiat leo magna senectus cursus dictum. Libero morbi consectetur sed bibendum urna massa lectus placerat sed. Ac faucibus ut hendrerit dapibus sagittis feugiat molestie. 
                            Ultricies eu purus pharetra quam nullam consequat habitant aliquam dapibus. </p>
                    </div>
                    <div class="col-lg-6 vision_mission_wrap">
                        <div class="row justify-content-between">
                            <div class="col-lg-5 why_mission">
                                <img src="{{ asset('frontend/img/mission.png')}}" alt="cloud"/>
                                <h4>Mission</h4>
                                <p>Lorem ipsum dolor sit amet consectetur. Nec est justo sed tempus laoreet. Scelerisque feugiat
                                    ut diam volutpat sit habitasse vitae tortor. </p>
                            </div>
                            <div class="col-lg-5 why_vision">
                                <img src="{{ asset('frontend/img/vision.png')}}" alt="cloud"/>
                                <h4>Vision</h4>
                                <p>Lorem ipsum dolor sit amet consectetur. Nec est justo sed tempus laoreet. Scelerisque feugiat
                                    ut diam volutpat sit habitasse vitae tortor. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
         <section class="our-features">
            <div class="our-features-container">
                <h2 class="section-head aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">Our Features</h2>
                <div class="features-item-wraper">
                    <div class="features-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <div class="features-item-image satisfaction"><img src="{{ asset('frontend/img/featur1.png')}}" alt="Customer Satisfaction"></div>
                        <div class="features-item-content">
                            <h4>Customer Satisfaction</h4>
                            <p>At Speedwings, customer satisfaction is paramount. We prioritize the needs and preferences of our travelers, striving to exceed their expectations at every touchpoint.&nbsp;</p>
                        </div>
                    </div>
                    <div class="features-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <div class="features-item-image quality"><img src="{{ asset('frontend/img/featur2.png')}}" alt="Quality service"></div>
                        <div class="features-item-content">
                            <h4>Quality service</h4>
                            <p>Trust forms the bedrock of our operations. We understand the importance of earning and maintaining the trust of our customers by consistently delivering on our promises.</p>
                        </div>
                    </div>
                    <div class="features-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <div class="features-item-image trust"><img src="{{ asset('frontend/img/featur3.png')}}" alt="Trust"></div>
                        <div class="features-item-content">
                            <h4>Trust</h4>
                            <p>Quality is ingrained in everything we do at Speedwings. From meet-and-greet services to baggage wrapping, we uphold the highest standards of excellence.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection
@push('scripts')

@endpush