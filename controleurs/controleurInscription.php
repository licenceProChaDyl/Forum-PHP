<?php
/*
 * Controleur inscription, ajoute une inscription 
 */
	if (!empty( $_POST['pseudo']) && !empty( $_POST['motdepass']) && !empty( $_POST['email'])){
	
		$pseudoMembre=$_POST ['pseudo'];
		$mdpMembre=md5($_POST ['motdepass']);
		$mailMembre=$_POST ['email'];
	
		$modeleMembre->addMembreInscription($mailMembre, $pseudoMembre, $mdpMembre);
		header("Location: index.php?okInscription=1");
	}
	
	else{
		header("Location: index.php?erreur=1");
	}