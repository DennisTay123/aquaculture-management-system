import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['dayGrid'],
        initialView: 'dayGridMonth',
        events: '/activities/events', // Fetches events from your controller
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        editable: true,
        dateClick: function (info) {
            var selectedDate = info.dateStr;
            window.location.href = '/activities/create?date=' + selectedDate; // Redirect with the selected date
        },
        eventClick: function (info) {
            var eventId = info.event.id; // Assuming the event ID is set in FullCalendar's event data

            // Redirect to the show page
            window.location.href = '/activities/' + eventId;
        }
    });

    calendar.render();
});
