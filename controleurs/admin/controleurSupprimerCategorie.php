<?php
/*
 * Controleur suppression categorie
 */
if(!empty($_REQUEST['idCategorie'])) {
	
	$query->supprimerCategorie($_REQUEST['idCategorie']);
}
 
header('Location: listeCategorie.php?supprimerCategorie=1');