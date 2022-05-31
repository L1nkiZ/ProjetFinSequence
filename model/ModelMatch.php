<?php

class ModelMatch{

	protected $_bdd;

	public function __construct()
	{
		try{
			$this->_bdd = new PDO('mysql:host=localhost;dbname=foorball4;charset=utf8', 'root', 'root');
		}catch(Exception $e){
		    die('Erreur : '.$e->getMessage());
		}
	}


	// Sélection Match s'il existe en BDD
	public function selectMatch($id)
	{
		$sql = "SELECT *
				FROM matchs
				WHERE id_match = ?";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		return $req->fetch(PDO::FETCH_ASSOC);
	}


	// Récupération des informations du match pour enregistrement en session
	public function getInfosMatch($id){
		$sql = "SELECT date_heure_match, lieu, equipe1, equipe2, score1, score2
				FROM matchs
				WHERE id_match = ? ";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}

	// Récupération des informations du match pour la modification
	public function getMatch($id){
		$sql = "SELECT date_heure_match, lieu, equipe1, equipe2, score1, score2
		FROM matchs
		WHERE id_match = ? ";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}


	// Récupération de tous les matchs
	public function getAllMatchs()
	{
		$sql = "SELECT *
				FROM matchs";
		$req = $this->_bdd->prepare($sql);
		$req->execute();
		$donnees = $req->fetchall(PDO::FETCH_ASSOC);
		return $donnees;
	}


	// Enregistrer un nouveau match sans les scores
	public function saveMatchSansScores($date, $lieu, $equipe1, $equipe2)
	{
		$sql = "INSERT INTO matchs(date_heure_match, lieu, equipe1, equipe2)
				VALUES (?, ?, ?, ?)";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($date, $lieu, $equipe1, $equipe2));
	}


	// Enregistrer un nouveau match avec les scores
	public function saveMatchAvecScores($date, $lieu, $equipe1, $equipe2, $score1, $score2)
	{
		$sql = "INSERT INTO matchs(date_heure_match, lieu, equipe1, equipe2, score1, score2)
				VALUES (?, ?, ?, ?, ?, ?)";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($date, $lieu, $equipe1, $equipe2, $score1, $score2));
		}


	// Mise à jour d'un match avec les scores
	public function updateMatch($id, $date, $lieu, $equipe1, $equipe2, $score1, $score2)
	{
		$sql = "UPDATE matchs
				SET date_heure_match = ?, lieu = ?, equipe1 = ?, equipe2 = ?, score1 = ?, score2 = ?;
				WHERE id_match = ?";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($date, $lieu, $equipe1, $equipe2, $score1, $score2, $id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
	}


	// Suppression match via son ID
	public function deleteMatch($id)
	{
		$sql = "DELETE FROM matchs
				WHERE id_match = ?";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
	}
}