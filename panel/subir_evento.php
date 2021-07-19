<?php

if(empty($_POST["nombre"])):
    header("Location:index.php?seccion=nuevo_evento&error=nombre");
    die();
endif;

if(empty($_POST["desc"])):
    header("Location:index.php?seccion=nuevo_evento&error=desc");
    die();
endif;

if(empty($_POST["fecha"])):
    header("Location:index.php?seccion=nuevo_evento&error=fecha");
    die();
endif;

if(empty($_POST["lugar"])):
    header("Location:index.php?seccion=nuevo_evento&error=lugar");
    die();
endif;


$nombre = trim(strtolower($_POST["nombre"]));
$fecha = $_POST["fecha"];
$lugar = $_POST["lugar"];
$desc = $_POST["desc"];



if(is_dir("eventos/$nombre")):
    header("Location:index.php?seccion=nuevo_evento&error=existe");
    die();
endif;


mkdir("../eventos/$nombre");
file_put_contents("../eventos/$nombre/descripcion.txt",$desc);
file_put_contents("../eventos/$nombre/fecha.txt",$fecha);
file_put_contents("../eventos/$nombre/lugar.txt",$lugar);


if(!empty($_FILES["imagen"])):
    $imagen = $_FILES["imagen"]["name"];

    if($_FILES["imagen"]["name"] && strpos($imagen,".jpg") === false):
        header("Location:index.php?seccion=nuevo_evento&error=imagen");
        die();
    endif;

    $imagen  = $_FILES["imagen"];
    $origen  = $_FILES["imagen"]["tmp_name"];
    $destino = "../eventos/$nombre/$nombre.jpg";

    move_uploaded_file($origen, $destino);

endif;

header("Location:index.php?seccion=listado_eventos&estado=ok&ok=cargado");