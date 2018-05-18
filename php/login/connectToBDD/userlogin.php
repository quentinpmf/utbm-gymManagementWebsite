<?php
    session_start();
        include "classes.php";
        $user = new user();
        $user->setUserEmail($_POST['login_email']);
        $user->setUserPassword(sha1($_POST['login_password']));
        if($user->Userlogin()==true)
        {
            $_SESSION['UserId']=$user->getUserId();
            $_SESSION['UserEmail']=$user->getUserEmail();
			$_SESSION['UserPassword']=$user->getUserPassword();
            $_SESSION['UserNom']=$user->getUserNom();
            $_SESSION['UserPrenom']=$user->getUserPrenom();
            $_SESSION['UserAdress']=$user->getUserAdress();
            $_SESSION['UserCP']=$user->getUserCP();
			$_SESSION['UserVille']=$user->getUserVille();
			$_SESSION['UserTel']=$user->getUserTel();
            $_SESSION['UserNumAdherent']=$user->getUserNumAdherent();
			$_SESSION['UserIdAbonnement']=$user->getUserIdAbonnement();
			$_SESSION['UserDateAdhesion']=$user->getUserDateAdhesion();
			$_SESSION['UserRole']=$user->getUserRole();
			$_SESSION['UserBloque']=$user->getUserBloque();
        }
?>