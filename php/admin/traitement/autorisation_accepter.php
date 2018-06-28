<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../../login/connectToBDD/conn.php";
include '../../../includes/checkIfRole/checkIfAdmin.php';
include '../../../includes/config.php';

$id = $_GET['userid'];

$req = $bdd->prepare("UPDATE autorisation_parentale SET valide = 1 WHERE id_utilisateur = :UserId");
$req->execute(array(
    'UserId' => $id
));

header("location: ../autorisation_parentale.php");
?>
