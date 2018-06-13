<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include '../../includes/config.php';
?>

<header id="header">
    <?php include '../../includes/banner.php'; ?>
    <?php include '../../includes/menu_adherent.php'; ?>
</header>

<body>
<section class="section-gap">
    <div class="title text-center">

        <h1 style="margin-top: 70px" class="mb-10"><u>Mes informations</u></h1>

        <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" align="center">
            <tr>
                <td align="left" width="40%">Nom :</td>
                <td><?php echo($_SESSION['UserNom']) ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Prenom :</td>
                <td><?php echo($_SESSION['UserPrenom']) ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Adresse :</td>
                <td><?php echo($_SESSION['UserAdress']) ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Code postal :</td>
                <td><?php echo($_SESSION['UserCP']) ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Ville :</td>
                <td><?php echo($_SESSION['UserVille']) ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Téléphone :</td>
                <td><?php echo($_SESSION['UserTel']) ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Numéro d'adhérent :</td>
                <td><?php echo($_SESSION['UserNumAdherent']) ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Abonnement choisi :</td>
                <td><?php echo($_SESSION['UserIdAbonnementTexte'] . ' (' . $_SESSION['UserIdAbonnementTarif'] . '€)') ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Date d'adhésion :</td>
                <td><?php echo($_SESSION['UserDateAdhesion']) ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Rôle utilisateur :</td>
                <td><?php echo($_SESSION['UserRole']) ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Bloqué :</td>
                <td><?php echo($_SESSION['UserBloque']) ?></td>
            </tr>

            <tr>
                <td align="left" width="40%">Email :</td>
                <td><?php echo($_SESSION['UserEmail']) ?></td>
            </tr>
            <tr>
                <td align="left" width="40%">Password :</td>
                <td><a href="change_password.php">Changer mon mot de passe</a></td>
            </tr>
        </table>

    </div>
</section>
</body>

</html>