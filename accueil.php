<?php 
session_start();

?>
<!DOCTYPE php>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Connexion-Haaze</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/publi.css'>

</head>
<body>
    <h1>Page accueil </h1>
    <p>
        pseudo du compte = <?php echo($_SESSION["pseudo"]); ?>
        Id du compte = <?php echo($_SESSION["id"]); ?>
    </p>
    <p><a href="deco.php">Se déco</a></p>
    <textarea id="publier"></textarea>
    <input type="button" id="bouton" value="envoyer">
    <div id="affichage">

    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src='js/publi.js'></script> 
</body>
</html>