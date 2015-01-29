<?php
/*
 * Controleur nouveau sujet ou edition sujet
 */
if (!empty($_REQUEST['idSujet'])) {
	$sujetDemande = $query->getSujet($_REQUEST['idSujet']);
	$idMembreSujet=$sujetDemande['idMembre'];
	if ($_SESSION['estAdminMembre']==EST_ADMIN_OUI || $_SESSION['idMembre']==$idMembreSujet){
		$sujet = $query->getSujet($_REQUEST['idSujet']);
	}
	else{
		header("Location: index.php?erreur=1");
	}
	
}
	$allCategories = $query->getCategoriesEtSousCategories();
	$errors = array();
	if(!empty($_POST)) {
	
		if(empty($_POST['nomSujet'])) $errors[] = 'Titre du sujet obligatoire';
		if(empty($_POST['messageSujet'])) $errors[] = 'Message du sujet obligatoire';
		if(empty($_POST['idSousCategorie'])) $errors[] = 'Choix de la sous catégorie obligatoire';
		if(empty($_POST['statutSujet'])) $errors[] = 'Statut du sujet obligatoire';
		if(empty($errors)) {
			$idSousCategorie = $_POST['idSousCategorie'];
			$idMembre = $_POST['idMembre'];
			$nomSujet = $_POST['nomSujet'];
			$messageSujet = $_POST['messageSujet'];
			$statutSujet = $_POST['statutSujet'];
			if(empty($_POST['editionIdSujet'])) {
				$query->addSujet($idSousCategorie, $idMembre, $nomSujet, $messageSujet, $statutSujet);
				$modeleStat->incrementeNbSujetSousCategorie($idSousCategorie);
				$modeleStat->incrementeNbPostMembre($idMembre);
				header("Location: sousCategories.php?idSousCategorie=$idSousCategorie&success=1");
				
			} else {
				$idSujet=$_POST['editionIdSujet'];
				$query->majSujet($idSousCategorie, $idMembre, $nomSujet, $messageSujet, $statutSujet, $idSujet);
				header("Location: sousCategories.php?idSousCategorie=$idSousCategorie&successEdition=1");
			}
		}
	}
?>