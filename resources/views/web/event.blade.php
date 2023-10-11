@extends('web.layouts.main')
@section('content')

<main class="blog-page">
            <section class="blogs mt-76">
                <div class="container">
                    <div class="custom-search">
                        <form action="#0">
                            <div class="form-grid">
                                <input type="search" name="" id="" placeholder="Search">
                            </div>
                        </form>
                        <div class="search-icon"><img src="{{asset('frontend/images/icon/search-icon.png')}}" alt=""></div>
                    </div>
                    <section>
                        <div class="events_grid_wrapper">
                            <div class="row">
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="800">
                                    <div class="col-12 events_grid">
                                        <img src="{{asset('frontend/images/events.png')}}"/>
                                        <div class="d-flex event_grid_descrp">
                                            <div class="eventgrid_date">
                                                <h4>28</h4>
                                                <p>Oct 2023</p>
                                            </div>
                                            <div class="eventgrid_desc">
                                                <h4>SSMC October Update
                                                    Meeting</h4>
                                                <p><a href="">https://ssmc.ae/anaesthesiology-masterclass/</a></p>
                                                <div class="d-flex flex-wrap eventgrid_">
                                                    <div class="eventgrid_author_wraper d-flex">
                                                        <div class="eventgrid_img"><img src="{{asset('frontend/images/meeting-author.png')}}" alt=""></div>
                                                        <div class="eventgrid_author">
                                                            <div>
                                                                <h6>Indira Shree</h6>
                                                                <p>Study Power CEO</p>
                                                            </div>
                                                            <a href="#0" class="meeting-btn">View Event</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="900">
                                    <div class="col-12 events_grid">
                                        <img src="{{asset('frontend/images/events.png')}}"/>
                                        <div class="d-flex event_grid_descrp">
                                            <div class="eventgrid_date">
                                                <h4>28</h4>
                                                <p>Oct 2023</p>
                                            </div>
                                            <div class="eventgrid_desc">
                                                <h4>SSMC October Update
                                                    Meeting</h4>
                                                <p><a href="">https://ssmc.ae/anaesthesiology-masterclass/</a></p>
                                                <div class="d-flex flex-wrap eventgrid_">
                                                    <div class="eventgrid_author_wraper d-flex">
                                                        <div class="eventgrid_img"><img src="{{asset('frontend/images/meeting-author.png')}}" alt=""></div>
                                                        <div class="eventgrid_author">
                                                            <div>
                                                                <h6>Indira Shree</h6>
                                                                <p>Study Power CEO</p>
                                                            </div>
                                                            <a href="#0" class="meeting-btn">View Event</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="col-12 events_grid">
                                        <img src="{{asset('frontend/images/events.png')}}"/>
                                        <div class="d-flex event_grid_descrp">
                                            <div class="eventgrid_date">
                                                <h4>28</h4>
                                                <p>Oct 2023</p>
                                            </div>
                                            <div class="eventgrid_desc">
                                                <h4>SSMC October Update
                                                    Meeting</h4>
                                                <p><a href="">https://ssmc.ae/anaesthesiology-masterclass/</a></p>
                                                <div class="d-flex flex-wrap eventgrid_">
                                                    <div class="eventgrid_author_wraper d-flex">
                                                        <div class="eventgrid_img"><img src="{{asset('frontend/images/meeting-author.png')}}" alt=""></div>
                                                        <div class="eventgrid_author">
                                                            <div>
                                                                <h6>Indira Shree</h6>
                                                                <p>Study Power CEO</p>
                                                            </div>
                                                            <a href="#0" class="meeting-btn">View Event</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-lg-5 mt-sm-4 mt-2">
                                    <a href="#0" class="common-btn">View  More Events</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </main>

@endsection
@push('scripts')

@endpush