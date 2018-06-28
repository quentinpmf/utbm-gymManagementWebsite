<?php
include "../login/connectToBDD/conn.php";
include '../../includes/config.php';
?>

<header id="header" id="home">
    <?php session_start(); ?>
    <?php include '../../includes/banner.php'; ?>
    <?php include '../../includes/menu_distant.php'; ?>
</header>

<?php
$id = $_GET['id'];

$req = $bdd->query("SELECT date_creation
                                     ,titre
                                     ,image
                                     ,description
                                     ,id
                               FROM actualites
                               WHERE id = $id");

if($data = $req->fetch())
{
    $date = $data['date_creation'];
    $titre = $data['titre'];
    $image = $data['image'];
    $texte = $data['description'];
}
?>

<body>
    <section class="section-gap-other-pages">
        <div class="title text-center">

            <h1 style="margin-top: 70px" class="mb-10">Actualité n°<?php echo($id) ?></h1>

            <table class="tableAfficherActualites" style="border: 1px solid black; font-family: Gotham XNarrow SSm A,Sans-Serif;" width="60%" align="center">
                <tr class="trBordure">
                    <td><input type="button" value="Retour" onclick="history.go(-1)" style="background-color:#8F8282;color:#FFFFFF;padding:6px 0 6px 0;font:Bold 13px Arial;width:90px;border-radius:2px;border:none"></td>
                </tr>
                <tr>
                    <td><h1 style="text-align: center; margin-top: 10px; margin-bottom: 10px"><?php echo utf8_encode($titre); ?></h1></td>
                </tr>
                <tr>
                    <td align="center"><img src = "../../img/actualites/<?php echo $image ?>" /></td>
                </tr>
                <tr>
                    <td><p style="margin-top: 20px;"><?php echo utf8_encode($texte); ?></p></td>
                </tr>
                <tr class="trBordure">
                    <td align="right"><h6><?php echo $date ?></h6></td>
                </tr>
            </table>

        </div>
    </section>
</body>


