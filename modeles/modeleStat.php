<?php
/*
 * Modèle stat, toutes les fonctions relatives aux statistiques discussions, messages
 */
$modeleStat = new modeleStat(connexionBDD());

class modeleStat {
	
	protected $pdo;
	
	public function modeleStat($pdo) {
		$this->pdo = $pdo;
	}
	
	public function incrementeStatCategorie($idCategorie) {
		$stmt = $this->pdo->prepare('
			UPDATE categorie SET nombreSousCategorie=nombreSousCategorie+1
			WHERE idCategorie=:idCategorie
		');
		$stmt->bindParam(':idCategorie', $idCategorie);
		$stmt->execute();
	}
	
	public function desincrementeStatCategorie($idCategorie) {
		$stmt = $this->pdo->prepare('
			UPDATE categorie SET nombreSousCategorie=nombreSousCategorie-1
			WHERE idCategorie=:idCategorie
		');
		$stmt->bindParam(':idCategorie', $idCategorie);
		$stmt->execute();
	}
	
	public function desincrementeNbReponseSujet($idSujet) {
		$stmt = $this->pdo->prepare('
			UPDATE sujet SET nombreReponseSujet=nombreReponseSujet-1
			WHERE idSujet=:idSujet
		');
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->execute();
	}
	
	public function incrementeNbPostMembre($idMembre) {
		$stmt = $this->pdo->prepare('
			UPDATE membre SET nbMessageMembre=nbMessageMembre+1
			WHERE idMembre=:idMembre
		');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->execute();
	}
	
	public function desincrementeNbPostMembre($idMembre) {
		$stmt = $this->pdo->prepare('
			UPDATE membre SET nbMessageMembre=nbMessageMembre-1
			WHERE idMembre=:idMembre
		');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->execute();
	}
	
	public function incrementeNbSujetSousCategorie($idSousCategorie) {
		$stmt = $this->pdo->prepare('
			UPDATE souscategorie SET nombreSujetSousCategorie=nombreSujetSousCategorie+1
			WHERE idSousCategorie=:idSousCategorie
		');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->execute();
	}
	
	public function incrementeStatSousCategorie($idSousCategorie,$pseudoDernierMessage) {
		$stmt = $this->pdo->prepare('
			UPDATE souscategorie SET nombreReponseSousCategorie=nombreReponseSousCategorie+1,
			dateDernierMessage=NOW(), pseudoDernierMessage=:pseudoDernierMessage
			WHERE idSousCategorie=:idSousCategorie
		');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->bindParam(':pseudoDernierMessage', $pseudoDernierMessage);
		$stmt->execute();
	}
	
	public function desincrementeNbSujetSousCategorie($idSousCategorie) {
		$stmt = $this->pdo->prepare('
			UPDATE souscategorie SET nombreSujetSousCategorie=nombreSujetSousCategorie-1
			WHERE idSousCategorie=:idSousCategorie
		');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->execute();
	}
	
	public function desincrementeNbReponseSousCategorie($idSousCategorie) {
		$stmt = $this->pdo->prepare('
			UPDATE souscategorie SET nombreReponseSousCategorie=nombreReponseSousCategorie-1
			WHERE idSousCategorie=:idSousCategorie
		');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->execute();
	}
	
	public function desincrementeNbReponseSousCategorieByNbReponseSujet($idSousCategorie,$nbReponseSujet) {
		$stmt = $this->pdo->prepare('
			UPDATE souscategorie SET nombreReponseSousCategorie=nombreReponseSousCategorie-:nbReponseSujet
			WHERE idSousCategorie=:idSousCategorie
		');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->bindParam(':nbReponseSujet', $nbReponseSujet);
		$stmt->execute();
	}
	
	public function incrementeStatSujet($pseudoDernierMessage, $idSujet) {
		$stmt = $this->pdo->prepare('
			UPDATE sujet SET nombreReponseSujet=nombreReponseSujet+1, dateDernierMessage=NOW(),
			pseudoDernierMessage=:pseudoDernierMessage
			WHERE idSujet=:idSujet
		');
		$stmt->bindParam(':pseudoDernierMessage', $pseudoDernierMessage);
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->execute();
	}
}

