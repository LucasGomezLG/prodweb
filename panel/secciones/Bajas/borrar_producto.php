<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_producto = $_POST["id_producto"];
    
    $errores = '';
    
    if ($errores == '') {
        $sql = "DELETE FROM productos WHERE id_producto = '$id_producto';";
        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=listado_productos");
    }
    
}
require 'index.php?seccion=listado_productos';
