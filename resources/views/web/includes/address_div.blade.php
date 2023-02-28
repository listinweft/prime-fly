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
                                <div class="col-12">
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
    <div class="select_address_area billiing_address_form  @if(!Helper::checkConfirmOrder())  @else d-none @endif d-none">

        <div class="row">
            <div class="col-12">
                <div class="billingAddressOffcanvas position-relative">
                    <div class=" add_address_form" >
                        <div class="add_address_form">
                            <h4>Add Billing Address</h4>
                            <form action="" id="addBillingForm">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">First Name</label>
                                            <input type="text" name="first_name" id="first_name" required class="form-control required billing-value-change" maxlength="60" required placeholder="First Name*"  value="{{(Session::has('billing_first_name'))?session('billing_first_name'):''}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Last Name</label>
                                            <input type="text" name="last_name" id="last_name" required class="form-control required billing-value-change" maxlength="60" required placeholder="Last Name*"  value="{{(Session::has('shipping_last_name'))?session('billing_last_name'):''}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="email" class="form-control billing-required billing-value-change" placeholder="Email*" maxlength="70" required value="{{(Session::has('billing_email'))?session('billing_email'):''}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input  type="number" name="phone" id="phone" class="form-control billing-required billing-value-change"  placeholder="Phone Number*" maxlength="70" required value="{{(Session::has('billing_phone'))?session('billing_phone'):''}}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" >
                                            <label for="">Country</label>
                                            <select  name="country" id="country"   class="form-control form_select billing-required billing-value-change" required>
                                                <option selected disabled value="">Select Country*</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{(session('billing_country')==$country->id)?'selected':''}} >{{$country->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group" >
                                            <label for="">State</label>
                                            <select name="state" id="state" class="form-control form_select  billing-value-change " >
                                                <option selected disabled value="">Select Emirate</option>
                                                @if(!empty($billing_states))
                                                @foreach($billing_states as $billing_state)
                                                    <option value="{{ $billing_state->id }}" {{(session('billing_state')==$billing_state->id)?'selected':''}} >{{$billing_state->title}}</option>
                                                @endforeach
                                            @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Zip Code</label>
                                            <input type="number" maxlength="15" name="zipcode" id="zipcode" class="form-control billing-value-change" placeholder="Zip Code " value="{{(Session::has('billing_zipcode'))?session('billing_zipcode'):''}}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea class="form-control form-message billing-required  billing-value-change" required  name="address" id="address" placeholder="Address*">{{(Session::has('billing_address'))?session('billing_address'):''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="account_type" name="account_type"
                                value="{{(Auth::guard('customer')->check())?1:0}}">
                                <input type="hidden" name="is_default" id="is_default" value="1">

                                <input type="hidden" id="type" name="type" value="billing" class="choose">
                                <input type="hidden" id="id" name="id" value="0">
                        <input type="hidden" name="set_session" id="set_session" ovalue="1">
                            </form>
                        </div>
                    </div>
                </div>
    
            </div>
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

