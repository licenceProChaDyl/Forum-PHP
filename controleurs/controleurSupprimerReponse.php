<?php
/*
 * Controleur de suppression d'une réponse, ajoute aussi les stats, nb de post au membre ect 
 */
if(!empty($_REQUEST['idReponse'])) {
	$idReponse=$_REQUEST['idReponse'];
	$reponse=$query->getAllFromReponse($idReponse);
	$idSujet=$reponse['idSujet'];
	$idMembre=$reponse['idMembre'];
	$idSousCategorie=$query->getSousCategorieBySujet($idSujet);
	if ($_SESSION['idMembre']==$idMembre || $_SESSION['estAdminMembre']==EST_ADMIN_OUI){
	$modeleStat->desincrementeNbReponseSousCategorie($idSousCategorie['idSousCategorie']);
	$modeleStat->desincrementeNbReponseSujet($idSujet);
	$modeleStat->desincrementeNbPostMembre($idMembre);
	$query->supprimerReponse($_REQUEST['idReponse']);
	
	header("Location: sujets.php?idSujet=".$idSujet."&supprimerReponse=1");
	}
	else{
		header("Location: index.php?erreur=1");
	}
}

?>
 
