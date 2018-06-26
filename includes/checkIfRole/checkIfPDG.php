<?php

session_start();
if(!$_SESSION || $_SESSION['UserRole'] != 5)
{
    header('location:../../index.php');
}

?>