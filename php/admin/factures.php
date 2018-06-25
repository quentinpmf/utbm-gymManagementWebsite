<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../login/connectToBDD/conn.php";
include '../../includes/config.php';
?>

<header id="header">
    <?php include '../../includes/banner.php'; ?>
    <?php include '../../includes/menu_distant.php'; ?>
</header>

<body>
<section class="section-gap-other-pages">
    <div class="title text-center">

        <h1 style="margin-top: 70px" class="mb-10">Facturation</h1>

        <form method="post" action="generer_pdf.php">
            <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" align="center">

                <?php
                //récuperer infos table abonnements_utilisateurs
                $allUtilisateurs=$bdd->prepare("SELECT * FROM utilisateurs WHERE id!=:UserId ORDER BY utilisateurs.nom ASC");
                $allUtilisateurs->execute(array(
                    'UserId'=>$_SESSION['UserId']
                ));
                while($data=$allUtilisateurs->fetch()){
                    ?>
                        <tr>
                            <td align="left"><?php echo($data['nom']." ".$data['prenom'])?></td>
                            <td align="left">
                                <select name="select_factures" onchange="if(this.value) window.location.href='/projetTA70/docs_client/FACT/'+this.value+''">
                                    <option value="" selected></option>
                                    <?php
                                        $id_user = $data['id'];
                                        $factures = $bdd->query("SELECT * FROM factures WHERE id_user='$id_user'");
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
                            <td align="right"><a href="generer_pdf.php?userid=<?php echo $data['id'] ?>"><img src="../../img/plus_green.png"></a></td>
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