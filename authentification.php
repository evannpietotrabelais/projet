
<div class="col-md-12">
    <div class="row container texteCentrer Authentification">
        
        <?php
        require_once 'connexion_base.php';

        if (isset($_POST['deconnect'])) {
            session_destroy();
            header("Location: http://localhost/projet/accueilprojet.php");
            exit;
        }

        if (isset($_SESSION['profil']) && $_SESSION['profil'] !== "") {
        ?>
          
                <h5 class="text-decoration-underline"><?= $_SESSION['profil'] ?></h5><br>
                <p><?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></p>
                <p><?= $_SESSION['email'] ?></p>
                <p><?= $_SESSION['adresse'] ?></p>
                <p><?= $_SESSION['codepostal'] . ' ' . $_SESSION['ville'] ?></p>

                <form method="post">
                    <input type="submit" name="deconnect" value="Déconnexion">
                </form>
         

        <?php
 
        } else {

            if (!isset($_POST['connect'])) {
        ?>
                <div style="display:flex; justify-content:flex-end; padding-right:50px;">
                    <form method="post">
                        <h5 class="text-decoration-underline text-center">Se connecter</h5><br>

                        E-mail :<br>
                        <input type="email" name="mel" required><br><br>

                        Mot de passe :<br>
                        <input type="password" name="pwd" required><br><br>

                        <input type="submit" name="connect" value="Connexion">
                    </form>
                </div>

        <?php
            } else {

                $stmt = $connexion->prepare(
                    "SELECT * FROM utilisateur 
                     WHERE mel = :mel AND motdepasse = :pwd"
                );

                $stmt->execute([
                    ':mel' => $_POST['mel'],
                    ':pwd' => $_POST['pwd']
                ]);

                $user = $stmt->fetch(PDO::FETCH_OBJ);

                if ($user) {
                    $_SESSION['email'] = $user->mel;
                    $_SESSION['profil'] = $user->profil;
                    $_SESSION['nom'] = $user->nom;
                    $_SESSION['prenom'] = $user->prenom;
                    $_SESSION['adresse'] = $user->adresse;
                    $_SESSION['ville'] = $user->ville;
                    $_SESSION['codepostal'] = $user->codepostal;

                    if ($user->profil === 'admin') {
                        header("Location: http://localhost/projet/accueiladmin.php");
                    } else {
                        header("Location: http://localhost/projet/accueilprojet.php");
                    }
                    exit;

                } else {
                    echo "<h6>Email ou mot de passe incorrect</h6>";
                }
            }
        }
        ?>
    </div>
</div>