<div class="srvc_bnnr_filter banner_filter" data-aos="fade-up" data-aos-duration="1000"> 
                           <div class="tab-content filter_tab_content" id="filter_tab">
                              <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                                <h4>Meet and Greet</h4> 
                                <form id="bookingForm">
                                <input type="hidden" value="{{$category->id}}" name="category">
    <div class="d-flex flex-wrap">
        <div class="booking_field">
            <div class="custom-date-picker">
                <input class="form-control" type="text" autocomplete="off" placeholder="Entry Date" max="2023-12-31" id="datepicker" name="datepicker" readonly="readonly">
            </div>
        </div>
        <div class="booking_field" id="orgin_select">
           <!-- <select type="text" id="travel_sectorssssss" class="form-control" name="travel_sectorssss">
              <option value="">Select Travel Sector</option>
              <option value="international">International</option>
              <option value="domestic">Domestic</option>
          </select> -->
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
                <!-- <option value="round_trip">Round Trip</option> -->
                <option value="transit_type">Transit</option>
            </select>

</div>
        </div>
       
        <div class="booking_field" id="orgin_select">
        <div class="booking_select"> 
            <select type="text" class="form-control" name="origin" id="origins">
            <option value="">Select Origin</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->title }}</option>
                @endforeach
            </select>
</div>
        </div>
        <div class="booking_field" id="destination_select">
        <div class="booking_select"> 
            <select class="form-control" name="destination" id="destinations">
            <option value="">Select Destination</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->title }}</option>
                @endforeach
            </select>
</div>
        </div>
        <div class="booking_field" id="flight_select">
        <div class="normal_select"> 
            <select type="text" class="form-control">
            <option value="">Select Flight</option>
                <option value="indigo">Indigo</option>
                <option value="air_india">Air India</option>
                <option value="qatur_airways">Qatur Airways</option>
            </select>
</div>
        </div>
        <div class="booking_field" id="flight_no_select">
            <input type="text" class="form-control" name="flight_number" placeholder="Flight Number" />
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


$(function() {
    $('#travel_type').change(function() {
        var travel_type = $(this).val();
      
        var base_url = "{{ url('/') }}";
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
                    var originSelect = $('#origins');
                   
                    var destinationSelect = $('#destinations');
                   
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
            $('#origins').empty().append('<option value="">Select Origin</option>');
            $('#destinations').empty().append('<option value="">Select Destination</option>');
        }
    });
});



    
 
    
});
</script>
@endpush