<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $nombre = $_POST["nombre"];
    
    if (isset($_POST['check1'])){
        $active = 1;
    } else {
            $active = 0;
    }
    
    $errores = '';
        
    if (empty($nombre)){
        $errores .= '<li>Por favor completa los campos.</li>';
        
        
    } else {     
//charlar esto------------------------------------------------------------
        $statement = $con->prepare('SELECT * FROM categorias WHERE nombre = :nombre LIMIT 1');
        $statement->execute(array(':nombre' => $nombre));
        $resultado = $statement->fetch();

        if($resultado != false) {
            $errores .= '<li>La categoria ya existe, por favor ingresa una categoria diferente.</li>';
        }

    }

    if ($errores == '') {
        $sql = "INSERT INTO categorias(nombre,id_padre,active) VALUES ('$nombre','$id_padre','$active');";
        $count = $con->exec($sql);
        
        header("Location: ../listado_categorias.php");
    }
    
}
require 'Views/nueva_categoria_view.php';
?>