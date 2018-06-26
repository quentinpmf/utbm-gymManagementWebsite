<?php
/**
 * Created by PhpStorm.
 * User: Delcourt
 * Date: 27/06/2018
 * Time: 01:29
 */

if(isset($_POST["id"]))
{
    $connect = new PDO('mysql:host=localhost;dbname=projetta70', 'root', '');
    $query = "
 DELETE from events WHERE id=:id
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST['id']
        )
    );
}