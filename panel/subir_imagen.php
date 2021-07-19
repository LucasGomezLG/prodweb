<?php

if(empty($_POST["nombre"])):
    header("Location:index.php?seccion=nuevo_producto&error=nombre");
    die();
endif;


$nombre = trim(strtolower($_POST["nombre"]));



if(is_dir("productos/$nombre")):
    header("Location:index.php?seccion=nuevo_producto&error=existe");
    die();
endif;


mkdir("../productos/$nombre");


if(!empty($_FILES["imagen"])):
    $imagen = $_FILES["imagen"]["name"];

    if($_FILES["imagen"]["name"] && strpos($imagen,".jpg") === false):
        header("Location:index.php?seccion=nuevo_producto&error=imagen");
        die();
    endif;

    $imagen  = $_FILES["imagen"];
    $origen  = $_FILES["imagen"]["tmp_name"];
    $destino = "../productos/$nombre/$nombre.png";

    move_uploaded_file($origen, $destino);

endif;

header("Location:index.php?seccion=listado_productos&estado=ok&ok=cargado");