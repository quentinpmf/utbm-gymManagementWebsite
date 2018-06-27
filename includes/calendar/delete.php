<?php
/**
 * Created by PhpStorm.
 * User: Delcourt
 * Date: 27/06/2018
 * Time: 01:29
 */

include '../../php/login/connectToBDD/conn.php';
if(isset($_POST["id"]))
{
    $query = "DELETE from events WHERE id=:id";
    $statement = $bdd->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST['id']
        )
    );
}
?>