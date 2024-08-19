<div class="srvc_bnnr_filter banner_filter" data-aos="fade-up" data-aos-duration="1000">
    <div class="tab-content filter_tab_content" id="filter_tab">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <h4>Car Parking</h4>
            <form id="bookingForm-parking">
                @csrf
                <input type="hidden" value="{{$category->id}}" name="category">
                <div class="d-flex flex-wrap">
                    <div class="booking_field" id="orgin_select">
                    <div class="booking_select"> 
                        <select type="text" class="form-control select2" name="origin" id="origincar">
                        <option value="">Select Origin</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->code }}">{{ $location->title }}-{{$location->code}}</option>
                                @endforeach
                        </select>
</div>
                    </div>
                    <div class="booking_field" id="terminal_select">
                    <div class="booking_select"> 
                        <select type="text" class="form-control" name="terminal">
                            <option value="">Select Terminal</option>
                            <option value="terminal1">Terminal 1</option>
                            <option value="terminal2">Terminal 2</option>
                        </select>
</div>
                    </div>
                    <div class="booking_field bookingcustom_input" id="vehicle_no_select">
                        <input type="text" class="form-control" name="vehicle_number" placeholder="Vehicle Number" />
                    </div>
                    <div class="booking_field">
                        <div class="custom-date-picker">
                            <input class="form-control" type="text" name="entry_date" autocomplete="off" placeholder="Entry Date" max="2023-12-31" id="datepickercar" readonly="readonly">
                        </div>
                    </div>
                    <div class="booking_field">
                        <div class="custom-time-picker">
                            <input class="form-control timepickercar" type="text" name="entry_time" autocomplete="off" placeholder="Entry Time" id="starttime">
                        </div>
                    </div>
                    <div class="booking_field">
                        <div class="custom-date-picker">
                            <input class="form-control" type="text" name="exit_date" autocomplete="off" placeholder="Exit Date" max="2023-12-31" id="exitdatepickercar" readonly="readonly">
                        </div>
                    </div>
                    <div class="booking_field">
                        <div class="custom-time-picker">
                            <input class="form-control timepickercar" type="text" name="exit_time" autocomplete="off" placeholder="Exit Time" id="endtime">
                        </div>
                    </div>
                    <div class="booking_field">
                        <div class="guest-number-input-item">
                            <div class="g-input-text">Car Count</div>
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
    // Initialize datepicker and timepicker

    
    $('.select2').select2({
          
          allowClear: true
      });
      $('#datepickercar, #exitdatepickercar').datepicker({
    format: 'yyyy-mm-dd',
    minDate: 0,
    autoclose: true,
    onSelect: function(dateText, inst) {
        var selectedDate = new Date(dateText);
        if (inst.id === 'datepickercar') {
            // Entry date selected, restrict exit date
            $('#exitdatepickercar').datepicker('option', 'minDate', selectedDate);
            // Clear selected exit date if it's before entry date
            var exitDate = $('#exitdatepickercar').datepicker('getDate');
            if (exitDate && exitDate < selectedDate) {
                $('#exitdatepickercar').val('');
            }
        } else {
            // Exit date selected, restrict entry date
            $('#datepickercar').datepicker('option', 'maxDate', selectedDate);
        }

        // Update minTime for timepicker based on selected date
        updateMinTime(selectedDate);

        // Validate date fields (if using jQuery Validation)
        $('#datepickercar').valid();
        $('#exitdatepickercar').valid();
    }
});

// Initialize timepicker
$('.timepickercar').timepicker({
    showMeridian: false,
    showSeconds: true,
    defaultTime: false
});

// Function to update minTime based on selected date
function updateMinTime(selectedDate) {
    var today = new Date();
    var tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1); // Set to tomorrow

    // Clear existing timepicker selections
    $('.timepickercar').timepicker('remove');

    if (selectedDate.toDateString() === today.toDateString()) {
        // If the selected date is today, restrict past times
        $('.timepickercar').timepicker({
            showMeridian: false,
            showSeconds: true,
            defaultTime: false,
            minTime: getCurrentTime(today) // Set minTime to the current time
        });
    } else {
        // For future dates, allow all times
        $('.timepickercar').timepicker({
            showMeridian: false,
            showSeconds: true,
            defaultTime: false,
            minTime: null
        });
    }
}

// Function to get the current time in hh:mm:ss format for a specific date
function getCurrentTime(date) {
    var hours = date.getHours().toString().padStart(2, '0');
    var minutes = date.getMinutes().toString().padStart(2, '0');
    var seconds = date.getSeconds().toString().padStart(2, '0');
    return hours + ':' + minutes + ':' + seconds;
}

// Ensure minTime is updated on page load if a date is pre-selected or defaults to today
var datepickerVal = $('#datepickercar').val() || $('#exitdatepickercar').val();
if (datepickerVal) {
    var selectedDate = new Date(datepickerVal);
    updateMinTime(selectedDate);
} else {
    updateMinTime(new Date()); // Update minTime based on the current date
}


    // Form Validation
    $("#bookingForm-parking").validate({
        rules: {
            origin: "required",
            terminal: "required",
            vehicle_number: "required",
            entry_date: "required",
            entry_time: "required",
            exit_date: "required",
            exit_time: "required"
        },
        messages: {
            origin: "Please select an origin",
            terminal: "Please select a terminal",
            vehicle_number: "Please enter the vehicle number",
            entry_date: "Please select an entry date",
            entry_time: "Please select an entry time",
            exit_date: "Please select an exit date",
            exit_time: "Please select an exit time"
        },
        submitHandler: function(form) {
            var base_url = "{{ url('/') }}";
            $.ajax({
                url: base_url + '/search-booking-carparking',
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

    $('#origincar').on('change', function() {
        $(this).valid();
    });

    
});
</script>
@endpush
