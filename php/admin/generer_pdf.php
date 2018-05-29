<?php

require('../../includes/fpdf/fpdf.php');

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

        $id_commande=123;
        $code_commande='FACT_'.$id_commande;

        $chiffres = $bdd->query("SELECT * FROM commandes WHERE ID_commande='$id_commande'");
        while ($donnees_chiffres = $chiffres->fetch())
        {
            $ID_client=htmlspecialchars($donnees_chiffres['ID_client']);

            $client = $bdd->query("SELECT * FROM clients WHERE ID_client='$ID_client'");
            while ($donnees_client = $client->fetch())
            {
                $CIVILITE_client=htmlspecialchars($donnees_client['CIVILITE_client']);
                $NOM_client=htmlspecialchars($donnees_client['NOM_client']); //je stocke dans des variables les infos obtenus
                $PRENOM_client=htmlspecialchars($donnees_client['PRENOM_client']);
                $PAYS_client=htmlspecialchars($donnees_client['PAYS_client']);
                $ADRESSE_client=htmlspecialchars($donnees_client['ADRESSE_client']);
                $CODEPOSTAL_client=htmlspecialchars($donnees_client['CODEPOSTAL_client']); //je stocke dans des variables les infos obtenus
                $VILLE_client=htmlspecialchars($donnees_client['VILLE_client']);
            }
        }

        // Cell(largeur,  hauteur,  'texte',  bordure(0 ou 1),  ln(indique ou se place la valeur suivante 0:droite,1:new ligne,2:en dessous), alignement (L, C, R)              // Logo
        $this->Image('../annexes/img/logo.png',15,6,30);

        // Facture
        $this->SetFont('Arial','B',12);
        $this->Cell(80);
        $this->Cell(30,7,'FACTURE',0,0,'C');

        // N° facture
        $this->Cell(80,7,''.utf8_decode('N° : '.$code_commande.''),0,1,'R');

        // date
        $this->Cell(190,7,'du '.date("d/m/Y").'',0,1,'R');

        // passe la ligne
        $this->ln(10);

        // entreprise
        $this->Cell(40,5,'Gestion Production',0,0,'L');

        // destinataire
        $this->Cell(50);
        $this->SetFont('Arial','IU',8);
        $this->Cell(100,5,'Destinataire','TLR',1,'L');

        // location
        $this->SetFont('Arial','',10);
        $this->Cell(40,5,'2 rue du haut des '.utf8_decode('étages'),0,0,'L');

        //nom destinataire
        $this->Cell(50);
        $this->Cell(100,5,$CIVILITE_client." ".$NOM_client." ".$PRENOM_client,'LR',1,'C');

        // ville
        $this->Cell(40,5,'88000 EPINAL',0,0,'C');

        //adresse destinataire
        $this->Cell(50);
        $this->Cell(100,5,$ADRESSE_client,'LR',1,'C');

        // tel
        $this->Cell(40,5,'Tel. : 03.29.81.21.81',0,0,'C');

        //ville destinataire
        $this->Cell(50);
        $this->SetFont('Arial','B',10);
        $this->Cell(100,5,$CODEPOSTAL_client." ".$VILLE_client,'LR',1,'C');

        // fax
        $this->SetFont('Arial','',10);
        $this->Cell(40,5,'Fax. : 03.29.81.21.98',0,0,'C');

        //espace
        $this->Cell(50);
        $this->Cell(100,5,'','BLR',1,'C');

        // passe la ligne
        $this->ln(10);
    }

    function FancyTable($header_tableau, $data)
    {
        // Couleurs, épaisseur du trait et police grasse
        $this->SetFillColor(245,145,31);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // En-tête
        $w = array(20, 110, 30, 30);
        for($i=0;$i<count($header_tableau);$i++)
            $this->Cell($w[$i],7,$header_tableau[$i],1,0,'C',true);
        $this->Ln();
        // Restauration des couleurs et de la police
        $this->SetFillColor(56,144,182);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Données
        $fill = false;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,utf8_decode($row[0]),'LR',0,'C',$fill);
            $this->Cell($w[1],6,utf8_decode($row[1]),'LR',0,'L',$fill);
            $this->Cell($w[2],6,number_format(utf8_decode($row[2]),2,',',' '),'LR',0,'R',$fill);
            $this->Cell($w[3],6,number_format(utf8_decode($row[3]),2,',',' '),'LR',0,'R',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Trait de terminaison
        $this->Cell(array_sum($w),0,'','T');
        $this->Cell(0,0,'',1,1,'C');
    }

    // Pied de page
    function Footer()
    {
        require('../login/connectToBDD/conn.php');

        $id_commande=$_GET['commande'];
        $code_commande='FACT_'.$id_commande;

        $chiffres = $bdd->query("SELECT * FROM commandes WHERE ID_commande='$id_commande'");
        while ($donnees_chiffres = $chiffres->fetch())
        {
            $TOTALHT_commande=htmlspecialchars($donnees_chiffres['TOTALHT_commande']);
            $TOTALTTC_commande=htmlspecialchars($donnees_chiffres['TOTALTTC_commande']);
            $TVA_commande=htmlspecialchars($donnees_chiffres['TVA_commande']);
        }

        // net ht
        $this->SetFont('Arial','',10);
        $this->Cell(130);
        $this->Cell(20,7,'Montant HT :','LB',0,'L');

        // tarif net ht
        $this->Cell(40,7,''.$TOTALHT_commande.chr(128),'BR',1,'R');

        // tva 20%
        $this->Cell(130);
        $this->Cell(20,7,'TVA (20,0 %) :','LB',0,'L');

        // tarif tva 20%
        $this->Cell(40,7,''.$TVA_commande.chr(128),'BR',1,'R');

        // ttc
        $this->SetFont('Arial','B',12);
        $this->Cell(130);
        $this->Cell(20,7,'Montant TTC : ','LB',0,'L');

        // tarif ttc
        $this->Cell(40,7,''.$TOTALTTC_commande.chr(128),'BR',1,'R');

        // net a payer
        $this->SetFont('Arial','B',13);
        $this->Cell(130);
        $this->Cell(20,7,'NET A PAYER :','LB',0,'L');

        // tarif net a payer
        $this->Cell(40,7,''.$TOTALTTC_commande.chr(128),'BR',1,'R');

        //.chr(128) = €
    }
}

// Instanciation de la classe dérivée
ob_get_clean(); //je vide le tampon de sortie
$pdf = new PDF();

$id_commande=123;
$code_commande='FACT_'.$id_commande;

// Titres des colonnes
$header_tableau = array(utf8_decode('Qté'), utf8_decode('Désignation'), 'P.U. HT ('.chr(128).')', 'Total HT (' .chr(128).')');
// Chargement des données
$data = $pdf->LoadData('facture.txt');

$pdf->AliasNbPages(); // Define an alias for total number of pages
$pdf->AddPage(); // Start a new page - contient header() / footer()
$pdf->SetFont('Times','',12); //police
$pdf->FancyTable($header_tableau,$data); //corps du devis (tableau+données)
$pdf->Output('../docs_client/FACT/'.$code_commande.'.pdf','F');

$chemin='../docs_client/FACT/'.$code_commande.'.pdf';
ob_get_clean(); //je vide le tampon de sortie
$pdf->Output($chemin,'I'); // 'D' pour dowload browser

?>