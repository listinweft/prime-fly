@extends('web.layouts.main')
@section('content')
@php
    $banner =   \App\Models\Banner::type('404')->first();
@endphp

@include('web.includes.banner',[$banner, 'title'=> '404','type'=> '404'])
<section class="error_section fnf-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <picture class="d-flex justify-content-center">
                    <img class="img-fluid" src="{{asset('frontend/images/error.png')}}" alt="">
                </picture>
                <h1>4<span>0</span>4</h1>
                <h2>Sorry, the page not found</h2>
                <a class="common-btn" href="{{url('/')}}">Back to Home</a>
            </div>
        </div>
    </div>
</section>

@endsection

