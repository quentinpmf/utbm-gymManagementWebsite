<?php

if(!$_SESSION || $_SESSION['UserRole'] != 3)
{
    header('location:../php/admin/403_forbidden.php');
}

?>