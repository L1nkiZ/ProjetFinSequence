<?php
    session_start();
    require '../controleur/connexion_bdd.php';
    require '../modele/matchManager.php';
    require '../modele/authentificationManager.php';
    $matchManager = new MatchManager($bdd);
    $authentificationManager = new AuthentificationManager($bdd);
    $authentifications = $authentificationManager->getAll();
    $matchs = $matchManager->getAll();
    
    if(isset($_POST['new_match'])) {
        $id_authentification;
        $matchEstDejaPresent = false;

        foreach ($matchs as $_match){
            if ($_match->getDate_heure_match() == $_POST['date_heure_match']) {
                $matchEstDejaPresent = true;
            }
        }

        foreach ($matchs as $match){
            if ($_SESSION['login'] == $authentification->getLogin()) {
                $id_authentification = $authentification->getId_authentification();
            }
        }

        if ($matchEstDejaPresent) {
            $_SESSION['error_addMatch'] = 'Erreur : Match est déjà présent dans la base de données !';
            header('location:../vue/ajouter.php?id=<php echo $id_authentification?>');
            die();
        }
        
        else {
            $data = [
                'date_heure_match' => $_POST['date_heure_match'],
                'lieu' => $_POST['lieu'],
                'equipe1' => $_POST['equipe1'],
                'equipe2' => $_POST['equipe2'],
                'score1' => $_POST['score1'],
                'score2' => $_POST['score2'],
            ];
            
            $matchs = new Matchs();
            $matchs->hydrate($data);
            $matchManager->add($match);

            header("Location: ../vue/matchs.php");
            die();
        }     
    }
?>