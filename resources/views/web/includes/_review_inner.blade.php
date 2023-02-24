<!-- Testimonial Start-->
<section class="testimonialSection productTestimonialSection">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-12 pt-60">
                <div class="testimonialsSlider">
                    <div class="testimonialsCard">
                        @foreach ($reviews as $review)
                            
                        @endforeach
                        <div class="testimonialsProfile">
                            <div class="leftPhoto">
                                <img class="img-fluid" src="{{asset('frontend/images/testimonail.png')}}" alt="">
                            </div>
                            <div class="rightDetails">
                                <h3>{{$review->name}}</h3>
                              
                                <div class="reviewIconStar">
                                    {{-- <div class="icon">
                                        <img class="imgBox" src="{{asset('frontend/images/google.png')}}" alt="">
                                    </div> --}}
                                    <div class="my-rating-readonly" data-rating="{{$review->rating}}"></div>
                                </div>
                            </div>
                        </div>
                        <div class="textWrapper">
                            <p>{!!$review->review!!}</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>