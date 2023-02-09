
@extends('web.layouts.main')
@section('content')
 @include('web.includes.banner',[$banner, 'type'=> 'About Us'])
 <div class="about_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 about_section_image">
                    <picture>
                        {!! Helper::printImage($about, 'image','image_webp','image_attribute') !!}

                        <a href="{{ @$about->video_url }}" data-fancybox="group">
                            <div class="playButton">
                                <img src="{{asset('frontend/images/svg/play.svg')}}" alt="">
                            </div>
                        </a>
                    </picture>
                </div>
                <div class="col-lg-5 about_section_cnt">
                    <div>
                        <h1>{{ @$about->title }}</h1>
                        {!! @$about->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="highlight">
        <div class="left_bg">
            {!! Helper::printImage(@$about, 'feature_image','feature_image_webp','feature_image_attribute') !!}
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="highlight_left">
                        <h1>{{ @$about->feature_title }}</h1>
                        {!! @$about->feature_description !!}
                    </div>
                </div>
                <div class="col-lg-6 highlight_right">
                    <div class="highlight_wrapper">
                        @php $i = 1; @endphp
                        @foreach($aboutFeatures as $feature)
                            @if($i > 2)
                                @php $i = 1; @endphp
                            @endif
                            <div class="highlight_item a{{ $i }} {{ $loop->iteration > 2 ? 'none' : '' }}">
                                {!! Helper::printImage($feature, 'image','image_webp','image_attribute') !!}
                                <h6>{{ $feature->title }}</h6>
                            </div>
                            @if( $loop->iteration == 2)
                                <div class="highlight_item c">
                                    <img class="" src="{{ asset('frontend/images/svg/highlight_mebashi.svg')}}" alt="">
                                </div>
                            @endif
                                @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($histories->isNotEmpty())
        <section class="history">
            <div class="container">
                <div class="row flex-lg-row flex-column-reverse align-items-start">
                    <div class="col-lg-6 history_left">
                        <ul>
                            @foreach( $histories as $history)
                                <li>
                                    <div class="left">
                                        {!! Helper::printImage($history, 'image','image_webp','image_attribute', 'img-fluid') !!}
                                    </div>
                                    <div class="border_box">
                                        <img class="" src="{{asset('frontend/images/svg/history_list_mebashi.svg')}}" alt="">
                                    </div>
                                    <div class="right">
                                        <h5>
                                            {{ $history->year }}
                                        </h5>

                                        {!! $history->description !!}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-6 history_right sticky-lg-top sticky-lg-top-110">
                        <div>
                            <h1>
                                {{ @$about->history_title }}
                            </h1>
                            {!! @$about->history_description !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="available">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h1>
                        {{ @$about->products_available_title }}
                    </h1>
                    {!! @$about->products_available_description !!}
                </div>
                <div class="col-lg-10">
                    {!! Helper::printImage($about, 'products_available_image', '', '', 'img-fluid w-100') !!}
                </div>
            </div>
        </div>
    </section>
@endsection
