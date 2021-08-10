<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_producto = $_POST["id_producto"];
    $nombre = $_POST["nombre"];

    $errores = '';
    
    function rmDir_rf($carpeta)
    {
        $url = "productos/" . $carpeta . "/*";
      foreach(glob("../productos/" . $carpeta . "/*") as $archivos_carpeta){
        if (is_dir($archivos_carpeta)){
          rmDir_rf($archivos_carpeta);
        } else {
        unlink($archivos_carpeta);
        }
      }
      rmdir("../productos/" . $carpeta);
     }

    if ($errores == '') {
        $sql = "DELETE FROM productos WHERE id_producto = '$id_producto';";
        $count = $con->exec($sql);
        rmDir_rf($nombre);
        header("Location: index.php?seccion=listado_productos");
    }
    
}
require 'index.php?seccion=listado_productos';
