<?php

if(!$_SESSION || $_SESSION['UserRole'] != 2)
{
    header('location:../php/admin/403_forbidden.php');
}

?>