<!DOCTYPE html>
<html lang="en">
<head>
  <title>Liste des livres</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<?php 
include 'entete.html'; 
require_once('connexion.php');

$stmt = $connexion->prepare("SELECT * FROM livre");
$stmt->setFetchMode(PDO::FETCH_OBJ);
$stmt->execute();

while($enregistrement = $stmt->fetch()) {
    // Génère un lien vers la page details_livres.php avec l'ID du livre
    echo '<p><a href="detail_livre.php?id=' . $enregistrement->nolivre . '">'
         . htmlspecialchars($enregistrement->titre) . '</a></p>';
}
?>

</body>
</html>

