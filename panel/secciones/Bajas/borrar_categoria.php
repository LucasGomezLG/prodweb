<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_categoria = $_POST["id_categoria"];
    $id_padre = $_POST["id_padre"];
    
    $errores = '';
    
    if ($errores == '') {
        $sql = "DELETE FROM categorias WHERE id_categoria = '$id_categoria';";
        $count = $con->exec($sql);
        
        if($id_padre == 0){
            header("Location: index.php?seccion=listado_categorias");
        }else{
            header("Location: index.php?seccion=listado_subcategorias");
        }

        
    }
    
}
require 'index.php?seccion=listado_categorias';
