<?php
    require '../modele/actionClass.php';

class ActionManager{
        
        private $bdd;
        public function setDb(PDO $bdd){
            $this->bdd = $bdd;
        }


        public function __construct(PDO $bdd){
            $this->setDb($bdd);
        }


        public function add(Action $action){
            
            if ($this->isAlreadyExist($action) === false){
 
                try{
                    $req = $this->bdd->prepare('INSERT INTO action(id_action, date_echeance, statut_action, id_type_action)
                                                VALUES(:id_action, :date_echeance, :statut_action, :id_type_action)');
                    $req->bindValue(':id_action', $action->getId_action(), PDO::PARAM_STR);
                    $req->bindValue(':date_echeance', $action->getDate_echeance(), PDO::PARAM_STR);
                    $req->bindValue(':statut_action', $action->getStatut_action(), PDO::PARAM_STR);
                    $req->bindValue(':id_type_action', $action->getId_type_action(), PDO::PARAM_INT);
                    $req->execute();
                    return true;
                }
                catch(Exception $e){
                    die('Erreur : '.$e->getMessage());
                }
            }
            else{
                echo 'Erreur : Action déjà présente dans la base de données !';
                return false;
            }
        }


        public function get(Action $action){
            $statut_action = (String)$action->getStatut_action();

            $req = $this->bdd->prepare('SELECT * FROM action WHERE statut_action = ?)');
            $req->execute(array($statut_action));
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            $action = new Action();
            $action->hydrate($donnees);

            return $action;
        }


        public function getById($id_action) {
            // on s'assure que $id est bien un int
            $id_action = (int)$id_action;
            
            // on prépare la requête 
            $req = $this->bdd->prepare('SELECT * FROM action WHERE id_action = ?');
            // si elle fonctionne, on l'éxécute en y passant sous forme de tableau, les valeurs recherchées
            $req->execute(array($id_action));
            // PDO::FETCH_ASSOC retourne un tableau associatif indexé par le nom des champs
            $donnees = $req->fetch(PDO::FETCH_ASSOC);
            // je créé un nouvel objet Anime 
            $action = new Action();
            // je le construis via la méthode hydrate
            $action->hydrate($donnees);
            // je retourne l'anime 
            return $action;
        }


        public function getAll(){
            $actions = [];

            $req = $this->bdd->prepare('SELECT * FROM action ORDER BY statut_action');
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $action = new action();
                $action->hydrate($donnees);
                $actions[] = $action;
            }
            return $actions;
        }


        public function getAllByDateEcheance(int $date_echeance){
            $actions = [];

            $req = $this->bdd->prepare('SELECT * FROM action WHERE id_action LIKE :id_action OR statut_action LIKE :statut_action ORDER BY date_echeance');
            $req->bindValue(':date_echeance', PDO::PARAM_STR);
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $action = new action();
                $action->hydrate($donnees);
                $actions[] = $action;
            }
            return $actions;
        }
        
        
        public function getAllByStatutAction(String $statut_action){
            $actions = [];

            $regexLIKE = '%'.$statut_action.'%';

            $req = $this->bdd->prepare('SELECT * FROM action WHERE statut_action LIKE ? ORDER BY statut_action');
            $req->execute(array($regexLIKE));
            $req->execute();

            while($donnees = $req->fetch(PDO::FETCH_ASSOC)){
                $action = new action();
                $action->hydrate($donnees);
                $actions[] = $action;
            }
            return $actions;
        }


        public function update(Action $action){

            try{
                $req = $this->bdd->prepare('UPDATE action SET date_echeance = :date_echeance, statut_action = :statut_action, id_type_action = :id_type_action WHERE id_action = :id_action');
                $req->bindValue(':id_action', $action->getId_action(), PDO::PARAM_INT);    
                $req->bindValue(':date_echeance', $action->getDate_echeance(), PDO::PARAM_STR);
                $req->bindValue(':statut_action', $action->getStatut_action(), PDO::PARAM_STR);
                $req->bindValue(':id_type_action', $action->getId_type_action(), PDO::PARAM_STR);
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        }


        public function delete(Action $action){
            try {
                $req = $this->bdd->prepare( 'DELETE FROM action WHERE id_action = :id_action');
                $req->bindValue(':id_action', $action->getId_action(), PDO::PARAM_INT);
                $req->execute();
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }


        public function isAlreadyExist(Action $action){
            $alreadyexist = false;
            $dbaction = $this->getAll();
            foreach ($dbaction as $dbaction){
                if ($dbaction->getId_action() === $action->getId_action()){
                    $alreadyexist = true;
                }
            }
            return $alreadyexist;
        }
    }
?>