@extends('web.layouts.main')
@section('content')
@include('web.includes.banner',[$banner, 'type'=> 'checkout'])
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
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 checkout_left">
                    @include('web.includes.address_form')
                </div>
                <div class="col-lg-4 sticky-lg-top sticky-lg-top-110">
                    <div class="order_summary">
                        @include('web.includes.order_summary')
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
                                                               @if(!Helper::checkConfirmOrder())
                                <div class="col-md-12  mb-4">
                                    <span class="error">
                                        Error: Please choose billing and shipping address to confirm the order
                                    </span>
                                </div>
                            @endif
                      
                            </div>
                            <input type="hidden"
                            value="{{Session::has('address_choose')?session('address_choose'):'different'}}"
                            name="billingAddressChoose" id="billingAddressChoose">
                        <button class="primary_btn confirm_payment_btn checkout_btn"  id="{{(Helper::checkConfirmOrder())?'confirm_payment':''}}" >Place Order</Button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@push('scripts')
<script>
$(document).ready(function () {
    //make checkbox unchecked
    $('.different_shipping_address').prop('checked', false);
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
    //for selecting different address for shipping
    $(document).on('change', '.different_shipping_address', function (e) {
        e.preventDefault();
        $this = $(this);
        var different_status = $this.is(':checked');
        $.ajax({
            type: 'POST', dataType: 'json', data: {different_status}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/different-shipping-address', success: function (response) {
                if (response.status == true) {
                    Toast.fire("Done it!", response.message, "success");
                   //make all fields readonly
                    $('#first_name').attr('readonly', true);
                } else {
                    // $('billiing_address_form').
                    // $('.billiing_address_form').addClass("d-none");
                    // $('.choose').val("same");
                    Toast.fire('Error', response.message, "error");
                }
                setTimeout(() => {
                    location.reload();
                    
                }, 1500);
            }
        });
    });
</script>
@endpush
@endsection