
<!-- include entete -->
<?php
include 'entete.html';
?>

 <!-- COLONNE DROITE : authentification -->
 <div class="col-md-2 ms-auto">
      <?php include 'authentification.php'; ?>
    </div>

<!-- Dernieres acquisitions -->
<div class="col-md-12 text-right">
    <p><h3 align="center"><font color="green">Dernières acquisitions</font></h3></p>
  </div>

<!-- Carousel -->

 <?php 
 include 'recup_carousel.php';
  ?>
