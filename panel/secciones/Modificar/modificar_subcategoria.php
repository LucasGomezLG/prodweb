<?php 

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_categoria= $_POST["id_categoria"];
    $nombre = $_POST["nombre"];
    $id_padre = $_POST["myselect"];
   
    if (isset($_POST['show_dowpdown_value'])) {

        $categorias = $_POST['dowpdown']; 
     }

    if (isset($_POST['check1'])){
        $active = 1;
    } else {
            $active = 0;
    }
    
    $errores = '';
        
    if (empty($nombre)){
        $errores .= '            .. ';
          
    } else {     

        $statement = $con->prepare('SELECT * FROM categorias WHERE nombre = :nombre LIMIT 1');
        $statement->execute(array(':nombre' => $nombre));
        $resultado = $statement->fetch();

        if($resultado != false) {
            $errores .= '          .';
        }else{
            $errores .= '';
        }

    }

    if ($errores == '') {
        $sql = "UPDATE categorias SET nombre='$nombre',id_padre ='$id_padre', active ='$active' WHERE id_categoria = '$id_categoria';";
        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=listado_subcategorias");
    }
    
}
require 'Views/modificar_subcategoria_view.php';
?>