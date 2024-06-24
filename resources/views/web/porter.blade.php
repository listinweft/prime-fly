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
                            <input class="form-control" type="text" autocomplete="off" name="entry_date" placeholder="Entry Date" max="2023-12-31"  id="datepicker" readonly="readonly">
                        </div>
                    </div>
                    <div class="booking_field">
                        <select type="text" id="travel_sector" class="form-control" name="travel_sector">
                            <option value="">Select Travel Sector</option>
                            <option value="international">International</option>
                            <option value="domestic">Domestic</option>
                        </select>
                    </div>
                    <div class="booking_field">
                        <select type="text" class="form-control" name="travel_type" id="travel_type">
                            <option value="">Select Travel Type</option>
                            <option value="departure">Departure</option>
                            <option value="arrival">Arrival</option>
                            <option value="round_trip">Round Trip</option>
                            <option value="transit_type">Transit</option>
                        </select>
                    </div>
                    <div class="booking_field">
                        <select type="text" class="form-control" name="origin" id="origins">
                            <option value="">Select Origin</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="booking_field">
                        <select type="text" class="form-control" name="destination" id="destinations">
                            <option value="">Select Destination</option>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}">{{ $location->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="booking_field">
                        <select type="text" class="form-control" name="flight" id="flight_select">
                            <option>Indigo</option>
                            <option>Air India</option>
                            <option>Qatur Airways</option>
                        </select>
                    </div>
                    <div class="booking_field">
                        <input type="text" class="form-control" name="flight_number" placeholder="Flight Number" />
                    </div>
                    <div class="booking_field">
                        <div class="guest-number-input-item">
                            <div class="g-input-text">Count</div>
                            <div class="g-input-field">
                                <span class="minus count-btn">-</span>
                                <input type="text" value="4" name="count" maxlength="4"/>
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
                        var totalAmounts = response.total_amounts;
                        var encryptedTotalAmounts = btoa(JSON.stringify(totalAmounts));
                        var categorys = response.category;
                        window.location.href = base_url + '/package/' + encodeURIComponent(encryptedTotalAmounts) + '/' + encodeURIComponent(categorys);
                    } else {
                        alert("Failed to calculate total amounts.");
                    }
                },
                error: function(xhr) {
                    alert("An error occurred: " + xhr.status + " " + xhr.statusText);
                }
            });
        }
    });

    $('#travel_sector').change(function() {
        var travelSector = $(this).val();
        if (travelSector) {
            var base_url = "{{ url('/') }}";
            $.ajax({
                url: base_url + '/get-locations',
                type: 'POST',
                data: {
                    travel_sector: travelSector,
                    _token: '{{ csrf_token() }}'
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    var originSelect = $('#origins');
                    var destinationSelect = $('#destinations');
                    originSelect.empty().append('<option value="">Select Origin</option>');
                    destinationSelect.empty().append('<option value="">Select Destination</option>');
                    $.each(data, function(key, location) {
                        originSelect.append('<option value="' + location.id + '">' + location.title + '</option>');
                        destinationSelect.append('<option value="' + location.id + '">' + location.title + '</option>');
                    });
                }
            });
        } else {
            $('#origins').empty().append('<option value="">Select Origin</option>');
            $('#destinations').empty().append('<option value="">Select Destination</option>');
        }
    });
});
</script>
@endpush
