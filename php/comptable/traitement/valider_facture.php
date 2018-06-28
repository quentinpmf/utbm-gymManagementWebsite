<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../../login/connectToBDD/conn.php";
include '../../../includes/checkIfRole/checkIfAdmin.php';
include '../../../includes/config.php';

$id = $_GET['factureid'];

$req = $bdd->prepare("UPDATE factures SET statut = 1 WHERE id = :FactureId");
$req->execute(array(
    'FactureId' => $id
));

header("location: ../factures_en_attente.php");
?>
