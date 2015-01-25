<?php
/*
 * Controleur suppression sous categorie
 */
if(!empty($_REQUEST['idSousCategorie'])) {
	$idCategorie= $query->supprimerSousCategorie($_REQUEST['idSousCategorie']);
	$modeleStat->desincrementeStatCategorie($idCategorie);
}
 
header('Location: listeSousCategorie.php?supprimerSousCategorie=1');