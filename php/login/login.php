<!DOCTYPE html>
<html lang="zxx" class="no-js">

<?php
//config
include '../../includes/config.php';
?>

<header id="header">
    <?php session_start(); ?>
    <?php include '../../includes/banner.php'; ?>
    <?php include '../../includes/menu.php'; ?>
</header>
<br>

<body>
    <section class="section-gap-other-pages">
        <div class="title text-center">

            <h1 style="margin-top: 70px" class="mb-10">Authentification</h1>

            <?php if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                    Mauvais Identifiants :(
                </div>
            <?php } ?>

            <form method="post" action="connectToBDD/userlogin.php">

                <table style="border: 1px solid black; border-collapse: separate; border-spacing: 5px;" align="center">
                    <tr>
                        <td align="left" width="40%">Email</td>
                        <td><input type="text" name="login_email" required/></td>
                    </tr>
                    <tr>
                        <td align="left" width="40%">Mot de passe</td>
                        <td><input type="password" name="login_password" required/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><input align="center" type="submit" name="Connexion" value="Connexion"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><a href="signup.php"><font color="orange">S'inscrire</font></a></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><a href="forget_mdp.php"><font color="green">Mot de passe oublié?</font></a></td>
                    </tr>
                </table>

            </form>
        </div>
    </section>
</body>

</html>
