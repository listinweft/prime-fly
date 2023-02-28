@extends('web.layouts.main')
@section('content')
@include('web.includes.banner',[$banner, 'title'=> 'Checkout','type'=> 'checkout'])
@if(!Cart::session($sessionKey)->isEmpty())
    <section class="my_cart_section my_checkout_section">
        <div class="container position-relative">
            <div class="row align-items-start">
                <div class="col-lg-8">
                    @include('web.includes.address_div')
                </div>
                <div class="col-lg-4 sticky-lg-top sticky-lg-top-110">
                    @include('web.includes.order_summary')              
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@endsection