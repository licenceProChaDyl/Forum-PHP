<?php
/*
 * Fonction connexion BDD
 */
require("loginsBDD.php");

function connexionBDD()
{
	$dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
      $connexion=new PDO($dsn,USER,PASSWD);
    }
    catch(PDOException $e){
      printf("Echec de la connexion : %s\n", $e->getMessage());
      exit();
    }
    return $connexion;
}

?>