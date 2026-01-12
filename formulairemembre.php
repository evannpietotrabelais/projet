<?php
include 'enteteadmin.php';
?>

<div class="container-fluid mt-4">
    <div class="row">

        
        <div class="col-md-9 texteCentrer">
            <form action="creer_membre.php" method="post">

                Mail : <input type="text" name="mel">
                <br><br>

                Mot de Passe : <input type="text" name="motdepasse">
                <br><br>

                Nom : <input type="text" name="nom">
                <br><br>

                Prenom : <input type="text" name="prenom">
                <br><br>

                Adresse : <input type="text" name="adresse">
                <br><br>

                Ville : <input type="text" name="ville">
                <br><br>

                Code Postal : <input type="text" name="codepostal">
                <br><br>

                Profil : <input type="text" name="profil">
                <br><br>

                <input type="submit" class="btn btn-primary" value="Valider">

            </form>
        </div>

        <div class="col-md-3">
            <?php include_once 'authentification.php'; ?>
        </div>

    </div>
</div>
