<div class="srvc_bnnr_filter banner_filter" data-aos="fade-up" data-aos-duration="1000"> 
    <div class="tab-content filter_tab_content" id="filter_tab">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <h4>Meet and Greet</h4> 
            <form id="bookingForm-baggage">
                <div class="d-flex flex-wrap">
                    <!-- Date Input -->
                    <div class="booking_field"> 
                        <div class="custom-date-picker">
                            <input class="form-control" name="entry_date" type="text" autocomplete="off" placeholder="Date" max="2023-12-31"  id="datepicker" readonly="readonly">
                        </div> 
                    </div>  
                    <!-- Origin Select -->

                    <input type="hidden" value="{{$category->id}}" name="category">
                    <div class="booking_field" id="origin2">
                        <select type="text" class="form-control" name="origin" id="origin2">
                            <option value="">Select Origin</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Destination Select -->
                    <div class="booking_field" id="destination2">
                        <select class="form-control" name="destination" id="destination2">
                            <option value="">Select Destination</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Terminal Select -->
                    <div class="booking_field" id="terminal_select">
                        <select type="text" class="form-control" name="terminal">
                            <option>Terminal</option>
                            <option>Terminal 1</option>
                            <option>Terminal 2</option>
                        </select>
                    </div>
                    <!-- Flight Select -->
                    <div class="booking_field" id="flight_select">
                        <select type="text" class="form-control">
                            <option>Indigo</option>
                            <option>Air India</option>
                            <option>Qatar Airways</option>
                        </select>
                    </div>
                    <!-- Flight Number Input -->
                    <div class="booking_field" id="flight_no_select">
                        <input type="text" class="form-control" name="flight_number" placeholder="Flight Number" />
                    </div>
                    <!-- Count Input -->
                    <div class="booking_field">
                        <div class="guest-number-input-item">
                            <div class="g-input-text">Count</div>
                            <div class="g-input-field">
                                <span class="minus count-btn">-</span>
                                <input type="text" value="4" maxlength="4" name="adults"/>
                                <!-- <input type="number" id="quantity" name="quantity" min="1" max="5"> -->
                                <span class="plus count-btn">+</span>
                            </div>
                        </div>
                    </div> 
                    <!-- Submit Button -->
                    <div class="col-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary">Book Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

                        @push('scripts')

                     

<script>


                        $(document).ready(function() {
    // Form Validation
    $("#bookingForm-baggage").validate({
        rules: {
            origin: "required",
            destination: "required",
            flight_number: "required",
        },
        messages: {
            origin: "Please select an origin",
            destination: "Please select a destination",
            flight_number: "Please enter the flight number",
        },
        submitHandler: function(form) {
          var base_url = "{{ url('/') }}";
        
            $.ajax({
              url: base_url+'/search-booking-lounch',
                type: 'POST',
                data: $(form).serialize(),
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(response) {
                if (response.success) {
                    var totalAmounts = response.total_amounts;

                    // Handle the total amounts for each package
                    totalAmounts.forEach(function(item) {
                        console.log("Product:", item.product);
                        console.log("Total Amount:", item.total_amount);
                    });

                    
                    alert(totalAmounts);

                    // Optionally, redirect or update the UI with the total amounts
                    // For example, redirect to the package page with encrypted total amounts
                    var encryptedTotalAmounts = btoa(JSON.stringify(totalAmounts));
                    var categorys = response.category;

                    
                   
window.location.href = base_url + '/package/' + encodeURIComponent(encryptedTotalAmounts) + '/' + encodeURIComponent(categorys);
                
                } else {
                    alert("Failed to calculate total amounts.");
                }
            },
                error: function(xhr) {
                    // Handle error response
                    alert("An error occurred: " + xhr.status + " " + xhr.statusText);
                }
            });
        }
    });

 
    
});
</script>
@endpush