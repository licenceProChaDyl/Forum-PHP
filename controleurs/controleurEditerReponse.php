<?php
/*
 * Controleur edition reponse, update une reponse
 */
$nomDuGrade = $modeleMembre->getGradeMembre($_SESSION['idMembre']);
$dataReponse = $query->getAllFromReponse($idReponse);
if ($_SESSION['idMembre']==$dataReponse['idMembre'] || $_SESSION['estAdminMembre']==EST_ADMIN_OUI){
	$idSujet=$dataReponse['idSujet'];
	$errors = array();
	if(!empty($_POST)) {
		if(empty($_POST['messageReponse'])) $errors[] = 'Message du sujet obligatoire';
		if(empty($errors)) {
			$idReponse=$_POST['editionIdReponse'];
			$messageReponse=$_POST['messageReponse'];
			if(!empty($idReponse)) {
				if ($dataReponse['idMembre']==$_SESSION['idMembre']){
					$query->majReponse($idReponse, $_SESSION['idMembre'], $messageReponse);
				}
				else{
					$query->majReponseDeMembre($idReponse, $messageReponse);
				}
				header("Location: sujets.php?idSujet=".$idSujet."&successEdition=1");
			} 
		}
	}
}
else{
	header("Location: index.php?erreur=1");
}

