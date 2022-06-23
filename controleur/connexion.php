<?php
    require_once '../controleur/connexion_bdd.php';
    require_once '../modele/authentificationManager.php';
    session_start();
    $authentificationManager = new AuthentificationManager($bdd);

    if(     isset($_SESSION['login']) && isset($_SESSION['mot_de_passe'])    ){
        if($authentification = $authentificationManager->login($_SESSION['login'], $_SESSION['mot_de_passe'])){
            $_SESSION['authentification'] = $authentification;
            $_SESSION['logged_in'] = true;
            $_SESSION['error_login'] = "";

            header('location:../index.php');
            die();
        }
        else{
            session_unset();
            $_SESSION['error_login'] = 'Identifiant ou mot de passe incorrect(s) OU utilisateur inexistant !';
            header('location:../index.php');
            die();
        } 
    }
    else{
        $_SESSION['error_login'] = 'Veuillez remplir le formulaire !';
        header('location:../index.php');
        die();
    }
?>