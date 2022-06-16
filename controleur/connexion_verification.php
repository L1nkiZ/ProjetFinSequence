<?php
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
        session_unset();
        $_SESSION['error_login'] = 'Authentification requise pour accéder à cette page!';
        header('location:../index.php');
        die();
    }
?>