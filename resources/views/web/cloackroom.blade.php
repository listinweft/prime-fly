<div class="srvc_bnnr_filter banner_filter" data-aos="fade-up" data-aos-duration="1000"> 
    <div class="tab-content filter_tab_content" id="filter_tab">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <h4>Cloakroom</h4> 
            <form id="bookingForm-cloakroom">
                @csrf
                <input type="hidden" value="{{$category->id}}" name="category">
                <div class="d-flex flex-wrap"> 
                    <div class="booking_field" id="origin_select">
                        <select type="text" class="form-control" name="origin">
                            <option value="">Select Origin</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="booking_field" id="terminal_select">
                        <select type="text" class="form-control" name="terminal">
                            <option value="">Select Terminal</option>
                            <option value="terminal1">Terminal 1</option>
                            <option value="terminal2">Terminal 2</option>
                        </select>
                    </div> 
                    <div class="booking_field">
                        <div class="custom-date-picker">
                            <input class="form-control" type="text" name="entry_date" autocomplete="off" placeholder="Entry Date" max="2023-12-31" id="datepicker" readonly="readonly">
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

                    <div class="booking_field">
                        <div class="guest-number-input-item">
                            <div class="g-input-text">Bag Count</div>
                            <div class="g-input-field">
                                <span class="minus count-btn">-</span>
                                <input type="text" value="4" name="count" maxlength="4"/>
                                <span class="plus count-btn">+</span>
                            </div>
                        </div>
                    </div
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function() {
    // Initialize datepicker and timepicker
    $('#datepicker, #exitdatepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });

    $('.timepicker').timepicker({
        showMeridian: false,
        showSeconds: true,
        defaultTime: false
    });

    // Form Validation
    $("#bookingForm-cloakroom").validate({
        rules: {
            origin: "required",
            terminal: "required",
            entry_date: "required",
            entry_time: "required",
            exit_date: "required",
            exit_time: "required",
            count: {
                required: true,
                digits: true
            }
        },
        messages: {
            origin: "Please select an origin",
            terminal: "Please select a terminal",
            entry_date: "Please select an entry date",
            entry_time: "Please select an entry time",
            exit_date: "Please select an exit date",
            exit_time: "Please select an exit time",
            count: {
                required: "Please enter the count",
                digits: "Please enter a valid number"
            }
        },
        submitHandler: function(form) {
            var base_url = "{{ url('/') }}";
            $.ajax({
                url: base_url + '/search-booking-cloakroom',
                type: 'POST',
                data: $(form).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        var totalAmounts = response.total_amounts;
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
});
</script>
@endpush
