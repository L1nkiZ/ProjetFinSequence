<?php
    require '../modele/marchandiseClass.php';

    class MarchandiseManager{
        
        private $bdd;
        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }


        public function __construct(PDO $bdd){
            $this->setDb($bdd);
        }


        public function add(Marchandise $marchandise){
            
            if ($this->isAlreadyExist($marchandise) === false){

                try{
                    $req = $this->bdd->prepare('INSERT INTO marchandise(id_marchandise, nom_marchandise)
                                                VALUES(:id_marchandise, :nom_marchandise)');
                    $req->bindValue(':nom_marchandise', $marchandise->getNom_marchandise(), PDO::PARAM_STR);
                    $req->execute();
                    return true;
                }
                catch(Exception $e){
                    die('Erreur : '.$e->getMessage());
                }
            }
            else{
                echo 'Erreur : Marchandise déjà présente en base de données !';
                return false;
            }
        }


        public function get(Marchandise $marchandise){
            $titre_fr = (String)$marchandise->getNom_marchandise();

            $req = $this->bdd->prepare('SELECT * FROM marchandise WHERE nom_marchandise = ?)');
            $req->execute(array($titre_fr));
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $marchandise = new marchandise();
            $marchandise->hydrate($donnees);

            return $marchandise;
        }


        public function getById($id_marchandise) {
            $id_marchandise = (int)$id_marchandise;
            
            $req = $this->bdd->prepare('SELECT * FROM marchandise WHERE id_marchandise = ?');
            $req->execute(array($id_marchandise));
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $marchandise = new Marchandise();
            $marchandise->hydrate($donnees);
            return $marchandise;
        }


        public function getAll(){
            $marchandises = [];

            $req = $this->bdd->prepare('SELECT * FROM marchandise ORDER BY nom_marchandise');
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $marchandise = new marchandise();
                $marchandise->hydrate($donnees);
                $marchandises[] = $marchandise;
            }
            return $marchandises;
        }


        public function getAllByNomMarchandise(String $marchandise){
            $marchandises = [];

            $req = $this->bdd->prepare('SELECT * FROM marchandise WHERE nom_marchandise LIKE :nom_marchandise ORDER BY nom_marchandise');
            $req->bindValue(':nom_marchandise', PDO::PARAM_STR);
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $marchandise = new marchandise();
                $marchandise->hydrate($donnees);
                $marchandises[] = $marchandise;
            }
            return $marchandises;
        }

        public function update(Marchandise $marchandise){

            try{
                $req = $this->bdd->prepare('UPDATE marchandise SET nom_marchandise = :nom_marchandise WHERE id_marchandise = :id_marchandise');
                $req->bindValue(':id_marchandise', $marchandise->getId_marchandise(), PDO::PARAM_INT);    
                $req->bindValue(':nom_marchandise', $marchandise->getNom_marchandise(), PDO::PARAM_STR);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }

        public function delete(Marchandise $marchandise){
            try {
                $req = $this->bdd->prepare( 'DELETE FROM marchandise WHERE id_marchandise = :id_marchandise');
                $req->bindValue(':id_marchandise', $marchandise->getId_marchandise(), PDO::PARAM_INT);
                $req->execute();
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }


        public function isAlreadyExist(Marchandise $marchandise){
            $alreadyexist = false;
            $dbmarchandises = $this->getAll();
            foreach ($dbmarchandises as $dbmarchandise){
                if ($dbmarchandise->getNom_marchandise() === $marchandise->getNom_marchandise()){
                    $alreadyexist = true;
                }
            }
            return $alreadyexist;
        }
    }
?>