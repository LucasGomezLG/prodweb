<?php

if(empty($_POST["id"])):
    header("Location: index.php?seccion=listado_productos&error=sin_producto");
    die();
endif;

$producto = $_POST["id"];

if(!is_dir("../productos/$producto")):
    header("Location: index.php?seccion=listado_productos&error=error_producto");
    die();
endif;


$carpeta = opendir("../productos/$producto");

while($archivo = readdir($carpeta)):

    if($archivo != "." && $archivo != ".."):

        unlink("../productos/$producto/$archivo");

    endif;

endwhile;

closedir($carpeta);

rmdir("../productos/$producto");

header("Location:index.php?seccion=listado_productos&ok=borrado&nombre=$producto");