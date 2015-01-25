<?php
/*
 * Page front reponse
 */
require_once 'config.php';
include_once PATH_MODELES.'/modeleCommun.php';
include_once PATH_MODELES.'/modeleMembre.php';
include_once PATH_MODELES.'/modeleStat.php';

if (isset($_GET["reponseSujet"])){
	if(empty($_SESSION['idMembre']))
	{
		header("Location:". $_SERVER["HTTP_REFERER"]."&erreur=1");
	}
	else{
		$idSujetDemande = $_GET["reponseSujet"];
		include_once PATH_CONTROLEURS.'/controleurSujet.php';
		include_once PATH_CONTROLEURS.'/controleurReponse.php';
		include_once PATH_VUES.'/vueHeader.php';
		include_once PATH_VUES.'/vueReponse.php';
	}
}

if(!empty($_POST)) {
		include_once PATH_CONTROLEURS.'/controleurReponse.php';
}
?>