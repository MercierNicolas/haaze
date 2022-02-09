<?php
session_start();
$id=$_SESSION["id"];
include("co_bdd.php");


if (!empty($_POST["avatar"])) {
	if ($_POST["avatar"] == 1) {
		$avatar = "img/avatar/Profil1.png";
	}elseif($_POST["avatar"] == 2){
		$avatar = "img/avatar/Profil2.png";
	}elseif($_POST["avatar"] == 3){
		$avatar = "img/avatar/Profil3.png";
	}elseif($_POST["avatar"] == 4){
		$avatar = "img/avatar/Profil4.png";
	}elseif($_POST["avatar"] == 5){
		$avatar = "img/avatar/Profil5.png";
	}elseif($_POST["avatar"] == 6){
		$avatar = "img/avatar/Profil6.png";
	}
	$modifAvatar= $bdd->prepare("UPDATE compte SET avatar = ? WHERE Id= ?");
	$modifAvatar->execute(array($avatar,$id));
	$_SESSION["avatar"]= $avatar;





}












?>