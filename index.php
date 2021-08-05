<?php 

    require_once("configuraciones.php");
    //require_once("funciones.php");
    include("inc/arrays.php");
    
    

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adidas</title>
    
    <link rel="icon" type="image/png" href="img/adidas-favicon.ico"/>

    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:800|Roboto:900|Source+Serif+Pro:600" rel="stylesheet">
    
    <!--CSS-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">

    <script src="js/jquery-3.3.1.min.js"></script>

     

</head>
<body>

    <?php
    require_once("inc/header.php")
    ?>

    <?php
        if(!empty($_GET["seccion"])):
            $seccion = $_GET["seccion"];

            if($seccion == "inicio")
                    require_once("secciones/inicio.php");

                else if($seccion == "productos")
                    require_once("secciones/productos.php");
                
                else if($seccion == "detalles")
                    require_once("secciones/detalles.php");
                    
                else if($seccion == "contacto")
                    require("secciones/contacto.php");

                else if($seccion == "gracias")
                    require_once("secciones/gracias.php");   
            
                else
                    require_once("secciones/error.php");
            else:
                require_once("secciones/inicio.php");
        endif;
    ?> 
    
    <?php
    require_once("inc/footer.php");
    ?>
    
    <!--JS-->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>