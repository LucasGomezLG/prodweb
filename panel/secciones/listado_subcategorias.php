<?php

if (!defined("ACCESO")) {
    header("Location: ../index.php?seccion=listado_subcategorias");
}

?>

<?php
if (!empty($_GET["ok"])) :
    $ok = $_GET["ok"];
    if ($ok == "cargado") {
        $mensaje = "La subcategoria ha sido cargada correctamente.";
    } elseif ($ok == "borrado") {
        $mensaje = "La subcategoria " . ucfirst(nombre($_GET["nombre"])) . " ha sido eliminada correctamente.";
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
                    <h1 class="text-center mt-4 h1-x">Listado de subcategorias</h1>
                </div>
                <div>
                    <a class="btn btn-success float-right mb-2 ml-5" href="index.php?seccion=nueva_subcategoria" role="button">Agregar nueva subcategoria</a>
                </div>

                <table class="table table-striped table-dark table-bordered table-hover text-center mb-5">
                    <thead class="thead-light">
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Padre</th>
                            <th>Activa</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $cat = new Categorias($con);
                        foreach ($cat->getSubcategorias() as $row) {
                        ?>

                            <tr>
                                <td class="align-middle">
                                    <?php echo $row['id_categoria'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $row['nombre'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $row['id_padre'] ?>
                                </td>
                                <td class="align-middle overflow-auto">
                                    <?php

                                    if ($row['active'] == 1) {
                                        echo 'Si';
                                    } else {
                                        echo 'No';
                                    } ?>
                                </td>

                                <td class="align-middle">
                                <form action="index.php?seccion=modificar_subcategoria" method="POST">
                                        <input type='hidden' name='id_categoria' value='<?php echo $row['id_categoria'] ?>' /> 
                                        <button type="submit" class="btn btn-info txt-w btn-sm ">M</button>
                                    </form>
                                    <form action="index.php?seccion=borrar_categoria" method="POST">
                                        <input type='hidden' name='id_categoria' value='<?php echo $row['id_categoria'] ?>' />
                                        <input type='hidden' name='id_padre' value='<?php echo $row['id_padre'] ?>' />
                                        <button type="submit" class="btn btn-danger txt-w btn-sm">X</button>
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