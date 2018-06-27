<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include '../../includes/config.php';
include "connectToBDD/conn.php";
?>

<header id="header">
    <?php session_start(); ?>
    <?php include '../../includes/banner.php'; ?>
    <?php include '../../includes/menu.php'; ?>
</header>
<br>

<body>
<section class="section-gap-other-pages">
    <div class="title text-center">

        <h1 style="margin-top: 70px" class="mb-10">Inscription</h1>

        <?php if(isset($_GET['error'])){ ?>
            <div class="alert alert-danger" role="alert">
                <?php
                switch($_GET['error'])
                {
                    case 'champs_manquant':
                        echo 'Veuillez remplir tous les champs';
                        break;
                    case 'tel':
                        echo 'Numéro de téléphone incorrect';
                        break;
                    case 'caractere_mdp':
                        echo 'Le mot de passe doit faire au moins 4 caractères';
                        break;
                    case 'verification_mdp':
                        echo 'Les deux mots de passe doivent etre identiques';
                        break;
                    case 'email_deja_present':
                        echo 'Cet email est déja enregistré';
                        break;
                    case 'date_naissance':
                        echo 'Vous devez avoir plus de 18 ans pour vous inscrire';
                        break;
                }
                ?>
            </div>
        <?php }elseif(isset($_GET['inscription']) && $_GET['inscription'] == 'ok'){
            ?>
            <div class="alert alert-success" role="alert">
                Inscription effectuée.
            </div>
            <?php
        }?>

        <form method="post" action="connectToBDD/adduser.php">

            <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" cellspacing="0" cellpadding="2" border="0" width="450" align="center">
                <tr>
                    <td align="left">Nom : </td>
                    <td><input type="text" name="inscription_nom" required></br></td>
                </tr>
                <tr>
                    <td align="left">Prenom : </td>
                    <td><input type="text" name="inscription_prenom" required></br></td>
                </tr>
                <tr>
                    <td align="left">Date de naissance : </td>
                    <td><input type="date" name="inscription_date_naissance" required></br></td>
                </tr>

                <tr>
                    <td align="left">Adresse : </td>
                    <td><input type="text" name="inscription_adresse" required></br></td>
                </tr>
                <tr>
                    <td align="left">CP : </td>
                    <td><input type="text" name="inscription_cp" required></br></td>
                </tr>

                <tr>
                    <td align="left">Ville : </td>
                    <td><input type="text" name="inscription_ville" required></br></td>
                </tr>
                <tr>
                    <td align="left">Telephone : </td>
                    <td><input type="text" name="inscription_tel" required></br></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td align="left">Email : </td>
                    <td><input type="email" name="inscription_email" required></br></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td align="left">Mot de passe : </td>
                    <td><input type="password" name="inscription_mdp" required></br></td>
                </tr>
                <tr>
                    <td align="left">Confirmation mot de passe : </td>
                    <td><input type="password" name="inscription_mdp2" required></br></td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
                <tr>
                    <td colspan="2" align="right">
                        <input type="submit" value="S'inscrire"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</section>
</body>

</html>