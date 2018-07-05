<?php
/**
 * Created by PhpStorm.
 * User: Delcourt
 * Date: 27/06/2018
 * Time: 01:29
 */

include('../../php/login/connectToBDD/conn.php');
$data = array();

$query = "SELECT eve.id as 'event_id',
                 eve.title as 'event_title',
                 eve.start_event as 'event_start_event',
                 eve.end_event as 'event_end_event',
                 eve.description as 'event_description',
                 eve.nb_max as 'event_nb_max',
                 eve.nb_inscrits as 'event_nb_inscrits',
                 eve.id_coach as 'event_id_coach',
                 uti.prenom as 'uti_prenom_coach'
 FROM events eve INNER JOIN utilisateurs uti ON eve.id_coach = uti.id ORDER BY eve.id";

$statement = $bdd->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
    $data[] = array(
        'id'   => $row["event_id"],
        'title'   => $row["event_title"],
        'start'   => $row["event_start_event"],
        'end'   => $row["event_end_event"],
        'description'   => $row["event_description"],
        'nb_max'   => $row["event_nb_max"],
        'nb_inscrits'   => $row["event_nb_inscrits"],
        'id_coach'   => $row["event_id_coach"],
        'prenom_coach'   => $row["uti_prenom_coach"]
    );
}

echo json_encode($data);
?>
