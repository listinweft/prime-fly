@extends('web.layouts.main')
@section('content')

<section class="col-12 home_about">
            <div class="container"> 
                <div class="col-12 text-center section_head" data-aos="fade-down" data-aos-duration="1000">
                    <h2 class="mb-4">EMIRATI SOCIETY OF <br> ANESTHSESIOLOGY</h2>
                    <!-- <a href="about.html" class="common-btn">About Us</a> -->
                </div>
            </div>
            <div class="col-12 homeabout_image">
                <div class="d-flex align-items-end justify-content-between">
                    <div class="homeabout_grid">
                        <img data-aos="fade-down" data-aos-duration="500" src="{{asset('frontend/images/homeabout1.png')}}"/>
                        <img data-aos="fade-up" data-aos-duration="1000" src="{{asset('frontend/images/homeabout2.png')}}"/>
                    </div>
                    <div class="homeabout_grid" data-aos="fade-down" data-aos-duration="1000">
                        <img src="{{asset('frontend/images/homeabout3.png')}}"/> 
                    </div>
                    <div class="homeabout_grid" data-aos="fade-down" data-aos-duration="1000">
                        <img src="{{asset('frontend/images/homeabout4.png')}}"/> 
                    </div>
                    <div class="homeabout_grid" data-aos="fade-up" data-aos-duration="1000">
                        <img src="{{asset('frontend/images/homeabout5.png')}}"/> 
                    </div>
                    <div class="homeabout_grid">
                        <img src="{{asset('frontend/images/homeabout6.png')}}" data-aos="fade-down" data-aos-duration="500"/>
                        <img src="{{asset('frontend/images/homeabout7.png')}}" data-aos="fade-down" data-aos-duration="1000"/>
                    </div>
                </div>
            </div>
            <img class="homeabout_bgimg" src="{{asset('frontend/images/homebg.png')}}"/>
        </section>
        <section class="col-12 aboutus_section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-11">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-xl-5 col-lg-6 aboutus_left">
                                <h2 data-aos="fade-down" data-aos-duration="1000">About Us</h2>
                                <p data-aos="fade-up" data-aos-duration="1000">{!! $about->description !!} 
                                </p>
                            </div>
                            <div class="col-xl-5 col-lg-5 aboutus_right">
                            <img class="about-img1" data-aos="fade-down" data-aos-duration="1000" src="{{$about->image}}" />

                                <img class="about-img2" data-aos="fade-up" data-aos-duration="1000" src="{{$about->banner_image}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-12 whor_we">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="col-lg-6 whor_we_img">
                    <img class="about-img1" src="{{asset('frontend/images/who_r_we.png')}}"/>
                </div>
                <div class="col-lg-6 whor_we_desc">
                    <h2 data-aos="fade-down" data-aos-duration="1000">WHO ARE WE?</h2>
                    <p data-aos="fade-up" data-aos-duration="1000">{!! $who->description !!}
                    </p>
                    <div class="col-12 whor_we_founder">
                        <div class="d-sm-flex justify-content-start align-items-center">
                            <div class="founder_icon_left" data-aos="fade-right" data-aos-duration="1000">
                                <!-- <img class="about-img1" src="{{asset('frontend/images/founder.png')}}"/> -->
                                {!! Helper::printImage($who, 'banner_image','banner_image_webp','image_attribute', 'img-fluid') !!}
                               
                            </div>
                            <div class="founder_icon_right" data-aos="fade-left" data-aos-duration="1000">
                                <h4>{!! $who->subtitle !!}  </h4>
                                <p>{!! $who->alternative_description !!} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="col-12 honary_members">
            <div class="container">
                <h2 class="text-center" data-aos="fade-up" data-aos-duration="1000">Honorary Members</h2>
                @php
    $categories = \App\Models\Category::active()->whereNull('parent_id')->get();
@endphp

@foreach($categories as $category)
    <div class="col-12 honorary_abudhabi">
        <div class="col-12">
            <h3 class="honorary-sub-head" data-aos="fade-up" data-aos-duration="1000">{{ $category->title }}</h3>
        </div> 

         @php
            $aboutFeaturesForCategory = $aboutFeatures->where('category_id', $category->id);
           
        @endphp 

        @if($aboutFeaturesForCategory->isNotEmpty()) 
            <div class="row member_grid_wraper">
                @foreach($aboutFeaturesForCategory as $aboutFeature)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                        <div class="member_grid p-0">
                            <div class="member_img">
                                <img src="{{$aboutFeature->image}}" />
                            </div>
                            <div class="member_summery">
                                <h4>{{ $aboutFeature->title }}</h4>
                                <p>{!!$aboutFeature->description !!}</p>
                            </div>
                        </div>
                    </div>
                 @endforeach 
            </div>
         @endif 
    </div>
@endforeach

                <!-- <div class="col-12 honorary_dubai">
                    <div class="col-12">
                        <h3 class="honorary-sub-head" data-aos="fade-up" data-aos-duration="1000">Dubai</h3>
                    </div> 
                    <div class="row member_grid_wraper">
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                            <div class="member_grid p-0">
                                <div class="member_img">
                                    <img src="{{asset('frontend/images/honorary-avatar-male.png')}}" />
                                </div>
                                <div class="member_summery">
                                    <h4>Dr. Kaled Abuamra</h4>
                                    <p>Dubai hospital, <br>
                                        Consultant Anesthesiologist</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                            <div class="member_grid p-0">
                                <div class="member_img">
                                    <img src="{{asset('frontend/images/honorary-avatar-male.png')}}" />
                                </div>
                                <div class="member_summery">
                                    <h4>Dr. Mansour A Nadhari</h4>
                                    <p>Rashid Hospital, <br>
                                        Consultant Anesthesiologist</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                            <div class="member_grid p-0">
                                <div class="member_img">
                                    <img src="{{asset('frontend/images/honorary-avatar-female.png')}}" />
                                </div>
                                <div class="member_summery">
                                    <h4>Ms. Hamda Al Saboori</h4>
                                    <p>Rashid Hospital, <br> 
                                        Anesthesia Technologist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        <section class="col-12 vision_mision">
            <img src="{{asset('frontend/images/vm-vector.png')}}" alt="" class="vm-vector">
            <div class="container">
                <div class="col-12 vision_mision-header">
                    <h4 data-aos="fade-up" data-aos-duration="1000">VISION AND MISSION</h4>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-6 vision_mision-img-left" data-aos="fade-right" data-aos-duration="1000">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <img src="{{asset('frontend/images/vm-1.jpg')}}" alt="vision" class="vm-h-img" />
                            </div>
                            <div class="col-lg-6 col-6">
                                <img src="{{asset('frontend/images/vm-2.jpg')}}" alt="mission"/>
                                <img src="{{asset('frontend/images/vm-3.jpg')}}" alt="mission"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 vision_mision-content" data-aos="fade-left" data-aos-duration="1000">
                        <h4>Vision and Mission</h4>
                        <p>Our vision is to become a regional leader in improving and advancing clinical anesthesiology through innovation, research, quality, education, and collaboration.  <br>
                            Our mission is the relentless commitment to standardize and advance clinical anesthesiology practice to better serve our patients and secure the future of the specialty by inspiring and fostering the next generation of anesthesiology practitioners.  
                        </p>
                    </div>
                </div>
                <div class="row align-items-center our-logo">
                    <div class="col-lg-3 col-md-3 vision_mision-img-left" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{asset('frontend/images/our-logo.png')}}" alt="vision"/>
                    </div>
                    <div class="col-lg-6 col-md-9 vision_mision-content" data-aos="fade-left" data-aos-duration="1000">
                        <h4>Our Logo</h4>
                        <p>The society logo is the surgical mask that we use for most of our patients receiving general anesthesia, and it is what our patients see just before having their procedures. The colors of the mask represent the colors of the UAE flag to signify our origins, roots, and attachments to the UAE that we are very proud of.  
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="our-team">
            <div class="container">
                <div class="col-12 our-team-header">
                    <h4 data-aos="fade-up" data-aos-duration="1000"> OUR TEAM</h4>
                </div>
                <div class="our-team-wraper">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                            <div class="our-team-item">
                                <div class="our-team-item-image"><img src="{{asset('frontend/images/team/team-1.jpg')}}" alt=""></div>
                                <div class="our-team-item-content">
                                    <h6>Dr Mhamad Ghiyath Al Hashimi</h6>
                                    <p>Founder, general secretary, and editor-in-chief</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                            <div class="our-team-item">
                                <div class="our-team-item-image"><img src="{{asset('frontend/images/team/team-2.jpg')}}" alt=""></div>
                                <div class="our-team-item-content">
                                    <h6>Dr Abdelaziz Al Kalbani</h6>
                                    <p> Co-Founder </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                            <div class="our-team-item">
                                <div class="our-team-item-image"><img src="{{asset('frontend/images/team/team-3.jpg')}}" alt=""></div>
                                <div class="our-team-item-content">
                                    <h6>Dr Shebeen Hamza</h6>
                                    <p> Editor EJoAn </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
                            <div class="our-team-item">
                                <div class="our-team-item-image"><img src="{{asset('frontend/images/team/team-4.jpg')}}" alt=""></div>
                                <div class="our-team-item-content">
                                    <h6>Dr Yara Al Jalbout</h6>
                                    <p> Editor EJoAn </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @endsection
@push('scripts')

@endpush