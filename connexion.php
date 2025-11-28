<?php
try {

  $dns = 'mysql:host=localhost;dbname=projetevann'; 
  $utilisateur = 'root'; 
  $motDePasse = ''; 

  $connexion = new PDO( $dns, $utilisateur, $motDePasse );
} catch (Exception $e) {
  echo "Connexion à la base impossible : ", $e->getMessage();
  die();

}

?>

