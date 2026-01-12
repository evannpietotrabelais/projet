<?php
    include 'entete.php';
?>

<div class="row container-fluid"> 
    <div class="col-md-10 container-fluid texteCentrer">  
        <h2> Votre panier </h2>
        
        <?php
            $panier = array();
            
            if (isset($_SESSION['panier']) && ($_SESSION['panier'] != "")){
                if ($_SESSION['panier'] == array()){
                    echo 'Aucun livre dans le panier !';
                }
                else{
                    for($x = 0; $x < count($_SESSION['panier']); $x++) {

                        echo '<div class="row">
                                <div class="col-md-7">
                                <a href="http://localhost/projet/detail_livre.php?titre='.$_SESSION['panier'][$x][1].'">
                            
                                </div>
                                <br><br>
                            ';               
                        }             
                    
                        echo '
                        <form method="post">
                            <input type="submit" name="supprimer" value="Vider le panier" class="btn btn-outline-danger">
                        </form>';
                                                   
                }
            }
            else{
                echo "connectez vous avant d'acceder au panier";
            }
            
            if (isset($_POST['supprimer'])){
                echo 'supprimer';
            }
        ?>
    
    </div>
    <div class="col-md-12">
            <?php include 'authentification.php'; ?>
        </div>
