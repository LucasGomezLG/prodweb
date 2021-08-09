<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_marca = $_POST["id_marca"];
    
    $errores = '';
    
    if ($errores == '') {
        $sql = "DELETE FROM marcas WHERE id_marca = '$id_marca';";
        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=listado_marcas");
    }
    
}
require 'index.php?seccion=listado_marcas';
?>