<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="description" content="Primefly is an exclusive airport hospitality service provided by Speedwings. They provide services such as meet and greet, -->
    <!--parking, cloakroom, check-in assistance, and baby/elder sitting within the airport premises. ">-->
    <!--<title>Primefly</title> -->

    <meta name="title" content="{!! @$seo_data->meta_title !!}">
    <meta name="description" content="{!! @$seo_data->meta_description !!}"/>
    <meta name="keywords" content="{!! @$seo_data->meta_keyword !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/> 
    <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet" />
    <title>{!! @$seo_data->meta_title !!}</title>
      <link href="{{ asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css')}}">
      <link href="{{ asset('frontend/css/animate.css')}}" rel="stylesheet">
      <link href="{{ asset('frontend/css/aos.css')}}" rel="stylesheet">
      <link href="{{ asset('frontend/css/style.min.css')}}" rel="stylesheet"> 
      <link rel="stylesheet" href="{{ asset('frontend/css/jquery.timepicker.css')}}" />
      <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-selectbox/0.2.4/jquery.selectbox.css">
   
  </style>
    @stack('styles')
    
    <script type="text/javascript">
         var base_url = "{{ url('/') }}";
    </script>
    
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WFM73QWD');</script>

</head>

<body>


<div class="wrapper">

@include('web.layouts.header')







@yield('content')

</div>
@include('web.layouts.footer')




@stack('scripts')
