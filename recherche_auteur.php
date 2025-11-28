
<?php

require_once('connexion.php'); 
 $stmt = $connexion->prepare ("SELECT * FROM livre
 inner join auteur on (livre.noauteur = auteur.noauteur)
 where auteur.nom like :nom ");
 
 $stmt->bindValue(":nom", "%" .$_GET['r']."%"); 
 $stmt->setFetchMode(PDO::FETCH_OBJ);
 $stmt->execute();
 for ($x = 0; $x <= $stmt -> rowcount()-1 ; $x++) {
    $enregistrement = $stmt->fetch();
    $titre = enregistrement->titre;
    echo 
 }
?>

