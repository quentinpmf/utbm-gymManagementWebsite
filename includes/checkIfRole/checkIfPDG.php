<?php

if(!$_SESSION || $_SESSION['UserRole'] != 5)
{
    header('location:../php/admin/403_forbidden.php');
}

?>