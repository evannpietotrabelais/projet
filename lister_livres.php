
<?php 
include 'entete.html'; 
require_once('connexion.php');

$stmt = $connexion->prepare("SELECT * FROM livre");
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

while ($enregistrement = $stmt->fetch()) {
  // Génère un lien vers la page details_livres.php avec l'ID du livre
  echo '<a href="http://localhost/projetevann/detail_livre.php?id=' . $enregistrement->nolivre . '">' 
          . ($enregistrement->titre) . '</a></p>';
}
?>

</body>
</html>

