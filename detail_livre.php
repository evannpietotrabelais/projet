
<?php 
include 'entete.html'; 
require_once('connexion_base.php');

$stmt = $connexion->prepare("SELECT * FROM livre 
inner join auteur on (livre.noauteur = auteur.noauteur)
Where nolivre = ?");

if(isset($_GET['id'])) {
    $id = ($_GET['id']);

    $stmt->execute([$id]);
    $livre = $stmt->fetch(PDO::FETCH_OBJ);

    if($livre) {
       
        echo '<strong>Auteur : </strong>'.($livre -> nom) . '</h4>';  
        
        // Affichage de la description + ISBN
        echo '<div class="row">'; 
            echo '<div class="col-md-5">';      
            echo '<p><strong>ISBN 13 : </strong>' . ($livre->isbn13) . '</p>';
            echo '<p><strong>Résumé du livre :</strong><br>' . ($livre->detail) . '</p>';
     echo '</div>';
        
        // Affichage de l'image directement
        echo '<div class="col-md-1">';
        echo '<p><strong></strong><br><img src="covers/' . ($livre->photo) . '" alt="Image du livre" style="max-width:300px;"></p>';
        echo '</div>';
        echo '</div>';

        echo 'Pour pouvoir réserver vous devez vous identifiez';
    } 
    else {
        echo '<p>Livre non trouvé.</p>';
    }

    }
else {
    echo '<p>ID du livre non spécifié.</p>';
}
?>
<p><a href="lister_livres.php" class="btn btn-primary mt-3">← Retour à la liste</a></p>
</div>

