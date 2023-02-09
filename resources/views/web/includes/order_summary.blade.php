<div class="order_summary">
    <h4>Order Summary</h4>

    <ul class="calc_area">
        <li>
            <div class="left">
                <h6>
                    Subtotal {{ ($siteInformation->tax_type == 'Inside')? '(Tax Inclusive - '.$siteInformation->tax.'%)':''}}</h6>
            </div>
            <div class="right">
                
                <h5 class="sub_totall">{{Helper::defaultCurrency()}} {{ number_format(Cart::session($sessionKey)->getSubTotal(),2)}}</h5>
            </div>
        </li>
        @if($siteInformation->tax_type == 'Outside')
            <li>
                <div class="left">
                    <h6>Tax{{ ' ('. $siteInformation->tax . '% )' }}</h6>
                </div>
                <div class="right">
                    <h4 class="tax_amount">{{Helper::defaultCurrency()}} {{number_format($calculation_box['tax_amount'],2)}}</h4>
                </div>
            </li>
        @endif
        <li>
            <div class="left">
                <h6>Shipping Charge</h6>
            </div>
            <div class="right">
                <h5 class="shipping_amount">{{Helper::defaultCurrency()}} {{number_format($calculation_box['shippingAmount'],2)}}</h5>
            </div>
        </li>
      
        <li class=" @if (Request::is('cart')) d-none   @else  @endif ">
            <form action="#">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Coupon Code" name="coupon" id="coupon" value="{{ (Session::has('coupons'))?session('coupons')[count(session('coupons')) -  1]['code']:'' }}" >
                    @if (Session::exists('coupons'))
                    <a class="coupon_remove_btn remove_coupon" href="javascript:void(0)" data-coupon="{{ (Session::has('coupons'))?session('coupons')[count(session('coupons')) -  1]['code']:'' }}"><i class="fa-solid fa-xmark"></i></a>
                    @endif
                    <button id="coupon-apply" class="btn primary_btn">{{Session::has('coupon')?'Applied':'Apply Coupon'}}</button>
                </div>
            </form>
        </li>
        @if (Session::exists('coupons'))
            @foreach(Session::get('coupons') as $session_coupon)
                <li id="coupon_div" 
                    class="flex-column justify-content-end align-items-end @if (Request::is('cart')) d-none   @else  @endif ">
                    <div class="d-flex w-100">
                        <div class="left">
                            <h6>Coupon ({{ $session_coupon['code'] }})</h6>
                        </div>
                        <div class="right">
                            <h5 class="coupon_value_html">
                                - {{Helper::defaultCurrency()}} {{number_format($session_coupon['coupon_value'],2)}}</h5>
                        </div>
                    </div>
                    <a class="coupon_remove_btn remove_coupon" href="javascript:void(0)"
                    data-coupon="{{ $session_coupon['code'] }}">
                        Remove Coupon<i class="fa-solid fa-xmark"></i></a>
                </li>
            @endforeach
        @endif
    </ul>
    <div class="sub_total">
        <div class="sub_left">
            <h6>Total</h6>
        </div>
        <div class="sub_right">
            <input type="hidden" name="grand_total_amount" id="grand_total_amount"
                   value="{{number_format($calculation_box['final_total_with_tax'],2)}}">
            <h5 class="cart_final_total">{{Helper::defaultCurrency()}} {{number_format($calculation_box['final_total_with_tax'],2)}}</h5>
        </div>
    </div>
    <div class=" @if (Request::is('cart'))  @else d-none  @endif ">
        @if(!Auth::guard('customer')->check())
            <button class="secondary_btn" data-bs-toggle="modal" data-bs-target="#login_form_pop"> Login </button>
            <a href="{{ url('checkout') }}" class="primary_btn checkout_btn">Guest Checkout</a>
        @else
            <a href="{{ url('checkout') }}" class="primary_btn checkout_btn">Proceed to Checkout</a>
        @endif
    </div>
    <div class=" @if (Request::is('checkout'))  @else d-none  @endif ">
        <div class="banks">
            <div class="accordion" id="accordionExample">
                {{-- <div class="accordion-item">
                    <h3 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <input class="bank-radio payment_method" type="radio" checked id="credit" name="paymentOption" value="Credit-Card">
                            <label for="credit"><img src="{{asset('frontend/images/svg/mastercard.svg')}}" alt=""></label>
                        </button>
                    </h3>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            <p>Pay with Credit card or Debit card.</p>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="accordion-item">
                    <h3 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <input class="bank-radio" type="radio" id="paypal" name="paymentOption">
                            <label for="paypal"><img src="{{asset('frontend/images/svg/paypal.svg')}}" alt=""></label>
                        </button>
                    </h3>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            <p>Pay with PayPal.</p>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="accordion-item">
                    <h3 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <input class="bank-radio" type="radio" id="applepay" name="paymentOption">
                            <label for="applepay"><img src="{{asset('frontend/images/svg/applepay.svg')}}" alt=""></label>
                        </button>
                    </h3>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            <p>Pay with Apple Pay.</p>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="accordion-item">
                    <h3 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <input class="bank-radio" type="radio" id="bitcoin" name="paymentOption">
                            <label for="bitcoin"><img src="{{asset('frontend/images/svg/bitcoin.svg')}}" alt=""></label>
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
                            <label for="cod"><img src="{{asset('frontend/images/svg/cashondelivery.svg')}}" alt=""></label>
                        </button>
                    </h3>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample" style="">
                        <div class="accordion-body">
                            <p>Pay with Cash On Delivery.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>