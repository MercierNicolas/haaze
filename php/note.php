<?php
session_start();
$id=$_SESSION["id"];
include("co_bdd.php");

if (true){
	// On appele la bdd
	$note=$_POST["note"];
	$publi=$_POST["publi"];
	$_POST["idvoteur"]=$id;

	$req = $bdd->prepare("SELECT * FROM notation WHERE publication= ?");
	$req->execute(array($publi));
	$voteNote = $req->fetchAll(PDO::FETCH_ASSOC);
	

	if (empty($voteNote)) {
		$ajout = $bdd->prepare("INSERT INTO notation (publication,idvoteur,note) VALUES (:publi, :idvoteur,:note)");
		$ajout->execute($_POST);

	
		$ajoutMoyenne= $bdd->prepare("UPDATE publication SET moyenne = ? WHERE iDpubli= ?");
		$ajoutMoyenne->execute(array($note,$publi));
		$verif=false;
	}
	else{
		//Calcul nb vote/note
		$nbNote = count($voteNote);
		// Verification si déja vote
		//Création d'un tableau des IDvote
			for ($i=0; $i < $nbNote ; $i++) { 
				if ($voteNote[$i]["Idvoteur"] == $id) {
					$verif=false;
					echo "dvote";
					break;
				}else{
					$verif=true;
				}
			}

	}
	
}


if ($verif) {
		//Calcul moyenne
					$moyenne = $note;
					for ($i=0; $i < $nbNote; $i++) { 
						$moyenne = $moyenne + intval($voteNote[$i]["note"]);
			
					}
					$nbNote++;
					$moyenne =$moyenne / $nbNote;
					$moyenne = number_format($moyenne,1);
					echo $moyenne;

				//Envoye a la bdd
					$ajout = $bdd->prepare("INSERT INTO notation (publication,idvoteur,note) VALUES (:publi, :idvoteur,:note)");
					$ajout->execute($_POST);


					$ajoutMoyenne= $bdd->prepare("UPDATE publication SET moyenne = ? WHERE iDpubli= ?");
					$ajoutMoyenne->execute(array($moyenne,$publi));

}
	



?>