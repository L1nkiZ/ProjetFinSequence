<?php
    require_once '../modele/authentificationManager.php';
    session_start();
    // require('../controleur/connexion_verification.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Projet - J.S. DISTROFF</title>
        <link rel="shortcut icon" type="image/x-icon" href="../IconeClub/iconeClubSansFond.png" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="ressource/css/all.css" rel="stylesheet"> <!--Chargement des images -->
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
            <a id="home_link" href="connexion.php"><button class="topnav_link fa-solid fa-power-off home_right btnConnectionMobile" href="connexion.html"></button></a>
        </a>
        <div class="topMenu"></div>


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
    
        <header class="header">
            <div class="header-content">
                <div class="header-logo"> <!--Classe pour le logo-->
                    <img src="../IconeClub/iconeClubBlanc.jpg">   
                </div>
            <div class="header-title"> <!--Titre-->
                <h1 id="titre"></h1>
            </div>
            <div class="header-btnConnexion">
              <form>
                  <a href="../index.php">
                      <button type="button" class="btn btn-primary mb-2 fa-solid"><i class="fa-solid fas fa-home"></i>Accueil</button>
                  </a>
              </form>   
            </div>
        </header>
        
          <div class="container">
              <div class="content"><!--Corps de la page-->

                <form>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <input type="email" id="form2Example1" class="form-control" />
                      <label class="form-label" for="form2Example1">Login (Adresse Email)</label>
                    </div>
                  
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example2" class="form-control" />
                      <label class="form-label" for="form2Example2">Mot de passe</label>
                    </div>
                  
                    <!-- 2 column grid layout for inline styling -->
                    <div class="row mb-4">
                      <div class="col d-flex justify-content-center">
                        <!-- Checkbox -->
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                          <label class="form-check-label" for="form2Example31"> Se souvenir de moi </label>
                        </div>
                      </div>
                  
                      <div class="col">
                        <!-- Simple link -->
                        <a href="#!">Mot de passe oubli???</a>
                      </div>
                    </div>
                  
                    <!-- Submit button -->
                    <a href="./vue_connecte.php"><button type="button" class="btn btn-primary btn-block mb-4">Connexion</button></a>
                  
                    <!-- Register buttons -->
                    <div class="text-center">
                      <p>Pas encore membre? <a href="./inscription.php">S'inscrire</a></p>
                    </div>
                  </form>
              </div>
          </div>

<!-- Verification authentification -->
<div class="error-container">
                    <p id="error" class="error">
                        <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                $_SESSION['email'] = $_POST['login'];
                                $_SESSION['password'] = $_POST['mot_de_passe'];
                                $_SESSION['keeplogged'] = $_POST['keeplogged'];
                                header("location:../controleur/connexion_bdd.php");
                                die();
                            }
                            if(isset($_SESSION['error_login'])){
                                echo '<br>'.$_SESSION['error_login'].'<br><br>';
                            }
                        ?>
                    </p>
                </div>

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