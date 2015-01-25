<?php
/*
 * Page front sujets
 */
require_once 'config.php';

if (isset($_GET["idSujet"])){
	$idSujetDemande = $_GET["idSujet"];
	include_once PATH_MODELES.'/modeleCommun.php';
	include_once PATH_MODELES.'/modeleMembre.php';
	include_once PATH_MODELES.'/modeleStat.php';
	include_once PATH_CONTROLEURS.'/controleurSujet.php';
	include_once PATH_CONTROLEURS.'/controleurReponse.php';
	include_once PATH_VUES.'/vueHeader.php';
	include_once PATH_VUES.'/vueSujet.php';
	include_once PATH_VUES.'/vueListeReponse.php';
}
?>