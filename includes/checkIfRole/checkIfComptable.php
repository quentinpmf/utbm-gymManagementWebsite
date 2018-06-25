<?php

if(!$_SESSION || $_SESSION['UserRole'] != 3)
{
    header('location:../../index.php');
}

?>