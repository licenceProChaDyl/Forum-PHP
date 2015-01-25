<?php
/*
 * Modèle membre, toutes les fonctions relatives au actions sur les membres
 */
$modeleMembre = new modeleMembre(connexionBDD());

class modeleMembre {
	
	protected $pdo;
	
	public function modeleMembre($pdo) {
		$this->pdo = $pdo;
	}
	
	public function getMembre($idMembre) {
		$stmt = $this->pdo->prepare('SELECT * FROM membre WHERE idMembre=:idMembre');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->execute();
	
		return $stmt->fetch();
	}
	
	public function connexionMembre($pseudoMembre, $mdpMembre) {
		$stmt = $this->pdo->prepare('SELECT * FROM membre WHERE pseudoMembre=:pseudoMembre AND mdpMembre=:mdpMembre');
		$stmt->bindParam(':pseudoMembre', $pseudoMembre);
		$stmt->bindParam(':mdpMembre', $mdpMembre);
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
		if (empty($res))
			return false;
		else
			return $res[0];
	}
	
	public function addMembreInscription($mailMembre, $pseudoMembre, $mdpMembre){
		$stmt = $this->pdo->prepare("
			INSERT INTO membre (idGrade, mailMembre, mdpMembre, pseudoMembre, dateInscriptionMembre)
			VALUES ('2', :mailMembre, :mdpMembre, :pseudoMembre, NOW())
		");
		$stmt->bindParam(':mailMembre', $mailMembre);
		$stmt->bindParam(':pseudoMembre', $pseudoMembre);
		$stmt->bindParam(':mdpMembre', $mdpMembre);
	
		return $stmt->execute();
	}
	
	
	public function ajoutMembre($idGrade, $mailMembre, $pseudoMembre, $mdpMembre, $nomMembre, $prenomMembre, $adresseMembre, $cpMembre, $villeMembre, $estAdminMembre, $dateInscriptionMembre){
		$stmt = $this->pdo->prepare("
			INSERT INTO membre (idGrade, mailMembre, mdpMembre, pseudoMembre, mdpMembre, nomMembre, prenomMembre, adresseMembre, cpMembre, villeMembre, estAdminMembre, dateInscriptionMembre)
			VALUES (:idGrade, :mailMembre, :mdpMembre, :pseudoMembre, :nomMembre, :prenomMembre, :adresseMembre, :cpMembre, :villeMembre, :estAdminMembre, :dateInscriptionMembre)
		");
		$stmt->bindParam(':idGrade', $idGrade);
		$stmt->bindParam(':mailMembre', $mailMembre);
		$stmt->bindParam(':pseudoMembre', $pseudoMembre);
		$stmt->bindParam(':mdpMembre', $mdpMembre);
		$stmt->bindParam(':nomMembre', $nomMembre);
		$stmt->bindParam(':prenomMembre', $prenomMembre);
		$stmt->bindParam(':adresseMembre', $adresseMembre);
		$stmt->bindParam(':cpMembre', $cpMembre);
		$stmt->bindParam(':villeMembre', $villeMembre);
		$stmt->bindParam(':estAdminMembre', $estAdminMembre);
		$stmt->bindParam(':dateInscriptionMembre', $dateInscriptionMembre);
	
		return $stmt->execute();
	}
	
	public function majMembre($idGrade,$mailMembre, $pseudoMembre, $mdpMembre, $nomMembre, $prenomMembre, $adresseMembre, $cpMembre, $villeMembre, $estAdminMembre, $idMembre){
		$stmt = $this->pdo->prepare('
			UPDATE membre SET idGrade=:idGrade, mailMembre=:mailMembre, pseudoMembre=:pseudoMembre, mdpMembre=:mdpMembre, nomMembre=:nomMembre, prenomMembre=:prenomMembre, adresseMembre=:adresseMembre,
			cpMembre=:cpMembre, villeMembre=:villeMembre, estAdminMembre=:estAdminMembre
		  	WHERE idMembre=:idMembre
		');
		$stmt->bindParam(':idGrade', $idGrade);
		$stmt->bindParam(':mailMembre', $mailMembre);
		$stmt->bindParam(':pseudoMembre', $pseudoMembre);
		$stmt->bindParam(':mdpMembre', $mdpMembre);
		$stmt->bindParam(':nomMembre', $nomMembre);
		$stmt->bindParam(':prenomMembre', $prenomMembre);
		$stmt->bindParam(':adresseMembre', $adresseMembre);
		$stmt->bindParam(':cpMembre', $cpMembre);
		$stmt->bindParam(':villeMembre', $villeMembre);
		$stmt->bindParam(':estAdminMembre', $estAdminMembre);
		$stmt->bindParam(':idMembre', $idMembre);
	
		return $stmt->execute();
	}
	
	public function getAllMembre() {
		$stmt = $this->pdo->prepare('SELECT * FROM membre');
		$stmt->execute();
	
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function supprimerMembre($idMembre){
		$stmt = $this->pdo->prepare('DELETE FROM membre WHERE idMembre=:idMembre');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->execute();
	
		return $stmt->execute();
	}
	
	public function getPseudoMembrePosteur($idMembre) {
		$stmt = $this->pdo->prepare('SELECT * FROM membre WHERE idMembre=:idMembre');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->execute();
	
		return $stmt->fetch();
	}
	
	public function getGradeMembre($idMembre) {
		$stmt = $this->pdo->prepare('SELECT nomGrade FROM grade,membre WHERE MEMBRE.idGrade=GRADE.idGrade
		AND membre.idMembre=:idMembre
		');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->execute();
	
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public function updateAvatarMembre($idMembre, $lienAvatarMembre) {
		$stmt = $this->pdo->prepare('
			UPDATE membre SET lienAvatarMembre=:lienAvatarMembre
			WHERE idMembre=:idMembre
		');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->bindParam(':lienAvatarMembre', $lienAvatarMembre);
		$stmt->execute();
	}
	
	public function getMembreBySujet($idSujet) {
		$stmt = $this->pdo->prepare('SELECT * FROM membre WHERE idMembre IN
		(SELECT idMembre FROM reponse WHERE idSujet=:idSujet)');
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->execute();
	
		return $stmt->fetch();
	}
}

