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
    $query = "UPDATE events SET title=:title, start_event=:start_event, end_event=:end_event WHERE id=:id";
    $statement = $bdd->prepare($query);
    $statement->execute(
        array(
            ':title'  => $_POST['title'],
            ':start_event' => $_POST['start'],
            ':end_event' => $_POST['end'],
            ':id'   => $_POST['id']
        )
    );
}
?>