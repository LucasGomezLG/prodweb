<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_categoria = $_POST["id_categoria"];
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
        $statement = $con->prepare('SELECT * FROM categorias WHERE nombre = :nombre LIMIT 1');
        $statement->execute(array(':nombre' => $nombre));
        $resultado = $statement->fetch();

        if($resultado != false) {
            $errores .= '    ';
        }

    }

    if ($errores == '') {
        $sql = "UPDATE categorias SET nombre='$nombre',active ='$active' WHERE id_categoria = '$id_categoria';";
        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=listado_categorias");
    }
    
}
require 'Views/modificar_categoria_view.php';
?>