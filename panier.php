<?php 
include 'entete.html';
?>

<div class="container mt-2">
  <div class="row">

    <!-- Colonne gauche : panier -->
    <div class="col-md-8" style="padding: 15px;">
      <h3 class="text-success text-center">Votre panier</h3>
      <p class="text-primary text-center" style="font-size: 12px;">
          (encore X réservation possible, X emprunt en cours)
      </p>
    </div>

    <!-- Colonne droite : authentification -->
    <div class="col-md-4">
      <?php include 'authentification.php'; ?>
    </div>

  </div>
</div>
