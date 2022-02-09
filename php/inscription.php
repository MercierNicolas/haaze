<?php
include("co_bdd.php");

// Verification des champs
if (empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["password"]) || empty($_POST["pseudo"]) || empty($_POST["mail"])|| empty($_POST["conf_password"]) ){
	$champ_vide = false;
	echo "champs_vide";
}// Fin if verif champs
else{// Champs ok donc on continue
	$champ_vide = true; // -> Champs Remplie
	// Securisé les champs
	$_POST["nom"] = htmlspecialchars($_POST["nom"]);
	$_POST["prenom"] = htmlspecialchars($_POST["prenom"]);
	$_POST["password"] = htmlspecialchars($_POST["password"]);
	$_POST["pseudo"] = htmlspecialchars($_POST["pseudo"]);
	$_POST["mail"] = htmlspecialchars($_POST["mail"]);
	$_POST["mail"] = filter_var($_POST["mail"], FILTER_SANITIZE_EMAIL);
	$_POST["conf_password"] = htmlspecialchars($_POST["conf_password"]);

	// Verification Du mail
	if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {// Mail ok

			// Verification si mail est déja dans la BDD
			$reqmail = $bdd->prepare("SELECT * FROM compte WHERE mail = ?");
	        $reqmail->execute(array($_POST["mail"]));
	        $mailexist = $reqmail->fetch(PDO::FETCH_ASSOC);

				if ($mailexist){ // Mail pas bon
					$mail = false;
					echo "mail";
				}//fin verifi mail 
				else{ // Mail OK
					$mail = true;// -> Mail ok

					//verification du pseudo
					$reqpseudo = $bdd->prepare("SELECT * FROM compte WHERE pseudo = ?");
		            $reqpseudo->execute(array($_POST["pseudo"]));
		           	$pseudoexist = $reqpseudo->fetch(PDO::FETCH_ASSOC);
		           		if ($pseudoexist){
								$vpseudo = false;
								echo "pseudo";
						}else{// Pseudo Dispo
							$vpseudo = true; // -> Pseudo ok
							// Verification et hash du mdp
								if ($_POST["password"] == $_POST["conf_password"]) {// Les mdp corespond
										$_POST["password"]= password_hash($_POST["password"],PASSWORD_BCRYPT);
										$mdpok=true;

										//Verification et envoye a la bdd
										if ($champ_vide == true && $mdpok==true && $mail== true && $vpseudo = true) {
											unset($_POST["conf_password"]);	
											$bdd->query('SELECT * from compte');
											$req1=$bdd->prepare("INSERT INTO compte (Id,nom,prenom,mdp,pseudo,mail)VALUES(NULL,:nom,:prenom,:password,:pseudo,:mail)");
											$req1->execute($_POST);

											echo "ok";
										}// Fin du if envoi bdd
								}else{// Mdp ne corespond pas
											$mdpok=false;
											echo "mdp";
								}// Fin else mdp corespond pas
						}//Fin else Pseudo dispo
				}//Fin else Mail ok



	}//Fin if verif mail
	else{// Mail pas bon
		echo "mail";
	}
	

}// Fin du else verif champs	

?>