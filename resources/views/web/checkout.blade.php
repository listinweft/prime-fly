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
         <div class="col-lg-12">
            <div class="row">
               <div class="col-lg-7 cart-product-list ">
                  <h4>Order Summary</h4>
                  <div class="col-12 cart-product cart-prdct-summry mb-4">

                  @php
                        $totals = [];
                         $totalsn = [];
                     @endphp
                     @foreach(Cart::session($sessionKey)->getContent()->sort() as $row)
                     @php
                     $product_id_parts = explode('_', $row->id);
                     $original_product_id = $product_id_parts[0];
                     $product = App\Models\Product::find($original_product_id);
                     $categorydata = $product ? App\Models\Category::where('id', $product->category_id)
                     ->whereNull('parent_id')
                     ->first() : null;

                     $totals[] = $row->attributes['meet_guest'];
                     $totalsn[] = $row->attributes['meet_guestn'];
                     @endphp
                     <tr>
                       
                     
                     <div class="d-flex align-items-center justify-content-between">

                 
                  
                        <div class="cart-dtl-wrp">
                           <div class="d-flex align-items-center">
                              <div class="cart-prdt-img">
                                 {!! Helper::printImage($categorydata, 'image','image_webp','thumbnail_image_attribute','d-block') !!}
                              </div>
                              <div class="cart-prdct-dtls">
                                 <h4>{{ ucwords($product->title) }}</h4>
                              </div>
                           </div>
                        </div>
                     </div>

                    
                     @endforeach
                  </div>
                  <div  class="">
                     <form id="personal-details-form">

                     @php
                  $user = Auth::guard('customer')->user();
                  $customer = $user->customer->first_name;
                  @endphp
                    
    @foreach($totals as $index => $guestCount)
        @for($i = 0; $i < $guestCount; $i++)
            <div class="price-summery personal-details customer-detail-form mb-3">
                <div class="details-item-wraper d-flex flex-wrap justify-content-between align-items-end">
                    <div class="details-item details-item-option col-12 ps-2 pe-2">
                        <label for="gender_{{ $index }}_{{ $i }}">Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions[{{ $index }}][{{ $i }}]" id="inlineRadio1_{{ $index }}_{{ $i }}" value="Mr">
                            <label class="form-check-label" for="inlineRadio1_{{ $index }}_{{ $i }}">Mr.</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions[{{ $index }}][{{ $i }}]" id="inlineRadio2_{{ $index }}_{{ $i }}" value="Ms">
                            <label class="form-check-label" for="inlineRadio2_{{ $index }}_{{ $i }}">Ms.</label>
                        </div>
                    </div>
                    <div class="details-item col-lg-4 ps-2 pe-2">
                        <label for="name_{{ $index }}_{{ $i }}">Passenger Name*</label>
                        @if($i == 0)
                    

                            <input type="text" name="name[{{ $index }}][]" id="name_{{ $index }}_{{ $i }}" placeholder="Enter full name" required  value="{{$customer}}">

@else
<input type="text" name="name[{{ $index }}][]" id="name_{{ $index }}_{{ $i }}" placeholder="Enter full name" required  value="">
@endif             
                        
                        <span class="error-message" style="display: none;">Name is required.</span>
                    </div>
                    <div class="details-item col-lg-4 ps-2 pe-2">
                        <label for="age_{{ $index }}_{{ $i }}">Age*</label>
                        <input type="text" name="age[{{ $index }}][]" id="age_{{ $index }}_{{ $i }}" placeholder="Enter your age" required>
                        <span class="error-message" style="display: none;">Age is required.</span>
                    </div>
                    <input type="hidden" name="type[{{ $index }}][]" value="meet_and_greet" id="type_{{ $index }}_{{ $i }}">
                    <div class="details-item col-lg-4 ps-2 pe-2">
                        <label for="pnr_{{ $index }}_{{ $i }}">PNR Number</label>
                        <input type="text" name="pnr[{{ $index }}][]" id="pnr_{{ $index }}_{{ $i }}" placeholder="Enter your PNR" >
                        <span class="error-message" style="display: none;">PNR is required.</span>
                    </div>
                    <div class="details-item">
                        <button type="button" class="add-more-btn btn btn-primary">+</button>
                    </div>
                </div>
            </div>
        @endfor
    @endforeach

    <!-- Static Fields Outside the Loop -->
@if(array_sum($totalsn) >= 1 && !empty(array_filter($totalsn)))
    
    
<div class="price-summery personal-details customer-detail-form mb-3">
    <div class="details-item-wraper d-flex flex-wrap justify-content-between align-items-end">
        <div class="details-item details-item-option col-12 ps-2 pe-2">
            <label for="gender_static">Gender</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender_static_mr" value="Mr">
                <label class="form-check-label" for="gender_static_mr">Mr.</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="gender_static_ms" value="Ms">
                <label class="form-check-label" for="gender_static_ms">Ms.</label>
            </div>
        </div>
        <div class="details-item col-lg-4 ps-2 pe-2">
            <label for="name_static">Passenger Name*</label>
            @if( !empty(array_filter($totals)))
            <input type="text" name="name[]" id="name_static" placeholder="Enter full name" required>
            @else
            <input type="text" name="name[]" id="name_static" placeholder="Enter full name" required value="{{$customer}}">

            @endif

            <span class="error-message" style="display: none;">Name is required.</span>
        </div>
        <div class="details-item col-lg-4 ps-2 pe-2">
            <label for="age_static">Age*</label>
            <input type="text" name="age[]" id="age_static" placeholder="Enter your age" required>
             <span class="error-message" style="display: none;">Age is required.</span>
        </div>
        <input type="hidden" value="normal" name="type[]" id="type_static">
        <div class="details-item col-lg-4 ps-2 pe-2">
            <label for="pnr_static">PNR Number</label>
            <input type="text" name="pnr[]" id="pnr_static" placeholder="Enter your PNR" >
            <span class="error-message" style="display: none;">PNR is required.</span>
        </div>
        @if(array_sum($totals) > 0)
        <!-- <div class="details-item col-12 ps-2 pe-2">
            <input type="checkbox" id="auto_fill_static" />
            <label for="auto_fill_static">Set As Default</label>
        </div> -->
        <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox"  id="auto_fill_static"  >
                                    <label class="form-check-label" for="auto_fill_static" style="font-size:14px">
                                    Same as primary Name
                                    </label>
                                    <div id="termsError" class="text-danger"></div>
                                </div>
        @endif
    </div>
</div>

@endif




@if($user->btype == "b2b")
                        <div class="mt-4">
                           <h4>Address</h4>
                           <div class="price-summery customer-detail-form">
                              <div class="details-item">
                                 <div class="details-item  ps-2 pe-2">
                                    <label for="address">Address*</label>
                                    <textarea name="address" id="address" required>{{ $user->customer->businessAddress->address ?? '' }}</textarea>

                                    <span class="error-message" style="display: none;">Address is required.</span>
                                 </div>
                                 @if (isset($row->attributes['travel_sector']) && $row->attributes['travel_sector'] == "international" && $row->attributes['travel_type'] == "arrival" )
                                 <div class="details-item  ps-2 pe-2">
                                    <label for="passport_number">Passport Number*</label>
                                    <input type="text" name="passport_number" id="passport_number" required>
                                    <span class="error-message" style="display: none;">Passport Number is required.</span>
                                 </div>
                                 @endif
                              </div>
                              <div class="col-12  ps-2 pe-2">
                                 <div class="row">
                                    
                                    <div class="col-lg-6">
                                       <div class="details-item">
                                          <label for="name">Country*</label>
                                          <select name="country" id="country" required>
    <option value="">Select a Country</option>
    <option value="india" {{ ($user->customer->businessAddress && $user->customer->businessAddress->country === 'india') ? 'selected' : '' }}>India</option>
    <option value="usa" {{ ($user->customer->businessAddress && $user->customer->businessAddress->country === 'usa') ? 'selected' : '' }}>USA</option>
</select>

                               <span class="error-message" style="display: none;">Country name is required.</span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="details-item">
                                          <label for="name">State*</label>
                                          <input type="text" name="state" id="state" placeholder="State" required value="{{ $user->customer->businessAddress->state ?? '' }}">

                                          <span class="error-message" style="display: none;">State is required.</span>
                                       </div>
                                     
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="details-item">
                                          <label for="name">City*</label>
                                          <input type="text" name="city" id="city" placeholder="City" value="{{ $user->customer->businessAddress->city ?? '' }}" required> 
                                          <span class="error-message" style="display: none;">City is required.</span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="details-item"> 
                                          <label for="name">Pincode*</label>
                                          <input type="text" name="pincode" id="pincode" placeholder="Pincode" value="{{ $user->customer->businessAddress->pincode ?? '' }}" required> 
                                          <span class="error-message" style="display: none;">Pincode is required.</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        @else

                        <div class="mt-4">
                           <h4>Address</h4>
                           <div class="price-summery customer-detail-form">
                              <div class="details-item">
                                 <div class="details-item  ps-2 pe-2">
                                    <label for="address">Address</label>
                                    <textarea name="address" id="address" ></textarea>
                                    <span class="error-message" style="display: none;">Address is required.</span>
                                 </div>
                                 @if (isset($row->attributes['travel_sector']) && $row->attributes['travel_sector'] == "international" && $row->attributes['travel_type'] == "arrival" )
                                 <div class="details-item  ps-2 pe-2">
                                    <label for="passport_number">Passport Number*</label>
                                    <input type="text" name="passport_number" id="passport_number" >
                                    <span class="error-message" style="display: none;">Passport Number is required.</span>
                                 </div>
                                 @endif
                              </div>
                              <div class="col-12  ps-2 pe-2">
                                 <div class="row">
                                    
                                    <div class="col-lg-6">
                                       <div class="details-item">
                                          <label for="name">Country</label>
                                          <select name="country" id="country" >
                                 <!-- <option value="">Select a Country</option> -->
                                 <option value="india">India</option>
                                 <option value="usa">USA</option>
                              </select>
                               <span class="error-message" style="display: none;">Country name is required.</span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="details-item">
                                          <label for="name">State</label>
                                          <input type="text" name="state" id="state" placeholder="State" > 
                                          <span class="error-message" style="display: none;">State is required.</span>
                                       </div>
                                     
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="details-item">
                                          <label for="name">City</label>
                                          <input type="text" name="city" id="city" placeholder="City" > 
                                          <span class="error-message" style="display: none;">City is required.</span>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       <div class="details-item"> 
                                          <label for="name">Pincode</label>
                                          <input type="text" name="pincode" id="pincode" placeholder="Pincode" > 
                                          <span class="error-message" style="display: none;">Pincode is required.</span>
                                       </div>
                                    </div>
                                    <div class="col-lg-12 mt-3 mb-3">
                                       <div class="form-check gst_check">
                                          <input class="form-check-input" type="checkbox" value="1" id="termsCheckbox" name="termsCheckbox" >
                                          <label class="form-check-label" for="termsCheckbox">
                                             I have a GST number <span>(Optional)</span>
                                          </label>
                                          <div id="termsError" class="text-danger"></div>
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                       
                                       <div class="details-item"> 
                                          <!-- <label for="gst">If have a GST number <span>( Optional )</span></label> -->
                                          <input type="text" name="gst" id="gst" placeholder="Enter GST No." > 
                                          <!-- <span class="error-message" style="display: none;">Pincode is required.</span> -->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        @endif
                     </form>
                  </div>
               </div>
               <div class="col-lg-5 cart-price-summry">
                  <!-- @if(in_array(Session::get('category'), ['Meet and Greet', 'Porter', 'Lounge Booking', 'Baggage Wrapping'])) -->
                  <!-- @endif -->
                  
                  <h4 class="mt-0">Payment Methods</h4>
                    <div class="col-12 cart-product cart-prdct-payment">
                        <form>
                            <div class="d-flex flex-wrap cart-pyment-list align-items-center justify-content-between">
                                <div class="cart-pymentradio">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="transfer" id="online-payment" value="online-payment" checked>
                                        <label class="form-check-label ms-2" for="online-payment">
                                            <h4>Online Payment</h4>
                                            <p>Pay using credit/debit cards, UPI, or other methods.</p>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-10 directtransfer-form" id="upi-form">
                                    <div class="row">
                                        <div class="col-lg-12 form-grid">
                                            <p class="mb-0">Add new UPI ID</p>
                                            <label>UPI ID</label>
                                            <input type="text" placeholder="UPI ID" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </table>
                     @if(Auth::guard('customer')->check())

                                                        @php
                                        $user = Auth::guard('customer')->user();
                                        
                                    @endphp

@if($user->pay_status == "Active")
                              
                            <div class="d-flex cart-pyment-list align-items-center justify-content-between">
                                <div class="cart-pymentradio">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="radio" name="transfer" id="cod" value="COD">
                                        <label class="form-check-label ms-2" for="cod">
                                            <h4>Pay later</h4>
                                            <p>Pay after delivery.</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif
                        </form>
                    </div>
                    <h4 class="mt-0">Price Details</h4>
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
                     @if(Auth::guard('customer')->check())

                                                        @php
                                        $user = Auth::guard('customer')->user();
                                        
                                    @endphp


                                    @endif
                     <div class="d-flex justify-content-center">
                        <a href="{{ route('preview') }}" class="btn btn-primary-outline me-2">Back</a>
                        <button type="button" class="btn btn-primary login confirm_payment_btn checkout_btn" id="confirm_payment" data-finalamount="{{ $finalamount }}" data-phone_number="{{ $user->phone }}">Place Order</button>
                     </div>
                  </div>

            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
            <div class="details-item-wraper d-flex flex-wrap justify-content-between align-items-end">
                <div class="details-item details-item-option col-12 ps-2 pe-2">
                    <label for="gender">Gender</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions_${Date.now()}" value="option1">
                        <label class="form-check-label" for="inlineRadio1">Mr.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions_${Date.now()}" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Ms.</label>
                    </div>
                </div>
                <div class="details-item col-lg-4 ps-2 pe-2">
                    <label for="name">Passenger Name</label>
                    <input type="text" name="name[]" placeholder="Enter full name" id="name">
                </div>
                <div class="details-item col-lg-4 ps-2 pe-2">
                    <label for="age">Age</label>
                    <input type="text" name="age[]" placeholder="Enter your age" id="age">
                </div>
                <div class="details-item col-lg-4 ps-2 pe-2">
                    <label for="pnr">PNR Number</label>
                    <input type="text" name="pnr[]" placeholder="Enter your PNR" id="pnr">
                </div>
                <div class="details-item">
                    <button type="button" class="remove-btn btn btn-danger">-</button>
                </div>
            </div>`;
        $(this).closest('.details-item-wraper').after(newField);
    });

    // Function to remove fields
    $(document).on('click', '.remove-btn', function() {
        $(this).closest('.details-item-wraper').remove();
    });
});

</script>

<script>
   document.getElementById('auto_fill_static').addEventListener('change', function() {
    const nameStatic = document.getElementById('name_static');
    const ageStatic = document.getElementById('age_static');
    const pnrStatic = document.getElementById('pnr_static');
    const genderStaticMr = document.getElementById('gender_static_mr');
    const genderStaticMs = document.getElementById('gender_static_ms');

    // Function to get the first available element by its query selector
    function getFirstElement(query) {
        return document.querySelector(query);
    }

    if (this.checked) {
        // Query the elements with general selectors
        const firstGuestElement = getFirstElement('[id^="name_"]');
        const firstGenderElementMr = getFirstElement('[id^="inlineRadio1_"]');
        const firstGenderElementMs = getFirstElement('[id^="inlineRadio2_"]');
        const firstAgeElement = getFirstElement('[id^="age_"]');
        const firstPnrElement = getFirstElement('[id^="pnr_"]');

        // Safely access the values
        const firstGuest = firstGuestElement ? firstGuestElement.value : '';
        const firstGender = firstGenderElementMr && firstGenderElementMr.checked ? 'Mr' : (firstGenderElementMs && firstGenderElementMs.checked ? 'Ms' : '');
        const firstAge = firstAgeElement ? firstAgeElement.value : '';
        const firstPnr = firstPnrElement ? firstPnrElement.value : '';

        // Fill in the static fields only if the elements exist and have values
        nameStatic.value = firstGuest;
        ageStatic.value = firstAge;
        pnrStatic.value = firstPnr;

        // Handle the gender fields safely
        if (firstGender === 'Mr') {
            genderStaticMr.checked = true;
        } else if (firstGender === 'Ms') {
            genderStaticMs.checked = true;
        }

        // Disable editing when auto-filled
        nameStatic.disabled = true;
        ageStatic.disabled = true;
        pnrStatic.disabled = true;
        genderStaticMr.disabled = true;
        genderStaticMs.disabled = true;
    } else {
        // Clear inputs and enable editing
        nameStatic.value = '';
        ageStatic.value = '';
        pnrStatic.value = '';
        genderStaticMr.checked = false;
        genderStaticMs.checked = false;

        nameStatic.disabled = false;
        ageStatic.disabled = false;
        pnrStatic.disabled = false;
        genderStaticMr.disabled = false;
        genderStaticMs.disabled = false;
    }
});

</script>




@endpush