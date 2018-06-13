<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include '../../includes/config.php';
include "connectToBDD/conn.php";
?>

<header id="header">
    <?php include '../../includes/banner.php'; ?>
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
                        <td align="left">Type d'abonnement : </td>
                        <td><select required name="inscription_type_abonnement">
                                <option selected></option>
                                <?php
                                    $abonnements = $bdd->query("SELECT * FROM abonnements");
                                    while($donnees_abonnements=$abonnements->fetch(PDO::FETCH_OBJ))
                                    {
                                        $abo_id=$donnees_abonnements->id;
                                        $abo_texte=$donnees_abonnements->texte;
                                        $abo_tarif=$donnees_abonnements->tarif;
                                        echo '<option value="' . $abo_id . '">' . $abo_texte . ' ' . $abo_tarif . '€' . '</option>';
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
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
