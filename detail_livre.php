<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Détails du livre</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-4">

<?php 
include 'entete.html'; 
require_once('connexion.php');

if(isset($_GET['id'])) {
    $id = intval($_GET['id']); // sécurisation de l'ID

    $stmt = $connexion->prepare("SELECT * FROM livre WHERE nolivre = ?");
    $stmt->execute([$id]);
    $livre = $stmt->fetch(PDO::FETCH_OBJ);

    if($livre) {
        echo '<h1>' . htmlspecialchars($livre->titre) . '</h1>';

    echo '<div class="row">';
   // Affichage de lA description
        echo '<div class="col-md-8">';      
        echo '<p><strong>Résumé du livre :</strong><br>' . nl2br(htmlspecialchars($livre->detail)) . '</p>';
        echo '</div>';
        // Affichage de l'image directement
        echo '<div class="col-md-4">';
        echo '<p><strong></strong><br><img src="covers/' . htmlspecialchars($livre->photo) . '" alt="Image du livre" style="max-width:300px;"></p>';
        echo '</div>';


    echo '</div>';

    } else {
        echo '<p>Livre non trouvé.</p>';
    }
} else {
    echo '<p>ID du livre non spécifié.</p>';
}
?>

<p><a href="lister_livres.php" class="btn btn-primary mt-3">← Retour à la liste</a></p>
</div>
</body>
</html>
