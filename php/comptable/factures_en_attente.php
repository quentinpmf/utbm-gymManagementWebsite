<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../login/connectToBDD/conn.php";
include '../../includes/checkIfRole/checkIfComptable.php';
include '../../includes/config.php';
?>

<header id="header">
    <?php include '../../includes/banner.php'; ?>
    <?php include '../../includes/menu_distant.php'; ?>
</header>

<body>
<section class="section-gap-other-pages">
    <div class="title text-center">

        <h1 style="margin-top: 70px" class="mb-10">Factures à valider</h1>

        <form method="post">
            <table class="tableauFactures" style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" align="center">
                <tr>
                    <th>Adhérent</th>
                    <th>Liste des factures disponibles</th>
                </tr>

                <?php
                //récuperer infos table abonnements_utilisateurs
                $allUtilisateurs=$bdd->prepare("SELECT nom,prenom,id FROM utilisateurs WHERE id!=:UserId ORDER BY utilisateurs.nom ASC");
                $allUtilisateurs->execute(array(
                    'UserId'=>$_SESSION['UserId']
                ));
                while($data=$allUtilisateurs->fetch()){
                    ?>
                        <tr>
                            <td align="left"><?php echo($data['nom']." ".$data['prenom'])?></td>
                            <td align="left">
                                <select name="select_factures_en_attente" id="select_factures_en_attente">
                                    <option value="" selected></option>
                                    <?php
                                        $id_user = $data['id'];
                                        $factures = $bdd->query("SELECT id,chemin,date_creation,date_validation FROM factures WHERE id_user='$id_user' AND statut=0");
                                        while ($donnees_factures = $factures->fetch())
                                        {
                                            $id = htmlspecialchars($donnees_factures['id']);
                                            $chemin = htmlspecialchars($donnees_factures['chemin']);
                                            $date_creation = htmlspecialchars($donnees_factures['date_creation']);
                                            $date_validation = htmlspecialchars($donnees_factures['date_validation']);
                                            echo("<option value='$chemin'>"."Facture du ".$date_creation."</option>");

                                        }
                                    ?>

                                </select>
                            </td>
                            <td align="right"><img onclick="window.location.href='/projetTA70/docs_client/FACT/'+$('#select_factures_en_attente :selected').text();;" src="../../img/loupe.jpg"></a></td>
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