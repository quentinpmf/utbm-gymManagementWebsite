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
    <?php date_default_timezone_set('Europe/Paris');  ?>
</header>

<body>
<section class="section-gap-other-pages">
    <div class="title text-center">

        <h1 style="margin-top: 70px" class="mb-10">Autorisations parentales en attente de validation</h1>

        <form method="post" action="traitement/autorisation_accepter.php">
            <table class="tableauFactures" style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" align="center">
                <tr>
                    <th>Adhérent</th>
                    <th>Autorisation parentale</th>
                </tr>

                <?php
                //récuperer infos table abonnements_utilisateurs
                $allUtilisateurs=$bdd->prepare("SELECT uti.id,uti.nom,uti.prenom,aut.nom_fichier FROM utilisateurs uti INNER JOIN autorisation_parentale aut ON aut.id = uti.autorisation_parentale WHERE uti.id!=:UserId AND autorisation_parentale IS NOT NULL AND aut.valide = 0 ORDER BY uti.nom ASC");
                $allUtilisateurs->execute(array(
                    'UserId'=>$_SESSION['UserId']
                ));
                while($data=$allUtilisateurs->fetch())
                {
                    ?>
                    <tr>
                        <td align="left"><?php echo($data['nom'] . " " . $data['prenom']) ?></td>
                        <td align="left"><a target="_blank" href="'../../../../img/autorisation_parentale/<?php echo($data['nom_fichier']) ?>">Consulter</a></td>
                        <td align="right"><a href="traitement/autorisation_accepter.php?userid=<?php echo $data['id'] ?>"><img src="../../img/checkbox_green.png"></a></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </form>

        <h1 style="margin-top: 70px" class="mb-10">Autorisations parentales validées</h1>

        <table class="tableauFactures" style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" align="center">
            <tr>
                <th>Adhérent</th>
                <th>Autorisation parentale</th>
            </tr>

            <?php
            //récuperer infos table abonnements_utilisateurs
            $allUtilisateurs=$bdd->prepare("SELECT uti.id,uti.nom,uti.prenom,aut.nom_fichier,aut.valide FROM utilisateurs uti INNER JOIN autorisation_parentale aut ON aut.id = uti.autorisation_parentale WHERE uti.id!=:UserId AND uti.autorisation_parentale IS NOT NULL AND aut.valide = 1 ORDER BY uti.nom ASC");
            $allUtilisateurs->execute(array(
                'UserId'=>$_SESSION['UserId']
            ));
            while($data=$allUtilisateurs->fetch()){
                ?>
                <tr>
                    <td align="left"><?php echo($data['nom']." ".$data['prenom'])?></td>
                    <td align="left"><a target="_blank" href="'../../../../img/autorisation_parentale/<?php echo($data['nom_fichier'])?>">Fichier</a></td>
                </tr>
                <?php
            }
            ?>

        </table>

    </div>
</section>
</body>

</html>