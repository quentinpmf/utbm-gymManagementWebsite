<!DOCTYPE html>
<html lang="zxx" class="no-js">
    <?php
        include "../login/connectToBDD/conn.php";
        include '../../includes/checkIfRole/checkIfAdherent.php';
        include '../../includes/config.php';
    ?>

    <header id="header" id="home">
        <?php include '../../includes/banner.php'; ?>
        <?php include '../../includes/menu_distant.php'; ?>
    </header>

    <body>
        <section class="section-gap-other-pages">
            <div class="title text-center">

                <?php
                    echo('<h1 style="margin-top: 70px" class="mb-10">Mon abonnement</h1>');
                    echo('<hr>Vous ne possèdez par encore d\'abonnement à ce moment. Vous avez la possibilité de souscrire à un abonnement en ligne ci-dessous.');
                    echo('<br>');
                    echo('<br>');
                ?>

                <form id="formPaiement" action="" method="post">
                    <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" cellspacing="0" cellpadding="2" border="0" width="550" align="center">
                        <tr>
                            <td align="left">Abonnement choisi : </td>
                            <td>
                                <table>
                                    <tr>
                                        <td><input type="hidden" name="libelle_on0" value="Abonnement choisi"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select id="selectPaiement" name="libelle_os0">
                                                <?php
                                                $abonnements = $bdd->query("SELECT id,texte,tarif FROM abonnements");
                                                while($donnees_abonnements=$abonnements->fetch(PDO::FETCH_OBJ))
                                                {
                                                    $abo_id=$donnees_abonnements->id;
                                                    $abo_texte=$donnees_abonnements->texte;
                                                    $abo_tarif=$donnees_abonnements->tarif;
                                                    echo '<option value="' . $abo_texte . '">Abonnement ' . $abo_texte . ' ' . $abo_tarif . '€' . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Continuer vers le paiement Paypal">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
        </section>
    </body>

</html>



