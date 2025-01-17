@extends('web.layouts.main')
@section('content')
<section class="thanks_section fnf-page thankyou-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1>Thank <span>You</span></h1>
                <h2>Thank you for reaching out to us</h2>
                <a class="common-btn" href="{{url('/')}}">Back to Home</a>
                <!-- <ul>
                    
                    <li>
                        Order Number : <span>ARTMYST#{{@$order->order_code}}</span>
                    </li>
                    <li>
                        Payment Method : <span>{{(@$order->payment_method=='COD')? 'Cash on Delivery': 'Online Payment'}}</span>
                    </li>
                </ul>
                <div class="buttons_box">
                    @if(Auth::guard('customer')->check())
                        <a class="primary_btn" href="{{ url('customer/account/profile') }}">My Account</a>
                    @endif
                    <a class="secondary_btn" href="{{ url('order/'.base64_encode(@$order->order_code)) }}">Order Details</a>
                    <a class="primary_btn" href="{{ url('/') }}">Home</a>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- <section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        Thank You
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section> -->
@push('scripts')
 <script>
 setTimeout(function() {
    window.location.href = '/';
                        }, 2000);

</script>
@endpush
@endsection