<?php

session_start();
if(!$_SESSION || $_SESSION['UserRole'] != 5)
{
    if($_SESSION)
    {
        header('location:../../index.php');
    }
    else
    {
        header('location:../login/login.php');
    }
}

?>