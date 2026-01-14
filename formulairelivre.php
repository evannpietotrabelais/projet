<?php
include 'enteteadmin.php';
?>

<div class="container-fluid mt-4">
<div class="row">    
        
        <?php
            if( $_SESSION['profil'] != "admin"){
                header("location: accueilprojet.php");
            }
            require_once('connexion_base.php');
            $query = $connexion->query("SELECT noauteur, nom, prenom FROM auteur ORDER BY nom ASC");
            $auteurs = $query->fetchAll(PDO::FETCH_ASSOC);
        ?>


        <div class="col-md-9 texteCentrer">
            <form action="ajouter_livre.php" method="post">
            

            
            <br><br>
            <select name="auteur" id="auteur" required>
                <option value="">auteur</option>
                <?php 
            foreach ($auteurs as $aut): 
            ?>
                <option value="<?php echo $aut['noauteur']; ?>">
                    <?php echo $aut['nom'] . " " . $aut['prenom']; ?>
                </option>
            <?php endforeach; ?>
            </select>
                
                
                
                <br><br>
                Titre : <input type="text" name="titre"required>


                <br><br>
                ISBN 13 : <input type="text" name="isbn13"required>

                <br><br>
                Année de parution : <input type="number" name="anneeparution"required>

                <br><br>
                Résumé : <input type="text" name="detail"required>

                <br><br>
                Image : <input type="text" name="photolivre"required>


                <br><br>
                <input type="submit" class="btn btn-primary" value="Valider">
            </form>
        </div>

        <div class="col-md-3">
            <?php include_once 'authentification.php'; ?>
        </div>

    </div>
</div>
