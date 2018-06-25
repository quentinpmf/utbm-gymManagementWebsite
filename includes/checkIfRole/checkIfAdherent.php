<?php

//TODO QUENTIN : session_start() ??
if(!$_SESSION || $_SESSION['UserRole'] != 1)
{
    header('location:../../index.php');
}

?>