<?php
/*
 * Controleur suppression d'un sujet, ajoute aussi les stats, discussions, messages, nb de posts 
 * et supprime les réponses d'un sujet si celui-ci est supprimé
*/

if(!empty($_REQUEST['idSujet'])) {
	$idSujet=$_REQUEST['idSujet'];
	$dataSujet=$query->getSujet($idSujet);
	$idMembre=$dataSujet['idMembre'];
	$sousCategorie=$query->getSousCategorieBySujet($idSujet);
	$idSousCategorie=$sousCategorie['idSousCategorie'];
	$nbReponseSujet=$sousCategorie['nombreReponseSujet'];
	
	if ($_SESSION['idMembre']==$idMembre || $_SESSION['estAdminMembre']==EST_ADMIN_OUI){
		$modeleStat->desincrementeNbReponseSousCategorieByNbReponseSujet($idSousCategorie,$nbReponseSujet);
		$modeleStat->desincrementeNbSujetSousCategorie($idSousCategorie);
		$modeleStat->desincrementeNbPostMembre($idMembre);
		$query->supprimerReponseBySujet($idSujet);
		$query->supprimerSujet($idSujet);
		header("Location: sousCategories.php?idSousCategorie=".$idSousCategorie."&supprimerSujet=1");
	}
	else{
		header("Location: index.php?erreur=1");
	}
	
}
