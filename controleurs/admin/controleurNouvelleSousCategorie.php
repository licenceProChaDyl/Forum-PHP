<?php
/*
 * Controleur nouvelle sous categorie ou edition sous-categorie
 */
$allCategories = $query->getAllCategories();

if(!empty($_REQUEST['idSousCategorie'])) {
	$sousCategorie = $query->getSousCategorie($_REQUEST['idSousCategorie']);
}
$errors = array();
if(!empty($_POST)) {

	if(empty($_POST['nomSousCategorie'])) $errors[] = 'Titre du sujet obligatoire';
	if(empty($_POST['descriptionSousCategorie'])) $errors[] = 'Message du sujet obligatoire';
	$idMembre = $_POST['idMembre'];
	$idCategorie = $_POST['idCategorie'];
	$nomSousCategorie = $_POST['nomSousCategorie'];
	$descriptionSousCategorie = $_POST['descriptionSousCategorie'];
	if(empty($errors)) {
		if(empty($_POST['editionIdSousCategorie'])) {
			$query->addSousCategorie($idMembre, $idCategorie, $nomSousCategorie, $descriptionSousCategorie);
			$modeleStat->incrementeStatCategorie($idCategorie);
			header("Location: listeSousCategorie.php?success=1");
		} else {
			$idSousCategorie=$_POST['editionIdSousCategorie'];
			$query->majSousCategorie($idMembre, $idCategorie, $nomSousCategorie, $descriptionSousCategorie, $idSousCategorie);
			header("Location: listeSousCategorie.php?successEdition=1");
		}
	}
}
?>