<?php 

$con = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';port='.$db_port,$db_user,$db_pass);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

if(!isset($_SESSION['usuario'])){
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $id_marca = $_POST["id_marca"];
    $errores = '';
    $statement = $con->prepare('SELECT * FROM marcas WHERE id_marca = :id_marca LIMIT 1');
    $statement->execute(array(':id_marca' => $id_marca));
    $resultado = $statement->fetch();

} else {  
    $errores .= '<li>id inexistente</li>';
}
if ($errores == '') {
    $sql = "DELETE FROM marcas WHERE id_marca = '$id_marca';";
    $count = $con->exec($sql);
    
    header("Location: index.php?seccion=listado_marcas");
}
