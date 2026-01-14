<?php include 'entete.php'; ?>

<div class="container-fluid">
    <div class="row">

       
        <div class="col-md-9">
            <h3 class="text-center text-success my-4">
                Dernières acquisitions
            </h3>

            <?php include 'recup_carousel.php'; ?>
        </div>

      
        <div class="col-md-3 d-flex justify-content-end">
            <div style="min-width: 250px;">
                <?php include 'authentification.php'; ?>
            </div>
        </div>

    </div>
</div>
