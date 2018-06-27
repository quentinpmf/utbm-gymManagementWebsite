<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    include "conn.php";
    include "classes.php";

    $user = new user();

    $nom = $_POST["inscription_nom"]; //stockage de la valeur tap�e par l'utilisateur dans la variable a
    $prenom = $_POST["inscription_prenom"]; //stockage de la valeur tap�e par l'utilisateur dans la variable b
    $date_naissance = $_POST["inscription_date_naissance"]; //stockage de la valeur tap�e par l'utilisateur dans la variable b
    $adresse = $_POST["inscription_adresse"]; //stockage de la valeur tap�e par l'utilisateur dans la variable b
    $codepostal = $_POST["inscription_cp"]; //stockage de la valeur tap�e par l'utilisateur dans la variable a
    $ville = $_POST["inscription_ville"]; //stockage de la valeur tap�e par l'utilisateur dans la variable c
	$telephone = $_POST["inscription_tel"]; //stockage de la valeur tap�e par l'utilisateur dans la variable c
	$email = $_POST["inscription_email"]; //stockage de la valeur tap�e par l'utilisateur dans la variable a
	$mdp = $_POST["inscription_mdp"]; //stockage de la valeur tap�e par l'utilisateur dans la variable a
	$mdp2 = $_POST["inscription_mdp2"]; //stockage de la valeur tap�e par l'utilisateur dans la variable a
	$nb_caractere_telephone=strlen($telephone); //recupere le nb de caract�res du telephone
	
	$champs_verif = "false";
	$CharPhoneverif = "false";

	if(empty($nom) OR empty($prenom) OR empty($date_naissance) OR empty($codepostal) OR empty($ville) OR empty($telephone) OR empty($email) OR empty($mdp) OR empty($mdp2) )
	{
        header("location: ../signup.php?error=champs_manquant");
		exit();
	}
	else
	{
	    if($mdp !== $mdp2)
        {
            header("location: ../signup.php?error=mdp");
        }
        else
        {
           $champs_verif = "true" ;
        }
	}
	
	if($nb_caractere_telephone!==10)
	{
        header("location: ../signup.php?error=tel");
		exit();
	}
	else
	{
		$CharPhoneverif = "true" ;
	}

    list($annee, $mois, $jour) = explode("-", $date_naissance);
    $date['mois'] = date('n');
    $date['jour'] = date('j');
    $date['annee'] = date('Y');

    $annees = $date['annee'] - $annee;
    if ($date['mois'] <= $mois) {
        if ($mois == $date['mois']) {
            if ($jour > $date['jour'])
                $annees--;
        }
        else
            $annees--;
    }

    if($annees >= 18)
    {
        $date_naissance_verif = "true" ;
    }
    else
    {
        $date_naissance_verif = "false" ;
        header("location: ../signup.php?error=date_naissance");die;
    }

	$reqmail = $bdd->query("SELECT email FROM utilisateurs WHERE email='$email'");
	while($donneesmail=$reqmail->fetch(PDO::FETCH_OBJ))
	{
		$emailbdd=$donneesmail->email;
	}

	if(empty($emailbdd))
	{
		$passmail="true";
	}
	else
	{
		if($email==$emailbdd)
		{
			$passmail="false";
            header("location: ../signup.php?error=email_deja_present");
		}
		else
		{
			$passmail="true";
		}
	}

	//bloquer l'inscription si email d�ja enregistr�
	if($passmail == "true" And $champs_verif == "true" And $CharPhoneverif == "true" And $date_naissance_verif == "true")
	{
        //création utilisateur
	    $user->setUserEmail($_POST['inscription_email']);
		$user->setUserPassword(sha1($_POST['inscription_email']));
		$user->setuserDateNaissance($_POST['inscription_date_naissance']);
		$user->setUserNom($_POST['inscription_nom']);
		$user->setUserPrenom($_POST['inscription_prenom']);
		$user->setUserAdress($_POST['inscription_adresse']);
		$user->setUserCP($_POST['inscription_cp']);
		$user->setUserVille($_POST['inscription_ville']);
		$user->setUserTel($_POST['inscription_tel']);
        $user->setUserNumAdherent(0); //ID crée dans utilisateurs
        $user->setUserRole(1);
        $user->setUserBloque(0);
        $user->setUserPassword(sha1($_POST['inscription_mdp']));
        $user->InsertUser();

        header("location: ../signup.php?inscription=ok");
    }
    else
    {
        header("location: ../signup.php?inscription=nok");
    }

