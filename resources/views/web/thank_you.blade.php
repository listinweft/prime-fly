@extends('web.layouts.main')
@section('content')
<div class="d-none d-md-block">
    <section class="inner_banner ">
        <picture>
            <img class="img-fluid" src="{{asset('frontend/images/inner_banner.jpg')}}" alt="">
        </picture>
    </section>
</div>

<div class="d-block d-md-none">
    <section class="inner_banner ">
        <picture>
            <img class="img-fluid" src="{{asset('frontend/images/mobile_inner_banner.jpg')}}" alt="">
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
                        Thank You
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="thanks_section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <picture class="d-flex justify-content-center">
                    <img class="img-fluid" src="{{asset('frontend/images/thank_you.png')}}" alt="">
                </picture>
                <h2>Thank You</h2>
                <ul>
                    <li>
                        Order Number : #{{@$order->order_code}}
                    </li>
                    <li>
                        Payment Method : {{(@$order->payment_method=='COD')? 'Cash on Delivery': 'Online Payment'}}
                    </li>
                </ul>
                <div class="buttons_box">
                    @if(Auth::guard('customer')->check())
                        <a class="primary_btn" href="{{ url('customer/account/profile') }}">My Account</a>
                    @endif
                    <a class="secondary_btn" href="{{ url('order/'.base64_encode(@$order->order_code)) }}">Order Details</a>
                    <a class="primary_btn" href="{{ url('/') }}">Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection