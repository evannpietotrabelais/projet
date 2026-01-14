<?php

$pdo = new PDO("mysql:host=localhost;dbname=projetevann;charset=utf8", "root", "");


$stmt = $pdo->query("SELECT photo FROM livre ORDER BY dateajout DESC LIMIT 3");
$livre = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<div id="carouselLivres" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">

        <?php
        $active = true;
        foreach ($livre as $livre) {
            echo '<div class="carousel-item '.($active ? 'active' : '').'">';
            echo '<img src="covers/'.$livre['photo'].'" class="d-block mx-auto" alt="Livre" style="width: 20%" >';
            echo '</div>';
            $active = false;
        }
        ?>
    </div>



    <button class="carousel-control-prev" type="button" data-bs-target="#carouselLivres" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselLivres" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>