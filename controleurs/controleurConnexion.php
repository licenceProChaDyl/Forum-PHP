<?php
/*
 * Controleur connexion, verifie les champs et recupère les infos necessaire pour un membre
 * Creation des variables de sessions
 */
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (!empty( $_POST['pseudo']) && !empty( $_POST['motdepass'])){
		$pseudoMembre = $_POST['pseudo'];
		$mdpMembre = md5($_POST['motdepass']);
		$verifMembre = $modeleMembre->connexionMembre($pseudoMembre, $mdpMembre);
		if ($verifMembre) {
			$_SESSION['pseudoMembre'] = $verifMembre['pseudoMembre'];
			$_SESSION['idMembre'] = $verifMembre['idMembre'];
			$_SESSION['estAdminMembre'] = $verifMembre['estAdminMembre'];
			$_SESSION['idGrade'] = $verifMembre['idGrade'];
			$_SESSION['dateInscriptionMembre'] = $verifMembre['dateInscriptionMembre'];
			$_SESSION['nbMessageMembre'] = $verifMembre['nbMessageMembre'];
			$_SESSION['lienAvatarMembre'] = $verifMembre['lienAvatarMembre'];
			header ('Location: ./index.php');
		}
		else {
			header ('Location: ./index.php?erreur=1');
		}
	}
}
?>