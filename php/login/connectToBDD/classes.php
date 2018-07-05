<?php

class user{
    private $UserId, $UserEmail, $UserPassword, $UserNom, $UserPrenom, $UserDateNaissance, $UserFichierAutorisationParentale, $UserIdAutorisationParentale, $UserAdress, $UserCP, $UserVille, $UserTel, $UserPaiementChoisi, $UserIdAbonnementTexte, $UserIdAbonnementTarif, $UserIdAbonnement, $UserNumAdherent, $UserDateAdhesion, $UserRole, $UserBloque;

	/*Création de fonction pour allez chercher les informations */
	
	//Id
    public function getUserId(){
        return $this->UserId;
    }
    public function setUserID($UserId){
        $this->UserId=$UserId;
    }

    //Email
    public function getUserEmail(){
        return $this->UserEmail;
    }
    public function setUserEmail($UserEmail){
        $this->UserEmail=$UserEmail;
    }

    //Password
    public function getUserPassword(){
        return $this->UserPassword;
    }
    public function setUserPassword($UserPassword){
        $this->UserPassword=$UserPassword;
    }

    //Date de naissance
    public function getUserDateNaissance(){
        return $this->UserDateNaissance;
    }
    public function setUserDateNaissance($UserDateNaissance){
        $this->UserDateNaissance=$UserDateNaissance;
    }

    //Autorisation aprentale
    public function getUserFichierAutorisationParentale(){
        return $this->UserFichierAutorisationParentale;
    }
    public function setUserFichierAutorisationParentale($UserFichierAutorisationParentale){
        $this->UserFichierAutorisationParentale=$UserFichierAutorisationParentale;
    }

    //Autorisation aprentale
    public function getUserIdAutorisationParentale(){
        return $this->UserIdAutorisationParentale;
    }
    public function setUserIdAutorisationParentale($UserIdAutorisationParentale){
        $this->UserIdAutorisationParentale=$UserIdAutorisationParentale;
    }

    //Nom
    public function getUserNom(){
        return $this->UserNom;
    }
    public function setUserNom($UserNom){
        $this->UserNom=$UserNom;
    }

    //Prenom
    public function getUserPrenom(){
        return $this->UserPrenom;
    }
    public function setUserPrenom($UserPrenom){
        $this->UserPrenom=$UserPrenom;
    }

    //ADRESSE
    public function getUserAdress(){
        return $this->UserAdress;
    }
    public function setUserAdress($UserAdress){
        $this->UserAdress=$UserAdress;
    }

    //CODE POSTAL
    public function getUserCP(){
        return $this->UserCP;
    }
    public function setUserCP($UserCP){
        $this->UserCP=$UserCP;
    }

    //VILLE
    public function getUserVille(){
        return $this->UserVille;
    }
    public function setUserVille($UserVille){
        $this->UserVille=$UserVille;
    }

    //TEL
    public function getUserTel(){
        return $this->UserTel;
    }
    public function setUserTel($UserTel){
        $this->UserTel=$UserTel;
    }

    //UserIdAbonnement
    public function getUserIdAbonnement(){
        return $this->UserIdAbonnement;
    }
    public function setUserIdAbonnement($UserIdAbonnement){
        $this->UserIdAbonnement=$UserIdAbonnement;
    }

    //UserIdAbonnementTexte
    public function getUserIdAbonnementTexte(){
        return $this->UserIdAbonnementTexte;
    }
    public function setUserIdAbonnementTexte($UserIdAbonnementTexte){
        $this->UserIdAbonnementTexte=$UserIdAbonnementTexte;
    }

    //UserIdAbonnementTarif
    public function getUserIdAbonnementTarif(){
        return $this->UserIdAbonnementTarif;
    }
    public function setUserIdAbonnementTarif($UserIdAbonnementTarif){
        $this->UserIdAbonnementTarif=$UserIdAbonnementTarif;
    }

    //UserNumAdherent
    public function getUserNumAdherent(){
        return $this->UserNumAdherent;
    }
    public function setUserNumAdherent($UserNumAdherent){
        $this->UserNumAdherent=$UserNumAdherent;
    }

    //UserNumAdherent
    public function getUserPaiementChoisi(){
        return $this->UserPaiementChoisi;
    }
    public function setUserPaiementChoisi($UserPaiementChoisi){
        $this->UserPaiementChoisi=$UserPaiementChoisi;
    }

    //UserDateAdhesion
    public function getUserDateAdhesion(){
        return $this->UserDateAdhesion;
    }
    public function setUserDateAdhesion($UserDateAdhesion){
        $this->UserDateAdhesion=$UserDateAdhesion;
    }

    //Role
    public function getUserRole(){
        return $this->UserRole;
    }
    public function setUserRole($UserRole){
        $this->UserRole=$UserRole;
    }

	//UserBloque
    public function getUserBloque(){
        return $this->UserBloque;
    }
    public function setUserBloque($UserBloque){
        $this->UserBloque=$UserBloque;
    }
    
	/*Compar les donnés saisi par l'utilisateur avec ceux sur la BDD*/
    public function Userlogin(){
        include "conn.php";
        $req=$bdd->prepare("SELECT * FROM utilisateurs WHERE email=:UserEmail AND password=:UserPassword");
        $req->execute(array(
            'UserEmail'=>$this->getUserEmail(),
            'UserPassword'=>$this->getUserPassword()
            ));
        if($req->rowCount()==0){
            header("Location: ../login.php?error=1"); /*Erreur de connexion*/
            return false;
        }
        else{
            while($data=$req->fetch()){
                $this->setUserId($data['id']);
                $this->setUserEmail($data['email']);
                $this->setUserPassword($data['password']);
                $this->setUserNom($data['nom']);
                $this->setUserPrenom($data['prenom']);
                $this->setUserDateNaissance($data['date_naissance']);
                $this->setUserAdress($data['adresse']);
                $this->setUserCP($data['cp']);
                $this->setUserVille($data['ville']);
                $this->setUserTel($data['telephone']);
                $this->setUserNumAdherent($data['num_adherent']);
                $this->setUserPaiementChoisi($data['paiement_choisi']);
                $this->setUserRole($data['role']);
                $this->setUserBloque($data['bloque']);
            }

            //récuperer infos table abonnements_utilisateurs
            $req2=$bdd->prepare("SELECT id_abonnement,date_abonnement FROM abonnements_utilisateurs WHERE id_utilisateur=:UserId");
            $req2->execute(array(
                'UserId'=>$this->getUserId()
            ));
            while($data2=$req2->fetch()){
                $this->setUserIdAbonnement($data2['id_abonnement']);
                $this->setUserDateAdhesion($data2['date_abonnement']);
            }

            //récuperer infos table abonnements
            $req3=$bdd->prepare("SELECT texte,tarif FROM abonnements WHERE id=:UserIdAbonnement");
            $req3->execute(array(
                'UserIdAbonnement'=>$this->getUserIdAbonnement()
            ));
            while($data3=$req3->fetch()){
                $this->setUserIdAbonnementTexte($data3['texte']);
                $this->setUserIdAbonnementTarif($data3['tarif']);
            }

            header("Location: ../../../index.php?connect=ok");      /*Bien identifié la session est créée*/
            return true;
        }
        
    }

	public function InsertUser(){
        include "conn.php";
        $req=$bdd->prepare("INSERT INTO utilisateurs(email,password,nom,prenom,date_naissance,autorisation_parentale,adresse,cp,ville,telephone,paiement_choisi,num_adherent,role,bloque) VALUES (:UserEmail,:UserPassword,:UserNom,:UserPrenom,:UserDateNaissance,:UserIdAutorisationParentale,:UserAdress,:UserCP,:UserVille,:UserTel, :UserPaiementChoisi, :UserNumAdherent,:UserRole,:UserBloque)");
        $req->execute(array(
			'UserEmail'=>$this->getUserEmail(),
			'UserPassword'=>$this->getUserPassword(),
			'UserNom'=>$this->getUserNom(),
			'UserPrenom'=>$this->getUserPrenom(),
			'UserDateNaissance'=>$this->getUserDateNaissance(),
			'UserIdAutorisationParentale'=>0,
			'UserAdress'=>$this->getUserAdress(),
			'UserCP'=>$this->getUserCP(),
			'UserVille'=>$this->getUserVille(),
			'UserTel'=>$this->getUserTel(),
			'UserPaiementChoisi'=>$this->getUserPaiementChoisi(),
			'UserNumAdherent'=>$this->getUserNumAdherent(),
			'UserRole'=>$this->getUserRole(),
			'UserBloque'=>$this->getUserBloque()
        ));

        $req2=$bdd->prepare("SELECT id FROM utilisateurs WHERE email=:UserEmail");
        $req2->execute(array(
            'UserEmail'=>$this->getUserEmail()
        ));
        if($req2->rowCount()==0){
            header("Location: ../login.php?error=InsertUser"); /*Erreur de connexion*/
            return false;
        }
        else{
            while($data=$req2->fetch()){
                $this->setUserId($data['id']);
            }
        }
    }

    public function InsertAutorisationParentale($nomFichier){
        include "conn.php";
        $req=$bdd->prepare("INSERT INTO autorisation_parentale(id_utilisateur, nom_fichier , valide) VALUES (:UserId,:NomFichier,:boolValide)");
        $req->execute(array(
            'UserId'=>$this->getUserId(),
            'NomFichier'=>$nomFichier,
            'boolValide'=>0,
        ));

        $req2=$bdd->prepare("SELECT id FROM autorisation_parentale WHERE id_utilisateur=:UserId");
        $req2->execute(array(
            'UserId'=>$this->getUserId()
        ));
        if($req2->rowCount()==0){
            header("Location: ../login.php?error=InsertUser"); /*Erreur de connexion*/
            return false;
        }
        else{
            while($data=$req2->fetch()){
                $this->setUserIdAutorisationParentale($data['id']);
            }
        }

        //on update l'id autorisation parentale dans la table utilisateurs
        $req=$bdd->prepare("UPDATE utilisateurs SET autorisation_parentale = :UserIdAutorisationParentale WHERE id = :UserId");
        $req->execute(array(
            'UserIdAutorisationParentale'=>$this->getUserIdAutorisationParentale(),
            'UserId'=>$this->getUserId()
        ));
    }
}
    



?>