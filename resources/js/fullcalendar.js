import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [dayGridPlugin],
        initialView: 'dayGridMonth',
        events: '/activity/events', // Make sure this is correct
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        editable: true,
        dateClick: function (info) {
            var selectedDate = info.dateStr;
            window.location.href = '/activity/create?date=' + selectedDate;
        },
        eventClick: function (info) {
            var eventId = info.event.id;
            window.location.href = '/activity/' + eventId;
        }
    });

    calendar.render();
});
