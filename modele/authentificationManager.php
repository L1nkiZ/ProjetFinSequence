<?php

    require '../modele/authentificationClass.php';

    class AuthentificationManager{

        private $bdd;


        public function __construct(PDO $bdd){
            $this->setDb($bdd);
        }


        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }


        public function add(Authentification $authentification){
            $hashedMot_de_passe = password_hash($authentification->getMot_de_passe(), PASSWORD_BCRYPT);
            $authentification->setMot_de_passe($hashedMot_de_passe);
            
            if ($this->isAlreadyExist($authentification) === false){
                try{
                    $req = $this->bdd->prepare('INSERT INTO authentification(id_authentification, login, mot_de_passe, adresse_recuperation) VALUES(:id_authentification, :login, :mot_de_passe, :adresse_recuperation)');
                    $req->bindValue(':id_authentification', $authentification->getIdAuthentification(), PDO::PARAM_STR);
                    $req->bindValue(':login', $authentification->getLogin(), PDO::PARAM_STR);
                    $req->bindValue(':mot_de_passe', $authentification->getMot_de_passe());
                    $req->bindValue(':adresse_recuperation', $authentification->getAdresse_recuperation(), PDO::PARAM_STR);

                    $req->execute();
                    return true;
                }
                catch(Exception $e){
                    die('Erreur : '.$e->getMessage());
                }
            }
            else{
                echo 'Erreur : Login déjà utilisé !';
                return false;
            }
        }


        public function get(Authentification $authentification){
            $login = (String)$authentification->getLogin();

            $req = $this->bdd->prepare('SELECT * FROM authentification WHERE login = ?)');
            $req->execute(array($login));
            //PDO::FETCH_ASSOC retourne un tableau associatif indexé par le nom des champs
            // cf. documentation : https://www.php.net/manual/fr/pdostatement.fetch.php
            // pour d'autres types de FETCH !!!
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $authentification = new Authentification();
            $authentification->hydrate($donnees);

            return $authentification;
        }


        public function getById($id_authentification) {
            $id_authentification = (int)$id_authentification;
            
            $req = $this->bdd->prepare('SELECT * FROM authentification WHERE id_authentification = ?');
            $req->execute(array($id_authentification));
            $donnees = $req->fetch(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC retourne un tableau associatif indexé par le nom des champs
            $authentification = new Authentification();
            $authentification->hydrate($donnees);
            return $authentification;
        }


        public function getAll(){
            $authentifications = [];

            $req = $this->bdd->prepare('SELECT * FROM authentification');
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $authentification = new Authentification();
                $authentification->hydrate($donnees);
                $authentifications[] = $authentification;
            }
            return $authentifications;
        }


        public function updateWithoutPassword(Authentification $authentification){

            try{
                $req = $this->bdd->prepare('UPDATE authentification SET login = :login, adresse_recuperation = :adresse_recuperation WHERE id_authentification = :id_authentification');
                $req->bindValue(':id_authentification', $authentification->getIdAuthentification(), PDO::PARAM_INT);
                $req->bindValue(':login', $authentification->getLogin(), PDO::PARAM_STR);
                $req->bindValue(':adresse_recuperation', $authentification->getAdresse_recuperation());
                
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }


        public function updateWithPassword(Authentification $authentification){
            $hashedMot_de_passe = password_hash($authentification->getMot_de_passe(), PASSWORD_BCRYPT);
            $authentification->setMot_de_passe($hashedMot_de_passe);

            try{
                $req = $this->bdd->prepare('UPDATE authentification SET login = :login, mot_de_passe = :mot_de_passe, adresse_recuperation = :adresse_recuperation WHERE id_authentification = :id_authentification');
                $req->bindValue(':id_authentification', $authentification->getIdAuthentification(), PDO::PARAM_INT);
                $req->bindValue(':login', $authentification->getLogin(), PDO::PARAM_STR);
                $req->bindValue(':mot_de_passe', $authentification->getMot_de_passe(), PDO::PARAM_STR);
                $req->bindValue(':adresse_recuperation', $authentification->getAdresse_recuperation());
                
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }


        public function delete(Authentification $authentification){
            $this->bdd->exec('DELETE FROM authentification WHERE id_authentification = ' . $authentification->getIdAuthentification() );
        }
        

        public function login($login, $mot_de_passe){

            $req = $this->bdd->prepare('SELECT mot_de_passe FROM authentification WHERE login = :login');
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->execute();

            if($donnees = $req->fetch(PDO::FETCH_ASSOC)){

                if(password_verify($mot_de_passe, $donnees['mot_de_passe'])){
                    $req2 = $this->bdd->prepare('SELECT * FROM authentification WHERE login = :login');
                    $req2->bindValue(':login', $login, PDO::PARAM_STR);
                    $req2->execute();
                    
                    if($donnees = $req2->fetch(PDO::FETCH_ASSOC)){
                        $authentification = new Authentification();
                        $authentification->hydrate($donnees);
                        return $authentification;
                    }
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }


        public function isAlreadyExist(Authentification $authentification){
            $alreadyexist = false;
            $dbauthentifications = $this->getAll();
            foreach ($dbauthentifications as $dbauthentification){
                if ($dbauthentification->getLogin() === $authentification->getLogin()){
                    $alreadyexist = true;
                }
            }
            return $alreadyexist;
        }
    }
?>