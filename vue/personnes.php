<?php
try {
    $dsn = 'mysql:host=localhost;dbname=football7;port=3306;charset=utf8';
    $bdd = new PDO($dsn,"root","");
} catch(PDOException $exception) {
    exit("Erreur de connexion à la base de données".$exception->getMessage());
                        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Projet - J.S. DISTROFF</title>
        <link rel="shortcut icon" type="image/x-icon" href="../../IconeClub/iconeClubSansFond.png" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../ressource/css/all.css" rel="stylesheet"> <!--Chargement des images -->
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
                    <img src="../IconeClub/iconeClubBlanc.jpg">   
                </div>
            <div class="header-title"> <!--Titre-->
                <h1 id="titre"></h1>
            </div>
            <div class="header-btnConnexion">
            <a href="../vue/connexion.php"><button type="button" class="btn btn-primary mb-2 fa-solid"><i class="fa-solid fa-power-off"></i>Connexion</button></a>
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
          
        
<div class="container_personne">
<div class="content_personne"><!--Corps de la page-->
                <!-- REQUETES PHP POUR LES PERSONNES -->
<!-- <table class="table table-striped"> -->
<table class="table">
  <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">Date de Naissance</th>
        <th scope="col">Adresse</th>
        <th scope="col">Email</th>
        <th scope="col">Téléphone</th>
        <!-- <th scope="col">Sexe</th>
        <th scope="col">Taille</th>
        <th scope="col">Mineur</th> -->
        <!-- <th scope="col">Paiement</th>
        <th scope="col">Statut</th> -->
        <th scope="col">Modifier</th>
		<th scope="col">Supprimer</th>
    </tr>
  	</thead>
<!-- REQUETE SQL -->
    <?php
    // $user="SELECT * FROM personne, sexe, taille, responsabilite_legale, roles WHERE personne.id_sexe = sexe.id_sexe AND personne.id_taille = taille.id_taille AND personne.id_personne = paiement.id_personne AND personne.id_personne = roles.id_personne";
    // $select=$sql->query($user);
	//foreach($personnes as $personne){
        $query = $bdd->query("SELECT * FROM personne");
        
        // , sexe, taille, responsabilite_legale, roles WHERE personne.id_sexe = sexe.id_sexe AND personne.id_taille = taille.id_taille AND personne.id_personne = paiement.id_personne AND personne.id_personne = roles.id_personne");
        $resultat = $query->fetchAll();
        foreach($resultat as $key => $personne) { ?>
    <tr>
        <th scope="row"><?php // echo $personne['id_personne'];?>#</th>
        <td><?php $personne["nom"];?></td>
		<td><?php $personne["prenom"];?>TEST</td>
        <td><?php $personne["date_naissance"];?>25/12/1990</td>
		<td><?php $personne["adresse_postale"];?>5 rue des Lilas 57000 METZ</td>
        <td><?php $personne["adresse_mail"];?>test@test.fr</td>
        <td><?php $personne["tel"];?>0610101010</td>
        <!-- <td><?php //$sexe['designation_sexe'];?></td>
        <td><?php //$taille['designation_taille'];?></td>
        <td><?php //echo $paiement['montant'];?></td>
        <td><?php //echo $taille['designation_taille'];?></td>
		<td><?php // if ($roles['id_statut'] == 1) { echo "dirigeant"; } else { echo "licencié";} ?></td> -->
		<td><a href="personne_update.php" class="text-center">M</a></td>
        <td><a href="#">S</a></td>
    </tr>
    <?php } ?>
	</table>
    </div>
</div>



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