<div class="srvc_bnnr_filter banner_filter" data-aos="fade-up" data-aos-duration="1000">
    <div class="tab-content filter_tab_content" id="filter_tab">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <h4>Porter</h4>
             <form id="bookingForm-porter" action="{{ url('/search-booking') }}" method="POST">
                @csrf
                <input type="hidden" value="{{$category->id}}" name="category">
                <div class="d-flex flex-wrap">
                    <div class="booking_field">
                        <div class="custom-date-picker">
                            <input class="form-control" type="text" autocomplete="off" name="entry_date" placeholder="Entry Date" max="2023-12-31"  id="datepickerp" readonly="readonly">
                        </div>
                    </div>
                    <div class="booking_field"  id="travel_sect">
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
                        <select type="text" class="form-control" name="travel_type" id="travel_typepo">
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
                        <select type="text" class="form-control" name="origin" id="originpo">
                            <option value="">Select Origin</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="booking_field" id="destination_select">
                    <div class="booking_select">
                        <select type="text" class="form-control" name="destination" id="destinationpo">
                            <option value="">Select Destination</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="booking_field" id="flight_select">
            <div class="normal_select">
                <select type="text" class="form-control" name="flight_number" id="flightspo">
                    <option value="">Select Flight</option>
                </select>
            </div>
        </div>
                    
                    <!-- <div class="booking_field">
                        <input type="text" class="form-control" name="flight_number" placeholder="Flight Number" />
                    </div> -->
                    <div class="booking_field">
                        <div class="guest-number-input-item">
                            <div class="g-input-text">Count</div>
                            <div class="g-input-field">
                                <span class="minus count-btn">-</span>
                                <input type="text" value="1" name="count" maxlength="4"/>
                                <span class="plus count-btn">+</span>
                            </div>
                        </div>
                    </div>
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


    

$( function() {
      $( '#datepickerp' ).datepicker({
        
            dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        minDate: 0,
        "setDate": new Date(),
        "autoclose": true,
        firstDay: 1
        
      });
        $("#datepickerp").datepicker("setDate", new Date());
    } );


$("#bookingForm-porter").validate({
  rules: {
      travel_type: "required",
      travel_sector: "required",
      origin: "required",
      destination: "required",
      flight_number: "required",
      count: {
          required: true,
          digits: true
      }
  },
  messages: {
      travel_type: "Please select a travel type",
      travel_sector: "Please select a travel sector",
      origin: "Please select an origin",
      destination: "Please select a destination",
      flight_number: "Please enter the flight number",
      count: {
          required: "Please enter the count",
          digits: "Please enter a valid number"
      }
  },
  submitHandler: function(form) {
      var base_url = "{{ url('/') }}";
      $.ajax({
          url: base_url + '/search-booking-porter',
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
              alert("An error occurred: " + xhr.status + " " + xhr.statusText);
          }
      });
  }
});



var base_url = "{{ url('/') }}";
  var appId = '6afbf6ac'; // Replace with your FlightStats App ID
  var appKey = '6d35112e08773c372901b6ba27a58a25'; // Replace with your FlightStats App Key

  // Function to populate locations based on travel type selection
  function populateLocations(travel_type) {
      var category = @json($category->id);

      

      if (travel_type) {
          $.ajax({
              url: base_url + '/get-locations-porter',
              type: 'POST',
              data: {
                  travel_type: travel_type,
                  category: category,
                  _token: '{{ csrf_token() }}'
              },
              success: function(data) {
                  var originSelect = $('#originpo');
                  var destinationSelect = $('#destinationpo');

                  originSelect.empty().append('<option value="">Select Origin</option>');
                  destinationSelect.empty().append('<option value="">Select Destination</option>');

                  $.each(data.origins, function(key, location) {
                      originSelect.append('<option value="' + location.code + '">' + location.title + '</option>');
                  });

                  $.each(data.destinations, function(key, location) {
                      destinationSelect.append('<option value="' + location.code + '">' + location.title + '</option>');
                  });
              },
              error: function(xhr, status, error) {
                  console.error("AJAX Error:", error);
              }
          });
      } else {
          $('#originpo').empty().append('<option value="">Select Origin</option>');
          $('#destinationpo').empty().append('<option value="">Select Destination</option>');
      }
  }

  // Event listener for travel type change
  $('#travel_typepo').change(function() {

     
      var travel_type = $(this).val();
      populateLocations(travel_type);
  });

  // Event listener for origin change
  $('#destinationpo').change(function() {
   
      var origin = $('#originpo').val(); // Get the selected origin
      var travel_type = $('#travel_typepo').val(); // Get the selected travel type

      

      if (origin && travel_type) {
          fetchFlights(travel_type, origin);
      } else {
          $('#flightspo').empty().append('<option value="">Select Flight</option>');
      }
  });

  // Function to fetch flights based on selected parameters
  function fetchFlights(travel_type, origin) {
      var destination = $('#destinationpo').val(); // Get selected destination
      var date = $('#datepickerp').val(); // Get selected date, format yyyy-mm-dd
 

      var apiUrl = 'https://api.flightstats.com/flex/schedules/rest/v1/json/';
      var apiEndpoint = '';

      if (travel_type === 'departure') {
          apiEndpoint = 'from/' + origin + '/to/' + destination + '/departing/' + formatDate(date);

          
      } else if (travel_type === 'arrival') {
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
              var flightsSelect = $('#flightspo');
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
              var flightsSelect = $('#flightspo');
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
