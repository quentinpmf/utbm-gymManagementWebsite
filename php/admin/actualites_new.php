<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../login/connectToBDD/conn.php";
include '../../includes/config.php';
?>

<header id="header">
    <?php include '../../includes/banner.php'; ?>
    <?php include '../../includes/menu_admin.php'; ?>
    <?php include '../../includes/checkIfRole/checkIfAdmin.php'; //Vérification des droits d'accès à la page ?>
</header>

<body>
<section class="section-gap">
    <div class="title text-center">

        <h1 style="margin-top: 70px" class="mb-10"><u>Nouvelle Actualité</u></h1>

        <form enctype="multipart/form-data" method="post" action="actualite_add.php">
            <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" cellspacing="0" cellpadding="2" border="0" width="400" align="center">
                <tr>
                    <td colspan="2"><input type="text" name="titre" placeholder="Titre de l'actualité" size="50" maxlength="55" required autofocus></td>
                </tr>
                <tr>
                    <td colspan="2"><textarea rows="10" cols="100" name="description" placeholder="Votre texte ici..." required></textarea></td>
                </tr>
                <tr>
                    <td align="left"><input type="file" name="image"></td>
                </tr>
                <tr>
                    <td align="left"><input type="checkbox" name="publier" checked> Publier maintenant</td>
                    <td align="right"><input type="submit" name="btn_publier" value="Enregistrer"></td>
                </tr>
            </table>
        </form>
    </div>
</section>
</body>

</html>