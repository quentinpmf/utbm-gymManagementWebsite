<?php

session_start();
if(!$_SESSION || $_SESSION['UserRole'] != 2)
{
    header('location:../../index.php');
}

?>