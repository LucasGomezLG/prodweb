<?php

include_once('inc/db_connect.php');
include_once('class/classProducto.php');
include_once('class/classMarca.php');
include_once('class/classCategoria.php');

?>

<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light nv-bg">
        <div class="container">

            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="Adidas logo" class="img-fluid">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
                <ul class="navbar-nav ml-auto">

                    <?php 
                        foreach($navbar as $nav): 
                    ?>

                        <li class="nav-item <?= !empty($_GET["seccion"]) && $_GET["seccion"] == $nav["nombre"] ? "active" : "";  ?>">
                            <a class="nav-link" href="<?= $nav['ruta'] ?>">
                                <?= $nav['nombre'] ?>
                            </a>
                        </li>

                    <?php
                        endforeach;
                    ?>
                    

                </ul>
            </div>

        </div>
    </nav>
</header>





