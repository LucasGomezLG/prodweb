<?php 

$con = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';port='.$db_port,$db_user,$db_pass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_user = $_POST["id_user"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    
    $usuario = filter_var(strtolower($_POST["usuario"]));
    
    $errores = '';
    
    if (isset($_POST['check1'])) {
                                    $adm = 1;
                                 } else {
                                            $adm = 0;
    }
    
    
    if (empty($email) or empty($usuario) or empty($password)){
        $errores .= '.';
        
        
    } else {     

        $statement = $con->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));
        $resultado = $statement->fetch();

        if($resultado != false) {
            $errores .= '..';
        }

        $password = hash('sha512', $password);

    }

    if ($errores == '') {
        $sql = "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', usuario='$usuario', 
        pass='$password', email='$email', admin='$adm' WHERE id_user = '$id_user';";      
        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=listado_usuarios");
    }
    
}
require 'Views/modificar_usuario_view.php';