<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST["nombre"];
    $active = $_POST["active"];
    $marca = filter_var(strtolower($_POST["marcas"]));
    
    $errores = '';
    
    
    if (empty($nombre)){
        $errores .= '<li>Por favor completa los campos .</li>';
        
        
    } else {     

        $statement = $con->prepare('SELECT * FROM marcas WHERE marca = :marca LIMIT 1');
        $statement->execute(array(':marca' => $marca));
        $resultado = $statement->fetch();

        if($resultado != false) {
            $errores .= '<li>La marca ya existe, por favor ingresa una marca diferente.</li>';
        }

    }

    if ($errores == '') {
        $sql = "INSERT INTO marcas(nombre,active) VALUES ('$nombre','$active');";
        $count = $con->exec($sql);
        
        header("Location: ../listado_marcas.php");
    }
    
}
require 'Views/nueva_marca_view.php';
?>