
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['dayGrid'],
        events: '/admin/order/calendar', // Adjust the endpoint to fetch events from
    });

    calendar.render();
});
