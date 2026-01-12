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
                WHERE auteur.nom LIKE :nom
            ");

            $stmt->bindValue(":nom", "%" . $_GET ['r'] . "%");
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();

            for ($x = 0; $x <= $stmt->rowCount() - 1; $x++) {
                $enregistrement = $stmt->fetch();

                
                echo '<p>
                        <a href="http://localhost/projet/detail_livre.php?id=' . $enregistrement->nolivre . '">
                            <strong>Titre :</strong> ' . $enregistrement->titre . '
                        </a>
                      </p>';
            }
            ?>

        </div>

        <div class="col-md-3">
            <?php include 'authentification.php'; ?>
        </div>

    </div>
</div>
