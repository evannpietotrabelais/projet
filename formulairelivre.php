<?php
include 'enteteadmin.php';
?>

<div class="container-fluid mt-4">
    <div class="row">

        
        <div class="col-md-9 texteCentrer">
            <form action="ajouter_livre.php" method="post">
            
            <br><br>
            Auteur : <input type="text" name="auteur">
                
            <br><br>
                Titre : <input type="text" name="titre">


                <br><br>
                ISBN 13 : <input type="text" name="isbn13">

                <br><br>
                Année de parution : <input type="text" name="anneeparution">

                <br><br>
                Résumé : <input type="text" name="detail">

                <br><br>
                Image : <input type="text" name="photolivre">


                <br><br>
                <input type="submit" class="btn btn-primary" value="Valider">
            </form>
        </div>

        <div class="col-md-3">
            <?php include_once 'authentification.php'; ?>
        </div>

    </div>
</div>
