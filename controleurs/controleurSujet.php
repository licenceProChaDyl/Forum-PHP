<?php
/*
 * Controleur sujet, recupere ce qu'il faut poour afficher le contenu du sujet
 */
$dataSujetDemande = $query->getAllFromSujet($idSujetDemande);
$membre= $modeleMembre->getMembre($dataSujetDemande[0]['idMembre']);
$nomGrade= $modeleMembre->getGradeMembre($dataSujetDemande[0]['idMembre']);
$reponses = $query->getAllFromReponse($dataSujetDemande[0]['idSujet']);

if(!empty($_SESSION['idMembre'])){
	$nomDuGrade = $modeleMembre->getGradeMembre($_SESSION['idMembre']);
}
?>