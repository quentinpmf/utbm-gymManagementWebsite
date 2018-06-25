<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include "../login/connectToBDD/conn.php";
include '../../includes/config.php';

$id = $_GET['id'];

if(isset($_POST['publier']) && $_POST['publier'] == 0) {
    $publier = 1;
}
else
{
    $publier = 0;
}

if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name']) && ($_FILES['image']['name'] !== ""))
{
    file_put_contents('../../img/actualites/'.$_FILES['image']['name'], file_get_contents($_FILES['image']['tmp_name']));
    $req = $bdd->prepare("UPDATE actualites SET titre = :titre, description = :description, image = :image, publie = :publie WHERE id = :id");
    $req->execute(array(
        'titre' => utf8_decode($_POST['titre']),
        'description' => utf8_decode($_POST['description']),
        'image' => $_FILES['image']['name'],
        'publie' => $publier,
        'id' => $id
    ));
}
else
{
    $req = $bdd->prepare("UPDATE actualites SET titre = :titre, description = :description, publie = :publie WHERE id = :id");
    $req->execute(array(
        'titre' => utf8_decode($_POST['titre']),
        'description' => utf8_decode($_POST['description']),
        'publie' => $publier,
        'id' => $id
    ));
}

header("location: actualites_accueil.php");
?>
