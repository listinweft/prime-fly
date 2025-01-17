

@extends('web.layouts.main')
@section('content')

<section class="col-12 p-0">
            <img src="{{ asset('frontend/images/event-details.jpg')}}" alt="Event Details">
        </section> 
        <section class="col-12 journal-list">
            <div class="container">
                <div class="row justify-content-center"> 
                    <div class="col-xxl-10">
                        <div class="row justify-content-center">
                            <div class="col-12 mb-xxl-5 mb-md-4 mb-3">
                                <div class="custom-search">
                                    <form action="#0">
                                        <div class="form-grid mb-0 search-bx">
                                            <input type="search" name="" id="main-search-journal" placeholder="Search">
                                        </div>
                                        <div class="searchResult">
                            <ul id="search-result-journal-append-here"></ul>
                        </div>
                                    </form>
                                    <div class="search-icon"><img src="{{ asset('frontend/images/icon/search-icon.png')}}" alt=""></div>
                                </div>
                            </div> 
                            
                            
                          
                            @include('web._journal_list')
                                
                           
                           
                        </div>
                    </div> 
                </div>
            </div>
        </section>
   


    @endsection
@push('scripts')

@endpush

