<?php 
  
    if(!defined("ACCESO")){
        header("Location:../index.php?seccion=nuevo_producto");
    }

$con = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';port='.$db_port,$db_user,$db_pass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_POST["nombre"])):
        header("Location:index.php?seccion=nuevo_producto&error=nombre");
        die();
    endif;
    
    
    $nombre = trim(strtolower($_POST["nombre"]));
     
    if(is_dir("productos/$nombre")):
        header("Location:index.php?seccion=nuevo_producto&error=existe");
        die();
    endif;
    
    
    mkdir("../productos/$nombre");
    
    
    if(!empty($_FILES["imagen"])):
        $img = $_FILES["imagen"]["name"];
    
        if($_FILES["imagen"]["name"] && strpos($img,".jpg") === false):
            header("Location:index.php?seccion=nuevo_producto&error=imagen");
            die();
        endif;
    
        $img  = $_FILES["imagen"];
        $origen  = $_FILES["imagen"]["tmp_name"];
        $destino = "../productos/$nombre/$nombre.png";
    
        move_uploaded_file($origen, $destino);
    
    endif;

    $id_producto = $_POST["id_producto"];
    $id_marca = $_POST["myselectM"];
    $id_categoria = $_POST["myselect"];
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
     
    $errores = '';

    if (isset($_POST['check1'])) {
                                    $active = 1;
                                } else {
                                    $active = 0;
                                }
    
    if (empty($nombre) or empty($id_marca) or empty($id_categoria) or empty($precio) or empty($descripcion) or empty($img)){
        $errores .= '..';
        
        
    } else {     

        $statement = $con->prepare('SELECT * FROM productos WHERE nombre = :nombre LIMIT 1');
        $statement->execute(array(':nombre' => $nombre));
        $resultado = $statement->fetch();

        if($resultado != false) {
            $errores .= '.';
        }

    }
    $nombre_img = $nombre . ".png";

    if ($errores == '') {
        $sql = "UPDATE productos SET id_marca='$id_marca', id_categoria='$id_categoria', nombre='$nombre',
         img='$nombre_img', descripcion='$descripcion', precio='$precio', active='$active' 
        WHERE id_producto = '$id_producto';";
        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=listado_productos");
    }
    
}
require 'Views/modificar_producto_view.php';