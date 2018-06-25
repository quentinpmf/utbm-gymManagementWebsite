<?php

var_dump($_SESSION);
if(!$_SESSION || $_SESSION['UserRole'] != 1)
{
    header('location:../../index.php');
}

?>