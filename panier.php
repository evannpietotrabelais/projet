<?php
    include 'entete.php';
?>

<div class="container-fluid">
    <div class="row mt-3"> 
        
        <div class="col-md-9 texteCentrer">  
            <h2> Votre panier </h2>
            
            <?php
                $panier = array();
                
                if (isset($_SESSION['panier']) && ($_SESSION['panier'] != "")){
                    if ($_SESSION['panier'] == array()){
                        echo 'Aucun livre dans le panier !';
                    }
                    else{
                        for($x = 0; $x < count($_SESSION['panier']); $x++) {
                            echo '<div class="row mb-2">
                                    <div class="col-md-12">
                                        <a href="http://localhost/projet/detail_livre.php?titre='.$_SESSION['panier'][$x][1].'">
                                            '.$_SESSION['panier'][$x][1].'
                                        </a>
                                    </div>
                                  </div>';               
                        }             
                        
                        echo '
                        <form method="post" class="mt-3">
                            <input type="submit" name="supprimer" value="Vider le panier" class="btn btn-outline-danger">
                        </form>';
                    }
                }
                else{
                    echo "Connectez-vous avant d'accéder au panier";
                }
                
                if (isset($_POST['supprimer'])){
                  
                    $_SESSION['panier'] = array();
                    echo '<p class="text-danger mt-2">Le panier a été vidé.</p>';
                }
            ?>
           
        </div>

        <div class="col-md-3 ">
            <?php include 'authentification.php'; ?>
        </div>
