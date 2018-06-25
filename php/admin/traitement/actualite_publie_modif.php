<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../../login/connectToBDD/conn.php";
include '../../../includes/checkIfRole/checkIfAdmin.php';
include '../../../includes/config.php';

$id = $_GET['id'];
$req = $bdd->prepare('UPDATE actualites SET publie = :publie WHERE id = :id');


if(isset($_GET['action']) && $_GET['action'] == 'publier')
{
    $req->execute(array(
        'publie' => 1,
        'id' => $id
    ));
}
elseif(isset($_GET['action']) && $_GET['action'] == 'depublier')
{
    $req->execute(array(
        'publie' => 0,
        'id' => $id
    ));
}

header("location: actualites_accueil.php");
?>
