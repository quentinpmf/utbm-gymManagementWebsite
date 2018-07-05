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

        <h1 style="margin-top: 70px" class="mb-10">Consultation de mes factures</h1>

        <form method="post" action="generer_pdf.php">
            <table class="tableauFactures" style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" align="center">
                <tr>
                    <th>Liste des factures disponibles</th>
                </tr>

                <?php
                //récuperer infos table abonnements_utilisateurs
                $allUtilisateurs=$bdd->prepare("SELECT nom,prenom,id FROM utilisateurs WHERE id=:UserId ORDER BY utilisateurs.nom ASC");
                $allUtilisateurs->execute(array(
                    'UserId'=>$_SESSION['UserId']
                ));
                while($data=$allUtilisateurs->fetch()){
                    ?>
                    <tr>
                        <td align="left">
                            <?php
                            $id_user = $data['id'];
                            $factures = $bdd->query("SELECT id,chemin,date_creation,date_validation FROM factures WHERE id_user='$id_user'");
                            while ($donnees_factures = $factures->fetch())
                            {
                                $id = htmlspecialchars($donnees_factures['id']);
                                $chemin = htmlspecialchars($donnees_factures['chemin']);
                                $date_creation = htmlspecialchars($donnees_factures['date_creation']);
                                $date_validation = htmlspecialchars($donnees_factures['date_validation']);
                                echo("Facture du ".$date_creation."");
                            }
                            ?>
                        </td>
                        <td align="right"><a href="generer_pdf.php?userid=<?php echo $data['id'] ?>"><img src="../../img/loupe.jpg"></a></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </form>

    </div>
</section>
</body>

</html>