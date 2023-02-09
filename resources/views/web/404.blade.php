@extends('web.layouts.main')

@section('content')


<div class="d-none d-md-block">
    <section class="inner_banner ">
        <picture>
            <img class="img-fluid" src="assets/images/inner_banner.jpg" alt="">
        </picture>
    </section>
</div>

<div class="d-block d-md-none">
    <section class="inner_banner ">
        <picture>
            <img class="img-fluid" src="assets/images/mobile_inner_banner.jpg" alt="">
        </picture>
    </section>
</div>

<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        404
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="error_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <picture class="d-flex justify-content-center">
                    <img class="img-fluid" src="{{asset('frontend/images/404.png')}}" alt="">
                </picture>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quippe, inquieta cum tam
                    docuerim gradus istam rem non habere quam virtutem, in qua sit ipsum etíam beatum.
                </p>
                <a class="primary_btn" href="index.php">Home</a>
            </div>
        </div>
    </div>
</section>

@endsection

