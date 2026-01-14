<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="d-flex justify-content-between align-items-start w-100">

   
    <div class="flex-grow-1">

        <header><h6>
            La Bibliothèque de Moulinsart est fermée au public jusqu'à nouvel ordre. 
            Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive !
        </h6></header><br>

        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
          
              <a class="navbar-brand" href="accueiladmin.php">Accueil Admin </a>
          
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
                        
              <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                  </li>
                </ul>
                
    
                <div class="d-flex gap-2">
                    <form method="get" action="formulairemembre.php">
                        <button class="btn btn-primary" type="submit">Créer un membre</button>
                    </form>
                
                    <form method="get" action="formulairelivre.php">
                        <button class="btn btn-primary" type="submit">Ajouter un livre</button>
                    </form>
                </div>
                
              </div>
            </div>
          </nav>          

    </div>

    
    <img src="entete/chateau.png" alt="chateau" style="height:150px;" class="ms-3">

</div>
</body>