<?php
    require '../modele/personneClass.php';

    class PersonneManager{
        
        private $bdd;
        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }


        public function __construct(PDO $bdd){
            $this->setDb($bdd);
        }


        public function add(Personne $personne){
            
            if ($this->isAlreadyExist($personne) === false){
                try{
                    $req = $this->bdd->prepare('INSERT INTO personne(nom, prenom, adresse_postale, adresse_mail, tel, id_sexe, id_taille, date_naissance)
                                                VALUES(:nom, :prenom, :adresse_postale, :adresse_mail, :tel, :id_sexe, :id_taille, :date_naissance)');
                    $req->bindValue(':nom', $personne->getNom(), PDO::PARAM_STR);
                    $req->bindValue(':prenom', $personne->getPrenom(), PDO::PARAM_STR);
                    $req->bindValue(':adresse_postale', $personne->getAdresse_postale(), PDO::PARAM_STR);
                    $req->bindValue(':adrese_mail', $personne->getAdresse_mail(), PDO::PARAM_INT);
                    $req->bindValue(':tel', $personne->getTel(), PDO::PARAM_STR);
                    $req->bindValue(':id_sexe', $personne->getId_sexe(), PDO::PARAM_STR);
                    $req->bindValue(':id_taille', $personne->getId_taille(), PDO::PARAM_STR);
                    $req->bindValue(':date_naissance', $personne->getDate_naissance(), PDO::PARAM_INT);
                    $req->execute();
                    return true;
                }
                catch(Exception $e){
                    die('Erreur : '.$e->getMessage());
                }
            }
            else{
                echo 'Erreur : Personne déjà présente dans la base de données !';
                return false;
            }
        }


        public function getNom(Personne $personne){
            $nom = (String)$personne->getNom();

            $req = $this->bdd->prepare('SELECT * FROM personne WHERE nom = ?)');
            $req->execute(array($nom));
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $personne = new personne();
            $personne->hydrate($donnees);

            return $personne;
        }

        public function getPrenom(Personne $personne){
            $prenom = (String)$personne->getPrenom();

            $req = $this->bdd->prepare('SELECT * FROM personne WHERE prenom = ?)');
            $req->execute(array($prenom));
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $personne = new personne();
            $personne->hydrate($donnees);

            return $personne;
        }

        public function getById($id_personne) { // on s'assure que $id est bien un int
            $id_personne = (int)$id_personne;
            
            $req = $this->bdd->prepare('SELECT * FROM personne WHERE id_personne = ?');
            $req->execute(array($id_personne));
            $donnees = $req->fetch(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC retourne un tableau associatif indexé par le nom des champs
            $personne = new personne();
            $personne->hydrate($donnees);
            return $personne;
        }


        public function getAll(){
            $personnes = [];

            $req = $this->bdd->prepare('SELECT * FROM personne ORDER BY nom');
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $personne = new personne();
                $personne->hydrate($donnees);
                $personnes[] = $personne;
            }
            return $personnes;
        }


        public function getAllById_sexe(int $id_sexe){
            $personnes = [];

            $req = $this->bdd->prepare('SELECT * FROM personne WHERE nom LIKE :nom OR prenom LIKE :prenom OR adresse_postale LIKE :adresse_postale OR adresse_mail LIKE :adresse_mail OR tel LIKE :tel OR id_taille LIKE :id_taille OR date_naissance LIKE :date_naissance ORDER BY id_sexe');
            $req->bindValue(':id_sexe', PDO::PARAM_STR);
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $personne = new personne();
                $personne->hydrate($donnees);
                $personnes[] = $personne;
            }
            return $personnes;
        }
        
        
        public function getAllID_taille(String $id_taille){
            $personnes = [];
            $regexLIKE = '%'.$id_taille.'%';

            $req = $this->bdd->prepare('SELECT * FROM personne WHERE nom LIKE :nom OR prenom LIKE :prenom OR adresse_postale LIKE :adresse_postale OR adresse_mail LIKE :adresse_mail OR tel LIKE :tel OR id_taille LIKE :id_taille OR date_naissance LIKE :date_naissance ORDER BY id_taille');
            $req->execute(array($regexLIKE));
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $personne = new personne();
                $personne->hydrate($donnees);
                $personnes[] = $personne;
            }
            return $personnes;
        }


        public function update(Personne $personne){

            try{
                $req = $this->bdd->prepare('UPDATE personne SET nom = :nom, prenom = :prenom, adresse_postale = :adresse_postale, adresse_mail = :adresse_mail, tel =:tel, id_sexe = :id_sexe, id_taille = :id_taille, date_naissance = :date_naissance WHERE id_personne = :id_personne');
                $req->bindValue(':id_personne', $personne->getId_personne(), PDO::PARAM_INT);    
                $req->bindValue(':nom', $personne->getNom(), PDO::PARAM_STR);
                $req->bindValue(':prenom', $personne->getPrenom(), PDO::PARAM_STR);
                $req->bindValue(':adresse_postale', $personne->getAdresse_postale(), PDO::PARAM_STR);
                $req->bindValue(':adresse_mail', $personne->getAdresse_mail(), PDO::PARAM_INT);
                $req->bindValue(':id_sexe', $personne->getId_sexe(), PDO::PARAM_STR);
                $req->bindValue(':id_taille', $personne->getId_taille(), PDO::PARAM_STR);
                $req->bindValue(':date_naissance', $personne->getDate_naissance(), PDO::PARAM_STR);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }


        public function delete(Personne $personne){
            try {
                $req = $this->bdd->prepare( 'DELETE FROM personne WHERE id_personne = :id_personne');
                $req->bindValue(':id_personne', $personne->getId_personne(), PDO::PARAM_INT);
                $req->execute();
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }


        public function isAlreadyExist(Personne $personne){
            $alreadyexist = false;
            $dbpersonnes = $this->getAll();
            foreach ($dbpersonnes as $dbpersonne){
                if ($dbpersonne->getNom() === $personne->getNom()){
                    $alreadyexist = true;
                }
            }
            return $alreadyexist;
        }
    }
?>