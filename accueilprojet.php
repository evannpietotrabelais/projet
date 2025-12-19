<?php include 'entete.html'; ?>

<div class="container">
    <div class="row">

        <!-- Contenu principal -->
        <div class="col-md-9">
            <h3 class="text-center text-success my-4">
                Dernières acquisitions
            </h3>

            <!-- Carousel -->
            <?php include 'recup_carousel.php'; ?>
        </div>

        <!-- Colonne droite : authentification -->
        <div class="col-md-3">
            <?php include 'authentification.php'; ?>
        </div>

    </div>
</div>