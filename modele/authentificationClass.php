<?php
    class Authentification{

        private $id_authentification;
        private $login;
        private $mot_de_passe;
        private $adresse_recuperation;

        // Getters & Setters
        public function getIdAuthentification(){return $this->id_authentification;}
        public function getLogin(){return $this->login;}
        public function getMot_de_passe(){return $this->mot_de_passe;}
        public function getAdresse_recuperation(){return $this->adresse_recuperation;}

        public function setIdAuthentification($id){
            $this->idAuthentification = (int)$id;
        }

        public function setLogin($login){
            $this->login = $login;
        }

        public function setMot_de_passe($mot_de_passe){
            $this->mot_de_passe = $mot_de_passe;
        }

        public function setAdresse_recuperation($adresse_recuperation){
            $this->adresse_recuperation = $adresse_recuperation;
        }

        // Other functions
        public function hydrate(array $donnees){
            foreach($donnees as $key => $value){
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method) && $value != NULL){
                    $this->$method($value);
                }
            }
        }
    }
    $authentification = new Authentification();
?>