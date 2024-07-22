<form id="bookingForm">
    <input type="hidden" value="{{$category->id}}" name="category">
    <div class="d-flex flex-wrap justify-content-start home-form-flex">
        <div class="booking_field">
            <div class="custom-date-picker">
                <input class="form-control" type="text" autocomplete="off" placeholder="Entry Date" max="2023-12-31" id="datepicker" name="datepicker" readonly="readonly">
            </div>
        </div>
        <div class="booking_field" id="travel_sect">
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
                    <option value="transit_type">Transit</option>
                </select>
            </div> 
        </div>
       
        <div class="booking_field" id="orgin_select">
            <div class="booking_select"> 
                <select type="text" class="form-control" name="origin" id="origins">
                    <option value="">Select Origin</option>
                    <!-- @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->title }}</option>
                    @endforeach -->
                </select>
            </div>
        </div>
        <div class="booking_field" id="destination_select">
            <div class="booking_select">
                <select class="form-control" name="destination" id="destinations">
                    <option value="">Select Destination</option>
                    <!-- @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->title }}</option>
                    @endforeach -->
                </select>
            </div>
        </div>
        <div class="booking_field" id="flight_select">
            <div class="normal_select">
                <select type="text" class="form-control" name="flight_number" id="flights">
                    <option value="">Select Flight</option>
                </select>
            </div>
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
            <div class="note-2">Above 11 years </div>
        </div>
        <div class="booking_field">
            <div class="guest-number-input-item">
                <div class="g-input-text">Children</div>
                <div class="g-input-field">
                    <span class="minusc count-btn">-</span>
                    <input type="text" name="children" value="0" maxlength="4" />
                    <span class="plusc count-btn">+</span>
                </div>
            </div>
            <div class="note-2">3-11 Years </div>
        </div>
        <div class="booking_field">
            <div class="guest-number-input-item">
                <div class="g-input-text">Infants</div>
                <div class="g-input-field">
                    <span class="minusi count-btn">-</span>
                    <input type="text" name="infants" value="0" maxlength="4" />
                    <span class="plusi count-btn">+</span>
                </div>
            </div>
            <div class="note-2">0-2 Years </div>
        </div>

        <div class="booking_field" id="pnr">
            <div class="guest-number-input-item" >
            <input type="text" name="pnr" placeholder="PNR" />
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

        $("#pnr").hide();



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

            window.location.href = base_url+'/package/';
               
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


// $('#travel_sector').change(function() {

//     var sector = $(this).val();

//     if(sector == "domestic")


//     {

//         $("#pnr").show();


//     }
//     else

//     {

//         $("#pnr").hide();



//     }




   
            

//         });

        var base_url = "{{ url('/') }}";
        var appId = '6afbf6ac'; // Replace with your FlightStats App ID
        var appKey = '6d35112e08773c372901b6ba27a58a25'; // Replace with your FlightStats App Key

        // Function to populate locations based on travel type selection
        function populateLocations(travel_type) {
            var category = @json($category->id);

          var sector =   $('#travel_sector').val();

            if (travel_type) {
                $.ajax({
                    url: base_url + '/get-locations',
                    type: 'POST',
                    data: {
                        sector: sector,
                        travel_type: travel_type,
                        category: category,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        var originSelect = $('#origins');
                        var destinationSelect = $('#destinations');

                        originSelect.empty().append('<option value="">Select Origin</option>');
                        destinationSelect.empty().append('<option value="">Select Destination</option>');

                        $.each(data.origins, function(key, location) {
                            originSelect.append('<option value="' + location.fs + '">' + location.city + ' - ' + location.fs + '</option>');

                        });

                        $.each(data.destinations, function(key, location) {
                            destinationSelect.append('<option value="' + location.fs + '">' + location.city + ' - ' + location.fs + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", error);
                    }
                });
            } else {
                $('#origins').empty().append('<option value="">Select Origin</option>');
                $('#destinations').empty().append('<option value="">Select Destination</option>');
            }
        }

        // Event listener for travel type change
        $('#travel_type').change(function() {
            var travel_type = $(this).val();
            populateLocations(travel_type);
        });

        // Event listener for origin change
        $('#destinations').change(function() {
            var origin = $('#origins').val(); // Get the selected origin
            var travel_type = $('#travel_type').val(); // Get the selected travel type

            if (origin && travel_type) {
                fetchFlights(travel_type, origin);
            } else {
                $('#flights').empty().append('<option value="">Select Flight</option>');
            }
        });

        // Function to fetch flights based on selected parameters
        function fetchFlights(serviceType, origin) {
            var destination = $('#destinations').val(); // Get selected destination
            var date = $('#datepicker').val(); // Get selected date, format yyyy-mm-dd

            var apiUrl = 'https://api.flightstats.com/flex/schedules/rest/v1/json/';
            var apiEndpoint = '';

            if (serviceType === 'departure') {
                apiEndpoint = 'from/' + origin + '/to/' + destination + '/departing/' + formatDate(date);

                
            } else if (serviceType === 'arrival') {
                apiEndpoint = 'from/' + origin + '/to/' + destination + '/arriving/' + formatDate(date);
            }

            var proxyUrl = apiUrl + apiEndpoint + '?appId=' + appId + '&appKey=' + appKey;

         

           

            var base_url = "{{ url('/') }}";
        
        

            $.ajax({
                url: base_url+'/cors-proxy',
                type: 'GET',
                data: {
        url: proxyUrl // Pass proxyUrl as 'url' parameter to the Laravel controller
    },
                success: function(response) {
                    var flightsSelect = $('#flights');
                    flightsSelect.empty().append('<option value="">Select Flight</option>');
                  // Assuming 'response' is the JSON object you provided
if (response.scheduledFlights && response.scheduledFlights.length > 0) {
    $.each(response.scheduledFlights, function(index, flight) {
        // Find the airline name corresponding to the flight
        var airline = response.appendix.airlines.find(function(airline) {
            return airline.fs === flight.carrierFsCode;
        });

        var airlineName = airline ? airline.name : 'Unknown Airline';
        var flightDetails = airlineName + ' - '+ flight.carrierFsCode +'-' + flight.flightNumber;

        // Append the option to the select element
        flightsSelect.append('<option value="' + flightDetails + '">' + flightDetails + '</option>');
    });
} else {
    flightsSelect.append('<option value="">No flights found</option>');
}

                },
                error: function(xhr, status, error) {
                    console.error("Flight API Error:", error);
                    var flightsSelect = $('#flights');
                    flightsSelect.empty().append('<option value="">Error retrieving flights</option>');
                }
            });
        }

        // Function to format date as yyyy/mm/dd
        function formatDate(date) {
            var parts = date.split('-');
            return parts[2] + '/' + parts[1] + '/' + parts[0];
        }
    });
</script>





@endpush
