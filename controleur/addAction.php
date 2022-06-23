<?php
    session_start();
    require '../controleur/connexion_bdd.php';
    require '../modele/actionManager.php';
    require '../modele/authentificationManager.php';
    $actionManager = new ActionManager($bdd);
    $authentificationManager = new AuthentificationManager($bdd);
    $authenfications = $authentificationManager->getAll();
    $actions = $actionManager->getAll();
    
    if(isset($_POST['new_action'])) {
        $id_action;
        $actionEstDejaPresent = false;

        foreach ($actions as $_action){
            if ($_action->getId_action() == $_POST['id_action']) {
                $animeEstDejaPresent = true;
            }
        }

        foreach ($authenfications as $authentification){
            if ($_SESSION['login'] == $authentification->getLogin()) {
                $id_authentification = $authenfication->getId_authentification();
            }
        }

        if ($actionEstDejaPresent) {
            $_SESSION['error_addAction'] = 'Erreur : Action déjà présente en base de données !';
            header('location:../vue/ajouter.php?id=<php echo $id_authentification?>');
            die();
        }
        
        else {
            $data = [
                'date_echeance' => $_POST['date_echeance'],
                'statut_action' => $_POST['statut_action'],
            ];
            
            $action = new Action();
            $action->hydrate($data);
            $actionManager->add($action);

            header("Location: ../vue/actions.php");
            die();
        }     
    }
?>