<?php

session_start();
if(!$_SESSION || $_SESSION['UserRole'] != 1)
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