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
</header>

<body>
<section class="section-gap">
    <div class="title text-center">

        <h1 style="margin-top: 70px" class="mb-10"><u>Facturation</u></h1>

        <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" align="center">

        <?php
        //récuperer infos table abonnements_utilisateurs
        $allUtilisateurs=$bdd->prepare("SELECT * FROM utilisateurs WHERE id!=:UserId");
        $allUtilisateurs->execute(array(
            'UserId'=>$_SESSION['UserId']
        ));
        while($data=$allUtilisateurs->fetch()){
            ?>
                <tr>
                    <td align="left"><?php echo($data['nom']." ".$data['prenom'])?></td>
                    <td><a href="generer_pdf.php">Générer une facture</a></td>
                </tr>
            <?php
        }
        ?>

    </div>
</section>
</body>

</html>