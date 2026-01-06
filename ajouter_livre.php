<?php
session_start();
require_once('connexion_base.php');

if (isset($_POST['ajouter'])) {

    $stmt = $connexion->prepare("
        INSERT INTO livre (noauteur, titre, isbn13, anneeparution, detail)
        VALUES (:noauteur, :titre, :isbn13, :anneeparution, :detail)
    ");

    $stmt->bindValue(':auteur', $_POST['noauteur']);
    $stmt->bindValue(':titre', $_POST['titre']);
    $stmt->bindValue(':isbn13', $_POST['isbn13']);
    $stmt->bindValue(':anneeparution', $_POST['anneeparution']);
    $stmt->bindValue(':detail', $_POST['detail']);

    if ($stmt->execute()) {
        echo "<p> Livre ajouté avec succès</p>";
    } else {
        echo "<p> Erreur lors de l'ajout</p>";
    }
}
?>

<h2>Ajouter un livre</h2>

<form method="post" enctype="multipart/form-data">
    Auteur : <br>
    <input type="text" name="auteur" required><br><br>

    Titre : <br>
    <input type="text" name="titre" required><br><br>

    ISBN13 : <br>
    <input type="text" name="isbn" required><br><br>

    Année de parution : <br>
    <input type="number" name="annee" required><br><br>

    Résumé : <br>
    <textarea name="resume" required></textarea><br><br>

    Image : <br>
    <input type="file" name="image"><br><br>

    <input type="submit" name="ajouter" value="Ajouter">
</form>


