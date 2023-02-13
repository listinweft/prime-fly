<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ARTEMYST</title>
    <meta name="title" content="{!! @$seo_data->meta_title !!}">
    <meta name="description" content="{!! @$seo_data->meta_description !!}"/>
    <meta name="keywords" content="{!! @$seo_data->meta_keyword !!}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ config('app.name') }} - {!! @$seo_data->meta_title !!}</title>
    {!! @$seo_data->other_meta_tag !!}
    {!! @$siteInformation->header_tag !!}
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/star-rating-svg.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/xzoom/1.0.15/xzoom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https:////code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('frontend/vendor/slick/slick.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/vendor/slick/slick-theme.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/all.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}"> --}}
    <script type="text/javascript">
        var base_url = "{{ url('/') }}";
    </script>
  
</head>

<body id="go-to-top">


    {!! @$siteInformation->body_tag !!}
<!-- Hamburger Menu End -->
@include('web.layouts.header')

<!-- Hamburger Menu Start -->
@include('web.includes.cart')
@include('web.includes.login')

<div id="loading">
    <img id="loading-image" src="{{ asset('frontend/images/loading.gif')}}" alt="Loading..."/>
</div>
@yield('content')
@include('web.layouts.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function goToByScroll(id){
        $('html,body').animate({scrollTop: $("#"+id).offset().top-0},'slow');
    }
</script>
<script src="https://kit.fontawesome.com/99358fb784.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>
<script  src="{{ asset('frontend/js/jquery.star-rating-svg.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
<script  src="{{ asset('frontend/js/form-select2_new.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xzoom/1.0.15/xzoom.min.js"></script>
<script src="{{ asset('frontend/xzoom/js/setup.js')}}"></script>
<script  src="{{ asset('frontend/js/scripts.min.js')}}"></script>
<script  src="{{ asset('frontend/js/custom.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</body>
</html>
