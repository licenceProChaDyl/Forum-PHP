<?php
/*
 * Controleur nouveau xml selon sous-categorie donné
 */
$allCategories = $query->getCategoriesAndSousCategories();
$errors = array();
if(!empty($_POST)) {
	if(empty($_POST['idSousCategorie'])) $errors[] = 'Choix de la sous catégorie obligatoire';
	if(empty($errors)) {
		$idSousCategorie = $_POST['idSousCategorie'];
		//	$resultat=$query->getAllFromReponseBySousCategorie($idSousCategorie);
			$connexion=mysql_pconnect(SERVER,USER,PASSWD);
			if(!$connexion){
				echo "Désolé, connexion à " . SERVER . "impossible \n";
				exit;
			}
			if(!mysql_select_db(BASE,$connexion)){
				echo "Désolé, connexion à " . BASE . "impossible \n";
				$connexion.mysql_close();
				exit;
			} 
			$resultat=mysql_query("SELECT * from reponse WHERE idSouscategorie=$idSousCategorie",$connexion);
				
			if ($resultat){ 
				$document = new DomDocument();
				// on crée la racine <lesfilms> et on l'insère dans le document
				$lesReponses = $document->createElement('lesreponses');
				$document->appendChild($lesReponses);
			
				// On boucle  pour tous les films trouvés dans la BD:
				 while($reponsebd=mysql_fetch_object($resultat)){
			    $reponse=$document->createElement('reponse');
			    $reponse->setAttribute('idReponse', utf8_encode($reponsebd->idReponse));
			    $lesReponses->appendChild($reponse);
			
			    $idSouscategorie = $document->createElement('idSouscategorie');
			    $reponse->appendChild($idSouscategorie);
			    $text=$document->createTextNode(utf8_encode($reponsebd->idSousCategorie));
			    $idSouscategorie->appendChild($text);
			
			   	$idMembre = $document->createElement('idMembre');
			    $reponse->appendChild($idMembre);
			    $text2=$document->createTextNode(utf8_encode($reponsebd->idMembre));
			    $idMembre->appendChild($text2);
			    
			    $idSujet = $document->createElement('idSujet');
			    $reponse->appendChild($idSujet);
			    $text3=$document->createTextNode(utf8_encode($reponsebd->idSujet));
			    $idSujet->appendChild($text3);
			    
			    $dateCreationReponse = $document->createElement('dateCreationReponse');
			    $reponse->appendChild($dateCreationReponse);
			    $text4=$document->createTextNode(utf8_encode($reponsebd->dateCreationReponse));
			    $dateCreationReponse->appendChild($text4);
			    
			    $messageReponse = $document->createElement('messageReponse');
			    $reponse->appendChild($messageReponse);
			    $text5=$document->createTextNode(utf8_encode($reponsebd->messageReponse));
			    $messageReponse->appendChild($text5);
			  }
			    echo $document->save('xml/mesreponses.xml');
			}
			header("Location: genererXML.php?success=1");
	}
}

if (!empty($_REQUEST['idSujet'])) {
	$sujet = $query->getSujet($_REQUEST['idSujet']);
}


?>