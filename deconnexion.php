<?php
/*
 * Page front deconnexion
 * 
 */

require_once 'config.php';
if(empty($_SESSION['idMembre'])) 
{
	header('Location: ./');
}
else{
	session_destroy();
	header('Location: ./index.php?deconnexion=1');
}