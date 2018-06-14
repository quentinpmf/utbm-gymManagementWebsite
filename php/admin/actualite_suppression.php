<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../login/connectToBDD/conn.php";
include '../../includes/config.php';
include '../../includes/checkIfRole/checkIfAdmin.php'; //Vérification des droits d'accès à la page


$id = $_GET['id'];

$req = $bdd->prepare('DELETE FROM actualites WHERE id = :id');

$req->execute(array('id' => $id));

header("location: actualites_accueil.php");
?>
