@extends('web.layouts.main')
@section('content')
<section class="col-12 cart-progress">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <ul class="d-flex justify-content-center mb-0">
                        <li class="active"><span>1</span>Cart</li>
                        <li class="active"><span>2</span>Preview</li>
                        <li class="active"><span>3</span>Payment</li>
                    </ul>
                </div>
            </div>
         </section>
         <section class="col-12 cart-wrap">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6 cart-product-list ">
                                <h4>Order Summery</h4>

                               

                                <div class="col-12 cart-product cart-prdct-summry mb-4">

                                @foreach(Cart::session($sessionKey)->getContent()->sort() as $row)
                                @php
                                $product_id_parts = explode('_', $row->id);
                                $original_product_id = $product_id_parts[0];
                                $product = App\Models\Product::find($original_product_id);
                            @endphp
                                    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="cart-dtl-wrp">
                                            <div class="d-flex align-items-center">
                                                <div class="cart-prdt-img">
                                                {!! Helper::printImage($product, 'thumbnail_image','thumbnail_image_webp','thumbnail_image_attribute','d-block') !!}
                                                </div>
                                                <div class="cart-prdct-dtls">
                                                <h4>{{ ucwords($product->title) }}</h4>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>

                                    @endforeach

                                </div>

                               

                                <h4>Payment Methods</h4>
                                <div class="col-12 cart-product cart-prdct-payment">

                                  <form>
                                    <div class="d-flex flex-wrap cart-pyment-list align-items-center justify-content-between">
                                        <div class="cart-pymentradio">
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input" type="radio" name="transfer" id="cardtransfer">
                                                <label class="form-check-label ms-2" for="transfer">
                                                    <h4>Credit/Debit Cards</h4>
                                                    <p>Pay with your Credit / Debit Card</p>
                                                </label>
                                            </div>  
                                        </div>
                                        <img src="{{ asset('frontend/img/card-logo.png')}}" alt="card"/>
                                        <div class="col-10 directtransfer-form" id="card-form">
                                          <div class="row">
                                            <div class="col-lg-12 form-grid">
                                              <label>Card Number</label>
                                              <input type="text" placeholder="" />
                                            </div>
                                          </div> 
                                          <div class="row">
                                            <div class="col-lg-6 form-grid">
                                              <label>Valid thru</label>
                                              <input type="text" placeholder="" />
                                            </div>
                                            <div class="col-lg-6 form-grid">
                                              <label>CVV</label>
                                              <input type="text" placeholder="" />
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="d-flex cart-pyment-list align-items-center justify-content-between">
                                        <div class="cart-pymentradio">
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input" type="radio" name="transfer" id="direct-transfer"  >
                                                <label class="form-check-label ms-2" for="direct-transfer">
                                                    <h4>Direct Bank Transfer</h4>
                                                    <p>Make payment directly through bank account.</p>
                                                </label>
                                            </div> 
                                           
                                        </div> 
                                    </div>
                                    <div class="d-flex flex-wrap cart-pyment-list align-items-center justify-content-between">
                                        <div class="cart-pymentradio">
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input" type="radio" name="transfer" id="other-payment"  >
                                                <label class="form-check-label ms-2" for="other-payment">
                                                    <h4>Other Payment Methods</h4>
                                                    <p>Make payment through Gpay, Paypal, Paytm etc</p>
                                                </label>
                                            </div> 
                                        </div>
                                        <img src="{{ asset('frontend/img/card-logo.png')}}" alt="card"/>
                                        <div class="col-10 directtransfer-form" id="upi-form">
                                          <div class="row">
                                            <div class="col-lg-12 form-grid">
                                              <p class="mb-0">Add new UPI ID</p>
                                              <label>UP ID</label>
                                              <input type="text" placeholder="" />
                                            </div>
                                          </div>  
                                        </div>
                                    </div>
                                  </form>
                                </div>
                            </div>
                            <div class="col-lg-5 cart-price-summry">

                            <!-- @if(in_array(Session::get('category'), ['Meet and Greet', 'Porter', 'Lounge Booking', 'Baggage Wrapping'])) -->
    <form id="personal-details-form">
        <div class="price-summery personal-details customer-detail-form">
            <div class="details-item-wraper">
                <div class="details-item">
                    <label for="name">Name</label>
                    <input type="text" name="name[]" id="name" placeholder="Enter full name" required>
                    <span class="error-message" style="display: none;">Name is required.</span>
                </div>
                <div class="details-item">
                    <label for="age">Age</label>
                    <input type="text" name="age[]" id="age" placeholder="Enter your age" required>
                    <span class="error-message" style="display: none;">Age is required.</span>
                </div>
                <div class="details-item">
                    <label for="pnr">PNR</label>
                    <input type="text" name="pnr[]" id="pnr" placeholder="Enter your PNR" required>
                    <span class="error-message" style="display: none;">PNR is required.</span>
                </div>
                <div class="details-item details-item-option">
                    <label for="gender">Gender</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Mr.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Ms.</label>
                    </div>
                </div>
                <div class="details-item">
                        <label for="address">Address</label>
                        <textarea name="address" id="address"  required></textarea>
                        <span class="error-message" style="display: none;">Address is required.</span>
                    </div>
                <div class="details-item">
                    <button type="button" class="add-more-btn btn btn-primary">+</button>
                </div>
            </div>
        </div>
      
        <div class="mt-4">
            <h4>Address</h4>
            <div class="price-summery customer-detail-form">
            @if (isset($row->attributes['travel_sector']) && $row->attributes['travel_sector'] == "international" && $row->attributes['travel_type'] == "arrival" )
                <div class="details-item-wraper">
                    
                    <div class="details-item">
                        <label for="passport_number">Passport Number</label>
                        <input type="text" name="passport_number" id="passport_number" required>
                        <span class="error-message" style="display: none;">Passport Number is required.</span>
                    </div>
                </div>
                @endif
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="details-item"> 
                                <label for="name">Pincode</label>
                                <input type="text" name="name[]" id="name" placeholder="Pincode" required> 
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="details-item">
                                <label for="name">Country</label>
                                <select>
                                    <option>Country</option>
                                    <option>Country</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="details-item">
                                <label for="name">State</label>
                                <select>
                                    <option>State</option>
                                    <option>State</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="details-item">
                                <label for="name">City</label>
                                <select>
                                    <option>City</option>
                                    <option>City</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      


    </form>
<!-- @endif -->


                                <h4 class="mt-4">Price Details</h4>
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
                                            $cgst = ($totalAmount * 0.09);
                                            $sgst = ($totalAmount * 0.09);

                                            

                                         
                                            @endphp


                                            @endforeach

                                            @php 

                                $finalamount =  $totalAmount + $cgst + $sgst

                                @endphp

                                           
                                        </tbody>
                                        <tfoot>

                                        
                                        
                                                <td><b>CGST (9%)</b></td>
                                                <td><b>&#8377;  {{$cgst}}</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>SGST (9%)</b></td>
                                                <td><b>&#8377;  {{$sgst}}</b></td>
                                            </tr>
                                            <tr>
                                                <td><b>Total Amount</b></td>
                                                <td><b>&#8377;  {{$finalamount}}</b></td>
                                            </tr>
                                            
                                        </tfoot>
                                    </table>
                                    <div class="d-flex justify-content-center">
                                    <a href="{{ route('preview') }}" class="btn btn-primary-outline me-2">Back</a>
                                           

                                            <button type="button" class="btn btn-primary login confirm_payment_btn checkout_btn" id="confirm_payment">Place Order</button>
                                        </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </section>
@endsection

@push('scripts')
    
    <script>
    $(document).ready(function() {
        $('input[name=transfer]').click(function () {  
                if (this.id == "cardtransfer") {
                    $("#card-form").show();
                    $("#upi-form").hide();
                } 
                else if (this.id == "other-payment") {
                    $("#upi-form").show();
                    $("#card-form").hide();
                } 
                else {
                  $("#upi-form").hide();
                  $("#card-form").hide();
                }
            });

        });
    </script>

<script>
    $(document).ready(function() {
        // Function to add more fields
        $(document).on('click', '.add-more-btn', function() {
            var newField = `
                <div class="details-item-wraper">
                    <div class="details-item">
                        <label for="name">Name</label>
                        <input type="text" name="name[]" placeholder="Enter full name" id="name">
                    </div>
                    <div class="details-item">
                        <label for="age">Age</label>
                        <input type="text" name="age[]" placeholder="Enter your age" id="age">
                    </div>
                    <div class="details-item">
                        <label for="pnr">PNR</label>
                        <input type="text" name="pnr[]" placeholder="Enter your PNR" id="pnr">
                    </div>
                     <div class="details-item details-item-option">
                        <label for="gender">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Mr.</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Ms.</label>
                        </div>
                    </div>

                    <div class="details-item">
                        <label for="address">Address</label>
                        <textarea name="address" id="address"  required></textarea>
                        <span class="error-message" style="display: none;">Address is required.</span>
                    </div>
                    <div class="details-item">
                        <button type="button" class="remove-btn btn btn-danger">-</button>
                    </div>
                </div>`;
            $('.personal-details').append(newField);
        });

        // Function to remove fields
        $(document).on('click', '.remove-btn', function() {
            $(this).closest('.details-item-wraper').remove();
        });
    });
</script>
@endpush
