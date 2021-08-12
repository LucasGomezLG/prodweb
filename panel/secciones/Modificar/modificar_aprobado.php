<?php

if (!isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_comentario = $_POST["id_comentario"];
    $aprobado = $_POST["aprobado"];

    $errores = '';

    if ($aprobado == 1) {
        $aprobado = 0;
    } elseif ($aprobado == 0) {
        $aprobado = 1;
    } elseif (empty($aprobado)) {
        $errores .= '..';
    } else {
        $statement = $con->prepare('SELECT * FROM comentarios WHERE id_comentario =:id_comentario LIMIT 1');
        $statement->execute(array(':id_comentario' => $id_comentario));
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $errores .= '...';
        }
    }
    if ($errores == '') {
        $sql = "UPDATE comentarios SET aprobado= '$aprobado' WHERE id_comentario='$id_comentario'";

        $count = $con->exec($sql);

        header("Location: index.php?seccion=listado_productos");
    }
}
