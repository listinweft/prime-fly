<div class="order_summary">
    <h5 class="head">Order Summary</h5>

    <ul class="calc_area">
        <li>
            <div class="left">
                <h6>  Subtotal {{ ($siteInformation->tax_type == 'Inside')? '(Tax Inclusive - '.$siteInformation->tax.'%)':''}}</h6>
            </div>
            <div class="right">
                <h5>{{Helper::defaultCurrency()}} {{ number_format(Cart::session($sessionKey)->getSubTotal(),2)}}</h5>
            </div>
        </li>
        @if($siteInformation->tax_type == 'Outside')
        <li>
            <div class="left">
                <h6>Tax{{ ' ('. $siteInformation->tax . '% )' }}</h6>
            </div>
            <div class="right">
                <h5 class="tax_amount">{{Helper::defaultCurrency()}} {{number_format($calculation_box['tax_amount'],2)}}</h5>
            </div>
        </li>
        @endif
        <li class="cod-charge" style="display:none;">
            <div class="left">
                <h6>COD Charge</h6>
            </div>
            <div class="right">
                <h5 class="shipping_amount">{{Helper::defaultCurrency()}} {{$siteInformation->cod_extra_charge}}</h5>
            </div>
        </li>
        <li>
            <div class="left">
                <h6>Shipping Charge</h6>
            </div>
            <div class="right">
                <h5 class="shipping_amount">{{Helper::defaultCurrency()}} {{number_format($calculation_box['shippingAmount'],2)}}</h5>
            </div>
        </li>
        <li class="@if (Request::is('cart')) d-none   @else couponLi  @endif ">
            <form action="#">
                <div class="form-group position-relative">
                    <input type="text" class="form-control" placeholder="Coupon Code" value="{{ (Session::has('coupons'))?session('coupons')[count(session('coupons')) -  1]['code']:'' }}" >
                    @if (Session::exists('coupons'))
                        <a class="coupon_remove_btn remove_coupon" href="javascript:void(0)" data-coupon="{{ (Session::has('coupons'))?session('coupons')[count(session('coupons')) -  1]['code']:'' }}" ><i class="fa-solid fa-xmark"></i></a>
                    @endif
                    <span class="invalidMessage d-none"> Given Data Error </span>
                    
                </div>
                <button id="coupon-apply" class="btn primary_btn">{{Session::has('coupon')?'Applied':'Apply Coupon'}}</button>
            </form>
        </li>
        @if (Session::exists('coupons'))
            @foreach(Session::get('coupons') as $session_coupon)
                <li class="flex-column justify-content-end align-items-end couponDiscount">
                    <div class="d-flex w-100 justify-content-between">
                        <div class="left">
                            <h6>Coupon ({{ $session_coupon['code'] }}):</h6>
                        </div>
                        <div class="right">
                            <h6 class="tableData">- {{Helper::defaultCurrency()}} {{number_format($session_coupon['coupon_value'],2)}}</h6>
                        </div>
                    </div>
                    <a class="coupon_remove_btn remove_coupon" href="javascript:void(0)"
                    data-coupon="{{ $session_coupon['code'] }}">Remove Coupon<i class="fa-solid fa-xmark"></i></a>
                </li>
            @endforeach
        @endif
    </ul>
    <div class="sub_total">
        <input type="hidden" name="grand_total_amount" id="grand_total_amount" value="{{number_format($calculation_box['final_total_with_tax'],2)}}">
        <div class="sub_left">
            <h6>Total</h6>
        </div>
        <div class="sub_right">
            <h5>{{Helper::defaultCurrency()}} {{number_format($calculation_box['final_total_with_tax'],2)}}</h5>
        </div>
    </div>
    <div class="btnsBox">
        @if(!Auth::guard('customer')->check())
            <a href="{{ url('checkout') }}" class="primary_btn checkout_btn">Guest Checkout</a>
            <a href="{{ url('login') }}" class="primary_btn login">Login</a>
        @endif
    </div>
</div>