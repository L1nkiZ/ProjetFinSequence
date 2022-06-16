<?php
    class Matchs{
        private  $id_match;
        private  $date_heure_match;
        private  $lieu;
        private  $equipe1;
        private  $equipe2;
        private  $score1;
        private  $score2;

        // Getters & Setters
        
        public function getId_match(){return $this->id_match;}
        public function getDate_heure_match(){return $this->date_heure_match;}
        public function getLieu(){return $this->lieu;}
        public function getEquipe1(){return $this->equipe1;}
        public function getEquipe2(){return $this->equipe2;}
        public function getScore1(){return $this->score1;}
        public function getScore2(){return $this->score2;}

        public function setId_match($id){
            $this->id_match = (int)$id;
        }

        public function setDate_heure_match($date_heure_match){
            $this->date_heure_match = $date_heure_match;
        }

        public function setLieu($lieu){
            $this->lieu = $lieu;
        }

        public function setEquipe1($equipe1){
            $this->equipe1 = $equipe1;
        }

        public function setEquipe2($equipe2){
            $this->equipe2 = $equipe2;
        }

        public function setScore1($score1){
            $this->score1 = $score1;
        }

        public function setScore2($score2){
            $this->score2 = $score2;
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