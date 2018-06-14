<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../login/connectToBDD/conn.php";
include '../../includes/config.php';

date_default_timezone_set('Europe/Paris');
session_start();

var_dump($_FILES);

if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']) && ($_FILES['image']['name'] !== ""))
{
    file_put_contents('../../img/actualites/'.$_FILES['image']['name'], file_get_contents($_FILES['image']['tmp_name']));
}

if(isset($_POST['publier']) && $_POST['publier'] == 'on') {
    $publier = 1;
}
else
{
    $publier = 0;
}

$req = $bdd->prepare("INSERT INTO actualites(id_auteur, titre, description, date_creation, image, publie) VALUES (:id_auteur, :titre, :description, :date_creation, :image, :publie)");
$req->execute(array(
    'id_auteur' => $_SESSION["UserId"],
    'titre' => utf8_decode($_POST['titre']),
    'description' => utf8_decode($_POST['description']),
    'date_creation' => date("Y-m-d H:i:s"),
    'image' => (isset($_FILES['image']['name']) && !empty($_FILES['image']['name']) && ($_FILES['image']['name'] !== "")) ? $_FILES['image']['name'] : '',
    'publie' => $publier
));

header("location: actualites_accueil.php?creation=ok");
?>