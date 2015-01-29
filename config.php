<?php
/*
 * Fichier de conf, appelé pour chaque appelle du front
 */
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('Europe/Lisbon');
define('PATH_CONTROLEURS',dirname(__FILE__).'/controleurs');
define('PATH_MODELES',dirname(__FILE__).'/modeles');
define('PATH_VUES',dirname(__FILE__).'/vues');
define('EST_ADMIN_OUI','oui');
define('EST_ADMIN_NON','non');
define('GRADE_ADMINISTRATEUR','Administrateur');
define('GRADE_MEMBRE','Membre lambda');
define('STATUT_OUVERT','ouvert');
define('STATUT_CLOS','clos');
require("connexionBDD.php");
?>