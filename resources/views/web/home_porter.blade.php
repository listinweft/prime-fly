
            <form id="bookingForm-porter" action="{{ url('/search-booking') }}" method="POST">
                @csrf
                <input type="hidden" value="{{$category->id}}" name="category">
                <div class="d-flex flex-wrap justify-content-start home-form-flex">
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
                        <select type="text" class="form-control" name="travel_type" id="travel_types">
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
                        <select type="text" class="form-control" name="origin" id="originss">
                            <option value="">Select Origin</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="booking_field" id="destination_select">
                    <div class="booking_select">
                        <select type="text" class="form-control" name="destination" id="destinationss">
                            <option value="">Select Destination</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="booking_field">
                    <div class="normal_select">
                        <select type="text" class="form-control" name="flight" id="flight_select">
                        <option value="">Select Flight</option>
                            <option>Indigo</option>
                            <option>Air India</option>
                            <option>Qatur Airways</option>
                        </select>
                    </div>
                    </div>
                    <div class="booking_field" id="flight_no_select">
                        <input type="text" class="form-control" name="flight_number" placeholder="Flight Number" />
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

    $(function() {
    $('#travel_types').change(function() {
        var travel_type = $(this).val();
      
      
        var base_url = "{{ url('/') }}";
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
                    var originSelect = $('#originss');
                   
                    var destinationSelect = $('#destinationss');
                   
                    originSelect.empty().append('<option value="">Select Origin</option>');
                    destinationSelect.empty().append('<option value="">Select Destination</option>');

                    $.each(data.origins, function(key, location) {
                        originSelect.append('<option value="' + location.id + '">' + location.title + '</option>');
                    });

                    $.each(data.destinations, function(key, location) {
                        destinationSelect.append('<option value="' + location.id + '">' + location.title + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        } else {
            $('#originss').empty().append('<option value="">Select Origin</option>');
            $('#destinationss').empty().append('<option value="">Select Destination</option>');
        }
    });
});
});
</script>
@endpush
