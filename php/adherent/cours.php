<!DOCTYPE html>
<html lang="fr" class="no-js">

<?php
//config
include "../login/connectToBDD/conn.php";
include '../../includes/checkIfRole/checkIfAdherent.php';
include '../../includes/config.php';
?>

<header id="header">
    <?php include '../../includes/banner.php'; ?>
    <?php include '../../includes/menu_distant.php'; ?>
</header>

<body>
<section class="section-gap-other-pages">
    <div class="title text-center">

        <h1 style="margin-top: 70px" class="mb-10">Liste des cours auquels je suis inscrit</h1>

        <table class="tableauFactures" style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" align="center">
            <tr>
                <th>Cours</th>
                <th>Jour</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Coach</th>
            </tr>
            <tr>
                <td>Zumba</td>
                <td>06/07/2018</td>
                <td>18h00</td>
                <td>20h00</td>
                <td>Gaël</td>
                <td><button style="background-color:red;color:white">Annuler</button></td>
            </tr>
            <tr>
                <td>Cardio</td>
                <td>07/07/2018</td>
                <td>09h00</td>
                <td>10h00</td>
                <td>Baptiste</td>
                <td><button style="background-color:red;color:white">Annuler</button></td>
            </tr>
        </table>

    </div>
</section>
</body>

</html>