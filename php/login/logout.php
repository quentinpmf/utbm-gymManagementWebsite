<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include '../../includes/config.php';
?>

<header id="header">
    <?php include '../../includes/banner.php'; ?>
</header>
<br>

<body>
    <section class="section-gap-other-pages">
        <div class="title text-center">

            <h1 class="mb-10">Déconnexon</h1>

            <?php

            if(isset($_SESSION["UserId"])){
                session_destroy();
                header("Location: ../../index.php?deconnect=ok");
            }
            else{
                header("location: ../../index.php");
            }
            include "connectToBDD/conn.php";
            ?>

            </form>
        </div>
    </section>
</body>

</html>
