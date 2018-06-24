<?php

if(!$_SESSION || $_SESSION['UserRole'] != 1)
{
    header('location:../php/admin/403_forbidden.php');
}

?>