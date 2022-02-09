<?php
session_start();
$id=$_SESSION["id"];
include("co_bdd.php");

if (empty($_POST["contenus"])){
    $champ_vide = false;
    echo "champs_vide";
}// Fin if verif champs
else{
	//Champ ok donc on securise
	$_POST["contenus"] = htmlspecialchars($_POST["contenus"]);
	// On recupére le nom et le prenom a l'aide du id compte
	$reqNom = $bdd->prepare("SELECT nom,prenom,id FROM compte WHERE id = ?");
	$reqNom->execute(array($id));
	$NomPrenom=$reqNom->fetch();
	$tableau["contenus"]=$_POST["contenus"];
	$tableau["nom"]=$NomPrenom[0];
	$tableau["prenom"]=$NomPrenom[1];
	$tableau["datePubli"]= date("Y-m-d H:i:s"); 
	$tableau["idCompte"]=$NomPrenom[2];

	// On prepare la bdd
	$req1=$bdd->prepare("INSERT INTO publication (iDpubli,contenus,Nom,Prenom,datePubli,idC)VALUES(NULL,:contenus,:nom,:prenom,:datePubli,:idCompte)");
	$req1->execute($tableau);


	unset($tableau["idCompte"]);	
	$json = json_encode($tableau, JSON_FORCE_OBJECT);

	echo $json;

}//Fin else




?>