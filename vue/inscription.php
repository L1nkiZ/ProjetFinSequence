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
            <a id="home_link" href="./connexion.php"><button class="topnav_link fa-solid fa-power-off home_right btnConnectionMobile"></button></a>
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
            </div>
        </header>
          
        
          <div class="container">
              <div class="content"><!--Corps de la page-->
                
                <section class="vh-100">
                    <div class="container h-100">
                      <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-12 col-xl-11">
                          <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                              <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  
                                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">S'inscrire</p>
                  
                                  <form class="mx-1 mx-md-4">
                  
                                    <div class="d-flex flex-row align-items-center mb-4">
                                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                      <div class="form-outline flex-fill mb-0">
                                        <input type="text" id="form3Example1c" class="form-control" />
                                        <label class="form-label" for="form3Example1c">Nom</label>
                                      </div>
                                    </div>
                  
                                    <div class="d-flex flex-row align-items-center mb-4">
                                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                      <div class="form-outline flex-fill mb-0">
                                        <input type="text" id="form3Example1c" class="form-control" />
                                        <label class="form-label" for="form3Example1c">Prénom</label>
                                      </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                      <div class="form-outline flex-fill mb-0">
                                        <input type="email" id="form3Example3c" class="form-control" />
                                        <label class="form-label" for="form3Example3c">Adresse Email</label>
                                      </div>
                                    </div>
                  
                                    <div class="d-flex flex-row align-items-center mb-4">
                                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                      <div class="form-outline flex-fill mb-0">
                                        <input type="password" id="form3Example4c" class="form-control" />
                                        <label class="form-label" for="form3Example4c">Mot de passe</label>
                                      </div>
                                    </div>
                  
                                    <div class="d-flex flex-row align-items-center mb-4">
                                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                      <div class="form-outline flex-fill mb-0">
                                        <input type="password" id="form3Example4cd" class="form-control" />
                                        <label class="form-label" for="form3Example4cd">Confirmer votre mot de passe</label>
                                      </div>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                      <button type="button" class="btn btn-primary btn-lg">S'inscrire</button>
                                    </div>
                  
                                  </form>
                  
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                  
                                  <img src="https://t1.uc.ltmcdn.com/fr/posts/8/4/8/quelle_est_la_taille_d_un_terrain_de_football_12848_orig.jpg"
                                    class="img-fluid iconeInscription" alt="Sample image">
                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
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