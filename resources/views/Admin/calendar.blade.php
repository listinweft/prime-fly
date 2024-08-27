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
    $('#calendar').fullCalendar({
        editable: true, // Allow dragging and resizing of events

        events: function(start, end, timezone, callback) {
            $.ajax({
                url: '{{ route('admin.calendar.orders') }}', // Adjust the route as needed
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var events = [];
                    // Process the order data and convert it to FullCalendar events format
                    $.each(response.orders, function(index, order) {
                        var startDate = moment(order.exit_date).format('YYYY-MM-DD');
                        var created_date = moment(order.created_date).format('YYYY-MM-DD');
                        console.log('Exit Date:', created_date);
                        events.push({
                            title: `Orders: ${order.total_orders}`, // Show total orders in the title
                            start: startDate,
                            allDay: true, // Make sure it's an all-day event
                            createdDate: order.created_date,
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
            const orderUrl = `${base_url}/order/listdate/${calEvent.createdDate}`;
        
        // Redirect to the order view page
        window.location.href = orderUrl;
        }
    });

    setInterval(function() {
        $('#calendar').fullCalendar('refetchEvents');
    }, 30000); // 30 seconds
});



    </script>
@endsection



