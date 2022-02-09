<?php 
session_start();

?>
<!DOCTYPE html>
<html>

    <!--head-->
    <head>
        <meta charset="utf-8">
        <title>Haaze</title>

        <!--CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
        <link rel="stylesheet" href="css/style_accueil.css">
        <!--CSS-->

        <!--fonts-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <!--fonts-->

    </head>
    <!--head-->

    <!--body-->
    <body>
        

        <!--header-->
        <div class="block">
            <header class="header">
                <a href="accueil.php"><img src="img/logo.png" alt="logo" class="header-logo"></a>
                <input class="input" type="text" placeholder="Rechercher">
                <a class="button"><span class="icon"><i class="fas fa-search"></i></span></a>
                <nav class="header-menu">
                    <a href="#" class="is-size-7-mobile"><img src="img/icon_accueil.png" alt="icon accueil" class="header-icon"></a>
                    <a href="page_messages.php" class="is-size-7-mobile"><img src="img/icon_message.png" alt="icon message" class="header-icon"></a>
                    <a href="page_notifications.php" class="is-size-7-mobile"><img src="img/icon_notif.png" alt="icon notification" class="header-icon"></a>
                    <a href="page_profil.php" class="is-size-7-mobile"><img src="<?php echo($_SESSION["avatar"]); ?>" alt="img profil" class="header-icon profil"></a>
                    <a class="button btn_publ" href="deco.php">déconnexion</a>
                </nav>
            </header>
        </div>
        <!--header-->

        <div class="columns is-desktop">
            <div class="column is-3 left">
                <div class="box">
                    <img src="<?php echo($_SESSION["avatar"]); ?>" alt="img profil" class="header-icon profil profil-img"> 
                    <div>
                        <div class="profil-nom">
                            <p class="heading"><?php echo($_SESSION["nom"]." ".$_SESSION["prenom"]); ?></p>
                            <p class="title"><?php echo($_SESSION["moyenne"]); ?><img src="img/logo_1.png" alt="aze" class="aze"></p>
                        </div>
                        <a href="maintenance.html" class="is-size-7-mobile"><img src="img/icon_ami.png" alt="icon ami" class="profil-icon"></a>
                        <a href="page_avantages.php" class="is-size-7-mobile"><img src="img/icon_avant.png" alt="icon avantage" class="profil-icon"></a>
                        <a href="page_notes.php" class="is-size-7-mobile"><img src="img/logo_1.png" alt="icon note" class="profil-icon"></a>
                        <a href="page_statistiques.php" class="is-size-7-mobile"><img src="img/icon_stat.png" alt="icon statistique" class="profil-icon"></a>
                    </div>
                </div>
            </div>
            <div class="column is-6 middle">
                <div class="box form-publ">
                    <img src="<?php echo($_SESSION["avatar"]); ?>" alt="img profil" class="profil form-img"> 
                    <input class="input form_txt" id="publier"type="text" placeholder="Votre Texte">
                     <a class="button btn_publ" id="bouton">Publier</a>
                     <a class="button btn_publ" id="actualiser">Actualiser </a>

                </div>


                <div id="affichage"></div>
            </div>
            <div class="column is-3 right">
                <div class="box">
                    <p id="sugg">Suggestion pour vous</p>
                    <p id="dis1"><img class="ami" src="img/Profil2.png">Lucie
                        4.8<img class="aze"src="img/logo_1.png"> </p>
                    <p id="dis2"><img class="ami" src="img/Profil5.png">Emilie
                        3.2<img class="aze"src="img/logo_1.png"> </p>
                    <p id="dis3"><img class="ami" src="img/Profil6.png">Chris
                        2.8<img class="aze" src="img/logo_1.png"> </p>
                       
                       
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src='js/publi.js'></script>
        <script src='js/postpubli.js'></script>

        
    </body>
    <!--body-->
</html>