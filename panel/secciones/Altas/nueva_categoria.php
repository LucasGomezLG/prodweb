<?php 

require_once("../inc/db_connect.php");


if(!isset($_SESSION['usuario'])){
    header('Location: index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $usuario = filter_var(strtolower($_POST["usuario"]));
    
    $errores = '';
    
    
    if (empty($email) or empty($usuario) or empty($password)){
        $errores .= '<li>Por favor completa los campos Email, Usuario y Contraseña.</li>';
        
        
    } else {     

        $statement = $con->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));
        $resultado = $statement->fetch();

        if($resultado != false) {
            $errores .= '<li>El usuario ya existe, por favor ingresa un usuario diferente.</li>';
        }

        $password = hash('sha512', $password);

    }

    if ($errores == '') {
        $sql = "INSERT INTO usuarios(nombre,apellido,usuario,pass,email) VALUES ('$nombre','$apellido','$usuario','$password','$email');";
        $count = $con->exec($sql);
        
        header("Location: ../listado_categorias.php");
    }
    
}
require 'Views/nueva_categoria_view.php';
?>