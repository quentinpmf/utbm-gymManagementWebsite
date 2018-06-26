<?php
require('../../includes/fpdf/fpdf.php');
require('../login/connectToBDD/conn.php');
include '../../includes/checkIfRole/checkIfAdmin.php';

date_default_timezone_set('Europe/Paris');

//je génére la facture
class PDF extends FPDF
{
    // Load data
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }

    // En-tête
    function Header()
    {
        require('../login/connectToBDD/conn.php');
        $id_utilisateur = $_GET['userid'];

        $abonnements_utilisateurs = $bdd->query("SELECT * FROM abonnements_utilisateurs WHERE id_utilisateur='$id_utilisateur'");
        while ($donnees_abonnements_utilisateurs = $abonnements_utilisateurs->fetch())
        {
            $id_abonnement = htmlspecialchars($donnees_abonnements_utilisateurs['id_abonnement']);
            $id_utilisateur = htmlspecialchars($donnees_abonnements_utilisateurs['id_utilisateur']);

            $user = $bdd->query("SELECT * FROM utilisateurs WHERE id='$id_utilisateur'");
            while ($donnees_user = $user->fetch())
            {
                $user_id = htmlspecialchars($donnees_user['id']);
                $user_nom = htmlspecialchars($donnees_user['nom']);
                $user_prenom = htmlspecialchars($donnees_user['prenom']);
                $user_adresse = htmlspecialchars($donnees_user['adresse']);
                $user_cp = htmlspecialchars($donnees_user['cp']);
                $user_ville = htmlspecialchars($donnees_user['ville']);
            }
        }

        $code_commande = 'FACT_'.$id_abonnement;
        $chemin = $code_commande.'_'.date("Y-m-d").'.pdf';
        $date_jour = date("Y-m-d");

        $factures = $bdd->query("SELECT COUNT(*) As 'nbFactureDuJour' FROM factures WHERE id_user='$user_id' AND date_creation='$date_jour'");
        while ($donnees_factures = $factures->fetch())
        {
            $nbFactureDuJour = htmlspecialchars($donnees_factures['nbFactureDuJour']);
        }

        if($nbFactureDuJour == 0)
        {
            $req=$bdd->prepare("INSERT INTO factures(id_user,statut,chemin,date_creation,date_validation) VALUES (:id_user,:statut,:chemin,:date_creation,:date_validation)");
            $req->execute(array(
                'id_user'=>$user_id,
                'statut'=>0,
                'chemin'=>$chemin,
                'date_creation'=>$date_jour,
                'date_validation'=>NULL
            ));
        }

        // Cell(largeur,  hauteur,  'texte',  bordure(0 ou 1),  ln(indique ou se place la valeur suivante 0:droite,1:new ligne,2:en dessous), alignement (L, C, R)              // Logo
        $this->Image('../../img/logo_fit.png',15,6,30);

        // Facture
        $this->SetFont('Arial','B',12);
        $this->Cell(80);
        $this->Cell(30,7,'FACTURE',0,0,'C');

        // N° facture
        $this->Cell(80,7,''.utf8_decode('N° : '.$code_commande.''),0,1,'R');

        // date
        $this->Cell(190,7,''.utf8_decode('du '.$date_jour),0,1,'R');

        // passe la ligne
        $this->ln(15);

        // entreprise
        $this->Cell(40,5,'Fitness Club',0,0,'C');

        // destinataire
        $this->Cell(50);
        $this->SetFont('Arial','IU',8);
        $this->Cell(100,5,'Destinataire','TLR',1,'L');

        // location
        $this->SetFont('Arial','',10);
        $this->Cell(40,5,'12 rue Thierry Mieg',0,0,'C');

        //nom destinataire
        $this->Cell(50);
        $this->Cell(100,5,$user_nom." ".$user_prenom,'LR',1,'C');

        // ville
        $this->Cell(40,5,'90000 BELFORT',0,0,'C');

        //adresse destinataire
        $this->Cell(50);
        $this->Cell(100,5,$user_adresse,'LR',1,'C');

        // tel
        $this->Cell(40,5,'Tel. 03.84.58.30.00',0,0,'C');

        //ville destinataire
        $this->Cell(50);
        $this->SetFont('Arial','B',10);
        $this->Cell(100,5,$user_cp." ".$user_ville,'LR',1,'C');

        // fax
        $this->SetFont('Arial','',10);
        $this->Cell(40,5,'Site. utbm.fr',0,0,'C');

        //espace
        $this->Cell(50);
        $this->Cell(100,5,'','BLR',1,'C');

        // passe la ligne
        $this->ln(10);
    }

    function FancyTable($header_tableau)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(185,54,64);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // En-tête
        $w = array(160, 30);

        $this->Cell($w[0],7,$header_tableau[0],1,0,'L',true);

        $this->SetFillColor(59,95,171); //on change la couleur pour la deuxieme colonne
        $this->Cell($w[1],7,$header_tableau[1],1,0,'R',true);

        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(56,144,182);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Données
        $fill = false;
        // Trait de terminaison
        $this->Cell(array_sum($w),0,'','T');
        $this->Cell(0,0,'',1,1,'C');
    }

    // Pied de page
    function Footer()
    {
        require('../login/connectToBDD/conn.php');

        $id_utilisateur = $_GET['userid'];
        $abonnements_utilisateurs = $bdd->query("SELECT * FROM abonnements_utilisateurs WHERE id_utilisateur='$id_utilisateur'");
        while ($donnees_abonnements_utilisateurs = $abonnements_utilisateurs->fetch())
        {
            $id_abonnement = htmlspecialchars($donnees_abonnements_utilisateurs['id_abonnement']);

            $abonnement = $bdd->query("SELECT * FROM abonnements WHERE id='$id_abonnement'");
            while ($donnees_abonnement = $abonnement->fetch())
            {
                $abonnement_texte = htmlspecialchars($donnees_abonnement['texte']);
                $abonnement_tarif = htmlspecialchars($donnees_abonnement['tarif']);
            }
        }

        // tarif net a payer
        $this->Cell(160,7,''.$abonnement_texte.utf8_decode(' 1 mois '),'LBR',0,'L');

        // tarif net a payer
        $this->Cell(30,7,''.$abonnement_tarif.chr(128),'BR',1,'R');

        //.chr(128) = €
    }
}

// Instanciation de la classe dérivée
ob_get_clean(); //je vide le tampon de sortie
$pdf = new PDF();

$id_utilisateur = $_GET['userid'];
$abonnements_utilisateurs = $bdd->query("SELECT * FROM abonnements_utilisateurs WHERE id_utilisateur='$id_utilisateur'");
while ($donnees_abonnements_utilisateurs = $abonnements_utilisateurs->fetch())
{
    $id_abonne = htmlspecialchars($donnees_abonnements_utilisateurs['id_abonne']);
    $id_abonnement = htmlspecialchars($donnees_abonnements_utilisateurs['id_abonnement']);
    $id_utilisateur = htmlspecialchars($donnees_abonnements_utilisateurs['id_utilisateur']);
    $date_abonnement = htmlspecialchars($donnees_abonnements_utilisateurs['date_abonnement']);

    $abonnement = $bdd->query("SELECT * FROM abonnements WHERE id='$id_abonnement'");
    while ($donnees_abonnement = $abonnement->fetch())
    {
        $abonnement_texte = htmlspecialchars($donnees_abonnement['texte']);
        $abonnement_tarif = htmlspecialchars($donnees_abonnement['tarif']);
    }
}

$code_commande = 'FACT_'.$id_abonnement;
$chemin = $code_commande.'_'.date("Y-m-d").'.pdf';

// Titres des colonnes
$header_tableau = array(utf8_decode('Désignation'), 'Total TTC');
// Chargement des données
$pdf->AliasNbPages(); // Define an alias for total number of pages
$pdf->AddPage(); // Start a new page - contient header() / footer()
$pdf->SetFont('Times','',12); //police
$pdf->FancyTable($header_tableau); //corps du devis (tableau+données)
$chemin_full=$_SERVER['DOCUMENT_ROOT'].'projetTA70/docs_client/FACT/'.$chemin;
$pdf->Output($chemin_full,'F');
ob_get_clean(); //je vide le tampon de sortie
$pdf->Output($chemin_full,'I'); // 'D' pour dowload browser
?>