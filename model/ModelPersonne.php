<?php

class ModelPersonne{

	protected $_bdd;

	public function __construct()
	{
		try{
			$this->_bdd = new PDO('mysql:host=localhost;dbname=football4;charset=utf8', 'root', 'root');
		}catch(Exception $e){
		    die('Erreur : '.$e->getMessage());
		}
	}


	// Sélection d'une personne via son ID si elle existe en BDD
	public function selectPersonne($id)
	{
		$sql = "SELECT * FROM personne";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		return $req->fetch(PDO::FETCH_ASSOC);
	}


	// Récupération des informations d'une personne pour enregistrement en session
	public function getInfosPersonne($id){
		$sql = "SELECT nom, prenom, adresse_postale, adresse_mail, tel, designation_sexe, designation_taille, mineur, responsable
				FROM personne, sexe, taille, responsabilite_legale
				WHERE personne.id_sexe = sexe.id_sexe
				AND personne.id_taille = taille.id_taille
				AND personne.id_personne = responsabilite_legale.responsable
				AND id_personne = ? ";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}


	// Récupération des informations de la personne pour modification (sauf le mot de passe)
	public function getPersonne($id){
		$sql = "SELECT nom, prenom, adresse_postale, adresse_mail, tel, designation_sexe, designation_taille, mineur, responsable
				FROM personne, sexe, taille, responsabilite_legale
				WHERE personne.id_sexe = sexe.id_sexe
				AND personne.id_taille = taille.id_taille
				AND personne.id_personne = responsabilite_legale.responsable
				AND id_personne = ? ";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
		return $donnees;
	}

	// Récupération de toutes les personnes
	public function getAllPersonnes()
	{
		$sql = "SELECT *
				FROM personne";
		$req = $this->_bdd->prepare($sql);
		$req->execute();
		$donnees = $req->fetchall(PDO::FETCH_ASSOC);
		return $donnees;
	}


	// Enregistrement d'une nouvelle personne
	public function savePersonne($nom, $prenom, $adresse, $email, $tel)
	{
		$sql = "INSERT INTO personne(nom, prenom, adresse_postale, adresse_mail, tel)
				VALUES (?, ?, ?, ?, ?)";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($nom, $prenom, $adresse, $email, $tel));
	}


	// Mise à jour d'une personne
	public function updatePersonne($id, $nom, $prenom, $adresse, $email, $tel)
	{
		$sql = "UPDATE personne
				SET nom = ?, prenom = ?, adresse_postale = ?, adresse_mail = ?, tel = ?;
				WHERE id_personne = ?";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($nom, $prenom, $adresse, $email, $tel, $id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
	}


	// Suppression d'une personne via son ID
	public function deletePersonne($id)
	{
		$sql = "DELETE FROM personne
				WHERE id_personne = ?";
		$req = $this->_bdd->prepare($sql);
		$req->execute(array($id));
		$donnees = $req->fetch(PDO::FETCH_ASSOC);
	}
}