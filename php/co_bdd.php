<?php
try
{
// connection à la base
$bdd=new PDO('mysql:host=localhost;dbname=haaze','root','');

}
catch(Exception $e)
{
die('Erreur :'.$e->getMessage());
}





?>
