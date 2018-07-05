<!DOCTYPE html>
<html lang="fr" class="no-js">

<?php
//config
include "../login/connectToBDD/conn.php";
include '../../includes/checkIfRole/checkIfAdmin.php';
include '../../includes/config.php';
?>

<header id="header">
    <?php include '../../includes/banner.php'; ?>
    <?php include '../../includes/menu_distant.php'; ?>
    <?php include '../../includes/calendar/calendar_admin.php';?>
</header>

<body>
<section class="section-gap-other-pages">
    <div class="title text-center">

        <h1 style="margin-top: 70px" class="mb-10">Planning</h1>

        <!-- Start schedule Area -->
        <section class="schedule-area section-gap border-black" id="planning">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="text-black mb-10">Calendrier de la semaine</h1>
                    </div>
                </div>
            </div>
            <div id="calendar" style="padding-left:300px;padding-right:300px;"></div>
        </section>

        <!-- popup au clic sur l'evenement -->
        <div id="calendarModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 id="modalTitle" class="modal-title"></h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                    </div>
                    <div id="modalBody" class="modal-body">
                        <table style="text-align:left">
                            <tr>
                                <td colspan="2"><div class="popup-calendar-coach"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><hr></td>
                            </tr>
                            <tr>
                                <td colspan="2"><div class="popup-calendar-description"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><hr></td>
                            </tr>
                            <tr>
                                <td width="10%"><div class="popup-calendar-img_nb_inscrits"><img src="../../img/nb_inscrits.png"></div></td>
                                <td><div class="popup-calendar-nb_inscrits"></div></td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button style="background-color: darkorange" type="button" class="btn btn-default">Modifier</button>
                        <button type="button" style="background-color: red; color:white" class="btn btn-default btn_calendar_supprimer">Supprimer</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End schedule Area -->

    </div>
</section>
</body>

<script>
    $('.btn_calendar_supprimer').click(function() {
        console.log($('#calendar').fullCalendar('clientEvents'));
        alert('ici');
        if (confirm("Êtes-vous sûr de vouloir le supprimer ?")) {
            var id = event.id;
            console.log('event',event);
            $.ajax({
                url: "../../includes/calendar/delete.php",
                type: "POST",
                data: {id: id},
                success: function () {
                    alert('success');
                }
            })
        }
    });
</script>

</html>