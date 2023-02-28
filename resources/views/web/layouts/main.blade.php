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

    <script type="text/javascript">
        // var base_url = "{{ url('/') }}";
    </script>
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
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css')}}">
    @stack('styles')
    {{-- <link rel="stylesheet" href="{{ asset('frontend/vendor/slick/slick.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/vendor/slick/slick-theme.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/vendor/fontawesome/css/all.min.css')}}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}"> --}}
    <script type="text/javascript">
        // var base_url = "{{ url('/') }}";
    </script>

</head>

<body id="go-to-top">


    {!! @$siteInformation->body_tag !!}
<!-- Hamburger Menu End -->
@include('web.layouts.header')

<!-- Hamburger Menu Start -->
@include('web.includes.cart')



<div id="loading">
    <img id="loading-image" src="{{ asset('frontend/images/loading.gif')}}" alt="Loading..."/>
</div>

<!-- Review Modal Start -->
<div class="modal fade reviewModalForm" id="reviewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="formArea">
                    <form action="" method="POST" id="reviewForm" name="reviewForm">

                        <div class="head">
                            <h5>Write A Review</h5>
                            <div>
                                <div class="my-rating " data-rating="0"></div>
                                <input type="hidden"  class="form-control review-required rating" placeholder="rating" name="rating" id="rating">
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control review-required" placeholder="Full Name" name="name" id="name">
                                </div>
                            </div>
                            <div class=" col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control review-required" placeholder="Designation" name="designation" id="designation">
                                </div>
                            </div>
                            <div class=" col-12">
                                <div class="form-group">
                                    <input type="email" class="form-control review-required" placeholder="Email Address" name="email" id="email">
                                </div>
                            </div>

                            <div class="col-12 message">
                                <div class="form-group">
                                    <textarea class="form-control review-required" placeholder="Say Something" name="message" id="message"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="user_type" value="user_type">
                            {{-- <input type="hidden" name="" value="2"> --}}
                            <div class="col-12x ">
                                <div class="form-group d-flex align-items-end mb-0">
                                    <button type="submit" class="primary_btn review-form-btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Review Modal End -->

<a href=""  data-bs-toggle="modal" data-bs-target="#successModal" class="primary_btn form_submit_btn d-none">Success</a>
<!-- Success Modal Start -->
<div class="modal fade successModalForm" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img class="img-fluid successIcon" src="{{ asset('frontend/images/svg/success.svg')}}" alt="">
                    <h6>
                        <span class="success_message" id="myspan"></span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
<!-- Success Modal End -->


@yield('content')
@include('web.layouts.footer')
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
{{--<script>--}}
{{--    function goToByScroll(id){--}}
{{--        $('html,body').animate({scrollTop: $("#"+id).offset().top-0},'slow');--}}
{{--    }--}}
{{--</script>--}}
{{--<script src="https://kit.fontawesome.com/99358fb784.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.js"></script>--}}
{{--<script  src="{{ asset('frontend/js/jquery.star-rating-svg.min.js')}}"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>--}}
{{--<script  src="{{ asset('frontend/js/form-select2_new.min.js')}}"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/xzoom/1.0.15/xzoom.min.js"></script>--}}
{{--<script src="{{ asset('frontend/xzoom/js/setup.js')}}"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.15.6/sweetalert2.min.js"></script>--}}
<!-- <script  src="{{ asset('frontend/js/scripts.min.js')}}"></script> -->
<!-- <script  src="{{ asset('frontend/js/scripts.js')}}"></script> -->
<!-- <script  src="{{ asset('frontend/js/custom.min.js')}}"></script> -->
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>--}}
<script type="text/javascript">
        var base_url = "{{ url('/') }}";
    </script>
</body>
</html>
@stack('scripts')
