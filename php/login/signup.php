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
    <?php include '../../includes/menu_distant.php'; ?>
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
                    case 'caractere_cp':
                        echo 'Le code postal doit etre composé de 5 chiffres';
                    break;
                    case 'caractere_telephone':
                        echo 'Le téléphone doit etre composé de 10 chiffres';
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
        }elseif(isset($_GET['inscription']) && $_GET['inscription'] == 'nok'){
            ?>
            <div class="alert alert-danger" role="alert">
                Veuillez vérifier tous les champs.
            </div>
            <?php
        }?>

        <form id="formulaireSignup" method="post" action="connectToBDD/adduser.php" enctype="multipart/form-data">

            <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" cellspacing="0" cellpadding="2" border="0" width="550" align="center">
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
                <tr id="trAutorisationParentale" style="visibility:hidden">
                    <td align="left">Autorisation parentale (image)</td>
                    <td><input type="file" name="autorisation_parentale" id="input_autorisation_parentale"></br></td>
                </tr>

                <tr>
                    <td align="left">Adresse : </td>
                    <td><input type="text" name="inscription_adresse" required></br></td>
                </tr>
                <tr>
                    <td align="left">CP : </td>
                    <td><input type="text" name="inscription_cp" minlength="5" maxlength="5" required></br></td>
                </tr>

                <tr>
                    <td align="left">Ville : </td>
                    <td><input type="text" name="inscription_ville" required></br></td>
                </tr>
                <tr>
                    <td align="left">Telephone : </td>
                    <td><input type="text" name="inscription_tel" minlength="10" maxlength="10" required></br></td>
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

<footer>
    <script>
        //vérification date de naissance
        var input_date_naissance = document.getElementById("formulaireSignup").elements["inscription_date_naissance"];
        input_date_naissance.onfocusout = function() {
            var d1 = new Date(this.value);
            var d2 = new Date();

            var annees = d2.getFullYear() - d1.getFullYear();
            if (d2.getMonth()+1 <= d1.getMonth()+1)
            {
                if (d1.getMonth()+1 == d2.getMonth()+1) {
                    if (d1.getDate() > d2.getDate())
                        annees = annees-1;
                }
                else {
                    annees = annees-1;
                }
            }

            if(annees < 18)
            {
                if(annees >= 16)
                {
                    input_date_naissance.style.backgroundColor = "orange";
                    document.getElementById("trAutorisationParentale").style.visibility = "visible";
                    document.getElementById("input_autorisation_parentale").required = true;
                }
                else
                {
                    input_date_naissance.style.backgroundColor = "red";
                    document.getElementById("trAutorisationParentale").style.visibility = "hidden";
                    document.getElementById("input_autorisation_parentale").required = false;
                }
            }
            else
            {
                input_date_naissance.style.backgroundColor = "white";
                document.getElementById("trAutorisationParentale").style.visibility = "hidden";
                document.getElementById("input_autorisation_parentale").required = false;
            }
        }
    </script>
</footer>

</html>