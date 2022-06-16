<?php
    session_start();
    require '../controleur/connexion_bdd.php';
    require '../modele/marchandiseManager.php';
    require '../modele/authentificationManager.php';
    $marchandiseManager = new MarchandiseManager($bdd);
    $authentificationManager = new authentificationManager($bdd);
    $authentifications = $authentificationManager->getAll();
    $marchandises = $marchandiseManager->getAll();
    
    if(isset($_POST['new_marchandise'])) {
        $id_authentification;
        $marchandiseEstDejaPresent = false;

        foreach ($marchandises as $_marchandise){
            if ($_anime->getNom_marchandise() == $_POST['nom_marchandise']) {
                $marchandiseEstDejaPresent = true;
            }
        }

        foreach ($authentifications as $authentification){
            if ($_SESSION['login'] == $authentification->getLogin()) {
                $id_authentification = $authentification->getId_authentification();
            }
        }

        if ($marchandiseEstDejaPresent) {
            $_SESSION['error_addMarchandise'] = 'Erreur : Marchandise déjà présente en base de données !';
            header('location:../vue/ajouter.php?id=<php echo $id_authentification?>');
            die();
        }
        
        else {
            $data = [
                'nom_marchandise' => $_POST['nom_marchandise'],
            ];
            
            $marchandise = new Marchandise();
            $marchandise->hydrate($data);
            $marchandiseManager->add($marchandise);

            header("Location: ../vue/marchandises.php");
            die();
        }     
    }
?>