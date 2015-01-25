<?php 
/*
 * Page front suppression sujet
 */
require_once 'config.php';
if(empty($_SESSION['idMembre']))
	{
		header("Location:". $_SERVER["HTTP_REFERER"]."&erreur=1");
	}
else{
		include_once PATH_MODELES.'/modeleCommun.php';
		include_once PATH_MODELES.'/modeleMembre.php';
		include_once PATH_MODELES.'/modeleStat.php';
		include_once PATH_CONTROLEURS.'/controleurSupprimerSujet.php';
	}
