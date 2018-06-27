<?php
/**
 * Created by PhpStorm.
 * User: Delcourt
 * Date: 27/06/2018
 * Time: 01:29
 */

include '../../php/login/connectToBDD/conn.php';
var_dump($_SESSION);
if(isset($_POST["title"]))
{
    $query = "INSERT INTO events (title, start_event, end_event) VALUES (:title, :start_event, :end_event)";
    $statement = $bdd->prepare($query);
    $statement->execute(
        array(
            ':title'  => $_POST['title'],
            ':start_event' => $_POST['start'],
            ':end_event' => $_POST['end']
        )
    );
}
?>