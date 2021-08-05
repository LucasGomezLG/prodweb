<?php session_start();

require_once("../inc/db_connect.php");
$con = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';port='.$db_port,$db_user,$db_pass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if(isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = filter_var(strtolower($_POST["usuario"]), FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    $admin = $_POST["admin"];
    $password = hash('sha512', $password);

    $errores = '';

    $statement = $con->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND pass = :pass');
    $statement->execute(array(':usuario' => $usuario, ':pass' => $password));

    $resultado = $statement->fetch();
    if ($resultado !== false) {
        $_SESSION['usuario'] = $usuario;
        
        header('Location: ../panel/index.php');
        //header('Location: ../index.php');     
    } else {
        $errores .= '<li>Datos Incorrectos</li>';
    }
    
}

require 'views/login.view.php';
