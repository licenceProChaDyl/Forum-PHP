<?php
/*
 * Controleur edition membre ou ajout membre, fait office de controleur pour l'edition du profil
 */
$_extensions = array('.jpeg','.JPEG', '.jpg','.JPG', '.png', '.PNG');
if(!empty($_REQUEST['idMembre'])) {
	$membre = $modeleMembre->getMembre($_REQUEST['idMembre']);
}
$errors = array();
if(!empty($_POST)) {
	if(empty($_POST['pseudoMembre'])) $errors[] = 'Pseudo obligatoire';
	//if(empty($_POST['prenomMembre'])) $errors[] = 'Prenom obligatoire';
	//if(empty($_POST['mdpMembre'])) $errors[] = 'Mot de pass obligatoire';
	//if(empty($_POST['nomMembre'])) $errors[] = 'Nom obligatoire';
	//if(empty($_POST['adresseMembre'])) $errors[] = 'Adresse obligatoire';
	//if(empty($_POST['cpMembre'])) $errors[] = 'Code postal obligatoire';
	//if(empty($_POST['villeMembre'])) $errors[] = 'Ville obligatoire';
	if(empty($_POST['mailMembre'])) $errors[] = 'Mail obligatoire';
	if($_FILES['avatar']["name"])
	{
		$extension = strrchr($_FILES['avatar']['name'], '.');
		if(!in_array($extension, $_extensions))
		{
			$errors[] = 'Extension de fichier non autorisé';
		}
	}	
	if(empty($errors)) {
		$idMembre=$_POST['editionIdMembre'];
		$pseudoMembre = $_POST['pseudoMembre'];
		if(empty($_POST['mdpMembre'])){
			$mdpMembre = $membre['mdpMembre'];
		}
		else{
			$mdpMembre = md5($_POST['mdpMembre']);
		}
		$prenomMembre = $_POST['prenomMembre'];
		$nomMembre = $_POST['nomMembre'];
		$adresseMembre = $_POST['adresseMembre'];
		$cpMembre = $_POST['cpMembre'];
		$villeMembre = $_POST['villeMembre'];
		$mailMembre = $_POST['mailMembre'];
		if(!empty($_POST['estAdminMembre'])){
			$estAdminMembre = $_POST['estAdminMembre'];
		}
		else{
			$estAdminMembre = EST_ADMIN_NON;
		}
		$idGrade='2';
		if($_FILES['avatar']["name"]=="")
		{
			$filename=null;
			$modeleMembre->updateAvatarMembre($idMembre, $filename);
		}		
		else if($_FILES['avatar']["name"]){
			$extension = strrchr($_FILES['avatar']['name'], '.');
			$dossier = 'avatar';
			if(!file_exists($dossier))
				mkdir($dossier);
			$filename = $dossier . '/' .$idMembre.strtolower($extension);
			if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $filename))
			{
				$errors[] = "Erreur dans l'upload de la photo";
			}
			$modeleMembre->updateAvatarMembre($idMembre, $filename);
		}
		if ($estAdminMembre==EST_ADMIN_OUI){
			$idGrade='1';
		}	
		if(empty($_POST['editionIdMembre'])) {		
			$modeleMembre->ajoutMembre($idGrade,$mailMembre, $pseudoMembre, $mdpMembre, $nomMembre, $prenomMembre, $adresseMembre, $cpMembre, $villeMembre, $estAdminMembre);
			header("Location: listeMembre.php?success=1");
		} else {
			$idMembre=$_POST['editionIdMembre'];
			$modeleMembre->majMembre($idGrade,$mailMembre, $pseudoMembre, $mdpMembre, $nomMembre, $prenomMembre, $adresseMembre, $cpMembre, $villeMembre, $estAdminMembre, $idMembre);
			if(($_SESSION['estAdminMembre']==EST_ADMIN_OUI)){				
				header("Location: listeMembre.php?successEdition=1");
			}
			else{
				header("Location: profil.php?successEdition=1");
			}
		}
	}
}

?>