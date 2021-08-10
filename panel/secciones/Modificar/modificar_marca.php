<?php

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_marca = $_POST["id_marca"];
    $nombre = $_POST["nombre"];
    
    if (isset($_POST['check1'])){
                                    $active = 1;
                                } else {
                                        $active = 0;
    }
    
    $errores = '';

    if (empty($nombre)){
        $errores .= '.';
        
        
    } else {     
        $statement = $con->prepare('SELECT * FROM marcas WHERE nombre = :nombre LIMIT 1');
        $statement->execute(array(':nombre' => $nombre));
        $resultado = $statement->fetch();

        if($resultado != false) {
            $errores .= '..';
        }

    }
    if ($errores == '') {
        $sql = "UPDATE marcas SET nombre='$nombre', active='$active' WHERE id_marca='$id_marca'";

        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=listado_marcas");
    }
    
}
require 'Views/modificar_marca_view.php';
?>