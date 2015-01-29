<?php
/*
 * Controleur inscription, ajoute une inscription 
 */
	if(!empty($_POST)) {
		if(!empty($_POST['pseudoMembre']))
		if(!empty($_POST['mdpMembre']))
		if(!empty($_POST['emailMembre']))
			$pseudoMembre=$_POST['pseudoMembre'];
			$mdpMembre=md5($_POST['mdpMembre']);
			$mailMembre=$_POST['emailMembre'];
			if ( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $mailMembre ) ){
				$modeleMembre->addMembreInscription($mailMembre, $pseudoMembre, $mdpMembre);
				header("Location: index.php?okInscription=1");
			}
			else{
				header("Location: index.php?koInscription=1");
			}							
	}
	else{
		header("Location: index.php?erreur=1");
	}
