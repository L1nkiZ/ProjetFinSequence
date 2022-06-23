<?php
    class Marchandise{
        private  $id_marchandise;
        private  $nom_marchandise;

        // Getters & Setters
        
        public function getId_marchandise(){return $this->id_marchandise;}
        public function getNom_marchandise(){return $this->nom_marchandise;}

        public function setId_marchandise($id){
            $this->id_marchandise = (int)$id;
        }

        public function setNom_Marchandise($nom_marchandise){
            $this->nom_marchandise = $nom_marchandise;
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
?>