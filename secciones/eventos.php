<?php
 
 if(!defined("ACCESO")){
        header("Location: ../index.php?seccion=eventos");
    }

?>

<section id="Productos">
    <div class="container mb-5 mt-2">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center txt-productos mt-3 mb-3">Proximos eventos</h1>
            </div>
        </div>
        <div class="row">

                <?php
                    $carpeta = "eventos";
                    $dir = opendir($carpeta);
                        while($eventos = readdir($dir)):
                            if($eventos != "." && $eventos != ".."):
                                $imagen = count(glob("$carpeta/$eventos/$eventos.*")) > 0 ? glob("$carpeta/$eventos/$eventos.*")[0] : "img/logo-ft.jpg";
                                $desc = nl2br(file_get_contents("$carpeta/$eventos/descripcion.txt"));
                                
                                $fecha = nl2br(file_get_contents("$carpeta/$eventos/fecha.txt"));
                                $lugar = nl2br(file_get_contents("$carpeta/$eventos/lugar.txt"));
                ?>

            <div class="col-12 col-md-3 my-3">
                <div class="card-deck">
                    <div class="card border-default colortarjetas">
                        <div class="card-body">
                            <a href="#">
                                <img src="<?php echo $imagen; ?>" alt="<?php echo $eventos;?>" class="img-fluid">
                            </a>
                            <h4 class="card-title text-center mt-2  mb-2"> <?= nombre($eventos);?></h4>
                            
                            <p class="" style="height: 150px !important;
	overflow-y:auto !important"><?php echo ucfirst($desc); ?></p>
                            <p class="">Lugar: <?php echo ucfirst($lugar); ?></p> 
                            <p class="">Fecha: <?php echo $fecha; ?></p>                        
                        </div>
                    </div>
                </div>
            </div>

                <?php
                            endif;
                        endwhile;
                            closedir($dir);
                ?>

        </div>
    </div>
</section>