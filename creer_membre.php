<?php
        include 'enteteadmin.php';
    ?>

    <?php
        require_once('connexion_base.php');

        if( $_SESSION['profil'] != "admin"){
            header("location: accueilprojet.php");
        }

        $mel = $_POST['mel'];
        $motdepasse = $_POST['motdepasse'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $adresse = $_POST['adresse'];
        $ville = $_POST['ville'];
        $codepostal = $_POST['codepostal'];
        $profil = $_POST['profil'];

        $sql = "INSERT INTO utilisateur (mel, motdepasse, nom, prenom, adresse, ville, codepostal, profil) 
        VALUES (:mel, :motdepasse, :nom, :prenom, :adresse, :ville, :codepostal, :profil)";
        
        
        $stmt = $connexion->prepare($sql);

        $stmt->bindValue(":mel", $mel); 
        $stmt->bindValue(":motdepasse", $motdepasse);
        $stmt->bindValue(":nom", $nom); 
        $stmt->bindValue(":prenom", $prenom);
        $stmt->bindValue(":adresse", $adresse); 
        $stmt->bindValue(":ville", $ville); 
        $stmt->bindValue(":codepostal", $codepostal);
        $stmt->bindValue(":profil", $profil);

        $stmt->execute();
        $nb_ligne = $stmt->rowCount();


    ?>
    
    <div class="row container-fluid">
        <div class="col-md-8 texteCentrer">
            <h1> l'utilisateur à été ajouté !</h1>
        </div>

    <?php
        include 'authentification.php';
    ?>
        
</div>


