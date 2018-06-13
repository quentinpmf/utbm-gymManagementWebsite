<?php
/**
 * Created by PhpStorm.
 * User: quent
 * Date: 21/05/2018
 * Time: 23:15
 */

require('../../includes/fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World !');
$pdf->Output();

?>