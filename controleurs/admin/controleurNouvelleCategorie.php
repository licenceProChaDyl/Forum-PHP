<?php
/*
 * Controleur nouvelle categorie ou edition categorie
 */
if(!empty($_REQUEST['idCategorie'])) {
	$categorie = $query->getCategorie($_REQUEST['idCategorie']);
}

$errors = array();
if(!empty($_POST)) {

	if(empty($_POST['nomCategorie'])) $errors[] = 'Titre du sujet obligatoire';
	if(empty($_POST['descriptionCategorie'])) $errors[] = 'Message du sujet obligatoire';
	$idMembre = $_POST['idMembre'];
	$nomCategorie = $_POST['nomCategorie'];
	$descriptionCategorie = $_POST['descriptionCategorie'];
	if(empty($errors)) {
		if(empty($_POST['editionIdCategorie'])) {
			$query->addCategorie($idMembre, $nomCategorie, $descriptionCategorie);
			header("Location: listeCategorie.php?success=1");
		} else {
			$idCategorie=$_POST['editionIdCategorie'];
			$query->majCategorie($idMembre, $nomCategorie, $descriptionCategorie, $idCategorie);
			header("Location: listeCategorie.php?successEdition=1");
		}
	}
}
?>