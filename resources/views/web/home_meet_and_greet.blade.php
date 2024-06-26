
<form id="bookingForm">
                                <input type="hidden" value="{{$category->id}}" name="category">
    <div class="d-flex flex-wrap">
        <div class="booking_field">
            <div class="custom-date-picker">
                <input class="form-control" type="text" autocomplete="off" placeholder="Entry Date" max="2023-12-31" id="datepicker" name="datepicker" readonly="readonly">
            </div>
        </div>
        <div class="booking_field" id="travel_sect">
           <!-- <select type="text" id="travel_sectorssssss" class="form-control" name="travel_sectorssss">
              <option value="">Select Travel Sector</option>
              <option value="international">International</option>
              <option value="domestic">Domestic</option>
          </select> -->
          <div class="booking_select"> 
            <select type="text" id="travel_sector" class="form-control" name="travel_sector">
            <option value="">Select Travel Sector</option>
            <option value="international">International</option>
                <option value="domestic">Domestic</option>
            
            </select>
            </div>
        </div>
        <div class="booking_field" id="travel_select">
        <div class="booking_select">
            <select type="text" class="form-control" name="travel_type" id="travel_type">
                <option value="">Select Travel Type</option>
                <option value="departure">Departure</option>
                <option value="arrival">Arrival</option>
                <option value="round_trip">Round Trip</option>
                <option value="transit_type">Transit</option>
            </select>
        </div> 
        </div>
       
        <div class="booking_field" id="orgin_select">
            <div class="booking_select"> 
                <select type="text" class="form-control" name="origin" id="origins">
                <option value="">Select Origin</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="booking_field" id="destination_select">
            <div class="booking_select">
                <select class="form-control" name="destination" id="destinations">
                <option value="">Select Destination</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="booking_field" id="flight_select">
        <div class="normal_select">
            <select type="text" class="form-control">
                <option value="indigo">Indigo</option>
                <option value="air_india">Air India</option>
                <option value="qatur_airways">Qatur Airways</option>
            </select>
</div>
        </div>
        <div class="booking_field" id="flight_no_select">
            <input type="text" class="form-control" name="flight_number" placeholder="Flight Number" />
        </div>
        <div class="booking_field">
            <div class="guest-number-input-item">
                <div class="g-input-text">Adults</div>
                <div class="g-input-field">
                    <span class="minus count-btn">-</span>
                    <input type="text" name="adults" value="1" maxlength="4" />
                    <span class="plus count-btn">+</span>
                </div>
            </div>
        </div>
        <div class="booking_field">
            <div class="guest-number-input-item">
                <div class="g-input-text">Infants</div>
                <div class="g-input-field">
                    <span class="minusi count-btn">-</span>
                    <input type="text" name="infants" value="4" maxlength="4" />
                    <span class="plusi count-btn">+</span>
                </div>
            </div>
        </div>
        <div class="booking_field">
            <div class="guest-number-input-item">
                <div class="g-input-text">Children</div>
                <div class="g-input-field">
                    <span class="minusc count-btn">-</span>
                    <input type="text" name="children" value="4" maxlength="4" />
                    <span class="plusc count-btn">+</span>
                </div>
            </div>
        </div>
        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Book Now</button>
        </div>
    </div>

    

</form>
                          
                     @push('scripts')

                     

<script>


                        $(document).ready(function() {

                            $("#bookingForm").validate({
   
   rules: {
      
       travel_type: "required",
       travel_sector: "required",
       origin: "required",
       destination: "required",
       flight_number: "required",
       adults: {
           required: true,
           digits: true
       },
      
   },
   messages: {
       // datepicker: "Please select an entry date",
       travel_type: "Please select a travel type",
       travel_sector: "Please select a travel sector",
       origin: "Please select an origin",
       destination: "Please select a destination",
       flight_number: "Please enter the flight number",
       adults: {
           required: "Please enter the number of adults",
           digits: "Please enter a valid number"
       },
       
   },
   submitHandler: function(form) {
     var base_url = "{{ url('/') }}";
   
       $.ajax({
         url: base_url+'/search-booking',
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

               // Optionally, redirect or update the UI with the total amounts
               // For example, redirect to the package page with encrypted total amounts
               var encryptedTotalAmounts = btoa(JSON.stringify(totalAmounts));

               var categorys = response.category;

               
              
               window.location.href = base_url + '/package/' + encodeURIComponent(encryptedTotalAmounts) + '/' + encodeURIComponent(categorys);
           } else {
            
            Toast.fire({
                            title: "error!", text: response.message, icon: "error"
                        });
           }
       },
           error: function(xhr) {
               // Handle error response
               alert("An error occurred: " + xhr.status + " " + xhr.statusText);
           }
       });
   }
});


$(function() {
    $('#travel_sector').change(function() {

      var travelSector = $(this).val();

      
        if (travelSector) {
          var base_url = "{{ url('/') }}";
        
            $.ajax({
              url: base_url+'/get-locations',
                type: 'POST',

                data: {
                    travel_sector: travelSector,
                    _token: '{{ csrf_token() }}' // Include CSRF token
                },
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
                success: function(data) {
                    var originSelect = $('#origins');
                   
                    var destinationSelect = $('#destinations');
                    console.log(data.locations)

                    originSelect.empty().append('<option value="">Select Origin</option>');
                    destinationSelect.empty().append('<option value="">Select Destination</option>');

                    $.each(data, function(key, location) {
                        originSelect.append('<option value="' + location.id + '">' + location.title + '</option>');
                        destinationSelect.append('<option value="' + location.id + '">' + location.title + '</option>');
                    });
                }
            });
        } else {
            $('#origin').empty().append('<option value="">Select Origin</option>');
            $('#destination').empty().append('<option value="">Select Destination</option>');

            
        }
     
    });
});



    
 
    
});
</script>
@endpush