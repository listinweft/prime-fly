@extends('web.layouts.main')
@section('content')
<main>
        
         <section class="col-12 locationbanner p-0">
           <div class="d-flex justify-content-end">
              <div class="locinner_bannerimg">
                
                {!! Helper::printImage(@$blog, 'image', 'image_webp', '', 'img-fluid') !!}
                <div class="loc-text">
                    <h1>{{$blog->title}}</h1>
                </div>
              </div>
           </div> 
         </section>
        
         <section class="col-12 service-section">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-7 section-head text-center mb-4"  data-aos="fade-up" data-aos-duration="600">
                  <h2>Our Services</h2>
                  <p>Our airport services include Meet-and-greet service, comfortable lounges, protective baggage wrapping, 
                    excellent luggage assistance, and even viewer gallery tickets for layovers.</p>
                </div>
                <div class="col-lg-10 service-slider" data-aos="fade-up" data-aos-duration="600">
                  <div class="owl-carousel owl-theme service-carousel">

                  @foreach ($categorys as $category)
                    <div class="item"> 
                    <a href="{{ url('service/'.@$category->short_url) }}">
                      {!! Helper::printImage(@$category, 'image', 'image_webp', '', 'img-fluid') !!}
                        <h4>{{$category->title}}</h4>
                      </a>
                    </div>
                    @endforeach
                   
                    
                  </div>
                </div>
              </div>
            </div>
         </section> 
         <section class="col-12 airport-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 section-head text-center mb-4"  data-aos="fade-up" data-aos-duration="600">
                        <h2>{{$blog->title}} Airport</h2>
                        <p>An Eminent Experience</p>
                      </div>
                      <div class="col-12 airport-slider" data-aos="fade-up" data-aos-duration="1000">
                        <div class="owl-carousel airport-carousel">

                        @foreach ($gallery as $category)
                            <div class="item"> 
                                
                            {!! Helper::printImage(@$category, 'image', 'image_webp', '', 'img-fluid') !!}
                                 <div class="aiport-content">
                                    <!-- <h4>Heritage Terminal</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur. Eget lorem enim faucibus blandit diam id odio dui non. 
                                        Integer nibh imperdiet habitasse magna. Nec ac in eu pulvinar sed neque sed lacus. 
                                        Facilisis est ullamcorper tincidunt condimentum in aliquet. Lorem ipsum dolor sit amet 
                                        consectetur.</p> -->
                                 </div>
                            </div> 

                            @endforeach
                           
                           
                        </div>
                      
                      </div>
                </div>
            </div>
         </section>
         <section class="col-12 aiport-faq">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 section-head text-center mb-4"  data-aos="fade-up" data-aos-duration="600">
                        <h2>Frequently asked questions </h2> 
                      </div>
                    <div class="col-lg-9 airport-faq-cont" data-aos="fade-up" data-aos-duration="800">
                        <div class="accordion" id="accordionExample">
                        @foreach ($faqs as $index => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button @if ($index === 0){{ 'collapsed' }} @endif"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="collapse{{ $index }}">
                                            {!! $faq->question !!}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}" class="accordion-collapse collapse @if ($index === 0){{ 'show' }} @endif"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                           
                          </div>
                    </div>
                </div>
            </div>
         </section>
      
      </main>
    @endsection
@push('scripts')
<script>

$(".airport-carousel").owlCarousel({
            center: true,
            items:2,
            loop:true,
            margin:10,
            dots:false,
            nav: true,
            navText: ["<img src='img/prev.png'>","<img src='img/next.png'>"],
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:2, 
                },
                1000:{
                    items:2,
                    
                }
            } 
          });
          </script>
@endpush

