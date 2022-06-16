<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Projet - J.S. DISTROFF</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../IconeClub/iconeClubSansFond.png" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="ressource/css/all.css" rel="stylesheet"> <!--Chargement des images -->
        <!--<link href="ressource/css/bootstrap.min.css" rel="stylesheet">-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" media="screen and (min-width:769px)" href="ressource/css/style.css" />
        <link rel="stylesheet" media="screen and (max-width:768px)" href="ressource/css/mobile.css" />
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
                    <li class="nav-mobile__social"><a  alt="Facebook" title="Facebook" href="https://www.facebook.com/JSDistroff"><i class="fab fa-facebook-square fa-4x facebook"></i></a></li>
                    <li class=""><a  alt="Twitter" title="Twitter" href="https://twitter.com/home"><i class="fab fa-twitter-square fa-4x twitter"></i></a></li>
                    <li class=""><a  alt="YouTube" title="YouTube" href="https://www.youtube.com"><i class="fab fa-youtube-square fa-4x youtube"></i></a></li>
                </ul>
            </nav>
        </div>
        <div class="topMenu"></div>
        <header class="header">
            <div class="header-content">
                <div class="header-logo"> <!--Classe pour le logo-->
                    <img src="../../IconeClub/iconeClubBlanc.jpg">   
                </div>
            <div class="header-title"> <!--Titre-->
                <h1 id="titre"></h1>
            </div>
            <div class="header-btnConnexion">
            <a href="../connexion.php"><button type="button" class="btn btn-primary mb-2 fa-solid"><i class="fa-solid fa-power-off"></i>Connexion</button></a>
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
              <div class="content"><!--Corps de la page-->
                
              </div>
          </div>

<!-- REQUETES PHP POUR LES PERSONNES -->
<div class="col-12">
	<a class="btn btn-primary" href="match_create.php">
		<i class="fa-solid fa-circle-plus"></i> Créer un match
	</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
        <th scope="col">Date et heure du match</th>
        <th scope="col">Lieu</th>
        <th scope="col">Equipe 1</th>
        <th scope="col">Equipe 2</th>
        <th scope="col">Score de l'équipe 1</th>
        <th scope="col">Score de l'équipe 2</th>
        <th class="text-center">Modifier</th>
		<th class="text-center">Supprimer</th>
    </tr>
  </thead>
<!-- REQUETE SQL -->
    <?php
		foreach($matchs as $match){
	?>
    <tr>
        <th scope="row">
        <td><?php echo $matchs['date_heure_match'];?></td>
		<td><?php echo $matchs['lieu'];?></td>
        <td><?php echo $matchs['equipe1'];?></td>
		<td><?php echo $matchs['equipe2'];?></td>
        <td><?php echo $matchs['score1'];?></td>
        <td><?php echo $matchs['score2'];?></td>
		<td><a href="match_update.php">M</a></td>
        <td><a href="#">S</a></td>
		</th>
    </tr>
	<?php
		}
	?>
    </tbody>
	</table>

<!-- HTML bas de page -->
<script src="script.js" async defer></script>
    </body>
    <footer class="footer">
        <div class="footer-logo">
            <div class="reseau">
                <a  alt="YouTube" title="YouTube" href="https://www.youtube.com"><i class="fab fa-youtube-square fa-4x youtube"></i></a>
                <a  alt="Twitter" title="Twitter" href="https://twitter.com/home"><i class="fab fa-twitter-square fa-4x twitter"></i></a>
                <a  alt="Facebook" title="Facebook" href="https://www.facebook.com/JSDistroff"><i class="fab fa-facebook-square fa-4x facebook"></i></a>
            </div>
        </div>
    </footer>    
</html>