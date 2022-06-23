<?php
    session_start();
    require '../controleur/connexion_bdd.php';
    require '../modele/personneManager.php';
    require '../modele/authentificationManager.php';
    $personneManager = new PersonneManager($bdd);
    $authentificationManager = new AuthentificationManager($bdd);
    $authentifications = $authentificationManager->getAll();
    $personnes = $personneManager->getAll();
    
    if(isset($_POST['new_personne'])) {
        $id_authentification;
        $personneEstDejaPresent = false;

        foreach ($personnes as $_personne){
            if ($_personne->getNom() == $_POST['nom'] && $_personne->getPrenom() == $_POST['prenom']) {
                $personneEstDejaPresent = true;
            }
        }

        foreach ($authentifications as $authentification){
            if ($_SESSION['login'] == $user->getLogin()) {
                $id_authentification = $authentification->getId_authentification();
            }
        }

        if ($personneEstDejaPresent) {
            $_SESSION['error_addPersonne'] = 'Erreur : Personne déjà présente dans la base de données !';
            header('location:../vue/ajouter.php?id=<php echo $id_authentification?>');
            die();
        }
        
        else {
            $data = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'adresse_postale' => $_POST['adresse_postale'],
                'adresse_mail' => $_POST['adresse_mail'],
                'tel' => $_POST['tel'],
                'id_sexe' => $_POST['id_sexe'],
                'id_taille' => $_POST['id_taille'],
                'date_naissance' => $_POST['date_naissance'],
            ];
            
            $personne = new Personne();
            $personne->hydrate($data);
            $personneManager->add($personne);

            header("Location: ../vue/personnes.php");
            die();
        }     
    }
?>