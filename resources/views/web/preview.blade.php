@extends('web.layouts.main')
@section('content')

@if (Session::has('session_key') && !Cart::session($sessionKey)->isEmpty())

    <section class="col-12 cart-progress">
        <div class="container">
            <div class="d-flex justify-content-center">
                <ul class="d-flex justify-content-center mb-0">
                    <li><span>1</span>Cart</li>
                    <li class="active"><span>2</span>Preview</li>
                    <li><span>3</span>Payment</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="col-12 cart-wrap">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-lg-7 cart-product-list">
                            <h4>Your Bookings</h4>
                            @foreach(Cart::session($sessionKey)->getContent()->sort() as $row)
                                @php
                                    $product = App\Models\Product::find($row->id);
                                @endphp
                                <div class="col-12 cart-product">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="cart-dtl-wrp">
                                            <div class="d-flex align-items-center">
                                                <div class="cart-prdt-img">
                                                    {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block w-100') !!}
                                                </div>
                                                <div class="cart-prdct-dtls">
                                                    <h4>{{$product->title}}</h4>
                                                    @if(isset($row->attributes['guest']))
                                                        <p>From: Mumbai Guest: {{$row->attributes['guest']}}</p>
                                                    @else
                                                        <p>Guest information not available</p>
                                                    @endif
                                                    <p>{{$product->service_type}}: Date: {{$row->attributes['setdate']}}</p>
                                                    <a href="javascript:void(0)" class="remove-cart-item" data-id="{{$row->id}}">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-prdct-price">
                                            <h5>Total:&#8377; {{$row->price}}</h5>
                                        </div>
                                    </div>
                                </div>
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
                                                <td>{{$row->name}}</td>
                                                <td>&#8377; {{$row->price}}</td>
                                            </tr>
                                            @php 
                                                $totalAmount += $row->price;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td><b>Total Amount</b></td>
                                            <td><b>&#8377; {{$totalAmount}}</b></td>
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
                }
                
                else
                {

                    window.location.href = base_url + '/checkout';



                }
            });
        });
    </script>
@endpush
