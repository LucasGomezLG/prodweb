<?php

// Navbar
$navbar = ["common"=>[["nombre" => "Inicio","ruta" => "index.php?seccion=inicio"],["nombre" => "Productos","ruta" => "index.php?seccion=productos"],["nombre" => "Contacto","ruta" => "index.php?seccion=contacto"]],"logged_in"=>[["nombre" => "Iniciar sesión","ruta" => "panel/index.php"]],"logged_out"=>[["nombre" => "Cerrar Sesion","ruta" => "secreto/logout.php"]]];



//Carousel
$fotos [] = [
                "nombre" => "First slide",
                "clase" => "active",
                "numero" => "0",
                "ruta" => "img/slide1.jpg"
            ];
$fotos [] = [
                "nombre" => "Second slide",
                "clase" => "",  
                "numero" => "1",
                "ruta" => "img/slide2.jpg"
            ];
$fotos [] = [
                "nombre" => "Third slide",
                "clase" => "",
                "numero" => "2",
                "ruta" => "img/slide3.jpg"
            ];


//Navbar Panel
$panel_navbar[] = [
    "nombre" => "Volver",
    "ruta" => "../index.php"                
];
$panel_navbar[] = [
    "nombre" => "Productos",
    "ruta" => "index.php?seccion=listado_productos"                
];
$panel_navbar[] = [
    "nombre" => "Categorias",
    "ruta" => "index.php?seccion=listado_categorias"                
];
$panel_navbar[] = [
    "nombre" => "Marcas",
    "ruta" => "index.php?seccion=listado_marcas"                
];
$panel_navbar[] = [
    "nombre" => "Usuarios",
    "ruta" => "index.php?seccion=listado_usuarios"                
];
$panel_navbar[] = [
    "nombre" => "Cerrar Sesion",
    "ruta" => "../secreto/logout.php"                
];


