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
    <!-- {!! @$seo_data->other_meta_tag !!}
    {!! @$siteInformation->header_tag !!} -->

    <script type="text/javascript">
        // var base_url = "{{ url('/') }}";
    </script>
    
    <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> 
    <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/styleA.css')}}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/responsive.css')}}" rel="stylesheet" />
    <style>
    .like-btn svg {
      cursor: pointer;
    }
  </style>
    @stack('styles')
    
    <script type="text/javascript">
         var base_url = "{{ url('/') }}";
    </script>

</head>

<body>


<div class="wrapper">

@include('web.layouts.header')







@yield('content')

</div>
@include('web.layouts.footer')




@stack('scripts')
