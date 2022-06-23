<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Projet - J.S. DISTROFF</title>
    <link rel="shortcut icon" type="image/x-icon" href="../IconeClub/iconeClubSansFond.png" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../ressource/css/all.css" rel="stylesheet">
    <!--Chargement des images -->
    <!--<link href="ressource/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" media="screen and (min-width:769px)" href="../ressource/css/style.css" />
    <link rel="stylesheet" media="screen and (max-width:768px)" href="../ressource/css/mobile.css" />
</head>

<body>
    <div id="topnavMobile" class="topnavMobile">
        <a id="topnav_hamburger_icon" href="javascript:void(0);" onclick="showResponsiveMenu()">
            <!-- 3 Span pour afficher les barres du menu Hamburger -->
            <span></span>
            <span></span>
            <span></span>
            <a id="home_link"><button class="topnav_link fa-solid fa-power-off home_right btnConnectionMobile" href="/"></button></a>
        </a>


        <!-- Responsive Menu -->
        <nav role="navigation" id="topnav_responsive_menu">
            <ul>
                <li><a class="fa-solid fa-futbol" href="LeClub"> Le Club</a></li>
                <li><a class="fa-solid fa-handshake" href="Sponsors"> Sponsors</a></li>
                <li><a class="fa-solid fa-cart-shopping" href="Boutique"> Boutique</a></li>
                <li><a class="fa-solid fa-file-pen" href="CGU"> CGU</a></li>
                <li class="nav-mobile__social"><a alt="Facebook" title="Facebook" href="https://www.facebook.com/JSDistroff"><i class="fab fa-facebook-square fa-4x facebook"></i></a></li>
                <li class=""><a alt="Twitter" title="Twitter" href="https://twitter.com/home"><i class="fab fa-twitter-square fa-4x twitter"></i></a></li>
                <li class=""><a alt="YouTube" title="YouTube" href="https://www.youtube.com"><i class="fab fa-youtube-square fa-4x youtube"></i></a></li>
            </ul>
        </nav>
    </div>
    <div class="topMenu"></div>
    <header class="header">
        <div class="header-content">
            <div class="header-logo">
                <!--Classe pour le logo-->
                <img src="../IconeClub/iconeClubBlanc.jpg">
            </div>
            <div class="header-title">
                <!--Titre-->
                <h1 id="titre"></h1>
            </div>
            <div class="header-btnConnexion">
                <button type="button" class="btn btn-primary mb-2 fa-solid"><i class="fa-solid fa-power-off"></i> Connexion</button>
            </div>
        </div>
    </header>

    <div id="topnavPC" class="topnavPC">

        <!-- Menu PC -->
        <nav role="navigation" id="topnav_menu">
            <a class="topnavPC_link fa-solid fa-futbol" href="/Club"> Le Club</a>
            <a class="topnavPC_link fa-solid fa-handshake" href="Sponsors"> Sponsors</a>
            <a class="topnavPC_link fa-solid fa-cart-shopping" href="Boutique"> Boutique</a>
            <a class="topnavPC_link fa-solid fa-file-pen" href="CGU"> CGU</a>
        </nav>
    </div>


    <div class="container">
        <div class="content">
            <!--Corps de la page-->
            <h3>Veuillez sélectionner dans le tableau l'item que vous souhaitez consulter :</h3>
            <br><br><br>
            <ul class="list-group">
                <li class="list-group-item"><a href="actions.php"><i class="fa-solid fa-check" >  Actions</i></a></li>
                <li class="list-group-item"><a href="marchandises.php"><i class="fa-solid fa-bag-shopping">  Marchandises</i></a></li>
                <li class="list-group-item"><a href="matchs.php"><i class="fa-solid fa-futbol">  Matchs</i></a></li>
                <li class="list-group-item"><a href="personnes.php"><i class="fa-solid fa-person">  Personnes</i></a></li>
            </ul>
        </div>
    </div>

    <script src="../script.js" async defer></script>
</body>
<footer class="footer">
    <div class="footer-logo">
        <div class="reseau">
            <a alt="YouTube" title="YouTube" href="https://www.youtube.com"><i class="fab fa-youtube-square fa-4x youtube"></i></a>
            <a alt="Twitter" title="Twitter" href="https://twitter.com/home"><i class="fab fa-twitter-square fa-4x twitter"></i></a>
            <a alt="Facebook" title="Facebook" href="https://www.facebook.com/JSDistroff"><i class="fab fa-facebook-square fa-4x facebook"></i></a>
        </div>
    </div>
</footer>

</html>