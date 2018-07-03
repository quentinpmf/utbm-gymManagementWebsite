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
    <?php include '../../includes/calendar/calendar.php';?>
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
                        <div class="popup-calendar-nb_inscrit"></div>
                        Liste des utilisateurs participants (coach - webmaster)
                        Nb place autorisées (coach - webmaster)
                        nb place restantes (all)
                        <button type="button" class="btn btn-default" data-dismiss="modal">S'inscrire/se désinscrire</button>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Modifier</button>
                        <button onclick="deleteEvent(this)" type="button" class="btn btn-default" data-dismiss="modal">Supprimer</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End schedule Area -->

    </div>
</section>
</body>

</html>