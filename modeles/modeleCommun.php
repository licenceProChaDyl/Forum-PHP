<?php
/*
 * Modèle de toutes les fonctions relatives aux catégories, sous-catégories, réponses
 */
$query = new modeleCommun(connexionBDD());

class modeleCommun {
	
	protected $pdo;
	
	public function modeleCommun($pdo) {
		$this->pdo = $pdo;
	}
	
	/*
	 * Categories
	 */

	public function getAllCategories() {
		$stmt = $this->pdo->prepare('SELECT * FROM categorie');
		$stmt->execute();

		return $stmt->fetchAll();
	}
	
	public function getCategorie($idCategorie) {
		$stmt = $this->pdo->prepare('SELECT * FROM categorie WHERE idCategorie=:idCategorie');
		$stmt->bindParam(':idCategorie', $idCategorie);
		$stmt->execute();
	
		return $stmt->fetch();
	}
	
	public function addCategorie($idMembre, $nomCategorie, $descriptionCategorie) {
		$stmt = $this->pdo->prepare('
			INSERT INTO categorie (idMembre, nomCategorie, dateCreationCategorie, descriptionCategorie)
			VALUES (:idMembre, :nomCategorie, NOW(), :descriptionCategorie)
		');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->bindParam(':nomCategorie', $nomCategorie);
		$stmt->bindParam(':descriptionCategorie', $descriptionCategorie);
	
		return $stmt->execute();
	}
	
	public function majCategorie($idMembre, $nomCategorie, $descriptionCategorie, $idCategorie) {
		$stmt = $this->pdo->prepare('
			UPDATE categorie SET idMembre=:idMembre, nomCategorie=:nomCategorie, descriptionCategorie=:descriptionCategorie
			WHERE idCategorie=:idCategorie
		');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->bindParam(':nomCategorie', $nomCategorie);
		$stmt->bindParam(':descriptionCategorie', $descriptionCategorie);
		$stmt->bindParam(':idCategorie', $idCategorie);
	
		return $stmt->execute();
	}
	
	public function supprimerCategorie($idCategorie){
		$stmt = $this->pdo->prepare('DELETE FROM categorie WHERE idCategorie=:idCategorie');
		$stmt->bindParam(':idCategorie', $idCategorie);
		$stmt->execute();
	
		return $stmt->execute();
	}
	
	public function getCategoriesEtSousCategories() {
		$categories = $this->getAllCategories();
		foreach ($categories as $key => $categorie) {
			$categories[$key]['souscategories'] = $this->getSousCategoriesByCategorie($categorie['idCategorie']);
		}
	
		return $categories;
	}
	
	
	/*
	 * Sous-catégories
	 */
	
	public function getAllSousCategories() {
		$stmt = $this->pdo->prepare('SELECT * FROM souscategorie');
		$stmt->execute();
	
		return $stmt->fetchAll();
	}
	
	public function getSousCategorie($idSousCategorie) {
		$stmt = $this->pdo->prepare('SELECT * FROM souscategorie WHERE idSousCategorie=:idSousCategorie');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->execute();
	
		return $stmt->fetch();
	}
	
	public function addSousCategorie($idMembre, $idCategorie, $nomSousCategorie, $descriptionSousCategorie) {
		$stmt = $this->pdo->prepare('
			INSERT INTO souscategorie (idMembre, idCategorie, nomSousCategorie, descriptionSousCategorie, dateCreationSousCategorie)
			VALUES (:idMembre, :idCategorie, :nomSousCategorie, :descriptionSousCategorie, NOW())
		');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->bindParam(':idCategorie', $idCategorie);
		$stmt->bindParam(':nomSousCategorie', $nomSousCategorie);
		$stmt->bindParam(':descriptionSousCategorie', $descriptionSousCategorie);
	
		return $stmt->execute();
	}
	
	public function majSousCategorie($idMembre, $idCategorie, $nomSousCategorie, $descriptionSousCategorie, $idSousCategorie) {
		$stmt = $this->pdo->prepare('
			UPDATE souscategorie SET idMembre=:idMembre, idCategorie=:idCategorie, nomSousCategorie=:nomSousCategorie, descriptionSousCategorie=:descriptionSousCategorie
			WHERE idSousCategorie=:idSousCategorie
		');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->bindParam(':idCategorie', $idCategorie);
		$stmt->bindParam(':nomSousCategorie', $nomSousCategorie);
		$stmt->bindParam(':descriptionSousCategorie', $descriptionSousCategorie);
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
	
		return $stmt->execute();
	}
	
	public function supprimerSousCategorie($idSousCategorie){
		$stmt = $this->pdo->prepare('SELECT idCategorie FROM souscategorie WHERE idSousCategorie=:idSousCategorie');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->execute();
	
		$stmt2 = $this->pdo->prepare('DELETE FROM souscategorie WHERE idSousCategorie=:idSousCategorie');
		$stmt2->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt2->execute();
	
		$idCat = $stmt->fetchAll();
	
		return $idCat[0]['idCategorie'];
	}
	
	public function getSousCategoriesByCategorie($idCategorie) {
		$stmt = $this->pdo->prepare('SELECT * FROM souscategorie WHERE idCategorie=:idCategorie');
		$stmt->bindParam(':idCategorie', $idCategorie);
		$stmt->execute();
	
		return $stmt->fetchAll();
	}
	
	public function getSousCategoriesEtSujets() {
		$sousCategories = $this->getAllSousCategories();
		foreach ($sousCategories as $key => $sousCategorie) {
			$sousCategories[$key]['sujets'] = $this->getSujetsBySousCategorie($sousCategorie['idSousCategorie']);
		}
	
		return $sousCategories;
	}
	
	
	
	/*
	 * Sujets
	 */
	
	public function getAllSujets() {
		$stmt = $this->pdo->prepare('SELECT * FROM sujet');
		$stmt->execute();
	
		return $stmt->fetchAll();
	}
	
	public function getAllFromSujet($idSujet) {
		$stmt = $this->pdo->prepare('SELECT * FROM sujet WHERE idSujet=:idSujet');
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->execute();
	
		return $stmt->fetchAll();
	}
	
	public function getSujet($idSujet) {
		$stmt = $this->pdo->prepare('SELECT * FROM sujet WHERE idSujet=:idSujet');
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->execute();
	
		return $stmt->fetch();
	}
	
	
	public function addSujet($idSousCategorie, $idMembre, $nomSujet, $messageSujet, $statutSujet) {
		$stmt = $this->pdo->prepare('
			INSERT INTO sujet (idSousCategorie, idMembre, nomSujet, messageSujet, dateCreationSujet, statutSujet)
			VALUES (:idSousCategorie, :idMembre, :nomSujet, :messageSujet, NOW(), :statutSujet)
		');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->bindParam(':nomSujet', $nomSujet);
		$stmt->bindParam(':messageSujet', $messageSujet);
		$stmt->bindParam(':statutSujet', $statutSujet);
	
		return $stmt->execute();
	}
	
	public function majSujet($idSousCategorie, $idMembre, $nomSujet, $messageSujet, $statutSujet, $idSujet) {
		$stmt = $this->pdo->prepare('
			UPDATE sujet SET idSousCategorie=:idSousCategorie, idMembre=:idMembre, nomSujet=:nomSujet, messageSujet=:messageSujet,
			statutSujet=:statutSujet WHERE idSujet=:idSujet
		');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->bindParam(':nomSujet', $nomSujet);
		$stmt->bindParam(':messageSujet', $messageSujet);
		$stmt->bindParam(':statutSujet', $statutSujet);
		$stmt->bindParam(':idSujet', $idSujet);
	
		$stmt->execute();
	}
	
	public function supprimerSujet($idSujet){
		$stmt = $this->pdo->prepare('DELETE FROM sujet WHERE idSujet=:idSujet');
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->execute();
	
		return $stmt->execute();
	}

	public function getSujetsBySousCategorie($idSousCategorie) {
		$stmt = $this->pdo->prepare('SELECT * FROM sujet WHERE idSousCategorie=:idSousCategorie');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->execute();
	
		return $stmt->fetchAll();
	}


	/*
	 * Reponses
	 */
	

	public function getAllFromReponse($idReponse) {
		$stmt = $this->pdo->prepare('SELECT * FROM reponse WHERE idReponse=:idReponse');
		$stmt->bindParam(':idReponse', $idReponse);
		$stmt->execute();
	
		return $stmt->fetch();
	}
	
	public function getReponsesBySujet($idSujet) {
		$stmt = $this->pdo->prepare('SELECT * FROM reponse WHERE idSujet=:idSujet');
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->execute();
	
		return $stmt->fetchAll();
	}
	
	public function addPost($idSousCategorie, $idSujet, $idMembre, $messageReponse) {
		$stmt = $this->pdo->prepare('
			INSERT INTO reponse (idSousCategorie, idSujet, idMembre, dateCreationReponse, messageReponse)
			VALUES (:idSousCategorie, :idSujet, :idMembre, NOW(), :messageReponse)
		');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->bindParam(':messageReponse', $messageReponse);
	
		return $stmt->execute();
	}
	
	public function majReponse($idReponse, $idMembre, $messageReponse) {
		$stmt = $this->pdo->prepare('
			UPDATE reponse SET idMembre=:idMembre, messageReponse=:messageReponse
			WHERE idReponse=:idReponse
		');
		$stmt->bindParam(':idMembre', $idMembre);
		$stmt->bindParam(':messageReponse', $messageReponse);
		$stmt->bindParam(':idReponse', $idReponse);
		$stmt->execute();
	}
	
	public function supprimerReponse($idReponse){
		$stmt = $this->pdo->prepare('DELETE FROM reponse WHERE idReponse=:idReponse');
		$stmt->bindParam(':idReponse', $idReponse);
		$stmt->execute();
	
		return $stmt->execute();
	}
	
	public function getMessagesBySousCategorie($idSousCategorie) {
		$stmt = $this->pdo->prepare('SELECT * FROM reponse WHERE idSousCategorie=:idSousCategorie');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		$stmt->execute();
	
		return $stmt->fetchAll();
	}

	
	public function supprimerReponseBySujet($idSujet){
		$stmt = $this->pdo->prepare('DELETE FROM reponse WHERE idSujet=:idSujet');
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->execute();
	
		return $stmt->execute();
	}
	

	public function getReponsesAndMembre($idSujet) {
		$reponses = $this->getReponsesBySujet($idSujet);
		foreach ($reponses as $key => $reponse) {
			$reponses[$key]['membre'] = $this->getMembreByReponses($reponse['idReponse']);
		}
	
		return $reponses;
	}
	
	
	public function getMembreByReponses($idReponse) {
		$stmt = $this->pdo->prepare('SELECT * FROM reponse WHERE idReponse=:idReponse)');
		$stmt->bindParam(':idReponse', $idReponse);
		$stmt->execute();
	
		return $stmt->fetchAll();
	}
	
	public function getReponsesAndMembreBySujet($idSujet) {
		$stmt = $this->pdo->prepare('
			SELECT idReponse, idMembre, idSujet, dateCreationReponse, messageReponse, pseudoMembre, estAdminMembre,
			dateInscriptionMembre, nbMessageMembre, lienAvatarMembre
			FROM reponse
			NATURAL JOIN membre
			WHERE idSujet=:idSujet
		');
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->execute();
	
		return $stmt->fetchAll();
	}

	
	public function getAllFromReponseBySousCategorie($idSousCategorie) {
		$stmt = $this->pdo->prepare('SELECT * FROM reponse WHERE idSousCategorie=:idSousCategorie');
		$stmt->bindParam(':idSousCategorie', $idSousCategorie);
		return $stmt->execute();

	}
	
	public function getSousCategorieBySujet($idSujet) {
		$stmt = $this->pdo->prepare('SELECT * FROM sujet WHERE idSujet=:idSujet');
		$stmt->bindParam(':idSujet', $idSujet);
		$stmt->execute();
	
		return $stmt->fetch();
	}
}

