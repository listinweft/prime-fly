<div class="srvc_bnnr_filter banner_filter" data-aos="fade-up" data-aos-duration="1000"> 
    <div class="tab-content filter_tab_content" id="filter_tab">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <h4>Lounge Booking</h4> 
            <form id="bookingForm-baggage">
    <div class="d-flex flex-wrap">
        <!-- Date Input -->
        <div class="booking_field"> 
            <div class="custom-date-picker">
                <input class="form-control" name="entry_date" type="text" autocomplete="off" placeholder="Date" id="datepickerlounge" readonly="readonly">
            </div> 
        </div>  
        <!-- Origin Select -->
        <input type="hidden" value="{{$category->id}}" name="category">
        <div class="booking_field" id="orgin_select">
            <div class="booking_select"> 
                <select class="form-control select2" name="origin" id="originl">
                    <option value="">Select Origin</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->code }}">{{ $location->title }}-{{$location->code}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Destination Select -->
        <div class="booking_field" id="destination_select">
            <div class="booking_select"> 
                <select class="form-control select2" name="destination" id="destinationl">
                    <option value="">Select Destination</option>
                    <!-- @foreach ($locations as $location)
                        <option value="{{ $location->code }}">{{ $location->title }}</option>
                    @endforeach -->
                </select>
            </div>
        </div>
        <!-- Terminal Select -->
        <div class="booking_field" id="terminal_select">
            <div class="booking_select"> 
                <select class="form-control" name="terminal">
                    <option>Terminal</option>
                    <option>Terminal 1</option>
                    <option>Terminal 2</option>
                </select>
            </div>
        </div>
        <!-- Flight Select -->
        <div class="booking_field" id="terminal_select">
        <div class="booking_select"> 
                <select type="text" class="form-control" name="flight_number" id="flightsl">
                    <option value="">Select Flight</option>
                </select>
            </div>
        </div>
        <!-- Count Input -->
        <div class="booking_field">
            <div class="guest-number-input-item">
                <div class="g-input-text">Count</div>
                <div class="g-input-field">
                    <span class="minus count-btn">-</span>
                    <input type="text" value="1" maxlength="4" name="adults"/>
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
    // Initialize date picker

    $('.select2').select2({
          
          allowClear: true
      });
    $(function() {
        $("#datepickerlounge").datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
            changeYear: true,
            minDate: 0,
            autoclose: true,
            firstDay: 1
        });
        $("#datepickerlounge").datepicker("setDate", new Date());
    });

    // Default travel_type to 'departure'
    var travel_type = 'departure';

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

    $('#originl, #destinationl, #flightsl').on('change', function() {
        $(this).valid();
    });

    var base_url = "{{ url('/') }}";
    var appId = '6afbf6ac'; // Replace with your FlightStats App ID
    var appKey = '6d35112e08773c372901b6ba27a58a25'; // Replace with your FlightStats App Key

    var travel_type ="departure";
    var sector ="international";

    // Function to populate locations based on travel type selection
    function populateLocations(travel_type) {
    var category = @json($category->id);

        if (travel_type) {
            $.ajax({
                url: base_url + '/get-locations',
                type: 'POST',
                data: {
                    travel_type: travel_type,
                    sector: sector,
                    category: category,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    var originSelect = $('#originl');
                    var destinationSelect = $('#destinationl');

                    // originSelect.empty().append('<option value="">Select Origin</option>');
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
            $('#originl').empty().append('<option value="">Select Origin</option>');
            $('#destinationl').empty().append('<option value="">Select Destination</option>');
        }
    }

    // Event listener for destination change
    $('#destinationl').change(function() {
        var origin = $('#originl').val();
        var travel_type = 'departure';

        if (origin) {
            fetchFlights(travel_type, origin);
        } else {
            $('#flights').empty().append('<option value="">Select Flight</option>');
        }
    });

    // Function to fetch flights based on selected parameters
    function fetchFlights(travel_type, origin) {
        var destination = $('#destinationl').val();
        var date = $('#datepickerlounge').val();

        if (!destination || !date) {
            $('#flights').empty().append('<option value="">Select Flight</option>');
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
                var flightsSelect = $('#flightsl');
                flightsSelect.empty().append('<option value="">Select Flight</option>');

                if (response.scheduledFlights && response.scheduledFlights.length > 0) {
                    $.each(response.scheduledFlights, function(index, flight) {
                        var airline = response.appendix.airlines.find(function(airline) {
                            return airline.fs === flight.carrierFsCode;
                        });

                        var airlineName = airline ? airline.name : 'Unknown Airline';
                        var flightDetails = airlineName + ' - ' + flight.carrierFsCode + '-' + flight.flightNumber;

                        console.log('Appending flight:', flightDetails);

                        flightsSelect.append('<option value="' + flightDetails + '">' + flightDetails + '</option>');
                    });
                } else {
                    flightsSelect.append('<option value="">No flights found</option>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Flight API Error:", error);
                var flightsSelect = $('#flightsl');
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