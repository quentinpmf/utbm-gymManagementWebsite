<?php

if(!$_SESSION || $_SESSION['UserRole'] != 4)
{
    header('location:../php/admin/403_forbidden.php');
}

?>