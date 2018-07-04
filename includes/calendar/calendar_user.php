<?php
/**
 * Created by PhpStorm.
 * User: adelcour
 * Date: 27/06/2018
 * Time: 09:41
 */
?>

<html>
    <?php include('includeCSSandJScalendar.php'); ?>

    <script>
        $(document).ready(function () {
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                firstDay: 1,
                defaultView:'agendaWeek',
                locale: 'fr',
                lang: 'fr',
                events: '../../includes/calendar/load.php',
                selectable: false,
                selectHelper: false,
                select: function (start, end, allDay) {
                    var title = prompt("Entrez le titre de l'événement");
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: "../../includes/calendar/insert.php",
                            type: "POST",
                            data: {title: title, start: start, end: end},
                            success: function () {
                                calendar.fullCalendar('refetchEvents');
                            }
                        })
                    }
                },
                editable: false,
                eventResize: function (event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "../../includes/calendar/update.php",
                        type: "POST",
                        data: {title: title, start: start, end: end, id: id},
                        success: function () {
                            calendar.fullCalendar('refetchEvents');
                        }
                    })
                },

                eventDrop: function (event) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url: "../../includes/calendar/update.php",
                        type: "POST",
                        data: {title: title, start: start, end: end, id: id},
                        success: function () {
                            calendar.fullCalendar('refetchEvents');
                        }
                    });
                },

                // suppresion de l'event
                deleteEvent: function (event) {
                    if (confirm("Êtes-vous sûr de vouloir le supprimer ?")) {
                        var id = event.id;
                        $.ajax({
                            url: "../../includes/calendar/delete.php",
                            type: "POST",
                            data: {id: id},
                            success: function () {
                                calendar.fullCalendar('refetchEvents');
                            }
                        })
                    }
                },

                //affichage de l'evenement au clic
                eventClick:  function(event, jsEvent, view) {
                    console.log('event',event);
                    $('#modalTitle').html(event.title+" ("+getFormattedDateInHoursMinutes(event.start)+"-"+getFormattedDateInHoursMinutes(event.end)+")");
                    $('.popup-calendar-coach').html("Coach : "+event.prenom_coach);
                    $('.popup-calendar-description').html(event.description);
                    $('.popup-calendar-nb_inscrits').html(event.nb_inscrits+" / "+event.nb_max);
                    $('#eventUrl').attr('href',event.url);
                    $('#calendarModal').modal();
                }

            });
        });

        //retourne la date au format hh/mm
        function getFormattedDateInHoursMinutes(date) {
            var newdate = new Date(date);
            if(newdate.getMinutes() == "0") {
                var minutes = "00";
            }
            else {
                var minutes = newdate.getMinutes();
            }
            return newdate.getHours()+":"+minutes;
        }
    </script>
</html>