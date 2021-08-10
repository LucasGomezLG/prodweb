<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_usuario = $_POST["id_usuario"];
    
    $errores = '';
    
    if ($errores == '') {
        $sql = "DELETE FROM usuarios WHERE id_user = '$id_usuario';";
        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=listado_usuarios");
    }
    
}
require 'index.php?seccion=listado_usuarios';
