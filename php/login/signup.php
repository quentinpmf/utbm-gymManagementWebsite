<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include '../../includes/config.php';
include "connectToBDD/conn.php";
?>

<header id="header">
    <?php include '../../includes/banner.php'; ?>

    <script type="text/javascript">

        //initialisation de la page
        window.onload = function()
        {
            selectedIndex = document.getElementById('inscription_reglement').selectedIndex;
            console.log('selectedIndex : ',selectedIndex);
            switch(selectedIndex)
            {
                case 0:
                    cacherPaypal();
                break;
                case 1:
                    afficherPaypalAneee();
                break;
                case 2:
                    afficherPaypalMois();
                break;
                default :
                    cacherPaypal();
            }
        }

        function afficherPaypalAneee()
        {
            console.log('afficherPaypalAneee');
            document.getElementById('paiement_Paypal_mois').style.visibility = "hidden";
            document.getElementById('paiement_Paypal_annee').style.visibility = "visible";
        }

        function afficherPaypalMois()
        {
            console.log('afficherPaypalMois');
            document.getElementById('paiement_Paypal_annee').style.visibility = "hidden";
            document.getElementById('paiement_Paypal_mois').style.visibility = "visible";
        }

        function cacherPaypal()
        {
            console.log('cacherPaypal');
            document.getElementById('paiement_Paypal_annee').style.visibility = "hidden";
            document.getElementById('paiement_Paypal_mois').style.visibility = "hidden";
        }
    </script>
</header>
<br>

<body>
    <section class="section-gap">
        <div class="title text-center">

            <h1 class="mb-10"><u>Inscription</u></h1>

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

                <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" cellspacing="0" cellpadding="2" border="0" width="400" align="center">
                    <tr>
                        <td align="left">Nom : </td>
                        <td><input type="text" name="inscription_nom" required></br></td>
                    </tr>
                    <tr>
                        <td align="left">Prenom : </td>
                        <td><input type="text" name="inscription_prenom" required></br></td>
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
                    <tr>
                        <td align="left">Email : </td>
                        <td><input type="email" name="inscription email" required></br></td>
                    </tr>

                    <tr><td colspan="2">&nbsp;</td></tr>

                    <tr>
                        <td align="left">Mode de réglement : </td>
                        <td>
                            <select required id="inscription_reglement" name="inscription_reglement" onchange="if(this.value && this.selectedIndex == '1') {afficherPaypalAneee();} else if(this.value && this.selectedIndex == '2'){ afficherPaypalMois(); } else {cacherPaypal(); }">
                                <option selected="selected" name="0">Espèces</option>
                                <option name="1">CB /an</option>
                                <option name="2">CB /mois</option>
                            </select>
                        </td>
                    </tr>
.
                    <tr>
                        <td colspan="2" align="right">
                            <input type="submit" value="S'inscrire"/>
                        </td>
                    </tr>
                </table>
            </form>

            <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" cellspacing="0" cellpadding="2" border="0" width="400" align="center">
                <tr>
                    <td align="left">Nom : </td>
                    <td><input type="text" name="inscription_nom" required></br></td>
                </tr>

            <div id="paiement_Paypal_annee">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="UF3738MVTDDU6">
                    <tr>
                        <td align="left"><input type="hidden" name="on0" value="Abonnement choisi">Abonnement choisi</td>
                        <td>
                            <select name="os0">
                                <option value="Etudiant">Etudiant €200,00 EUR</option>
                                <option value="Normal">Normal €320,00 EUR</option>
                                <option value="Elite">Elite €450,00 EUR</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align>
                            <input type="hidden" name="currency_code" value="EUR">
                            <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_paynowCC_LG.gif" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
                            <img src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif">
                        </td>
                    </tr>
                </form>
            </div>

            <div id="paiement_Paypal_mois">
            </div>

        </div>
    </section>
</body>

</html>
