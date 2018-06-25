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

        <h1 style="margin-top: 70px" class="mb-10">Actualités</h1>

        <?php if(isset($_GET['creation']) && $_GET['creation'] == "ok"){ ?>
            <div class="alert alert-success" role="alert">
                L'actualité a été créée :)
            </div>
        <?php } ?>

        <table cellspacing="0" cellpadding="2" border="0" width="60%" align="center">
            <tr>
                <td align="left">
                    <a href="actualites_new.php">
                        <input type="submit" name="btn_actualite_add" value="Nouvelle actualité" align="right" style="background-color:#046380;color:#FFFFFF;padding:10px 0 10px 0;font:Bold 13px Arial;width:150px;border-radius:2px;border:none">
                    </a>
                </td>
            </tr>
        </table>
        <br>

        <?php
            $req = $bdd->query("SELECT act.date_creation as date_creation
                                                 ,act.id as id
                                                 ,uti.nom as nom_auteur
                                                 ,uti.prenom as prenom_auteur
                                                 ,act.titre as titre
                                                 ,act.image as image
                                                 ,act.description as description
                                                 ,act.publie as publie
                                          FROM actualites act INNER JOIN utilisateurs uti ON act.id_auteur = uti.id 
                                          ORDER BY date_creation desc");
            echo '<table style="border: 1px solid black; font-family: Gotham XNarrow SSm A,Sans-Serif;" width="60%" align="center">';
            while($data = $req->fetch()){
                echo "<tr style='border-top: 1px solid black;'>";
                    echo '<td rowspan="3" width="20%"><img src="../../img/actualites/'.$data['image'].'" width="100%" align="left"></td>';
                    echo "<td><h3>".utf8_encode($data['titre'])."</h3></td>";
                    echo "<td rowspan='3'>";
                        if($data['publie'] == 1)
                        {
                            echo '<a href="actualite_publie_modif.php?action=depublier&id='.$data["id"].'">';
                            echo '<input type="submit" name="btn_depublier" value="Dépublier" style="background-color:#8F8282;color:#FFFFFF;padding:6px 0 6px 0;font:Bold 13px Arial;width:90px;border-radius:2px;border:none">';
                            echo '</a>';
                        }
                        else
                        {
                            echo '<a href="actualite_publie_modif.php?action=publier&id='.$data["id"].'">';
                            echo '<input type="submit" name="btn_publier" value="Publier" style="background-color:#069B37;color:#FFFFFF;padding:6px 0 6px 0;font:Bold 13px Arial;width:90px;border-radius:2px;border:none">';
                            echo '</a>';
                        }
                    echo "</td>";
                    echo "<td rowspan='3' style='padding: 15px'>";
                        echo '<a href="actualite_modification.php?id='.$data["id"].'">';
                            echo '<img src="../../img/pencil-512.png">';
                        echo '</a>';
                    echo "</td>";
                    echo "<td rowspan='3'>";
                        echo '<a href="actualite_suppression.php?id='.$data["id"].'">';
                            echo '<img src="../../img/trash-circle-red-512.png">';
                        echo '</a>';
                    echo "</td>";
                echo "</tr>";
                echo "<tr style='font-size: 75%;'>";
                    echo "<td>".$data['nom_auteur']." ".$data['prenom_auteur']." - ".$data['date_creation']."</td>";
                echo "</tr>";
                echo "<tr>";
                    echo "<td>".utf8_encode(substr($data['description'], 0, 300))."...</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    </div>
</section>
</body>

</html>