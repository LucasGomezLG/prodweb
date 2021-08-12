<?php 

    require_once("configuraciones.php");
    require_once("inc/db_connect.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $ipAddress = $_SERVER['REMOTE_ADDR'];
    if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
    $ipAddress = array_pop(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']));
    }

    $id_producto = $_POST["id_producto"];
    $ip = $ipAddress;
    $last_update = date("Y-m-d");
    $mail = $_POST["mail"];
    $comentario = $_POST["comentario"];
    $calificacion = $_POST["calificacion"];
    
    $errores = '';
    
    if ($errores == '') {
        $sql = "INSERT INTO comentarios (id_producto, mail, ip, comentario, calificacion, last_update) VALUES ('$id_producto', '$mail', '$ip', '$comentario', '$calificacion', '$last_update');";
        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=productos");
    }   
}
?>