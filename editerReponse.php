<?php
/*
 * Page front edition reponse
 */
require_once 'config.php';
if(empty($_SESSION['idMembre'])) 
{
	header("Location: index.php?pasLogged=1");
}
else{
	if (isset($_GET["idReponse"])){
		$idReponse=$_GET["idReponse"];
		include_once PATH_MODELES.'/modeleCommun.php';
		include_once PATH_MODELES.'/modeleMembre.php';
		include_once PATH_CONTROLEURS.'/controleurEditerReponse.php';
		include_once PATH_VUES.'/vueHeader.php';
		include_once PATH_VUES.'/vueEditerReponse.php';
	}
}
