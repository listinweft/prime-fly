@extends('web.layouts.main')
@section('content')

@if (Session::has('session_key') && !Cart::session($sessionKey)->isEmpty())

    <section class="col-12 cart-progress">
        <div class="container">
            <div class="d-flex justify-content-center">
                <ul class="d-flex justify-content-center mb-0">
                    <li class="active"><span>1</span>Cart</li>
                    <li class="active"><span>2</span>Preview</li>
                    <li><span>3</span>Payment</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="col-12 cart-wrap">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-7 cart-product-list">
                            <h4>Your Bookings</h4>
                            @foreach(Cart::session($sessionKey)->getContent()->sort() as $row)
                            @php
                                $product_id_parts = explode('_', $row->id);
                                $original_product_id = $product_id_parts[0];
                                $product = App\Models\Product::find($original_product_id);
                                $categorydata = $product ? App\Models\Category::where('id', $product->category_id)
                                  ->whereNull('parent_id')
                                  ->first() : null;
                            @endphp
                            @if($product && $categorydata)
                                <div class="col-12 cart-product">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="cart-dtl-wrp">
                                            <div class="d-flex align-items-center">
                                                <div class="cart-prdt-img">
                                                    {!! Helper::printImage($categorydata, 'image','image_webp','thumbnail_image_attribute','d-block') !!}
                                                </div>
                                                <div class="cart-prdct-dtls">

                                                @if(isset($row->attributes['travel_type']) && $row->attributes['travel_type'] !== null)
                                                @php
                                                $travelType = $row->attributes['travel_type'];
                                                $locationId = $travelType == 'departure' ? $row->attributes['origin'] : $row->attributes['destination'];
                                               
                                                  $location = App\Models\Location::where('code',$locationId)->first();
                                                 
                                                $locationTitle = $location ? $location->title : $row->attributes['origin'];
                                            @endphp
                                            @else
                                            @php
                                                $origin = $row->attributes['origin'];
                                                $locationss = App\Models\Location::where('code',$origin)->first();
                                                $locationTitle = $location ? $location->title :$locationss->title;
                                            @endphp
                                            @endif
<h4>{{ ucwords($product->title) }}</h4>
@if (in_array($categorydata->title, ['Meet and Greet', 'Airport Entry','Lounge Booking']))
                                                @if (isset($row->attributes['guest']) && $row->attributes['guest'] > 0)
                                                    <p>From: {{ ucwords($locationTitle) }} | Guest: {{ $row->attributes['guest'] }}</p>
                                                @else
                                                    <p>Guest information not available</p>
                                                @endif
                                            @elseif (in_array($categorydata->title, [ 'Cloak Room', 'Baggage Wrapping']))
                                                @if (isset($row->attributes['guest']) && $row->attributes['guest'] > 0)
                                                    <p>From:  {{ ucwords($locationTitle) }} | Bag: {{ $row->attributes['guest'] }}</p>
                                                @else
                                                    <p>Bag count information not available</p>
                                                @endif

                                                @elseif (in_array($categorydata->title, ['Car Parking']))
                                                @if (isset($row->attributes['guest']) && $row->attributes['guest'] > 0)
                                                    <p>From:  {{ ucwords($locationTitle) }} | Car: {{ $row->attributes['guest'] }}</p>
                                                @else
                                                    <p> count information not available</p>
                                                @endif

                                                @elseif (in_array($categorydata->title, ['Porter']))
                                                @if (isset($row->attributes['guest']) && $row->attributes['guest'] > 0)
                                                    <p>From: {{ ucwords($locationTitle) }} | Porter: {{ $row->attributes['guest'] }}</p>
                                                @else
                                                    <p>Guest information not available</p>
                                                @endif
                                            @else
                                                @if (isset($row->attributes['guest']) && $row->attributes['guest'] > 0)
                                                    <p>From:  {{ ucwords($locationTitle) }} | Bag: {{ $row->attributes['guest'] }}</p>
                                                @else
                                                    <p>Guest information not available</p>
                                                @endif
                                            @endif

                                            <p>Service Type: {{ ucwords($product->service_type) }} | Date: {{ $row->attributes['setdate'] }}</p>
                                                    <a href="javascript:void(0)" class="remove-cart-item" data-id="{{ $row->id }}">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-prdct-price">
                                            <h5>Total:&#8377; {{ $row->price }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p>Product or category data not found</p>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-lg-5 cart-price-summry">
                            <h4>Price Details</h4>
                            <div class="price-summery">
                                <table>
                                    <tbody>
                                        @php 
                                            $totalAmount = 0;
                                        @endphp

                                        @foreach(Cart::session($sessionKey)->getContent()->sort() as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>&#8377; {{ $row->price }}</td>
                                            </tr>
                                            @php 
                                                $totalAmount += $row->price;
                                                $cgst = ($totalAmount * 0.09);
                                                $sgst = ($totalAmount * 0.09);
                                            @endphp
                                        @endforeach

                                        @php 
                                            $finalamount = $totalAmount + $cgst + $sgst;
                                        @endphp
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><b>CGST (9%)</b></td>
                                            <td><b>&#8377; {{ $cgst }}</b></td>
                                        </tr>
                                        <tr>
                                            <td><b>SGST (9%)</b></td>
                                            <td><b>&#8377; {{ $sgst }}</b></td>
                                        </tr>
                                        <tr>
                                            <td><b>Total Amount</b></td>
                                            <td><b>&#8377; {{ $finalamount }}</b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="termsCheckbox" name="termsCheckbox">
                                    <label class="form-check-label" for="termsCheckbox">
                                        I confirm that I have read and agree with the terms and conditions.
                                    </label>
                                    <div id="termsError" class="text-danger"></div>
                                </div>
                                <div class="col-12 package-content-button text-center mt-3">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('cart') }}" class="btn btn-primary-outline me-2">Back</a>
                                        <button type="submit" class="btn btn-primary" id="continueBtn">Continue</button>
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
        $(document).ready(function() {
            $('#continueBtn').click(function(e) {
                if (!$('#termsCheckbox').is(':checked')) {
                    e.preventDefault();
                    $('#termsError').text('Please agree to the terms and conditions.');
                } else {
                    window.location.href = '{{ route('checkout') }}';
                }
            });
        });
    </script>
@endpush
