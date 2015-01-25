<?php
/*
 * Page front sous-catégorie
 */
require_once 'config.php';

if (isset($_GET["idSousCategorie"])){
	$idSousCategorie = $_GET["idSousCategorie"];
	include_once PATH_MODELES.'/modeleCommun.php';
	include_once PATH_MODELES.'/modeleMembre.php';
	include_once PATH_MODELES.'/modeleStat.php';
	include_once PATH_CONTROLEURS.'/controleurSousCategorie.php';
	include_once PATH_VUES.'/vueHeader.php';
	include_once PATH_VUES.'/vueSousCategorie.php';
}
?>