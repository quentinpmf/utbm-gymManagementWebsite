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
    <section class="section-gap">
        <div class="title text-center">

            <h1 class="mb-10">Authentification</h1>

            <?php if(isset($_GET['error'])){ ?>
                <span style="color:red">Mauvais Identifiants :( </span>
            <?php } ?>

            <form method="post" action="../code_connect/userlogin.php">

                <table align="center">
                    <tr>
                        <td align="left" width="40%">Email</td>
                        <td><input type="text" name="login_email"/></td>
                    </tr>
                    <tr>
                        <td align="left" width="40%">Mot de passe</td>
                        <td><input type="password" name="login_password"/></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><input align="center" type="submit" name="Connexion" value="Connexion"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right"><a href="signup.php"><font color="orange">S'inscrire</font></a></td>
                    </tr>
                </table>

            </form>
        </div>
    </section>
</body>

</html>
