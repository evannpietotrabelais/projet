<?php
session_start();
require_once('connexion_base.php');
?>

<h3>Créer un nouveau membre</h3>

<form method="post">
    E-mail :<br>
    <input type="text" name="mel" required><br><br>

    Mot de passe :<br>
    <input type="password" name="pwd" required><br><br>

    Nom :<br>
    <input type="text" name="nom" required><br><br>

    Prénom :<br>
    <input type="text" name="prenom" required><br><br>

    Adresse :<br>
    <input type="text" name="adresse"><br><br>

    Code postal :<br>
    <input type="text" name="codepostal"><br><br>

    Ville :<br>
    <input type="text" name="ville"><br><br>

    Profil :<br>
    <select name="profil">
        <option value="client">client</option>
        <option value="admin">admin</option>
    </select><br><br>

    <input type="submit" name="creer" value="Créer">
</form>

<?php
if (isset($_POST['creer'])) {
    $sql = "INSERT INTO utilisateur 
            (mel, motdepasse, nom, prenom, adresse, codepostal, ville, profil) 
            VALUES 
            (:mel, :motdepasse, :nom, :prenom, :adresse, :codepostal, :ville, :profil)";
            
    $stmt = $connexion->prepare($sql);
    
    $stmt->bindValue(':mel', $_POST['mel']);
    $stmt->bindValue(':motdepasse', $_POST['pwd']);  
    $stmt->bindValue(':nom', $_POST['nom']);
    $stmt->bindValue(':prenom', $_POST['prenom']);
    $stmt->bindValue(':adresse', $_POST['adresse']);
    $stmt->bindValue(':codepostal', $_POST['codepostal']);
    $stmt->bindValue(':ville', $_POST['ville']);
    $stmt->bindValue(':profil', $_POST['profil']);
    
    if ($stmt->execute()) {
        echo "<p> Membre créé avec succès !</p>";
    } else {
        echo "<p> Erreur lors de la création.</p>";
    }
}
?>
