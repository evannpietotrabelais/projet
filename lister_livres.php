<?php 
include 'entete.php'; 
require_once('connexion_base.php');
?>

<div class="container-fluid mt-4">
    <div class="row">


        <div class="col-md-9">

         <h3 class="text-center mb-4">Liste des livres</h3>

            <?php
            $stmt = $connexion->prepare("SELECT * FROM livre");
            $stmt->setFetchMode(PDO::FETCH_OBJ);
            $stmt->execute();

            for ($i = 0; $i <= $stmt->rowCount() - 1; $i++) {
                $enregistrement = $stmt->fetch(); 

                echo '<p>
                        <a href="http://localhost/projet/detail_livre.php?id=' . $enregistrement->nolivre . '">'
                            . $enregistrement->titre .
                        '</a>
                      </p>';
            }
            ?>

        </div>

        <div class="col-md-3">
            <?php include 'authentification.php'; ?>
        </div>

    </div>
</div>