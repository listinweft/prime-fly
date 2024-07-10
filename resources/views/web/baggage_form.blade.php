<div class="srvc_bnnr_filter banner_filter" data-aos="fade-up" data-aos-duration="1000"> 
    <div class="tab-content filter_tab_content" id="filter_tab">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <h4>Baggage wrapping</h4> 
            <form id="bookingForm-baggages">
                <div class="d-flex flex-wrap justify-content-start home-form-flex">
                    <!-- Date Input -->
                    <div class="booking_field"> 
                        <div class="custom-date-picker">
                            <input class="form-control" type="text" autocomplete="off" name="datepicker" placeholder="Date" max="2023-12-31"  id="datepickerb" readonly="readonly">
                        </div> 
                    </div>  
                    <!-- Origin Select -->

                    <input type="hidden" value="{{$category->id}}" name="category">
                    <div class="booking_field" id="orgin_select">
                        <div class="booking_select">
                            <select type="text" class="form-control" name="origin" id="originb">
                                <option value="">Select Origin</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Destination Select -->
                    <div class="booking_field" id="destination_select">
                        <div class="booking_select">
                            <select class="form-control" name="destination" id="destinationb">
                                <option value="">Select Destination</option>
                                @foreach ($locationsall as $location)
                                    <option value="{{ $location->id }}">{{ $location->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Terminal Select -->
                    <div class="booking_field" id="flight_select">
        <div class="booking_select"> 
                <select type="text" class="form-control" name="flight_number" id="flightsb">
                    <option value="">Select Flight</option>
                </select>
            </div>
        </div>

        <div class="booking_field" id="terminal_select">
                    <div class="booking_select"> 
                        <select type="text" class="form-control" name="terminal">
                        <option value="">Select Terminal</option>
                            <option>Terminal 1</option>
                            <option>Terminal 2</option>
                            <option>Terminal 3</option>
                        </select>
</div>
                    </div>
                    <!-- Flight Number Input -->
                   
                    <!-- Count Input -->
                    <div class="booking_field">
                        <div class="guest-number-input-item">
                            <div class="g-input-text">Count</div>
                            <div class="g-input-field">
                                <span class="minus count-btn">-</span>
                                <input type="text" value="1" maxlength="4" name="adults"/>
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

$( function() {
$( "#datepickerb" ).datepicker({

dateFormat: "dd-mm-yy",
changeMonth: true,
changeYear: true,
minDate: 0,
"setDate": new Date(),
"autoclose": true,
firstDay: 1

});
$("#datepickerb").datepicker("setDate", new Date());
} );
// Form Validation
$("#bookingForm-baggages").validate({
rules: {
origin: "required",
destination: "required",
flight_number: "required",
terminal: "required",
},
messages: {
origin: "Please select an origin",
destination: "Please select a destination",
flight_number: "Please enter the flight number",
terminal: "Please enter the Terminal",
},
submitHandler: function(form) {
var base_url = "{{ url('/') }}";

$.ajax({
url: base_url+'/search-booking-baggage',
type: 'POST',
data: $(form).serialize(),
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
success: function(response) {

console.log(response)
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


var base_url = "{{ url('/') }}";
var appId = '6afbf6ac'; // Replace with your FlightStats App ID
var appKey = '6d35112e08773c372901b6ba27a58a25'; // Replace with your FlightStats App Key

var travel_type = "departure";

// Function to populate locations based on travel type selection
function populateLocations(travel_type) {
var category = @json($category->id);

if (travel_type) {
$.ajax({
url: base_url + '/get-locations',
type: 'POST',
data: {
travel_type: travel_type,
category: category,
_token: '{{ csrf_token() }}'
},
success: function(data) {
var originSelect = $('#originb');
var destinationSelect = $('#destinationb');

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
$('#originb').empty().append('<option value="">Select Origin</option>');
$('#destinationb').empty().append('<option value="">Select Destination</option>');
}
}

// Event listener for origin and destination change
$('#destinationb, #originb').change(function() {
var origin = $('#originb').val();
var destination = $('#destinationb').val();
var travel_type = 'departure';

if (origin && destination) {
fetchFlights(travel_type, origin, destination);
} else {
$('#flightsb').empty().append('<option value="">Select Flight</option>');
}
});

// Function to fetch flights based on selected parameters
function fetchFlights(travel_type, origin, destination) {
var date = $('#datepickerb').val();

if (!date) {
$('#flightsb').empty().append('<option value="">Select Flight</option>');
return;
}

var apiUrl = 'https://api.flightstats.com/flex/schedules/rest/v1/json/';
var apiEndpoint = 'from/' + origin + '/to/' + destination + '/departing/' + formatDate(date);
var proxyUrl = apiUrl + apiEndpoint + '?appId=' + appId + '&appKey=' + appKey;

$.ajax({
url: base_url + '/cors-proxy',
type: 'GET',
data: { url: proxyUrl },
success: function(response) {
var flightsSelect = $('#flightsb');
flightsSelect.empty().append('<option value="">Select Flight</option>');

if (response.scheduledFlights && response.scheduledFlights.length > 0) {
$.each(response.scheduledFlights, function(index, flight) {
var airline = response.appendix.airlines.find(function(airline) {
return airline.fs === flight.carrierFsCode;
});

var airlineName = airline ? airline.name : 'Unknown Airline';
var flightDetails = airlineName + ' - ' + flight.carrierFsCode + '-' + flight.flightNumber;

flightsSelect.append('<option value="' + flightDetails + '">' + flightDetails + '</option>');
});
} else {
flightsSelect.append('<option value="">No flights found</option>');
}
},
error: function(xhr, status, error) {
console.error("Flight API Error:", error);
var flightsSelect = $('#flightsb');
flightsSelect.empty().append('<option value="">Error retrieving flights</option>');
}
});
}

// Function to format date as yyyy/mm/dd
function formatDate(date) {
var parts = date.split('-');
return parts[2] + '/' + parts[1] + '/' + parts[0];
}

// Initial population of locations with default 'departure'
populateLocations(travel_type);



});
</script>
@endpush