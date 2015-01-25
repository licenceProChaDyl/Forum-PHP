<?php
/*
 * Controleur réponse, ajoute/modifie une reponse ou récupère juste le contenu piur l'affichage sur la vue, ajoute les stats etc..
 */
$errors = array();
if(!empty($_POST)) {
	if(empty($_POST['messageReponse'])) $errors[] = 'Message du sujet obligatoire';
	if(empty($errors)) {
		$idSujet=$_POST['idSujet'];
		if(!empty($idSujet)) {
			$sousCategorie = $query->getSousCategorieBySujet($idSujet);
			$idSousCategorie=$sousCategorie['idSousCategorie'];
			$membre=$modeleMembre->getMembreBySujet($idSujet);
			$idMembre=$_SESSION['idMembre'];
			$pseudoMembrePosteur = $modeleMembre->getPseudoMembrePosteur($idMembre);
			$pseudoDernierMessage=$pseudoMembrePosteur['pseudoMembre'];
			$messageReponse = $_POST['messageReponse'];
			
			if (!empty($_SESSION['idMembre'])){
			$query->addPost($idSousCategorie, $idSujet, $idMembre, $messageReponse);
			$modeleStat->incrementeStatSujet($pseudoDernierMessage, $idSujet);
			$modeleStat->incrementeStatSousCategorie($idSousCategorie,$pseudoDernierMessage);
			$modeleStat->incrementeNbPostMembre($idMembre);
			header("Location: sujets.php?idSujet=".$idSujet."&success=1");
			}
			else{
				header("Location: index.php?erreur=1");
			}
		} 
		else {
			if (!empty($_SESSION['idMembre'])){
				$query->updateSujet($idSousCategorie, $idMembre, $nomSujet, $messageSujet, $dateCreationSujet, $dateClotureSujet, $visibleSujet);
			}
			else{
				header("Location: index.php?erreur=1");
			}
		}
		
	}
}

if (!empty($_REQUEST['idSujet'])) {
	$sujet=$query->getSujet($_REQUEST['idSujet']);
	$posts = $query->getReponsesAndMembreBySujet($_REQUEST['idSujet']);
}


