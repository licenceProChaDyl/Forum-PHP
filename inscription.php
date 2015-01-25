<?php
/*
 * Page front inscription
 */
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	include_once PATH_MODELES.'/modeleCommun.php';
	include_once PATH_MODELES.'/modeleMembre.php';
	include_once PATH_CONTROLEURS.'/controleurInscription.php';
	include_once PATH_VUES.'/vueHeader.php';
}
?>