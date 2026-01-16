<?php 
include 'entete.php'; 
require_once('connexion_base.php');


if (isset($_POST['ajouter_panier'])) {
    $id_livre = $_POST['id_livre'];
    $titre_livre = $_POST['titre_livre'];

    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = array();
    }

    $_SESSION['panier'][] = array($id_livre, $titre_livre,);

    echo '<div class="text-center" >Le livre a bien été ajouté à votre panier ! </div>';
}
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

                    
                    echo '<div class="mt-4">';
    
                   
                    echo '<a href="lister_livres.php" class="btn btn-secondary" style="margin-right: 10px;">';
                        echo 'Retour à la liste'; echo '</a>';

                   
                    echo '<form method="post" style="display: inline-block;">';
                        echo '<input type="hidden" name="id_livre" value="' . $livre->nolivre . '">';
                        echo '<input type="hidden" name="titre_livre" value="' . $livre->titre . '">';
                        echo '<input type="hidden" name="nom_auteur" value="' . $livre->nom . '">';
                        echo '<button type="submit" name="ajouter_panier" class="btn btn-success">';
                            echo 'Ajouter au panier';
                        echo '</button>';
                    echo '</form>';

                echo '</div>';

                } else {
                    echo '<p>Livre non trouvé.</p>';
                }
            } else {
                echo '<p>ID du livre non spécifié.</p>';
            }
            ?>

        </div>

        <div class="col-md-3">
            <?php include 'authentification.php'; ?>
        </div>

    </div>
</div>