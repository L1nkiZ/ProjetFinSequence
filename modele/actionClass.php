<?php
    class Action{
        private  $id_action;
        private  $date_echeance;
        private  $statut_action;
        private  $id_type_action;

        // Getters & Setters
        
        public function getId_action(){return $this->id_action;}
        public function getDate_echeance(){return $this->date_echeance;}
        public function getStatut_action(){return $this->statut_action;}
        public function getId_type_action(){return $this->id_type_action;}

        public function setId_action($id){
            $this->id_action = (int)$id;
        }

        public function setDate_echeance($date_echeance){
            $this->date_echeance = $date_echeance;
        }

        public function setStatut_action($statut_action){
            $this->statut_action = $statut_action;
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