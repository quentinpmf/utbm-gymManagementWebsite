<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../login/connectToBDD/conn.php";
include '../../includes/checkIfRole/checkIfAdmin.php';
include '../../includes/config.php';
?>

<header id="header">
    <?php include '../../includes/banner.php'; ?>
    <?php include '../../includes/menu_distant.php'; ?>
</header>

<body>
<section class="section-gap-other-pages">
    <div class="title text-center">

        <h1 style="margin-top: 70px" class="mb-10">Statistiques</h1>
        <iframe width="600" height="371" seamless frameborder="0" scrolling="no" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vSrD6xOXRTiTGaYGa6T7129MJREDQguqctvs4Y0_P46Eon4wbF0WgHIYzILjV73oeCE-POYm5vz6Q2-/pubchart?oid=288134771&amp;format=interactive"></iframe>

        <p>Pour plus d'informations, connectez-vous à <a href="https://analytics.google.com/analytics/web/?authuser=0#/report-home/a121435086w179358761p177698762">Google Analytics</a> à l'aide du compte suivant :</p>
        <p>Nom de compte : paiements.fitnessclub@gmail.com</p>
        <p>Mot de passe : paiementsFC</p>
    </div>
</section>
</body>

</html>