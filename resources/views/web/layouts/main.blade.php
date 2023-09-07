<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>ARTEMYST</title> -->
    <meta name="title" content="{!! @$seo_data->meta_title !!}">
    <meta name="description" content="{!! @$seo_data->meta_description !!}"/>
    <meta name="keywords" content="{!! @$seo_data->meta_keyword !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ config('app.name') }} - {!! @$seo_data->meta_title !!}</title>
    {!! @$seo_data->other_meta_tag !!}
    {!! @$siteInformation->header_tag !!}

    <script type="text/javascript">
        // var base_url = "{{ url('/') }}";
    </script>
    
    <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
    <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet" />
    @stack('styles')
    
    <script type="text/javascript">
        // var base_url = "{{ url('/') }}";
    </script>

</head>

<body>


<div class="wrapper">

@include('web.layouts.header')







@yield('content')

</div>
<!-- @include('web.layouts.footer') -->



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
    <script>
        $('.journal_carousel').owlCarousel({
            stagePadding:80,
            loop:true,
            margin:30,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        });
    </script>
</body>
</html>
@stack('scripts')
