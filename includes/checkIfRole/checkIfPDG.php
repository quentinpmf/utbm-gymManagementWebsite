<?php

if(!$_SESSION || $_SESSION['UserRole'] != 5)
{
    header('location:../../index.php');
}

?>