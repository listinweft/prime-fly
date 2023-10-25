@extends('web.layouts.main')
@section('content')

<section class="col-12 event-details p-0">
{!! Helper::printImage($blog, 'desktop_banner','desktop_banner_webp','image_attribute', 'img-fluid') !!}
        </section> 
        <section class="col-12 event-details-content">
            <div class="container">
                
                <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-12 mb-5 text-center">
                    <h1>{{$blog->title}}</h1>
                </div> 
                    <div class="col-lg-8 col-md-8 event-details-desc pe-5 text-center">
                  

                        <p>{!! $blog->description;!!}</p>
                    </div>
                   
                </div>
            </div>
        </section>

@endsection
@push('scripts')

@endpush