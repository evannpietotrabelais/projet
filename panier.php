<?php
    include 'entete.php';
    require_once 'connexion_base.php';
?>

<div class="container-fluid">
    <div class="row mt-3"> 
        <div class="col-md-9 text-center">  
            <h2 class="mb-4"> Votre panier </h2>
            
            <?php
           
           
            if (isset($_POST['valider_emprunt'])) {
                if (isset($_SESSION['email']) && !empty($_SESSION['panier'])) {
                    try {
                        $mel = $_SESSION['email'];
                        $dateEmprunt = date('Y-m-d');
                        
                        $stmt = $connexion->prepare("INSERT INTO emprunter (mel, nolivre, dateemprunt) VALUES (:mel, :nolivre, :date)");
                        
                        foreach ($_SESSION['panier'] as $livre) {
                            $stmt->execute([
                                ':mel' => $mel,
                                ':nolivre' => $livre[0],
                                ':date' => $dateEmprunt
                            ]);
                        }
                        
                        $_SESSION['panier'] = array(); 
                       echo '<strong>Emprunt validé avec succès.</strong>';

                    } catch (PDOException $e) {
                        echo 'Erreur : ' . $e->getMessage() . '';
                    }
                }
            }

           
            
            
            if (isset($_POST['supprimer'])){
                $_SESSION['panier'] = array();
            }

           
           
           
           
            if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
                
                foreach ($_SESSION['panier'] as $livre) {
                    
                    echo '<p><strong>' . $livre[1] . '</strong></p>';
                }

                echo '<br>'; 

               
                
                
                
                
                if (isset($_SESSION['email']) && $_SESSION['email'] !== "") {
                    echo '
                    <form method="post">
                        <input type="submit" name="valider_emprunt" value="Confirmer emprunt" class="btn btn-success">
                        <input type="submit" name="supprimer" value="Vider le panier" class="btn btn-danger">
                    </form>';
                } else {
                    echo '<p class="text-center text-muted mt-3 italic">Connectez-vous pour confirmer votre emprunt</p>';
                }

            } else {
                echo '<p>Votre panier est vide.</p>';
            }
            ?>
        </div>

        <div class="col-md-3">
            <?php include 'authentification.php'; ?>
        </div>
    </div>
</div>