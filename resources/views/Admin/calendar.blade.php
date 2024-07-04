@extends('Admin.layouts.main')
@section('content')

<div class="content-wrapper">
    <div id="calendar"></div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>


    <script>
        $(document).ready(function() {
            var calendar = $('#calendar').fullCalendar({
                events: [], // Initialize with an empty array
                editable: true, // Allow dragging and resizing of events

                // Fetch orders from the server and update the calendar
                events: function(start, end, timezone, callback) {
                    $.ajax({
                        url: '{{ route('admin.calendar.orders') }}', // Adjust the route as needed
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            var events = [];
                            // Process your order data and convert it to FullCalendar events format
                            // Example assuming your order data has 'title', 'start_date', and 'end_date' properties
                            $.each(response.orders, function(index, order) {
                                events.push({
                                    title: order.order_code,
                                    start: order.start,
                                    end: order.end,
                                    orderId: order.id
                                });
                            });
                            callback(events);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching orders:', error);
                        }
                    });
                },

                eventClick: function(calEvent, jsEvent, view) {
                    // Redirect to the order view page using the order ID
                  
                    window.location.href = base_url + '/order/view/' + calEvent.orderId;

                }

                
            });

            setInterval(function() {
                calendar.fullCalendar('refetchEvents');
            }, 30000); // 30 seconds

            
        });
    </script>
@endsection
