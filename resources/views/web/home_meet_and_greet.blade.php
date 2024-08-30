<form id="bookingForm">
    <input type="hidden" value="{{$category->id}}" name="category">
    <div class="d-flex flex-wrap justify-content-start home-form-flex">
        <div class="booking_field">
            <div class="custom-date-picker">
                <input class="form-control" type="text" autocomplete="off" placeholder="Entry Date" max="2023-12-31" id="datepicker" name="datepicker" readonly="readonly">
            </div>
        </div>

        <div class="booking_field" id="travel_select">
            <div class="booking_select">
                <select type="text" class="form-control select_static" name="travel_type" id="travel_type">
                    <option value="">Select Travel Type</option>
                    <option value="departure">Departure</option>
                    <option value="arrival">Arrival</option>
                    <option value="transit_type">Transit</option>
                </select>
            </div> 
        </div>
        <div class="booking_field" id="travel_sect">
            <div class="booking_select"> 
                <select type="text" id="travel_sector" class="form-control select_static" name="travel_sector">
                    <option value="">Select Travel Sector</option>
                    <option value="international">International</option>
                    <option value="domestic">Domestic</option>
                </select>
            </div>
        </div>
       
       
        <div class="booking_field" id="orgin_select">
            <div class="booking_select"> 
                <select type="text" class="form-control select2" name="origin" id="origins">
                    <option value="">Select Origin</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->code }}">{{ $location->title }}-{{$location->code}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="booking_field" id="destination_select">
            <div class="booking_select">
                <select class="form-control select2" name="destination" id="destinations">
                    <option value="">Select Destination</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->code }}">{{ $location->title }}-{{$location->code}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="booking_field" id="flight_select">
            <div class="booking_select">
                <select type="text" class="form-control select2" name="flight_number" id="flights">
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

      
       
        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Book Now</button>
        </div>
    </div>
</form>

<form id="bookingFormt">
    <input type="hidden" value="{{$category->id}}" name="categoryt">
    <div class="d-flex flex-wrap justify-content-start home-form-flex">
        <div class="booking_field">
            <div class="custom-date-picker">
                <input class="form-control" type="text" autocomplete="off" placeholder="Entry Date" max="2023-12-31" id="datepickert" name="datepickert" readonly="readonly">
            </div>
        </div>
       
        <div class="booking_field" id="travel_select">
            <div class="booking_select">
                <select type="text" class="form-control" name="travel_typet" id="travel_typet">
                    <option value="">Select Travel Type</option>
                    <option value="departure">Departure</option>
                    <option value="arrival">Arrival</option>
                    <option value="transit_type">Transit</option>
                </select>
            </div> 
        </div>

        <div class="booking_field" id="travel_sect">
            <div class="booking_select"> 
                <select type="text" id="travel_sectort" class="form-control" name="travel_sectort">
                    <option value="">Select Travel Sector</option>
                    <option value="domestic_to_domestic">Domestic to Domestic</option>
                    <option value="domestic_to_international">Domestic to International</option>
                    <option value="international_to_domestic">International to Domestic</option>
                    <option value="international_to_international">International to international</option>
                </select>
            </div>
        </div>
       
        <div class="booking_field" id="orgin_select">
            <div class="booking_select"> 
                <select type="text" class="form-control select2" name="origint" id="origint">
                    <option value="">Select Origin</option>
                    <!-- @foreach ($locations as $location)
                        <option value="{{ $location->code }}">{{ $location->title }}-{{$location->code}}</option>
                    @endforeach -->
                </select>
            </div>
        </div>
        <div class="booking_field" id="destination_select">
            <div class="booking_select">
                <select class="form-control select2" name="trans" id="trans">
                    <option value="">Select transite</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->code }}">{{ $location->title }}-{{$location->code}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="booking_field" id="flight_select">
            <div class="normal_select">
                <select type="text" class="form-control" name="flight_numbert" id="flightst">
                    <option value="">Select Flight</option>
                </select>
            </div>
        </div>

        <div class="booking_field" id="destination_select">
            <div class="booking_select">
                <select class="form-control select2" name="destinationt" id="destinationt">
                    <option value="">Select Destination</option>
                    <!-- @foreach ($locations as $location)
                        <option value="{{ $location->code }}">{{ $location->title }}-{{$location->code}}</option>
                    @endforeach -->
                </select>
            </div>
        </div>

        <div class="booking_field" id="flight_select">
            <div class="normal_select">
                <select type="text" class="form-control" name="flight_numbertd" id="flightstd">
                    <option value="">Select Departure Flight</option>
                </select>
            </div>
        </div>
       
        <div class="booking_field">
            <div class="guest-number-input-item">
                <div class="g-input-text">Adults</div>
                <div class="g-input-field">
                    <span class="minus count-btn">-</span>
                    <input type="text" name="adultst" value="1" maxlength="4" />
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
                    <input type="text" name="childrent" value="0" maxlength="4" />
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
                    <input type="text" name="infantst" value="0" maxlength="4" />
                    <span class="plusi count-btn">+</span>
                </div>
            </div>
            <div class="note-2">0-2 Years </div>
        </div>
        <div class="booking_field">
            <div class="custom-date-picker">
                <input class="form-control" type="text" autocomplete="off" placeholder="Date" max="2023-12-31" id="datepickertd" name="datepickertd" readonly="readonly">
            </div>
        </div>
       
        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn btn-primary">Book Now</button>
        </div>
    </div>
</form>

@push('scripts')

 
</body>
<script>
$(document).ready(function() {

    $("#origins").select2();
    $("#destinations").select2();
    $("#origint").select2();
    $("#destinationt").select2();

    
   

document.getElementById('bookingForm').style.display = 'block';
document.getElementById('bookingFormt').style.display = 'none';


$( function() {
        $( "#datepickert" ).datepicker({
          
              dateFormat: "dd-mm-yy",
          changeMonth: true,
          changeYear: true,
          minDate: 0,
          "setDate": new Date(),
          "autoclose": true,
          firstDay: 1
          
        });
          $("#datepickert").datepicker("setDate", new Date());
      } );

      $( function() {
        $( "#datepickertd" ).datepicker({
          
              dateFormat: "dd-mm-yy",
          changeMonth: true,
          changeYear: true,
          minDate: 0,
          "setDate": new Date(),
          "autoclose": true,
          firstDay: 1
          
        });
          $("#datepickertd").datepicker("setDate", new Date());
      } );

var base_url = "{{ url('/') }}";
var appId = '6afbf6ac'; // Replace with your FlightStats App ID
var appKey = '6d35112e08773c372901b6ba27a58a25'; // Replace with your FlightStats App Key

// Initialize the form validation
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
        }
    },
    messages: {
        travel_type: "Please select a travel type",
        travel_sector: "Please select a travel sector",
        origin: "Please select an origin",
        destination: "Please select a destination",
        flight_number: "Please enter the flight number",
        adults: {
            required: "Please enter the number of adults",
            digits: "Please enter a valid number"
        }
    },
    submitHandler: function(form) {
        $.ajax({
            url: base_url + '/search-booking',
            type: 'POST',
            data: $(form).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    window.location.href = base_url + '/package/';
                } else {
                    Toast.fire({
                        title: "Error!",
                        text: response.message,
                        icon: "error"
                    });
                }
            },
            error: function(xhr) {
                alert("An error occurred: " + xhr.status + " " + xhr.statusText);
            }
        });
    }
});

// Function to populate locations based on travel type
function populateLocations(travel_type) {
    var category = @json($category->id);
    var sector = $('#travel_sector').val();

    if (travel_type) {
        $.ajax({
            url: base_url + '/get-locations-meet',
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

                if (data.type === "departure") {
                    // Populate origins dropdown
                    originSelect.empty().append('<option value="">Select Origin</option>');
                    $.each(data.origins, function(key, location) {
                        originSelect.append('<option value="' + location.fs + '">' + location.city + ' - ' + location.fs + '</option>');
                    });

                    // Populate destinations dropdown
                    destinationSelect.empty().append('<option value="">Select Destination</option>');
                    $.each(data.destinations, function(key, location) {
                        destinationSelect.append('<option value="' + location.fs + '">' + location.city + ' - ' + location.fs + '</option>');
                    });
                } else if (data.type === "arrival") {
                    // Populate origins dropdown
                    originSelect.empty().append('<option value="">Select Origin</option>');
                    $.each(data.origins, function(key, location) {
                        originSelect.append('<option value="' + location.fs + '">' + location.city + ' - ' + location.fs + '</option>');
                    });

                    // Populate destinations dropdown
                    destinationSelect.empty().append('<option value="">Select Destination</option>');
                    $.each(data.destinations, function(key, location) {
                        destinationSelect.append('<option value="' + location.fs + '">' + location.city + ' - ' + location.fs + '</option>');
                    });
                }
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

// Event listener for travel sector change
$('#travel_sector').change(function() {
    // Reset dropdowns
    // $('#travel_type').val('').change();
    $('#origins').empty().append('<option value="">Select Origin</option>');
    $('#destinations').empty().append('<option value="">Select Destination</option>');
    $('#flights').empty().append('<option value="">Select Flight</option>');

    // Manually clear validation errors
    $("#bookingForm").validate().resetForm();

    var travel_type = $('#travel_type').val();
    if (travel_type) {
        populateLocations(travel_type);
    }
});

// Event listener for travel type change
$('#travel_type').change(function() {
    var travel_type = $(this).val();


     if (travel_type === 'transit_type') {
       

        $('#travel_typet').val(travel_type);
        
        document.getElementById('bookingForm').style.display = 'none';
        document.getElementById('bookingFormt').style.display = 'block';
    }

    else
    {


        if (travel_type) {
        populateLocations(travel_type);
    } else {
        $('#origins').empty().append('<option value="">Select Origin</option>');
        $('#destinations').empty().append('<option value="">Select Destination</option>');
    }

    // Manually clear validation errors
    $("#bookingForm").validate().resetForm();



    }
    

   
});

// Event listener for origin change
$('#origins').change(function() {
    var origin = $(this).val();
    var destination = $('#destinations').val();
    var travel_type = $('#travel_type').val();
    
    if (origin && destination && travel_type) {
        fetchFlights(travel_type, origin);
    } else {
        $('#flights').empty().append('<option value="">Select Flight</option>');
    }

    // Manually clear validation errors
    $("#bookingForm").validate().element("#origins");
    // $("#bookingForm").validate().element("#destinations");
});

// Event listener for destination change
$('#destinations').change(function() {
    var origin = $('#origins').val();
    var destination = $(this).val();
    var travel_type = $('#travel_type').val();
    
    if (origin && destination && travel_type) {
        fetchFlights(travel_type, origin);
    } else {
        $('#flights').empty().append('<option value="">Select Flight</option>');
    }

    // Manually clear validation errors
    $("#bookingForm").validate().element("#origins");
    $("#bookingForm").validate().element("#destinations");
});

// Function to fetch flights based on selected parameters
function fetchFlights(serviceType, origin) {
    var destination = $('#destinations').val();
    var date = $('#datepicker').val(); // Get selected date, format yyyy-mm-dd

    var apiUrl = 'https://api.flightstats.com/flex/schedules/rest/v1/json/';
    var apiEndpoint = '';

    if (serviceType === 'departure') {
        apiEndpoint = 'from/' + origin + '/to/' + destination + '/departing/' + formatDate(date);
    } else if (serviceType === 'arrival') {
        apiEndpoint = 'from/' + origin + '/to/' + destination + '/arriving/' + formatDate(date);
    }

    var proxyUrl = apiUrl + apiEndpoint + '?appId=' + appId + '&appKey=' + appKey;

    $.ajax({
        url: base_url + '/cors-proxy',
        type: 'GET',
        data: {
            url: proxyUrl // Pass proxyUrl as 'url' parameter to the Laravel controller
        },
        success: function(response) {
            var flightsSelect = $('#flights');
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
            var flightsSelect = $('#flights');
            flightsSelect.empty().append('<option value="">Error retrieving flights</option>');
        }
    });
}


function formatDate(date) {
    var parts = date.split('-');
    return parts[2] + '/' + parts[1] + '/' + parts[0];
}

$("#bookingFormt").validate({
rules: {
    travel_typet: "required",
    travel_sectort: "required",
    origint: "required",
    destinationt: "required",
    flight_numbert: "required",
    flight_numbertd: "required",
    adults: {
        required: true,
        digits: true
    }
},
messages: {
    travel_typet: "Please select a travel type",
    travel_sectort: "Please select a travel sector",
    origint: "Please select an origin",
    destinationt: "Please select a destination",
    flight_numbertd:"Please select departure flight",
    flight_numbert  : "Please enter the flight number",
    adults: {
        required: "Please enter the number of adults",
        digits: "Please enter a valid number"
    }
},
submitHandler: function(form) {
    $.ajax({
        url: base_url + '/search-booking-transit',
        type: 'POST',
        data: $(form).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.success) {
                window.location.href = base_url + '/package/';
            } else {
                Toast.fire({
                    title: "Error!",
                    text: response.message,
                    icon: "error"
                });
            }
        },
        error: function(xhr) {
            Toast.fire({
                title: "Error!",
                text: "There was an error processing your request.",
                icon: "error"
            });
        }
    });
}
});
function populateLocationst(travel_type) {
var category = @json($category->id);
var sector = $('#travel_sectort').val();

if (travel_type) {
   
    $.ajax({
        url: base_url + '/get-locations-meet-transit',
        type: 'POST',
        data: {
            sector: sector,
            
            _token: '{{ csrf_token() }}'
        },
        success: function(data) {

          
            var originSelect = $('#origint');
            var destinationSelect = $('#destinationt');

          

            originSelect.empty().append('<option value="">Select Origin</option>');
            $.each(data.origins, function(key, location) {
                originSelect.append('<option value="' + location.fs + '">' + location.city + ' - ' + location.fs + '</option>');
            });

            destinationSelect.empty().append('<option value="">Select Destination</option>');
            $.each(data.destinations, function(key, location) {
                destinationSelect.append('<option value="' + location.fs + '">' + location.city + ' - ' + location.fs + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", error);
        }
    });
} else {
    $('#origint').empty().append('<option value="">Select Origin</option>');
    $('#destinationt').empty().append('<option value="">Select Destination</option>');
}
}

$('#travel_sectort').change(function() {
// $('#travel_typet').val('').change();
$('#origint').empty().append('<option value="">Select Origin</option>');
$('#destinationt').empty().append('<option value="">Select Destination</option>');
$('#flightst').empty().append('<option value="">Select Flight</option>');

$("#bookingFormt").validate().resetForm();

var travel_type = $('#travel_typet').val();
if (travel_type) {
    populateLocationst(travel_type);
}
});

$('#travel_typet').change(function() {
var travel_type = $(this).val();



if (travel_type === 'arrival' || travel_type === 'departure') {
    


    $('#travel_type').val(travel_type).trigger('change');

        document.getElementById('bookingFormt').style.display = 'none';
        document.getElementById('bookingForm').style.display = 'block';
         
    }

    else
    {


        if (travel_type) {
    populateLocationst(travel_type);
} else {
    $('#origint').empty().append('<option value="">Select Origin</option>');
    $('#destinationt').empty().append('<option value="">Select Destination</option>');
}



    }


$("#bookingFormt").validate().resetForm();
});

$('#trans').change(function() {
var origin = $('#origint').val();
var destination = $('#trans').val();
var travel_type = "arrival"
if (origin && destination && travel_type) {
    fetchFlightst(travel_type, origin);
} else {
    $('#flightst').empty().append('<option value="">Select Flight</option>');
}

$("#bookingFormt").validate().element("#origint");
// $("#bookingFormt").validate().element("#destinationt");
});

$('#destinationt').change(function() {
var origin = $('#trans').val();
var destination = $('#destinationt').val();
var travel_type = "departure"
if (origin && destination && travel_type) {
    fetchFlightstd(travel_type, origin);
} else {
    $('#flightstd').empty().append('<option value="">Select Flight</option>');
}

$("#bookingFormt").validate().element("#origint");
$("#bookingFormt").validate().element("#destinationt");
});


function fetchFlightst(serviceType, origin) {
var destination = $('#trans').val();
var date = $('#datepickert').val();

var apiUrl = 'https://api.flightstats.com/flex/schedules/rest/v1/json/';
var apiEndpoint = '';


    apiEndpoint = 'from/' + origin + '/to/' + destination + '/arriving/' + formatDate(date);


var proxyUrl = apiUrl + apiEndpoint + '?appId=' + appId + '&appKey=' + appKey;

$.ajax({
    url: base_url + '/cors-proxy',
    type: 'GET',
    data: {
        url: proxyUrl
    },
    success: function(response) {
        var flightsSelect = $('#flightst');
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
        var flightsSelect = $('#flightst');
        flightsSelect.empty().append('<option value="">Error retrieving flights</option>');
    }
});
}

function fetchFlightstd(serviceType, origin) {
var destination = $('#destinationt').val();
var date = $('#datepickertd').val();

var apiUrl = 'https://api.flightstats.com/flex/schedules/rest/v1/json/';
var apiEndpoint = '';


    apiEndpoint = 'from/' + origin + '/to/' + destination + '/departing/' + formatDate(date);


var proxyUrl = apiUrl + apiEndpoint + '?appId=' + appId + '&appKey=' + appKey;

$.ajax({
    url: base_url + '/cors-proxy',
    type: 'GET',
    data: {
        url: proxyUrl
    },
    success: function(response) {
        var flightsSelect = $('#flightstd');
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
        var flightsSelect = $('#flightst');
        flightsSelect.empty().append('<option value="">Error retrieving flights</option>');
    }
});
}










// Function to format date as yyyy/mm/dd

});



</script>





@endpush
