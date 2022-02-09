<?php
session_start();
$id=$_SESSION["id"];
include("co_bdd.php");

if (true){
	//Recupération des donnée de -24h
	$_POST["date"] = date("Y-m-d H:i:s",strtotime("now -1 Hour")); 

	//Appelel bdd
	$reqpubli = $bdd->prepare("SELECT contenus,Nom,Prenom,datePubli,iDpubli FROM publication");
	$reqpubli->execute();
	$publi = $reqpubli->fetchAll(PDO::FETCH_ASSOC);

	//Modifiacation moyenne

$reqmoyenne = $bdd->prepare("SELECT moyenne FROM publication WHERE idC = ? ORDER BY iDpubli DESC LIMIT 20");
$reqmoyenne->execute(array($id));
$moy = $reqmoyenne->fetchAll(PDO::FETCH_ASSOC);

//Calcul nb moyenne
	$nbMoy = count($moy);

	if ($nbMoy == 0) {
	}else{
	$moyenne = 0;
	for ($i=0; $i < $nbMoy; $i++) { 
		$moyenne = $moyenne + intval($moy[$i]["moyenne"]);
	}
	$moyenne =($moyenne + 2.5) / ( $nbMoy + 1);
	$moyenne = number_format($moyenne,1);
	$_SESSION["moyenne"]= $moyenne;


	$reqUpdateMoyenne = $bdd->prepare("UPDATE compte SET moyenne = ? WHERE Id= ?");
	$reqUpdateMoyenne->execute(array($moyenne,$id));
	}

	$json = json_encode($publi, JSON_FORCE_OBJECT);
	echo $json;

}



?>