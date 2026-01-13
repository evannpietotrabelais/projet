<?php
include 'enteteadmin.php';
?>

<div class="container-fluid mt-4">
    <div class="row">
       
       <?php
            if( $_SESSION['profil'] != "admin"){
                header("location: accueilprojet.php");
            }
        ?>
        
        <div class="col-md-9 texteCentrer">
            <form action="creer_membre.php" method="post">

                Mail : <input type="email" name="mel"required>
                <br><br>

                Mot de Passe : <input type="password" name="motdepasse"required>
                <br><br>

                Nom : <input type="text" name="nom"required>
                <br><br>

                Prenom : <input type="text" name="prenom"required>
                <br><br>

                Adresse : <input type="text" name="adresse"required>
                <br><br>

                Ville : <input type="text" name="ville"required>
                <br><br>

                Code Postal : <input type="number" name="codepostal"required>
                <br><br>

                Profil : <input type="text" name="profil"required>
                <br><br>

                <input type="submit" class="btn btn-primary" value="Valider">

            </form>
        </div>

        <div class="col-md-3">
            <?php include_once 'authentification.php'; ?>
        </div>

    </div>
</div>
