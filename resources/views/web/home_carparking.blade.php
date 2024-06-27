
            <form id="bookingForm-parking">
                @csrf
                <div class="d-flex flex-wrap justify-content-between">
                    <div class="booking_field" id="orgin_select">
                    <div class="booking_select">
                        <select type="text" class="form-control" name="origin">
                            <option value="">Select Origin</option>
                            <option value="origin1">Origin 1</option>
                            <option value="origin2">Origin 2</option>
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
                            <input class="form-control" type="text" name="entry_date" autocomplete="off" placeholder="Entry Date" max="2023-12-31" id="datepickerc" readonly="readonly">
                        </div>
                    </div>
                    <div class="booking_field">
                        <div class="custom-time-picker">
                            <input class="form-control timepicker" type="text" name="entry_time" autocomplete="off" placeholder="Entry Time" id="starttime">
                        </div>
                    </div>
                    <div class="booking_field">
                        <div class="custom-date-picker">
                            <input class="form-control" type="text" name="exit_date" autocomplete="off" placeholder="Exit Date" max="2023-12-31" id="exitdatepicker" readonly="readonly">
                        </div>
                    </div>
                    <div class="booking_field">
                        <div class="custom-time-picker">
                            <input class="form-control timepicker" type="text" name="exit_time" autocomplete="off" placeholder="Exit Time" id="endtime">
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
    // Initialize datepicker and timepicker
    $('#datepickerc, #exitdatepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    $('.timepicker').timepicker({
        showMeridian: false,
        showSeconds: true,
        defaultTime: false
    });

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
                url: base_url + '/search-booking-parking',
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
                        var encryptedTotalAmounts = btoa(JSON.stringify(totalAmounts));
                        window.location.href = base_url + '/package/' + encodeURIComponent(encryptedTotalAmounts);
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
