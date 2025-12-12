<!-- include entete -->
<?php
include 'entete.html';
require_once('connexion.php'); 

 
 $stmt = $connexion->prepare ("SELECT * FROM livre
 inner join auteur on (livre.noauteur = auteur.noauteur)
 where auteur.nom like :nom ");

 $stmt->bindValue(":nom", "%" .$_GET["r"]."%");
 $stmt->setFetchMode(PDO::FETCH_OBJ); 
 $stmt->execute();

 for ($x = 0; $x <= $stmt -> rowcount()-1 ; $x++ ) {
  $enregistrement = $stmt->fetch();
   
  // Génère un lien vers la page details_livres.php avec l'ID du livre
   echo '<a href="http://localhost/projetevann/detail_livre.php?id=' . $enregistrement -> nolivre . '">
           <p><strong>Titre :</strong> ' 
           . htmlspecialchars($enregistrement -> titre) . '</a></p>';
}
?>