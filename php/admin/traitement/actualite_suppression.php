<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../../login/connectToBDD/conn.php";
include '../../../includes/checkIfRole/checkIfAdmin.php';
include '../../../includes/config.php';


$id = $_GET['id'];

$req = $bdd->prepare('DELETE FROM actualites WHERE id = :id');

$req->execute(array('id' => $id));

header("location: ../actualites_accueil.php");
?>
