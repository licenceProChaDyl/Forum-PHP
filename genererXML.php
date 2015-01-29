<?php
/*
 * Page front pour generer xml des reponse d'un sous catégorie
 */
require_once 'config.php';
if(empty($_SESSION['idMembre']))
{
	header("Location:".$_SERVER['HTTP_REFERER']."&erreur=1");
}
else{
	include_once PATH_MODELES.'/modeleCommun.php';
	include_once PATH_MODELES.'/modeleMembre.php';
	include_once PATH_CONTROLEURS.'/admin/controleurNouveauXML.php';
	include_once PATH_VUES.'/vueHeader.php';
	include_once PATH_VUES.'/admin/vueNouveauXML.php';
}
?>