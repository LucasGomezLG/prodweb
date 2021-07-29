<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $categoria = $_POST["categoria"];
    $subcategoria= $_POST["subcategoria"];
    $categorias = filter_var(strtolower($_POST["categorias"]));
    
    $errores = '';
    
    
    if (empty($categoria) or empty($subcategoria)){
        $errores .= '<li>Por favor completa los campos.</li>';
        
        
    } else {     
//charlar esto------------------------------------------------------------
        $statement = $con->prepare('SELECT * FROM categorias WHERE categoria = :categoria LIMIT 1');
        $statement->execute(array(':categoria' => $categoria));
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