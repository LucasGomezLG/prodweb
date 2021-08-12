<?php

$id_producto = $_POST['id_producto'];

if (!defined("ACCESO")) {
    header("Location: ../index.php?seccion=listado_marcas");
}

if (!empty($_GET["ok"])) :
    $ok = $_GET["ok"];
    if ($ok == "cargado") {
        $mensaje = "La comentario ha sido cargada correctamente.";
    } elseif ($ok == "borrado") {
        $mensaje = "La comentario " .ucfirst(nombre($_GET["nombre"])) . " ha sido eliminada correctamente.";
    }
?>

    <div id="Mensaje" class="container mt-4">
        <div class="alert alert-success alert-dismissible fade show col-12" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <p><?= $mensaje; ?></p>
        </div>
    </div>

<?php
endif;

if (!empty($_GET["error"])) :
    $error = $_GET["error"];

    if ($error == "sin_evento") {
        $mensaje = "Error!! Seleccione un evento a eliminar.";
    } elseif ($error == "error_evento") {
        $mensaje = "Error!! Selecciono un evento que no existe en el listado.";
    }

?>
    <div class="container mt-4">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <p><?= $mensaje; ?></p>
        </div>
    </div>

<?php
endif;
?>


<section id="Tabla">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    <h1 class="text-center mt-4 h1-x">Listado de marcas</h1>
                </div>
                <div>
                    <a class="btn btn-success float-right mb-2" href="index.php?seccion=nueva_marca" role="button">Agregar nueva marca</a>
                </div>


                <table class="table table-striped table-dark table-bordered table-hover text-center mb-5">
                    <thead class="thead-light">
                        <tr>
                            <th>Codigo</th>
                            <th>Producto</th>
                            <th>mail</th>
                            <th>ip</th>
                            <th>calificacion</th>
                            <th>comentario</th>
                            <th>Fecha</th>
                            <th>aprobado</th>
                            <th>Aprobar/Desaprobar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $comentarios = new Comentario($con);
                        foreach ($comentarios->getComentariosById($id_producto) as $comentario) {
                        ?>
                            <tr>
                                <td class="align-middle">
                                    <?php echo $comentario['id_comentario'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $comentario['id_producto'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $comentario['mail'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $comentario['ip'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $comentario['calificacion'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $comentario['comentario'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $comentario['last_update'] ?>
                                </td>
                                <td class="align-middle overflow-auto">
                                    <?php

                                    if ($comentario['aprobado'] == 1) {
                                        echo 'Si';
                                    } else {
                                        echo 'No';
                                    } ?>
                                </td>
                                <td>
                                <form action="index.php?seccion=modificar_aprobado" method="POST">
                                        <input type='hidden' name='id_comentario' value='<?php echo $comentario['id_comentario'] ?>' />
                                        <input type='hidden' name='aprobado' value='<?php echo $comentario['aprobado'] ?>' />
                                        <button type="submit" class="btn btn-info txt-w btn-sm ">Aprobar/Desaprobar</button>
                                    </form> 
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>