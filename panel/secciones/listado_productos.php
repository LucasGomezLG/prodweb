<?php

if (!defined("ACCESO")) {
    header("Location: ../index.php?seccion=listado_productos");
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
                    <h1 class="text-center mt-4 h1-x">Listado de productos</h1>
                </div>
                <div>
                    <a class="btn btn-success float-right mb-2" href="index.php?seccion=nuevo_producto" role="button">Agregar nuevo producto</a>
                </div>


                <table class="table table-striped table-dark table-bordered table-hover text-center mb-5">
                    <thead class="thead-light">
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
                            <th>Destacado</th>
                            <th>Activo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php
                        $prod = new Producto($con);
                        foreach ($prod->getProductos() as $row) {
                        ?>


                            <tr>
                                <td class="align-middle">
                                    <?php echo $row['id_producto'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $row['nombre'] ?>
                                </td>
                                <td class="align-middle">
                                    <img src="../productos/<?php echo $row['nombre']?>/<?php echo $row['img'] ?>" alt="<?php echo $row['nombre'] ?>" width="70">
                                </td>
                                <td class="align-middle">
                                    <?php echo $row['descripcion'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $row['active'] ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $row['destacado'] ?>
                                </td>
                                <td class="align-middle" style="width: 180px;">

                                    <form action="index.php?seccion=modificar_producto" method="POST">
                                        <input type='hidden' name='id_producto' value='<?php echo $row['id_producto'] ?>' /> 
                                        <input type='hidden' name='nombre' value='<?php echo $row['nombre'] ?>' />
                                        <input type='hidden' name='myselectM' value='<?php echo $row['id_marca'] ?>' /> 
                                        <input type='hidden' name='myselect' value='<?php echo $row['id_categoria'] ?>' />
                                        <input type='hidden' name='descripcion' value='<?php echo $row['descripcion'] ?>' />
                                        <input type='hidden' name='precio' value='<?php echo $row['precio'] ?>' />
                                        <input type='hidden' name='active' value='<?php echo $row['active'] ?>' />
                                        <button type="submit" class="btn btn-info txt-w btn-sm ">M</button>
                                    </form>

                                    <form action="index.php?seccion=borrar_producto" method="POST">
                                        <input type='hidden' name='nombre' value='<?php echo $row['nombre'] ?>' />
                                        <input type='hidden' name='id_producto' value='<?php echo $row['id_producto'] ?>' />
                                        <button type="submit" class="btn btn-danger txt-w btn-sm">X</button>
                                    </form>
                                    
                                    <button type="submit" class="btn btn-white btn-sm mt-3" href="#">Ver comentarios</button>
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