


@if(Auth::guard('customer')->check())
<div id="login_div" class="   @if(!Auth::guard('customer')->check()) d-none @endif">
    <div class="select_address_area d-block">
     
        @if ($customerAddresses->isNotEmpty())
        <div class="select_address_area_head">
            <h4>Select Shipping Address</h4>
            <div class="right">
                <a class="secondary_btn" id="add_checkout_ship_address" href="javascript:void(0)"><i class="fa-solid fa-plus"></i> Add Address</a>
                <div class="slick-address-nav2">
                </div>
            </div>
        </div>
    
    

        @endif
        <div class="row">
            <div class="col-12">
                <div id="bill_address_list" class="select_shipping_address_slider">
                    
                    @if (@$customerAddresses)
                        @foreach($customerAddresses as $address)
                        <div class="select_address_card">
                        
                            <div class="address_box   {{session('selected_customer_address')== $address->id ?'set_default':'' }}">
                                
                                @if (session('selected_customer_address')== $address->id)
                                <div class="default_icon">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                @endif
                                    <h6 class="ads_name">{{$address->first_name.' '.$address->last_name}}</h6>
                                    <ul>
                                        <li>
                                            <p>{{$address->address_type}}</p>
                                        </li>
                                     
                                        <li class="add_line">
                                            <p>{{$address->address}}</p>
                                        </li>
                                        <li>
                                            <p>Email : {{$address->email}}</p>
                                        </li>
                                        <li>
                                            <p>Phone : {{$address->phone}}</p>
                                        </li>
                                        @if ($address->zipcode)
                                        <li>
                                            <p>ZIP Code : {{$address->zipcode}}</p>
                                        </li>
                                        @endif
                                            @if ($address->state)
                                            <li>
                                                <p>State : {{ $address->state->title }}</p>
                                            </li>
                                            @endif
                                            <li>
                                                <p>Country
                                                    :  {{$address->country->title}}</p>
                                            </li>
                                            @php
                                                  $message = '';
                                                if($address->state)
                                                                    $shipping = App\Models\ShippingCharge::active()
                                                                                    ->where('state_id' ,$address->state->id)->first();
                                                                else
                                                                    $shipping = NULL;
                                                                if($shipping == NULL){
                                                                    $class = '';
                                                                    $message = 'This item cannot be shipped on this location';
                                                                    $tooltipval = '';
                                                                }
                                            @endphp
                                      <li>
                                        <p style="color: red; margin-top: 10px;">{{ $message }}</p>
                                      </li>
                                    </ul>
                                    <br>
                                    @if(session('selected_customer_address')!= $address->id && $message == '')
                                    <a class="set_d_add deliver"
                                       data-id="{{$address->id}}"
                                       data-address-type="billing"
                                       href="javascript:void(0)">
                                        <i class="fa-solid fa-circle-check"></i> Select</a>
                                @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div id="add_ship_address_form" class="add_address_form   @if ($customerAddresses->isNotEmpty()) d-none @endif mb-4">
                    <h4>Add Shipping Address</h4>
                    <a href=""></a>
                    <form action="#" id="addShippingLoginAddressForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" required class="form-control required shipping-login-value-change" maxlength="60" required placeholder="First Name*"  value="{{(Session::has('shipping_first_name'))?session('shipping_first_name'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" required class="form-control required shipping-login-value-change" maxlength="60" required placeholder="Last Name*"  value="{{(Session::has('shipping_last_name'))?session('shipping_last_name'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control required shipping-login-value-change"  required name="email" id="email"  maxlength="70" required placeholder="Email*"  value="{{(Session::has('shipping_email'))?session('shipping_email'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control required shipping-login-value-change required placeholder="Phone Number*"  name="phone" id="phone"   maxlength="70" required value="{{(Session::has('shipping_phone'))?session('shipping_phone'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" >
                                    <select name="country" id="country" class="form-control form_select required shipping-login-value-change" required>
                                        <option selected disabled value="">Select Country*</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{(session('shipping_country')==$country->id)?'selected':''}}
                                        >{{$country->title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                          
                                <div class="form-group" >
                                    <select class="form-control form_select required shipping-login-value-change" name="state" id="state" required>
                                        <option selected disabled value="">Select Emirate*</option>
                                        @if(!empty($shipping_states))
                                            @foreach($shipping_states as $shipping_state)
                                                <option value="{{ $shipping_state->id }}"
                                                    {{(session('shipping_state')==$shipping_state->id)?'selected':''}}
                                                >{{$shipping_state->title}}</option>
                                            @endforeach
                                         @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control  shipping-login-value-change"   name="zipcode" id="zipcode" placeholder="Zip code"  value="{{(Session::has('shipping_zipcode'))?session('shipping_zipcode'):''}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control form-message shipping-login-value-change "  data-reload="true" required  name="address" id="address" placeholder="Address*">{{(Session::has('shipping_address'))?session('shipping_address'):''}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                                    <input type="hidden" id="account_type" name="account_type" value="{{(Auth::guard('customer')->check())?1:0}}">
                                    <input type="hidden" name="is_default" id="is_default" value="1">
                                     <input type="hidden" id="id" name="id" value="0">
                                     <input type="hidden" id="choose" name="choose" value="same" class="choose">
                                    <input type="hidden" name="set_session" id="set_session"  value="1">
                    </form>
                </div>
            </div>
        </div>
    </div>
 
    <div class="select_address_area d-block">
        <div class="form-check">
            <label class="form-check-label different_shipping_address" for="different_shipping_address">
                Bill to a different address?  <br>
            </label>
            <input class="form-check-input different_shipping_address" type="checkbox" value=""
                id="different_shipping_address"
                {{ Session::get('different_shipping_address') ? 'checked':'' }}>
                <br>
        </div>
    </div>
    <div class="select_address_area d-block billiing_address_form  @if(!Helper::checkConfirmOrder())  @else d-none @endif">
        <div class="select_address_area_head" @if ($customerAddresses->isNotEmpty()) d-none @endif>
            <h4>Select Billing Address</h4>
            <div class="right">
                <a class="secondary_btn" id="add_checkout_bill_address" href="javascript:void(0)"><i class="fa-solid fa-plus"></i> Add Address</a>
                <div class="slick-address-nav1">
                </div>
            </div>
        </div>
       
        <div class="row">
            <div class="col-12">
                <div id="bill_address_list" class="select_billing_address_slider">
                    @if (@$customerAddresses)
                        @foreach($customerAddresses as $address)
                        <div class="select_address_card"> 
                            <div class="address_box   {{(session('selected_customer_billing_address')==$address->id)?'set_default':''}}"> 
                                <div class="default_icon">
                                    <i class="fa-solid fa-circle-check"></i>
                                </div>
                                <h6 class="ads_name">{{$address->first_name.' '.$address->last_name}}</h6>
                                <ul>
                                    <li>
                                        <p>{{$address->address_type}}</p>
                                    </li>
                                 
                                    <li class="add_line">
                                        <p>{{$address->address}}</p>
                                    </li>
                                    <li>
                                        <p>Email : {{$address->email}}</p>
                                    </li>
                                    <li>
                                        <p>Phone : {{$address->phone}}</p>
                                    </li>
                                    <li>
                                        <p>ZIP Code : {{$address->zipcode}}</p>
                                    </li>
                                        @if ($address->state)
                                        <li>
                                            <p>State : {{ $address->state->title }}</p>
                                        </li>
                                        @endif
                                        <li>
                                            <p>Country
                                                :  {{$address->country->title}}</p>
                                        </li>
                                          
                                </ul>
                                <br>
                                @if((session('selected_customer_billing_address')!= $address->id))
                                <a class="set_d_add billing"
                                   data-id="{{$address->id}}"
                                   data-address-type="billing"
                                   href="javascript:void(0)">
                                    <i class="fa-solid fa-circle-check"></i> Select</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
                </div>
                <div id="add_bill_address_form" class="add_address_form d-none">
                    <h4>Add Billing Address</h4>
                    <form action="" id="addBillingingLoginAddressForm">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" required class="form-control required billing-login-value-change" maxlength="60" required placeholder="First Name*"  value="{{(Session::has('billing_first_name'))?session('billing_first_name'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" required class="form-control required billing-login-value-change" maxlength="60" required placeholder="Last Name*"  value="{{(Session::has('shipping_last_name'))?session('billing_last_name'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control billing-required billing-login-value-change" placeholder="Email*" maxlength="70" required value="{{(Session::has('billing_email'))?session('billing_email'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input  type="number" name="phone" id="phone" class="form-control billing-required billing-login-value-change"  placeholder="Phone Number*" maxlength="70" required value="{{(Session::has('billing_phone'))?session('billing_phone'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" >
                                    <select  name="country" id="country"   class="form-control form_select billing-required billing-login-value-change" required>
                                        <option selected disabled value="">Select Country*</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{(session('billing_country')==$country->id)?'selected':''}} >{{$country->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" >
                                    <select name="state" id="state" class="form-control form_select  billing-login-value-change " >
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
                                    <input type="number" maxlength="15" name="zipcode" id="zipcode" class="form-control billing-login-value-change" placeholder="Zip Code " value="{{(Session::has('billing_zipcode'))?session('billing_zipcode'):''}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control form-message billing-required  billing-login-value-change" required  name="address" id="address" placeholder="Address*">{{(Session::has('billing_address'))?session('billing_address'):''}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                                <input type="hidden" id="account_type" name="account_type"
                                value="{{(Auth::guard('customer')->check())?1:0}}">
                        <input type="hidden" name="is_default" id="is_default"
                                value="1">
                        <input type="hidden" id="id" name="id" value="0">
                        <input type="hidden" name="set_session" id="set_session"
                                value="1">
                    </form>
                </div>
            </div>
        </div>
  
    </div>
    <br>
</div>

@endif


<div id="gust_form" class="@if(Auth::guard('customer')->check()) d-none @endif">
    <div class="select_address_area ">
        <div class="row">
            <div class="col-12">

                <div class="shipping_address_form add_address_form mb-5">
                    <h4>Add Shipping Address</h4>
                    <form action="#" id="addShippingAddressForm" class="addShippingAddressForm" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" required class="form-control required shipping-value-change" maxlength="60" required placeholder="First Name*"  value="{{(Session::has('shipping_first_name'))?session('shipping_first_name'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" required class="form-control required shipping-value-change" maxlength="60" required placeholder="Last Name*"  value="{{(Session::has('shipping_last_name'))?session('shipping_last_name'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control required shipping-value-change"  required name="email" id="email"  maxlength="70" required placeholder="Email*"  value="{{(Session::has('shipping_email'))?session('shipping_email'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control required shipping-value-change" required placeholder="Phone Number*"  name="phone" id="phone"   maxlength="70" required value="{{(Session::has('shipping_phone'))?session('shipping_phone'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" >
                                    <select name="country" id="country" class="form-control form_select required shipping-value-change" required>
                                        <option selected disabled value="">Select Country*</option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{(session('shipping_country')==$country->id)?'selected':''}}
                                        >{{$country->title}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                          
                                <div class="form-group" >
                                    <select class="form-control form_select required shipping-value-change" name="state" id="state" required>
                                        <option selected disabled value="">Select Emirate*</option>
                                        @if(!empty($shipping_states))
                                            @foreach($shipping_states as $shipping_state)
                                                <option value="{{ $shipping_state->id }}"
                                                    {{(session('shipping_state')==$shipping_state->id)?'selected':''}}
                                                >{{$shipping_state->title}}</option>
                                            @endforeach
                                         @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control  shipping-value-change"   name="zipcode" id="zipcode" placeholder="Zip code"  value="{{(Session::has('shipping_zipcode'))?session('shipping_zipcode'):''}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control form-message shipping-value-change "  data-reload="true" required  name="address" id="address" placeholder="Address*">{{(Session::has('shipping_address'))?session('shipping_address'):''}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                                    <input type="hidden" id="account_type" name="account_type" value="{{(Auth::guard('customer')->check())?1:0}}">
                                    <input type="hidden" name="is_default" id="is_default" value="1">
                                     <input type="hidden" id="id" name="id" value="0">
                                     <input type="hidden" id="choose" name="choose" value="same" class="choose">
                                     <input type="hidden" id="type" name="type" value="shipping" class="choose">
                                    <input type="hidden" name="set_session" id="set_session"  value="1">
                    </form>
                </div>

              

            </div>
        </div>
    </div>
    <div class="select_address_area ">
        <div class="row">
            <div class="col-12">
                <div class="form-check">
                    <label class="form-check-label" for="different_shipping_address">
                        Bill to a different address?  <br>
                    </label>
                    <input class="form-check-input different_shipping_address" type="checkbox" value="same" name="address_choose"
                        id="different_shipping_address"
                        {{ Session::get('different_shipping_address') ? 'checked':'' }}>
                        <br>
                </div>
            </div>
        </div>
    </div>
    <div class="select_address_area billiing_address_form  @if(!Helper::checkConfirmOrder())  @else d-none @endif">
        <div class="row">
            <div class="col-12">

                <div class="add_address_form">
                    <h4>Add Billing Address</h4>
                    <form action="" id="addBillingForm">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="first_name" id="first_name" required class="form-control required billing-value-change" maxlength="60" required placeholder="First Name*"  value="{{(Session::has('billing_first_name'))?session('billing_first_name'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="last_name" id="last_name" required class="form-control required billing-value-change" maxlength="60" required placeholder="Last Name*"  value="{{(Session::has('shipping_last_name'))?session('billing_last_name'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control billing-required billing-value-change" placeholder="Email*" maxlength="70" required value="{{(Session::has('billing_email'))?session('billing_email'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input  type="number" name="phone" id="phone" class="form-control billing-required billing-value-change"  placeholder="Phone Number*" maxlength="70" required value="{{(Session::has('billing_phone'))?session('billing_phone'):''}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group" >
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
                                    <input type="number" maxlength="15" name="zipcode" id="zipcode" class="form-control billing-value-change" placeholder="Zip Code " value="{{(Session::has('billing_zipcode'))?session('billing_zipcode'):''}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control form-message billing-required  billing-value-change" required  name="address" id="address" placeholder="Address*">{{(Session::has('billing_address'))?session('billing_address'):''}}</textarea>
                                </div>
                            </div>
                        </div>
                        
                                <input type="hidden" id="account_type" name="account_type"
                                value="{{(Auth::guard('customer')->check())?1:0}}">
                        <input type="hidden" name="is_default" id="is_default"
                                value="1">

                                <input type="hidden" id="type" name="type" value="shipping" class="choose">
                        <input type="hidden" id="id" name="id" value="0">
                        <input type="hidden" name="set_session" id="set_session"
                                value="1">
                    </form>
                </div>

            </div>
        </div>
    </div>
    
    
    
</div>
<div class=" add_address_form ">

   <form action="">
       <div class="row">
           <div class="col-12">
               <div class="form-group">
                   <textarea class="form-control form-message" id="orderRemarks" rows="3" placeholder="Customer Note (Optional)">{{(Session::has('order_remarks'))?session('order_remarks'):''}}</textarea>
               </div>
           </div>
       </div>
   </form>
</div>