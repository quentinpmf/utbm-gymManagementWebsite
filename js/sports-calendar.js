$(document).ready(function() {
    $('#calendar').fullCalendar({
        //configure options for the calendar
        header: {
            left:   'title',
            center: '',
            right:  ''
        },
        locale: 'fr',
        weekends: false,
        events: "../includes/json-events.php",
        editable: false,
        defaultView: 'agendaWeek',
        allDayDefault: false,
    });

    $("add-event").dialog({
        autoOpen: false,
        height: 'auto',
        width: 'auto',
        autoResize:true,
        modal: false,
        resizable: false,
        open: function(){
            $("#title").attr("tabindex","1");
        },
        buttons: {
            "Save Event": function() {
                $.ajax({
                    type:"POST",
                    url: "includes/add-event.php",
                    data: $('#add-event-form').serialize(),
                    success: function(){
                        calendar.fullCalendar('refetchEvents');
                    }
                });
                $(this).dialog("close");
            },

            Cancel: function() {
                $(this).dialog("close");
            }
        },
    });
});

