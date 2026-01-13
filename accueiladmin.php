<?php include 'enteteadmin.php'; 

if( $_SESSION['profil'] != "admin"){
    header("location: accueilprojet.php");
}
?>



<div class="container-fluid mt-3">
    <div class="row justify-content-end">
        <div class="col-md-3">
            <?php include  'authentification.php'; ?>
        </div>
    </div>
</div>