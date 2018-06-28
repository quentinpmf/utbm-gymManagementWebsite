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
                ?>

                <?php
                    if($_SESSION)
                    {
                        if($_SESSION['UserPaiementChoisi'] !== null)
                        {
                            if(isset($_GET['paiement']))
                            {
                                if($_GET['paiement'] == "ok")
                                {
                                    //correspondance en 1/2/3 avec BDD
                                    $paiement_choisi = $bdd->query("SELECT id FROM abonnements WHERE texte = ".$_SESSION['UserPaiementChoisi']);
                                    while($donnees_paiement_choisi=$paiement_choisi->fetch(PDO::FETCH_OBJ))
                                    {
                                        //surcharge de la valeur UserPaiementChoisi dans la session avec l'id 1/2/3
                                        $_SESSION['UserIdAbonnement'] = $donnees_paiement_choisi->id;
                                    }
                                    $_SESSION['UserDateAdhesion'] = date('Y-m-d');

                                    $req=$bdd->prepare("INSERT INTO abonnements_utilisateurs(id_abonnement,id_utilisateur,date_abonnement) VALUES (:id_abonnement,:id_utilisateur,:date_abonnement)");
                                    $req->execute(array(
                                        'id_abonnement'=>$_SESSION['UserIdAbonnement'],
                                        'id_utilisateur'=>$_SESSION['UserId'],
                                        'date_abonnement'=>$_SESSION['UserDateAdhesion']
                                    ));

                                    $req2=$bdd->prepare("SELECT id_abonne FROM abonnements_utilisateurs WHERE id_utilisateur=:UserId");
                                    $req2->execute(array(
                                        'UserId'=>$_SESSION['UserId'],
                                    ));

                                    if($req2->rowCount()==0)
                                    {
                                        header("Location: ../login.php?error=InsertUserAbonnement"); /*Erreur de connexion*/
                                        return false;
                                    }
                                    else
                                    {
                                        while($data=$req2->fetch())
                                        {
                                            $_SESSION['UserNumAdherent'] = $data['id_abonne'];
                                        }

                                        $req=$bdd->prepare("UPDATE utilisateurs SET num_adherent = :UserNumAdherent, paiement_choisi = :UserPaiementChoisi WHERE id = :UserId");
                                        $req->execute(array(
                                            'UserNumAdherent'=>$_SESSION['UserNumAdherent'],
                                            'UserPaiementChoisi'=>$_SESSION['UserPaiementChoisi'],
                                            'UserId'=>$_SESSION['UserId']
                                        ));

                                        //TODO QUENTIN : maj avec les set() et get() + verif si paiement OK (bug de temps en temps)
                                    }
                                }
                                else
                                {
                                    echo('<div class="alert alert-danger" role="alert">Le paiement en ligne a échoué</div>');
                                    $_SESSION['UserPaiementChoisi'] = null;
                                    echo('<a href="abonnement.php"><input type="submit" value="Retour"></a>');
                                }
                            }
                        }
                        else
                        {
                            if($_POST)
                            {
                                if(isset($_POST['libelle_os0']) && isset($_POST['libelle_on0']) && $_POST['libelle_os0'] == 'Etudiant' || $_POST['libelle_os0'] == 'Normal' || $_POST['libelle_os0'] == 'Elite')
                                {
                                    //alors on lance le paiement Paypal
                                    $_SESSION['UserPaiementChoisi'] = $_POST['libelle_os0'];

                                    echo('<form id="formPaiementBlank" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">');
                                    echo('<input type="hidden" name="cmd" value="_s-xclick">');
                                    echo('<input type="hidden" name="hosted_button_id" value="TEMPADSGLWS5A">');
                                    echo('<input type="hidden" name="on0" value="'.$_POST['libelle_on0'].'">');
                                    echo('<input type="hidden" name="currency_code" value="EUR">');
                                    echo('<input type="hidden" id="selectPaiement" name="os0" value="'.$_POST['libelle_os0'].'">');
                                    echo('<input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">');
                                    echo('<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">');
                                    echo('</form>');
                                }
                            }
                            else
                            {
                                ?>
                                <form id="formPaiement" action="" method="post">
                                    <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" cellspacing="0" cellpadding="2" border="0" width="430" align="center">
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
                                <?php
                            }
                        }
                    }
                ?>

            </div>
        </section>
    </body>

</html>



