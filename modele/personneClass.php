<?php
    class Personne{
        private  $id_personne;
        private  $nom;
        private  $prenom;
        private  $adresse_postale;
        private  $adresse_mail;
        private  $tel;
        private  $id_sexe;
        private  $id_taille;
        private  $date_naissance;

        // Getters & Setters
        
        public function getId_personne(){return $this->id_personne;}
        public function getNom(){return $this->nom;}
        public function getPrenom(){return $this->prenom;}
        public function getAdresse_postale(){return $this->adresse_postale;}
        public function getAdresse_mail(){return $this->adresse_mail;}
        public function getTel(){return $this->tel;}
        public function getId_sexe(){return $this->id_sexe;}
        public function getId_taille(){return $this->id_taille;}
        public function getDate_naissance(){return $this->date_naissance;}

        public function setId_personne($id){
            $this->id_personne = (int)$id;
        }

        public function setNom($nom){
            $this->nom = $nom;
        }

        public function setPrenom($prenom){
            $this->prenom = $prenom;
        }

        public function setAdresse_postale($adresse_postale){
            $this->adresse_postale = $adresse_postale;
        }

        public function setAdresse_mail($adresse_mail){
            $this->adresse_mail = $adresse_mail;
        }

        public function setTel($tel){
            $this->tel = $tel;
        }

        public function setId_sexe($id_sexe){
            $this->id_sexe = $id_sexe;
        }

        public function setId_taille($id_taille){
            $this->id_taille = $id_taille;
        }

        public function setDate_naissance($date_naissance){
            $this->date_naissance = (int)$date_naissance;
        }

        public function hydrate(array $donnees){
            foreach($donnees as $key => $value){
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method) && $value != NULL){
                    $this->$method($value);
                }
            }
        }
    }
?>