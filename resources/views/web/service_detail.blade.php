@extends('web.layouts.main')
@section('content')


<section class="col-12 servicebanner p-0">
           <div class="d-flex justify-content-end">
              <div class="serviceinner_bannerimg">
              {!! Helper::printImage(@$category, 'desktop_banner', 'desktop_banner_webp', '', 'img-fluid') !!}
              </div>
           </div>
            <div class="banner_content">
               <div class="container">
                  <div class="d-flex flex-wrap justify-content-between">
                    <div class="col-lg-4 srvc_bnnr_text">
                      <h1 data-aos="fade-up" data-aos-duration="500">
                        <span>It’s time to</span> Discover  <span>Find and book a great experience</span>
                     </h1>
                    </div>
                     <div class="col-lg-11"> 

                     @if(@$category->title == "Meet and Greet")
                        

                     @include("web.meet_and_greet")


                     @elseif($category->title == "Baggage wrapping")


                     @include('web.baggage_form')


                     @elseif($category->title == "Car Parking")

                     @include('web.carparking')



                     @elseif($category->title == "Porter")


                     @include('web.porter')


                     @elseif($category->title == "Airport Entry")


                     @include('web.airportentry')


                     @elseif($category->title == "Cloak Room")


                     @include('web.cloackroom')


                   

@else

@include('web.lounchbooking')       



@endif


                  </div>
               </div>
            </div>
         </section>
         <section class="col-12 srvc_work_section">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-7 section-head text-center mb-4">
                <h2 data-aos="fade-up" data-aos-duration="600">How It Works</h2>
                <p data-aos="fade-up" data-aos-duration="800">Experience the warmth of our meet and Greet service, where our
                   team of smiling faces, helping hands, and caring hearts are ready to assist you every step of the way.</p>
              </div>
              <div class="col-lg-10 works_tab">
                <!-- <ul class="nav nav-tabs srvc_tab_list" id="service_wrktab" role="tablist" data-aos="fade-up" data-aos-duration="600">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Domestic Arrival</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">International Arrival</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Domestic Departure</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contac-tab" data-bs-toggle="tab" data-bs-target="#contac-tab-pane" type="button" role="tab" aria-controls="contac-tab-pane" aria-selected="false">International Departure</button>
                  </li>
                </ul>
                <div class="tab-content" id="srvc_tab_content" data-aos="fade-up" data-aos-duration="600">
                  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="d-flex flex-wrap justify-content-center">
                      <div class="col-lg-3">
                        <div class="srvc_wrk_grid">
                          <img src="img/meetngreet1.png"/>
                          <h4>Warm Welcome</h4>
                          <p>A dedicated Prime Fly executive 
                            greets you upon arrival or 
                            departure, ensuring a smooth 
                            airport experience.</p>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="srvc_wrk_grid">
                          <img src="img/meetngreet2.png"/>
                          <h4>Hassle-Free Formalities</h4>
                          <p>A dedicated Prime Fly executive 
                            greets you upon arrival or 
                            departure, ensuring a smooth 
                            airport experience.</p>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="srvc_wrk_grid">
                          <img src="img/meetngreet3.png"/>
                          <h4>Personalized Support</h4>
                          <p>A dedicated Prime Fly executive 
                            greets you upon arrival or 
                            departure, ensuring a smooth 
                            airport experience.</p>
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="srvc_wrk_grid">
                          <img src="img/meetngreet4.png"/>
                          <h4>Escorted Journey</h4>
                          <p>A dedicated Prime Fly executive 
                            greets you upon arrival or 
                            departure, ensuring a smooth 
                            airport experience.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
                  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
                  <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">...</div>
                </div> -->
                <ul class="nav nav-tabs srvc_tab_list" id="service_wrktab" role="tablist">
    @foreach($subcategories as $index => $sub)
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $index == 0 ? 'active' : '' }}" id="pills-tab-{{ $sub->id }}" data-bs-toggle="pill" data-bs-target="#pills-{{ $sub->id }}" type="button" role="tab" aria-controls="pills-{{ $sub->id }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{ $sub->title }}</button>
        </li>
    @endforeach
</ul>
                <div class="tab-content" id="srvc_tab_content">
    @foreach($subcategories as $index => $sub)
        <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}" id="pills-{{ $sub->id }}" role="tabpanel" aria-labelledby="pills-tab-{{ $sub->id }}" tabindex="0">
            <div class="d-flex flex-wrap justify-content-center">
            @php
    $galleryItems = App\Models\CategoryGallery::where('category_id', $sub->id)->get();
@endphp

@if(!$galleryItems->isEmpty())
    @foreach($galleryItems as $galleryItem)
        <div class="col-lg-3 col-md-4 col-sm-4 col-6 service_grid_wrap">
            <div class="srvc_wrk_grid">
                {!! Helper::printImage($galleryItem, 'image', 'image_webp', '', 'img-fluid') !!}
                <h4>{{ $galleryItem->title }}</h4>
                <p>{!! strip_tags($galleryItem->description) !!}</p> 
            </div> 
        </div>
    @endforeach
@endif

            </div>
        </div>
    @endforeach
</div>
                
              </div>
            </div>
          </div>
         </section>
         <section class="col-12 airport_list_section">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5 section-head text-center mb-4">
                <h2 data-aos="fade-up" data-aos-duration="600">Our Airports</h2>
                <p data-aos="fade-up" data-aos-duration="800">We take pride in offering top-notch airport services that 
                  cater to all scales of airports.</p>
              </div>
              <div class="col-lg-10 airport_lists">
                <div class="d-flex flex-wrap">
                @foreach ($locations as $location)
                  <div class="airport_list_grid text-center" data-aos="fade-up" data-aos-duration="1000">
                  <a href="{{ url('location/'.@$location->title) }}">
                      <div class="airtport_list_thumb">
                       
                        {!! Helper::printImage(@$location, 'image', 'image_webp', '', 'img-fluid') !!}
                        <h3>{{ $location->title }}</h3>
                      </div>
                      <h4>{{ $location->code }}</h4>
                      <p>{{ $location->title }} International Airport</p>
                    </a> 
                  </div>
                   
                  @endforeach
                  
                <div class="col-12 text-center mt-3">
                  <!-- <a href="{{ url('locations/') }}" class="btn-style-2"><div class="btn-in">View More</div></a> -->
                </div>
                </div>
              </div>
            </div>
          </div>
         </section> 

         
      
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-5 section-head text-center mb-4">
                 
                {!! @$category->description !!}

                </div>
              
              </div>
            </div>
   

         <section class="col-12 home_testimonial">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-5 section-head text-center mb-4">
                  <h2 data-aos="fade-up" data-aos-duration="600">Testimonials</h2>
                  <p data-aos="fade-up" data-aos-duration="800">Listen to our customers as they share where we excelled 
                    in terms of quality.</p>
                </div>
                <div class="col-lg-10 testimonial_slider" data-aos="fade-up" data-aos-duration="1000">
                    <div class="owl-carousel owl-theme testimonial-carousel" >
                    @foreach ($testimonials as $testimonial)
                      <div class="item testimonial-wrap">
                          <div class="d-flex">
                      
                              <div class="testimonial-grid">
                                <p><img src="{{ asset('frontend/img/quote1.png')}}" style="width:20px" alt="author"/>
                                {!! strip_tags($testimonial->message) !!}

                                  <img src="{{ asset('frontend/img/quote2.png')}}" style="width:20px" alt="author"/></p>
                                <div class="d-flex testimonial-author">
                                  <div class="testiminial-img">
                                  {!! Helper::printImage(@$testimonial, 'image', 'image_webp', '', 'img-fluid') !!}
                                  </div>
                                  <div class="testiminial-designation">
                                    <h4>{{ $testimonial->name}}</h4>
                                    <h5>{{ $testimonial->designation}}.</h5>
                                  </div>
                                </div>
                            </div>
                         
                          </div>
                      </div>
                      @endforeach
                      
                  </div>
                </div>
              </div>
            </div>
         </section>

         @endsection
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>

<script>
  
$(document).ready(function() {


  

  

    // Increment/Decrement functionality
      // $('.count-btn').click(function() {

        
      //     var $input = $(this).siblings('input');
      //     var value = parseInt($input.val());

      //     if ($(this).hasClass('plus')) {
      //         value++;
      //     } else if ($(this).hasClass('minus')) {
      //         value = value > 0 ? value - 1 : 0;
      //     }

      //     $input.val(value);
      // });



//     $(function() {
//     $('#travel_sector').change(function() {

//       var travelSector = $(this).val();

//       alert(travelSector);
//         if (travelSector) {
//           var base_url = "{{ url('/') }}";
        
//             $.ajax({
//               url: base_url+'/get-locations',
//                 type: 'POST',

//                 data: {
//                     travel_sector: travelSector,
//                     _token: '{{ csrf_token() }}' // Include CSRF token
//                 },
//                 headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     },
//                 success: function(data) {
//                     var originSelect = $('#origins');
                   
//                     var destinationSelect = $('#destinations');
//                     console.log(data.locations)

//                     originSelect.empty().append('<option value="">Select Origin</option>');
//                     destinationSelect.empty().append('<option value="">Select Destination</option>');

//                     $.each(data, function(key, location) {
//                         originSelect.append('<option value="' + location.id + '">' + location.title + '</option>');
//                         destinationSelect.append('<option value="' + location.id + '">' + location.title + '</option>');
//                     });
//                 }
//             });
//         } else {
//             $('#origin').empty().append('<option value="">Select Origin</option>');
//             $('#destination').empty().append('<option value="">Select Destination</option>');

            
//         }
     
//     });
// });





   
   
});


  </script>




@endpush