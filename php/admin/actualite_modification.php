<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../login/connectToBDD/conn.php";
include '../../includes/config.php';

$id = $_GET['id'];
$req = $bdd->query("SELECT * FROM actualites WHERE id = $id");
$data = $req->fetch();
?>
<body>
    <section class="section-gap-other-pages">
        <div class="title text-center">

            <h1 style="margin-top: 70px" class="mb-10"><u>Modification Actualité</u></h1>

            <form enctype="multipart/form-data" method="post" action="traitement/actualite_modif_update.php?id=<?php echo $id ?>">
                <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" cellspacing="0" cellpadding="2" border="0" width="400" align="center">
                    <tr>
                        <td colspan="2"><input type="text" name="titre" placeholder="Titre de l'actualité" size="50" maxlength="55" value="<?php echo utf8_encode($data['titre']) ?>" required></td>
                    </tr>
                    <tr>
                        <td colspan="2"><textarea rows="10" cols="100" name="description" required><?php echo utf8_encode($data['description']) ?></textarea></td>
                    </tr>
                    <tr>
                        <td><img src="../../img/actualites/<?php echo $data['image'] ?>" height="80" width="120" align="left"></td>
                    </tr>
                    <tr>
                        <td align="left"><input type="file" name="image" value="<?php echo $data['image'] ?>"></td>
                    </tr>
                    <tr>
                        <td align="left"><input type="checkbox" name="publier" <?php if($data['publie']) echo 'checked' ?>> Publier maintenant</td>
                        <td align="right"><input type="submit" name="btn_publier" value="Enregistrer"></td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
</body>
