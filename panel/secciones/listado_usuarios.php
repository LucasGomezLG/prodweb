<?php

if (!defined("ACCESO")) {
    header("Location: ../index.php?seccion=listado_usuarios");
}

?>

<?php
if (!empty($_GET["ok"])) :
    $ok = $_GET["ok"];
    if ($ok == "cargado") {
        $mensaje = "El producto ha sido cargado correctamente.";
    } elseif ($ok == "borrado") {
        $mensaje = "El producto " . ucfirst(nombre($_GET["nombre"])) . " ha sido eliminado correctamente.";
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

    if ($error == "sin_producto") {
        $mensaje = "Error!! Seleccione un producto a eliminar.";
    } elseif ($error == "error_producto") {
        $mensaje = "Error!! Selecciono un producto que no existe en el listado.";
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
                    <h1 class="text-center mt-4 h1-x">Listado de usuarios</h1>
                </div>
                <div>
                    <a class="btn btn-success float-right mb-2" href="index.php?seccion=nuevo_usuario" role="button">Agregar nuevo usuario</a>
                </div>


                <table class="table table-striped table-dark table-bordered table-hover text-center mb-5">
                    <thead class="thead-light">
                        <tr>
                            <th>ID Usuario</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $prod = new Usuario($con);
                        foreach ($prod->getUsuarios() as $row) {
                        ?>


                            <tr>
                                <td class="align-middle">
                                    <?php echo $row['id_user'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $row['usuario'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $row['nombre'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $row['apellido'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $row['email'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php
                                    if ($row['admin'] == 1) {
                                        echo 'Si';
                                    } else {
                                        echo 'No';
                                    } ?>
                                </td>
                                <td class="align-middle" style="width: 180px;">

                                    <form action="index.php?seccion=modificar_usuario" method="POST">
                                        <input type='hidden' name='id_user' value='<?php echo $row['id_user'] ?>' /> 
                                        <input type='hidden' name='nombre' value='<?php echo $row['nombre'] ?>' /> 
                                        <input type='hidden' name='apellido' value='<?php echo $row['apellido'] ?>' /> 
                                        <input type='hidden' name='email' value='<?php echo $row['email'] ?>' /> 
                                        <input type='hidden' name='password' value='<?php echo $row['pass'] ?>' /> 
                                        <input type='hidden' name='admin' value='<?php echo $row['admin'] ?>' /> 
                                        <input type='hidden' name='usuario' value='<?php echo $row['usuario'] ?>' /> 
                                        <button type="submit" class="btn btn-info txt-w btn-sm ">M</button>
                                    </form>

                                    <form action="index.php?seccion=borrar_usuario" method="POST">
                                        <input type='hidden' name='id_usuario' value='<?php echo $row['id_user'] ?>' />
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