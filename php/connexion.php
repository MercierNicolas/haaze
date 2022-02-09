<?php
session_start();

include("co_bdd.php");


//Verification des champs
if ( empty($_POST['mail']) || empty($_POST['pwd'])) {
	//Champs Vide On envoie l'erreur
	echo "champs_vide";
}//Fin if Verification des champs
else{
	//Champs Remplis on continue
	//Les champs sont remplis on les sécurise :
	$_POST["mail"] = htmlspecialchars($_POST["mail"]);
	$_POST["mail"] = filter_var($_POST["mail"], FILTER_SANITIZE_EMAIL);
	$_POST["pwd"] = htmlspecialchars($_POST["pwd"]);
	//Les champs sont sécurisé on appele la bdd pour voir si l'utilisateur a un mail dedant :
	$reqmail = $bdd->prepare("SELECT mail FROM compte WHERE mail = ?");
	$reqmail->execute(array($_POST["mail"]));
	$mailexist = $reqmail->fetch();
	if (!empty($mailexist[0])) {//Si ce n'est pas vide le mail exsite on continue
		//Le mail exsite donc on verif le mdp on appelle la BDD :
		$reqmdp = $bdd->prepare("SELECT mdp FROM compte WHERE mail = ?");
		$reqmdp->execute(array($_POST["mail"]));
		$reqmdp = $reqmdp->fetch();

		$test = password_verify($_POST["pwd"],$reqmdp[0]);
			//On verifie si le mdp est correct
			if (password_verify($_POST["pwd"],$reqmdp[0])) {
				//Le mail et mdp sont ok donc on crée la session :
				$reqpseudo = $bdd->prepare("SELECT pseudo,id,nom,prenom,moyenne,avatar FROM compte WHERE mail = ?");
				$reqpseudo->execute(array($_POST["mail"]));
				$pseudo = $reqpseudo->fetch();

				$_SESSION["pseudo"]= $pseudo[0];
				$_SESSION["id"]= $pseudo[1];
				$_SESSION["nom"]= $pseudo[2];
				$_SESSION["prenom"]= $pseudo[3];
				$_SESSION["moyenne"]= $pseudo[4];
				$_SESSION["avatar"]= $pseudo[5];
				echo "";
			}//Fin if verif mdp
			else{//Le mdp corespond pas
				echo "erreur";
			}

	}//Fin if Si mail existe
	else{//Le mail existe pas on le dit
		echo "erreur";
	}
}//Fin else Verification des champs












?>