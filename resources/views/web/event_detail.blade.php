@extends('web.layouts.main')
@section('content')

<section class="col-12 event-details p-0">
            <img src="{{asset('frontend/images/event-details.jpg')}}" alt="Event Details">
        </section> 
        <section class="col-12 event-details-content">
            <div class="container">
                <div class="col-lg-6 col-md-6 col-sm-12 mb-5">
                    <h1>{{$blog->title}}</h1>
                </div> 
                <div class="row">
                    <div class="col-lg-6 event-details-desc pe-5">
                        <p>{!! $blog->description !!}</p>
                    </div>
                    <div class="col-lg-6  event-details-desc ps-5">
                        <p>{!! $blog->alternate_description !!}</p>
                    </div>
                </div>
            </div>
        </section>

@endsection
@push('scripts')

@endpush