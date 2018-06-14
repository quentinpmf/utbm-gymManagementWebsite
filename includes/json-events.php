<?php
require_once '../php/login/connectToBDD/conn.php';

$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $bdd->prepare("SELECT event_id, parent_id, title, start, end, nb_max_participants, participants, coach_id
                           FROM events");
$stmt->execute();
$events = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $eventArray['id'] = $row['event_id'];
    $eventArray['parent_id'] = $row['parent_id'];
    $eventArray['title'] = stripslashes($row['title']);
    $eventArray['start'] = $row['start'];
    $eventArray['end'] = $row['end'];
    $eventArray['max_clients'] = $row['nb_max_participants'];
    $eventArray['clients'] = $row['participants'];
    $eventArray['coach'] = $row['coach_id'];
    $events[] = $eventArray;
}

echo json_encode($events);