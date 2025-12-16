<?php
session_start();

if (isset($_SESSION['profil'])) {
    if (!isset($_POST['deconnect'])) {
        echo '<center>
            <h5 class="text-center text-decoration-underline"> '.$_SESSION['profil'].'</h5><br><br>
            <h7 class="text-center"> ' . $_SESSION['prenom'] . '  ' . $_SESSION['nom'] . '</h7><br><br>
            <h7 class="text-center">' . $_SESSION['email'] . '</h7><br><br>
            <h7 class="text-center"> ' . $_SESSION['adresse'] . '</h7><br>
            <h7 class="text-center">' . $_SESSION['codepostal'] . ' ' . $_SESSION['ville'] . '</h7><br>
            <form method="post">
                <input type="submit" name="deconnect" value="Deconnexion">
            </form>
        </center>';
    } else {
        session_unset();
        session_destroy();
        header("Location: http://localhost/projetevann/accueilprojet.php");
        exit;
    }
} else {
    if (!isset($_GET['connect'])) {
        echo '<center>
            <form action="" method="GET">
                <h5 class="text-center text-decoration-underline">Se connecter</h5><br><br>
                E-mail :<br>
                <input type="text" name="mel"><br><br>
                Mot de passe :<br>
                <input type="password" name="pwd"><br><br>
                <input type="submit" name="connect" value="Connexion">
            </form>
        </center>';
    } else {
        require_once 'connexion_base.php';
        $stmt = $connexion->prepare("SELECT * FROM utilisateur WHERE mel = :mail AND motdepasse = :pwd");
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->bindValue(':mail', $_GET['mel']);
        $stmt->bindValue(':pwd', $_GET['pwd']);
        $stmt->execute();
        $enregistrement = $stmt->fetch();

        if ($enregistrement) {
            $_SESSION['password'] = $_GET['pwd'];
            $_SESSION['email'] = $_GET['mel'];
            $_SESSION['profil'] = $enregistrement->profil;
            $_SESSION['nom'] = $enregistrement->nom;
            $_SESSION['prenom'] = $enregistrement->prenom;
            $_SESSION['adresse'] = $enregistrement->adresse;
            $_SESSION['ville'] = $enregistrement->ville;
            $_SESSION['codepostal'] = $enregistrement->codepostal;
        } else {
            echo '<center>
                <form action="" method="post">
                    <br><br>
                    <h6>Mot de passe incorrect</h6>
                    <input type="submit" value="Retour">
                </form>
            </center>';
        }
    }
}
?>