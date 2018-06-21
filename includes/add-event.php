<?php

require_once '../php/login/connectToBDD/conn.php';
$title = $_POST['title']; $start_date = $_POST['event-date'];
$weekday = date('N', strtotime($start_date));
$start_time = $_POST['start-time'];
$end_time = $_POST['end-time'];
$start = $start_date . " " . $start_time; $end = $start_date . " " . $end_time;

if (!isset($_POST['repeats'])) {
    $repeats = 0;
    $repeat_freq = 0;
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    try{
        $bdd->beginTransaction();
        $stmt = $bdd->prepare("INSERT INTO events_parent 
                (title,start_date, start_time, end_time, weekday, repeats, repeat_freq)
                VALUES (:title,:start_date, :start_time, :end_time, :weekday, :repeats, :repeat_freq)");

        $stmt->bindParam(':title', $title );
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':start_time', $start_time);
        $stmt->bindParam(':end_time', $end_time);
        $stmt->bindParam(':weekday', $weekday);
        $stmt->bindParam(':repeats', $repeats);
        $stmt->bindParam(':repeat_freq', $repeat_freq);
        $stmt->execute();
        $last_id = $bdd->lastInsertId();

        $stmt = $bdd->prepare("INSERT INTO events 
                (parent_id, title, start, end)
                VALUES (:parent_id, :title, :start, :end)");

        $stmt->bindParam(':title', $title );
        $stmt->bindParam(':start', $start);
        $stmt->bindParam(':end', $end);
        $stmt->bindParam(':parent_id', $last_id);
        $stmt->execute();

        $bdd->commit();

    }
    catch(Exception $e){
        $bdd->rollback();
    }
}
else {
    $repeats = $_POST['repeats'];
    $repeat_freq = $_POST['repeat-freq'];
    $until = (365/$repeat_freq);
    if ($repeat_freq == 1){
        $weekday = 0;
    }
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // set the error mode to excptions
    $bdd->beginTransaction();
    try{
        $stmt = $bdd->prepare("INSERT INTO events_parent 
                (title,start_date, start_time, end_time, weekday, repeats, repeat_freq)
                VALUES (:title, :start_date, :start_time, :end_time, :weekday, :repeats, :repeat_freq)");

        $stmt->bindParam(':title', $title );
        $stmt->bindParam(':start_date', $start_date);
        $stmt->bindParam(':start_time', $start_time);
        $stmt->bindParam(':end_time', $end_time);
        $stmt->bindParam(':weekday', $weekday);
        $stmt->bindParam(':repeats', $repeats);
        $stmt->bindParam(':repeat_freq', $repeat_freq);
        $stmt->execute();
        $last_id = $bdd->lastInsertId();

        for($x = 0; $x <$until; $x++){
            $stmt = $bdd->prepare("INSERT INTO events 
                    (title, start, end, parent_id)
                    VALUES (:title, :start, :end, :parent_id)");
            $stmt->bindParam(':title', $title );
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':end', $end);
            $stmt->bindParam(':parent_id', $last_id);
            $stmt->execute();
            $start_date = strtotime($start . '+' . $repeat_freq . 'DAYS');
            $end_date = strtotime($end . '+' . $repeat_freq . 'DAYS');
            $start = date("Y-m-d H:i", $start_date);
            $end = date("Y-m-d H:i", $end_date);
            }
        $bdd->commit();
    }

    catch(Exception $e){
        $bdd->rollback();
    }
}
header ("location: ../");
