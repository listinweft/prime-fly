@if(Auth::guard('customer')->check())
<div id ="login_div" class="   @if(!Auth::guard('customer')->check()) d-none @endif">
login
</div>
@endif
<div id="guest_div"  class="@if(Auth::guard('customer')->check()) d-none @endif">
    <div class="checkoutDetailsLeft">

    <div class="row">
        <div class="col-12">
            <div class="billingAddressOffcanvas position-relative">
                <div class=" add_address_form" >
                    <div class="">
                        <h4>Add Shipping Address</h4>
                        <form action="#" id="addShippingAddressForm" class="addShippingAddressForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" name="shipping_first_name" id="first_name" required class="form-control required shipping-value-change" maxlength="60" required placeholder="First Name*"  value="{{(Session::has('shipping_first_name'))?session('shipping_first_name'):''}}">
                                        <span class="invalidMessage d-none">  </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" name="shipping_last_name" id="last_name" required class="form-control required shipping-value-change" maxlength="60" required placeholder="Last Name*"  value="{{(Session::has('shipping_last_name'))?session('shipping_last_name'):''}}">
                                        <span class="invalidMessage d-none">  </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control required shipping-value-change"  required name="shipping_email" id="email"  maxlength="70" required placeholder="Email*"  value="{{(Session::has('shipping_email'))?session('shipping_email'):''}}">
                                        <span class="invalidMessage d-none">  </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control required shipping-value-change" required placeholder="Phone Number*"  name="shipping_phone" id="phone"   maxlength="70" required value="{{(Session::has('shipping_phone'))?session('shipping_phone'):''}}">
                                        <span class="invalidMessage d-none">  </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group" >
                                        <label for="">Country</label>
                                        <select name="shipping_country" id="country" class="form-control form_select required shipping-value-change" required>
                                            <option selected disabled value="">Select Country*</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{(session('shipping_country')==$country->id)?'selected':''}}
                                            >{{$country->title}}</option>
                                        @endforeach
                                        </select>
                                        <span class="invalidMessage d-none">  </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group" >
                                        <label for="">Emirate</label>
                                        <select class="form-control form_select required shipping-value-change" name="shipping_state" id="state" required>
                                            <option selected disabled value="">Select Emirate*</option>
                                            @if(!empty($shipping_states))
                                                @foreach($shipping_states as $shipping_state)
                                                    <option value="{{ $shipping_state->id }}"
                                                        {{(session('shipping_state')==$shipping_state->id)?'selected':''}}
                                                    >{{$shipping_state->title}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span class="invalidMessage d-none">  </span>
                                    </div>
                                </div>
                                <div class="col-12">PmaP
                                    <div class="form-group">
                                        <label for="">Zipcode</label>
                                        <input type="text" class="form-control  shipping-value-change"   name="shipping_zipcode" id="zipcode" placeholder="Zip code"  value="{{(Session::has('shipping_zipcode'))?session('shipping_zipcode'):''}}">
                                        <span class="invalidMessage d-none">  </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea class="form-control form-message shipping-value-change "  data-reload="true" required  name="shipping_address" id="address" placeholder="Address*">{{(Session::has('shipping_address'))?session('shipping_address'):''}}</textarea>
                                        <span class="invalidMessage d-none">  </span>
                                    </div>
                                </div>
                                <input type="hidden" id="account_type" name="account_type" value="{{(Auth::guard('customer')->check())?1:0}}">
                                <input type="hidden" name="is_default" id="is_default" value="1">
                                    <input type="hidden" id="id" name="id" value="0">
                                    <input type="hidden" id="choose" name="choose" value="same" class="choose">
                                    <input type="hidden" id="type" name="type" value="shipping" class="shipping">
                                <input type="hidden" name="set_session" id="set_session"  value="1">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="" class="sameShipping">
                <div class="form-check">
                    <input class="form-check-input different_shipping_address" type="checkbox" value="same" name="address_choose"
                    id="different_shipping_address"
                    {{ Session::get('different_shipping_address') ? 'checked':'' }}>
                    <br>
                    <label class="form-check-label" for="flexCheckDefault">
                        Bill to a different address?  <br>
                    </label>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="customerNote">
                <form action="">
                    <div class="form-group">
                        <br>
                        <label for="">Customer Note (Optional)</label>
                        <textarea class="form-control form-message" placeholder="Customer Note (Optional)"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

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
@endsection