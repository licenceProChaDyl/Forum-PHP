<?php
/*
 * Fichier de conf, appelé pour chaque appelle du front
 */
session_start();
define('PATH_CONTROLEURS',dirname(__FILE__).'/controleurs');
define('PATH_MODELES',dirname(__FILE__).'/modeles');
define('PATH_VUES',dirname(__FILE__).'/vues');

define('EST_ADMIN_OUI','oui');
define('EST_ADMIN_NON','non');

define('STATUT_OUVERT','ouvert');
define('STATUT_CLOS','clos');

require("connexionBDD.php");
?>