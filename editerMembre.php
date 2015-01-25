<?php
/*
 * Page front edition membre
 */
require_once 'config.php';
if(empty($_SESSION['idMembre'])) 
{
	header('Location: ./');
}
else{
	include_once PATH_MODELES.'/modeleCommun.php';
	include_once PATH_MODELES.'/modeleMembre.php';
	include_once PATH_CONTROLEURS.'/admin/controleurEditerMembre.php';
	include_once PATH_VUES.'/vueHeader.php';
	include_once PATH_VUES.'/admin/vueEditerMembre.php';
}