<?php

if(!$_SESSION || $_SESSION['UserRole'] != 4)
{
    header('location:../../../index.php');
}

?>