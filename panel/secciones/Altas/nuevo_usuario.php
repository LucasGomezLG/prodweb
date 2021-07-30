<?php 

$con = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';port='.$db_port,$db_user,$db_pass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
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
        $sql = "INSERT INTO usuarios(nombre,apellido,usuario,pass,email,admin) VALUES ('$nombre','$apellido','$usuario','$password','$email','$adm');";
        $count = $con->exec($sql);
        
        header("Location: index.php?seccion=listado_usuarios");
    }
    
}
require 'Views/nuevo_usuario_view.php';