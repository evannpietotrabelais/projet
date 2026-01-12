
<?php 
include 'entete.php'; 
require_once('connexion_base.php');
?>

<div class="container-fluid mt-4">
    <div class="row">

       
        <div class="col-md-9">

            <?php
            $stmt = $connexion->prepare("
                SELECT * FROM livre
                INNER JOIN auteur ON (livre.noauteur = auteur.noauteur)
                WHERE nolivre = ?
            ");

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $stmt->execute([$id]);
                $livre = $stmt->fetch(PDO::FETCH_OBJ);

                if ($livre) {

                    echo '<h4><strong>Auteur :</strong> ' . $livre->nom . '</h4>';

                    echo '<div class="row mt-3">';
                        echo '<div class="col-md-7">';
                            echo '<p><strong>ISBN 13 :</strong> ' . $livre->isbn13 . '</p>';
                            echo '<p><strong>Résumé du livre :</strong><br>' . $livre->detail . '</p>';
                        echo '</div>';

                        echo '<div class="col-md-5 text-end">';
                            echo '<img src="covers/' . $livre->photo . '" 
                                  alt="Image du livre" 
                                  class="img-fluid" 
                                  style="max-width:300px;">';
                        echo '</div>';
                    echo '</div>';

                    echo '<p class="text-danger mt-3">
                            Pour pouvoir réserver vous devez vous identifier
                          </p>';

                } else {
                    echo '<p>Livre non trouvé.</p>';
                }
            } else {
                echo '<p>ID du livre non spécifié.</p>';
            }
            ?>

            <a href="lister_livres.php" class="btn btn-primary mt-3">
                ← Retour à la liste
            </a>

        </div>

        <div class="col-md-3">
            <?php include 'authentification.php'; ?>
        </div>

    </div>
</div>