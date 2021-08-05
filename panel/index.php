<?php session_start();

if(!isset($_SESSION['usuario'])){
    header('Location: ../secreto/login.php');
}
    require_once("../class/classProducto.php");
    require_once("../class/classUsuarios.php");
    require_once("../class/classCategoria.php");
    require_once("../class/classMarca.php");
    require_once("../configuraciones.php");
    require_once("../inc/db_connect.php");
    //require_once("../funciones.php");
    include("../inc/arrays.php");


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel Adidas</title>
    
    <link rel="icon" type="image/png" href="../img/adidas-favicon.ico"/>

    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:800|Roboto:900|Source+Serif+Pro:600" rel="stylesheet">
    
    <!--CSS-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">

    <script src="../js/jquery-3.3.1.min.js"></script>

</head>
<body>

    <?php
    require_once("header_panel.php")
    ?>

    <?php

        if(!empty($_GET["seccion"])):
            $seccion = $_GET["seccion"];
//listados
            if($seccion == "listado_productos")
                require_once("secciones/listado_productos.php");
            else if($seccion == "listado_categorias")
                require_once("secciones/listado_categorias.php");
            else if($seccion == "listado_subcategorias")
                require_once("secciones/listado_subcategorias.php");
            else if($seccion == "listado_marcas")
                require_once("secciones/listado_marcas.php");
            else if($seccion == "listado_usuarios")
                require_once("secciones/listado_usuarios.php"); 
//A - Altas
            else if($seccion == "nuevo_producto")
                require_once("secciones/Altas/nuevo_producto.php");
            else if($seccion == "nueva_categoria")
                require_once("secciones/Altas/nueva_categoria.php");
            else if($seccion == "nueva_subcategoria")
                require_once("secciones/Altas/nueva_subcategoria.php");
            else if($seccion == "nuevo_usuario")
                require_once("secciones/Altas/nuevo_usuario.php");   
            else if($seccion == "nueva_marca")
                require_once("secciones/Altas/nueva_marca.php"); 
//M - Modificar
            else if($seccion == "modificar_producto")
                require_once("secciones/Modificar/modificar_producto.php");
            else if($seccion == "modificar_categoria")
                require_once("secciones/Modificar/modificar_categoria.php");
            else if($seccion == "modificar_subcategoria")
                require_once("secciones/Modificar/modificar_subcategoria.php");
            else if($seccion == "modificar_usuario")
                require_once("secciones/Modificar/modificar_usuario.php");   
            else if($seccion == "modificar_marca")
                require_once("secciones/Modificar/modificar_marca.php");
//B - Bajas 
            else if($seccion == "borrar_producto")
                require_once("secciones/Bajas/borrar_producto.php");
            else if($seccion == "borrar_categoria")
                require_once("secciones/Bajas/borrar_categoria.php");
            else if($seccion == "borrar_subcategoria")
                require_once("secciones/Bajas/borrar_subcategoria.php");
            else if($seccion == "borrar_usuario")
                require_once("secciones/Bajas/borrar_usuario.php");   
            else if($seccion == "borrar_marca")
                require_once("secciones/Bajas/borrar_marca.php");
//-
            else
                require_once("../secciones/error.php");
        else:
            require_once("secciones/listado_productos.php");
        endif;


    ?>
    
    <?php
    require_once("footer_panel.php");
    ?>
    
    <!--JS-->
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>