<?php
/*
 * Fonction connexion BDD
 */
$host = $_SERVER['HTTP_HOST'];
if($host=='www.phpforum.dylangillard.com' || $host=='phpforum.dylangillard.com'){
	require("loginsBDD_prod.php");
}
else{
	require("loginsBDD.php");
}
//require("loginsBDD.php");
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