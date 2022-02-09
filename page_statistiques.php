<?php 
session_start();

?>
<!DOCTYPE html>
<html>

    <!--head-->
    <head>
        <meta charset="utf-8">
        <title>Haaze_statistiques</title>

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
                    <a href="accueil.php" class="is-size-7-mobile"><img src="img/icon_accueil.png" alt="icon accueil" class="header-icon"></a>
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
            <div class="column is-9 middle">
                <div class="box form-publ">
                    <img src="img/stats.png" alt="img profil" class="avantage"> 
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </body>
    <!--body-->
</html>