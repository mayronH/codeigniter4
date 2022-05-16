$(document).ready(() => {
    const calendar = $("#calendar").fullCalendar({
        editable: true,
        events: 'http://localhost:8080/calendarcontroller/loadData',
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay == true) {
                event.allDay = true
            } else {
                event.allDay = false
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            const title = prompt('Event Title:');

            if (title) {
                const startDate = $.fullCalendar.formatDate(start, "Y-MM-DD")
                const endDate = $.fullCalendar.formatDate(end, "Y-MM-DD")

                $.ajax({
                    url: 'http://localhost:8080/calendarcontroller/addEvent',
                    data: {
                        title: title,
                        start: startDate,
                        end: endDate,
                        type: 'add'
                    },
                    type: "POST",
                    success: function (data) {
                        message = {
                            'title': 'Event',
                            'body': 'Event Created Successfully',
                            'type': 'success'
                        }
                        displayMessage(message)

                        calendar.fullCalendar('renderEvent', {
                            id: data.id,
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        }, true)

                        calendar.fullCalendar('unselect')
                    },
                    error: function (response) {
                        console.log(response)
                        message = {
                            'title': 'Event',
                            'body': 'Error',
                            'type': 'error'
                        }
                        displayMessage(message)
                    }
                });
            }
        },
        eventDrop: function (event, delta) {
            const start = $.fullCalendar.formatDate(event.start, "Y-MM-DD")
            const end = $.fullCalendar.formatDate(event.end, "Y-MM-DD")

            $.ajax({
                url: 'http://localhost:8080/calendarcontroller/addEvent',
                data: {
                    id: event.id,
                    title: event.title,
                    start: start,
                    end: end,
                    type: 'update',
                },
                type: "POST",
                success: function (response) {
                    message = {
                        'title': 'Event',
                        'body': 'Event Updated Successfully',
                        'type': 'success'
                    }
                    displayMessage(message)
                },
                error: function (response) {
                    console.log(response)
                    message = {
                        'title': 'Event',
                        'body': 'Error',
                        'type': 'error'
                    }
                    displayMessage(message)
                }
            })
        },
        eventClick: function (event) {
            const deleteMsg = confirm("Do you really want to delete this event?")

            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: 'http://localhost:8080/calendarcontroller/addEvent',
                    data: {
                        id: event.id,
                        type: 'delete',
                    },
                    success: function (response) {
                        calendar.fullCalendar('removeEvents', event.id)
                        message = {
                            'title': 'Event',
                            'body': 'Delete Successfully',
                            'type': 'success'
                        }
                        displayMessage(message)
                    },
                    error: function (response) {
                        console.log(response)
                        message = {
                            'title': 'Event',
                            'body': 'Error',
                            'type': 'error'
                        }
                        displayMessage(message)
                    }
                })
            }
        }
    })
})