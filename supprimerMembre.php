<?php 
/*
 * Page front suppression de membre
 */
require_once 'config.php';
if(empty($_SESSION['idMembre'])) 
{
	header('Location: ./');
}
else{
	if(($_SESSION['estAdminMembre']==EST_ADMIN_OUI)){
		include_once PATH_MODELES.'/modeleMembre.php';
		include_once PATH_MODELES.'/modeleCommun.php';
		include_once PATH_MODELES.'/modeleStat.php';
		include_once PATH_CONTROLEURS.'/admin/controleurSupprimerMembre.php';
	}
	else{
		header('Location: ./index.php?erreur=1');
	}
}
