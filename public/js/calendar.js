$(document).ready(() => {
    const calendar = $("#calendar").fullCalendar({
        editable: true,
        events: 'http://localhost:8080/calendarcontroller/loadData',
    })
})