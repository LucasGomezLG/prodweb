<?php

     if(empty($_POST["nombre"]) || empty($_POST["correo"])){
    
        header("Location: index.php?seccion=contacto&&error=true");
        die();
    }

    $nombre=$_POST["nombre"];
    $correo=$_POST["correo"];
    $telefono=$_POST["telefono"];
    $area = $_POST["area"];
    $consulta=$_POST["consulta"];
    $check="";
    if(isset($_POST["check"])){
        $check= implode('<br> -  ', $_POST["check"]);
    }
    
    
    
    header("Location: index.php?seccion=gracias&&nombre=$nombre&&correo=$correo&&telefono=$telefono&&area=$area&&consulta=$consulta&&check=$check");

  

?>