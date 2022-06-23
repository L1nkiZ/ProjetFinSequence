<?php
    require '../modele/matchClass.php';

    class MatchManager{
        
        private $bdd;
        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }


        public function __construct(PDO $bdd){
            $this->setDb($bdd);
        }


        public function add(Matchs $match){
            
            if ($this->isAlreadyExist($match) === false){
                try{
                    $req = $this->bdd->prepare('INSERT INTO matchs(id_match, date_heure_match, lieu, equipe1, equipe2, score1, score2)
                                                VALUES(:id_match, :date_heure_match, :lieu, :equipe1, :equipe2, :score1, :score2)');
                    $req->bindValue(':date_heure_match', $match->getDate_heure_match(), PDO::PARAM_STR);
                    $req->bindValue(':lieu', $match->getLieu(), PDO::PARAM_STR);
                    $req->bindValue(':equipe1', $match->getEquipe1(), PDO::PARAM_STR);
                    $req->bindValue(':equipe2', $match->getEquipe2(), PDO::PARAM_INT);
                    $req->bindValue(':score1', $match->getScore1(), PDO::PARAM_STR);
                    $req->bindValue(':score2', $match->getScore2(), PDO::PARAM_STR);
                    $req->execute();
                    return true;
                }
                catch(Exception $e){
                    die('Erreur : '.$e->getMessage());
                }
            }
            else{
                echo 'Erreur : Match déjà présent dans la base de données !';
                return false;
            }
        }


        public function get(Matchs $match){
            $lieu = (String)$match->getLieu();

            $req = $this->bdd->prepare('SELECT * FROM matchs WHERE lieu = ?)');
            $req->execute(array($lieu));
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $match = new matchs();
            $match->hydrate($donnees);

            return $match;
        }


        public function getById($id_match) {
            $id_match = (int)$id_match; // id = int ?
            $req = $this->bdd->prepare('SELECT * FROM matchs WHERE id_match = ?');
            $req->execute(array($id_match)); // PDO::FETCH_ASSOC retourne un tableau associatif indexé par le nom des champs
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $match = new matchs();
            $match->hydrate($donnees);
            return $match;
        }


        public function getAll(){
            $matches = [];

            $req = $this->bdd->prepare('SELECT * FROM matchs ORDER BY lieu');
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $match = new matchs();
                $match->hydrate($donnees);
                $matches[] = $match;
            }
            return $matches;
        }


        public function getAllByEquipe1(String $equipe1){
            $matches = [];

            $req = $this->bdd->prepare('SELECT * FROM matchs WHERE date_heure_match LIKE :date_heure_match OR lieu LIKE :lieu OR equipe1 LIKE :equipe1 OR equipe2 LIKE :equipe2 ORDER BY equipe1');
            //$req->bindValue(':date_heure_match', PDO::PARAM_STR);
            //$req->bindValue(':lieu', PDO::PARAM_STR);
            $req->bindValue(':equipe1', PDO::PARAM_STR);
            //$req->bindValue(':equipe2', PDO::PARAM_STR);
            //$req->bindValue(':score1', PDO::PARAM_STR);
            //$req->bindValue(':score2', PDO::PARAM_STR);
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $match = new matchs();
                $match->hydrate($donnees);
                $matches[] = $match;
            }
            return $matches;
        }
        
        // public function getAllByEquipe2(String $equipe2){
        //     $matches = [];

        //     $req = $this->bdd->prepare('SELECT * FROM matchs WHERE date_heure_match LIKE :date_heure_match OR lieu LIKE :lieu OR equipe1 LIKE :equipe1 OR equipe2 LIKE :equipe2 ORDER BY equipe2');
        //     $req->bindValue(':equipe2', PDO::PARAM_STR);
        //     $req->execute();

        //     while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
        //         $match = new matchs();
        //         $match->hydrate($donnees);
        //         $matches[] = $match;
        //     }
        //     return $matches;
        // }

        public function getAllByDate_heure_match(String $date_heure_match){
            $matches = [];

            $req = $this->bdd->prepare('SELECT * FROM matchs WHERE date_heure_match LIKE ? ORDER BY date_heure_match');
            $req->execute(array($date_heure_match));
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $match = new matchs();
                $match->hydrate($donnees);
                $matches[] = $match;
            }
            return $matches;
        }


        public function update(Matchs $match){

            try{
                $req = $this->bdd->prepare('UPDATE match SET date_heure_match = :date_heure_match, lieu = :lieu, equipe1 = :equipe1, equipe2 = :equipe2, score 1 = :score1, score2 = :score2, WHERE id_match = :id_match');
                $req->bindValue(':id_match', $match->getId_match(), PDO::PARAM_INT);    
                $req->bindValue(':date_heure_match', $match->getDate_heure_match(), PDO::PARAM_STR);
                $req->bindValue(':lieu', $match->getLieu(), PDO::PARAM_STR);
                $req->bindValue(':equipe1', $match->getEquipe1(), PDO::PARAM_STR);
                $req->bindValue(':equipe2', $match->getEquipe2(), PDO::PARAM_INT);
                $req->bindValue(':score1', $match->getScore1(), PDO::PARAM_STR);
                $req->bindValue(':score2', $match->getScore2(), PDO::PARAM_STR);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }


        public function delete(Matchs $match){
            try {
                $req = $this->bdd->prepare( 'DELETE FROM matchs WHERE id_match = :id_match');
                $req->bindValue(':id_match', $match->getId_match(), PDO::PARAM_INT);
                $req->execute();
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }


        public function isAlreadyExist(Matchs $match){
            $alreadyexist = false;
            $dbmatchs = $this->getAll();
            foreach ($dbmatchs as $dbmatch){
                if ($dbmatch->getId_match() === $match->getId_match()){
                    $alreadyexist = true;
                }
            }
            return $alreadyexist;
        }
    }
?>