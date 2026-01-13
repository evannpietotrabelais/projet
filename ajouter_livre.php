    <?php
        include 'enteteadmin.php';
  
        require_once('connexion_base.php');

        if( $_SESSION['profil'] != "admin"){
            header("location: accueilprojet.php");
        }

        $noauteur = $_POST['auteur'];
        $titre = $_POST['titre'];
        $isbn = $_POST['isbn13'];
        $anneeparution = $_POST['anneeparution'];
        $detail = $_POST['detail'];
        $photo = $_POST['photolivre'];
        $dateajout = date("Y-m-d");
        

        $sql = "INSERT INTO livre (noauteur, titre, isbn13, anneeparution, detail,dateajout,photo) 
          VALUES (:noauteur, :titre, :isbn13, :anneeparution, :detail,:dateajout, :photo)";
       
       $stmt = $connexion->prepare($sql);

        
        $stmt->bindValue(":noauteur", $noauteur, PDO::PARAM_INT);
        $stmt->bindValue(":titre", $titre);
        $stmt->bindValue(":isbn13", $isbn); 
        $stmt->bindValue(":anneeparution", $anneeparution);
        $stmt->bindValue(":detail", $detail);
        $stmt->bindValue(":dateajout", $dateajout);   
        $stmt->bindValue(":photo", $photo); 

        $stmt->execute();
        
    
        
    ?>

    <div class="row container-fluid">
        <div class="col-md-10 texteCentrer">
            <h3> le livre à été ajouté !</h3>
        </div>

    <?php
        include 'authentification.php';
    ?>
        
</div>

