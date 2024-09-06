

@extends('web.layouts.main')
@section('content')
        <section class="col-12 locationbanner p-0">
           <div class="d-flex justify-content-end">
              <div class="locinner_bannerimg">
                <img src="{{ asset('frontend/img/blog-banner.png')}}" class="w-100" alt="Meet and Greet" />
                <div class="loc-text text-start">
                    <div class="container">
                        <h1>BLOG</h1>
                    </div> 
                </div>
              </div>
           </div> 
        </section>
        <section class="col-12 locationbanner p-0 text-center pt-5 pb-5">
            <!-- <img src="" alt=""/> -->
            <h1> No blogs<h1>
        </div>

                           
   


    @endsection
@push('scripts')

@endpush

