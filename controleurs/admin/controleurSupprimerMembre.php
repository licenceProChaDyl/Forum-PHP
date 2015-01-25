<?php
/*
 * Controleur suppression membre
 */
if(!empty($_REQUEST['idMembre'])) {
	$modeleMembre->supprimerMembre($_REQUEST['idMembre']);
} 
header('Location: listeMembre.php?supprimerMembre=1');