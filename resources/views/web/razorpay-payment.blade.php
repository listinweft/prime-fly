@extends('web.layouts.main')
@section('content')
<section class="col-12 cart-progress">
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="{{ route('razorpay.callback') }}" method="POST">
                @csrf
                <script src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="{{ env('RAZORPAY_KEY') }}"
                        data-amount="{{ $amount }}"
                        data-currency="INR"
                        data-order_id="{{ $orderId }}"
                        data-buttontext="Pay with Razorpay"
                        data-name="Your Website Name"
                        data-description="Order Payment"
                        data-prefill.name="{{ auth()->user()->name }}"
                        data-prefill.email="{{ auth()->user()->email }}"
                        data-theme.color="#F37254"></script>
                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
                <input type="hidden" name="razorpay_signature" id="razorpay_signature">
            </form>
        </div>
    </div>
</section>
@endsection
