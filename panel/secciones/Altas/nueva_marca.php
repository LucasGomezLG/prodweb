<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST["nombre"];
    
    if (isset($_POST['check1'])) {
$active = 1;
    } else {
    $active = 0;
    }
    
    $errores = '';
    
    if ($errores == '') {
        $sql = "INSERT INTO marcas(nombre,active) VALUES ('$nombre','$active');";
        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=listado_marcas");
    }
    
}
require 'Views/nueva_marca_view.php';
?>