<!-- resources/views/calendar.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Full Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha256-uB0N9IqL7jPzqCn6pfXqC8HT60LFODvjNWqEz8p6NpE=" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI/tZ1aZqK0FjNfuM1Jv6YzfGv4+1m8Hp6e5fBok=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha256-hNO0DUIFVwYQT8RdEXexfMlyfnS50a1s4J7gKtt/YT4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha256-xw/9MJFfradPxa04plTk8gok3s5JU3jsLY3KUB7KaE0=" crossorigin="anonymous"></script>
</head>
<body>

    <!-- Your Full Calendar container -->
    <div id="fullCalendar"></div>

    <!-- Your JavaScript code -->
    <script>
        // Initialize FullCalendar
        $(document).ready(function() {
            $('#fullCalendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: '/calendar/data' // Use the correct URL for JSON data
            });
        });
    </script>

</body>
</html>
