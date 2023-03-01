@extends('web.layouts.main')
@section('content')
@include('web.includes.banner',[$banner, 'title'=> 'Checkout','type'=> 'checkout'])
@push('styles')
    <style>
        .error {
            color: red;
            font-size: 14px;
        }
    </style>
@endpush
@if(!Cart::session($sessionKey)->isEmpty())
    <section class="my_cart_section my_checkout_section">
        <div class="container position-relative">
            <div class="row align-items-start">
                <div class="col-lg-8">
                    @include('web.includes.address_div')
                </div>
                <div class="col-lg-4 sticky-lg-top sticky-lg-top-110">
                    <div class="order_summary">
                        @include('web.includes.order_summary') 
                        <div class=" @if (Request::is('checkout'))  @else d-none  @endif ">
                            <div class="banks">
                                <div class="accordion" id="accordionExample">
                                    {{-- <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <input class="bank-radio" type="radio" checked id="credit" name="bank">
                                                <label for="credit"><img src="assets/images/mastercard.svg" alt=""></label>
                                            </button>
                                        </h3>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <p>Pay with Credit card or Debit card.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <input class="bank-radio" type="radio" id="paypal" name="bank">
                                                <label for="paypal"><img src="assets/images/paypal.svg" alt=""></label>
                                            </button>
                                        </h3>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <p>Pay with PayPal.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <input class="bank-radio" type="radio" id="applepay" name="bank">
                                                <label for="applepay"><img src="assets/images/applepay.svg" alt=""></label>
                                            </button>
                                        </h3>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <p>Pay with Apple Pay.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                <input class="bank-radio" type="radio" id="bitcoin" name="bank">
                                                <label for="bitcoin"><img src="assets/images/bitcoin.svg" alt=""></label>
                                            </button>
                                        </h3>
                                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <p>Pay with Bitcoin.</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                <input class="bank-radio payment_method" type="radio" id="cod" name="paymentOption" value="COD">
                                                <label for="cod"><img src="{{asset('frontend/images/cashondelivery.svg')}}" alt=""></label>
                                            </button>
                                        </h3>
                                     
                                        <div id="collapseFive" class="accordion-collapse collapse payment_method"  aria-labelledby="headingFive" data-bs-parent="#accordionExample" style="">
                                            <div class="accordion-body">
                                                <p>Pay with Cash On Delivery.</p>
                                            </div>
                                        </div>
                                        <span class="error" id="payment-method-error"></span>
                                    </div>
                                    <div class="btnsBox">
                                        <span class="error" id="payment-method-error"></span>
                                        <div class="col-md-12 terms mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="terms-and-conditions" value="">
                                                <label class="form-check-label" for="terms-and-conditions">
                                                    By continuing to checkout you agree to our
                                                    <a href="{{url('terms-and-conditions')}}">Terms and
                                                        Conditions</a>
                                                </label>
                                                <br>
                                                <span class="error" id="confirm-order-error"></span>
                                            </div>             
                                            @if(Auth::guard('customer')->check())
                                                <div class="col-md-12  mb-4">
                                                
                                                    <span class="error @if($orderC == true) d-none @endif">
                                                        Error: Please choose billing and shipping address to confirm the order
                                                    </span>
                                                </div>
                                            @else
                                            <div class="col-md-12  mb-4">
                                                <span class="error  @if(session('billing_address') != null) d-none  @endif">
                                                    Error: Please choose billing and shipping address to confirm the order
                                                </span>
                                            </div>
                                            @endif
                                        </div>
                                        <input type="hidden" value="{{Session::has('address_choose')?session('address_choose'):'different'}}" name="billingAddressChoose" id="billingAddressChoose">
                                      
                                        @if(Auth::guard('customer')->check())
                                            <button type="button" class="primary_btn login confirm_payment_btn checkout_btn" id="confirm_payment"    @if(!Helper::checkConfirmOrder()) disabled @endif >Place Order</button>
                                        @else
                                            <button type="button" href="javascript:void(0)" class="primary_btn login confirm_payment_btn checkout_btn" id="confirm_payment"  @if(session('billing_address') == null) disabled  @endif>Place Order</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>         
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@endsection
@push('scripts')
<script>
    $(document).ready(function () {

        //make checkbox unchecked
        // $('.different_shipping_address').prop('checked', false);
        if($(".different_shipping_address").is(':checked')){
            var choose = "different";
            $('.billiing_address_form').removeClass("d-none");
            $('.choose').val("different");
        
    } else {
        var choose = "same";
            $('.billiing_address_form').addClass("d-none");
            $('.choose').val("same");
        
    }
    });
    //check if checkbox is checked or not
    $(document).on('click', '.different_shipping_address', function (e) {
        if($(this).is(':checked')){
            var choose = "different";
            $('.billiing_address_form').removeClass("d-none");
            $('.choose').val("different");
        }
        else{
            var choose = "same";
            $('.billiing_address_form').addClass("d-none");
            $('.choose').val("same");
        }
    });
        //for selecting different address for shipping
        $(document).on('change', '.different_shipping_address', function (e) {
            e.preventDefault();
            $this = $(this);
            var different_status = $this.is(':checked');
            $.ajax({
                type: 'POST', dataType: 'json', data: {different_status}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, url: base_url + '/different-shipping-address', success: function (response) {
                    
                    if (response.status == true  ) {
                    console.log(response);
                        Toast.fire("", response.message, "success");
                    //make all fields readonly
                    if(response.orderC == true){
                        $('.error').addClass("d-none");

                    }
                    else{
                        $('.error').removeClass("d-none");
                    }
                    if(response.type == 'same'){
                        $('.billiing_address_form').addClass("d-none");
                        $('#addBillingForm input').val('');
                        //select box empty
                        $('#addBillingForm select').val('');
                        $('#addBillingForm textarea').val('');
                        $('#addBillingForm span').html('');
                        $('.error').addClass("d-none");
                        //remove disabled attribute from confirm payment button
                        $('#confirm_payment').attr('disabled', false);
                    }
                    else{
                        $('.billiing_address_form').removeClass("d-none");
                        $('#addBillingForm input').val('');
                        $('.error').removeClass("d-none");
                        $('#confirm_payment').attr('disabled', true);
                    }
                    if(response.reload == true){
                        setTimeout(() => {
                            // location.reload();
                        }, 1000);
                    }
                    } else {
                        if(response.orderC == true){
                        $('.error').addClass("d-none");

                    }
                    else{
                        $('.error').removeClass("d-none");
                    //empty all  in addBillingForm form
                    $(':input').val('');

                    

                    }
                    if(response.type == 'same'){
                            $('.billiing_address_form').addClass("d-none");
                        
                            $('#confirm_payment').attr('disabled', false);
                        }
                        else{
                        
                            $('.billiing_address_form').removeClass("d-none");
                            $('#confirm_payment').attr('disabled', true);
                        }

                    
                        Toast.fire('Error', response.message, "error");
                    }
                    setTimeout(() => {
                        // location.reload();
                        
                    }, 1500);
                }
            });
        });
</script>
@endpush
