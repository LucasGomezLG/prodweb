<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adidas</title>

    <link rel="icon" type="image/png" href="../img/adidas-favicon.ico" />

    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:800|Roboto:900|Source+Serif+Pro:600" rel="stylesheet">

    <!--CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="estilos.css">

    <script src="../js/jquery-3.3.1.min.js"></script>



</head>

<body>
    <section id="carga">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center h1-x mt-4 mb-4">Cargar producto</h1>
                </div>

                <?php
                if (!empty($_GET["error"])) :
                    $error = $_GET["error"];

                    if ($error == "nombre") :
                        $mensaje = "El campo nombre es obligatorio.";
                    elseif ($error == "existe") :
                        $mensaje = "El producto que intenta subir ya existe.";

                    else :
                        $mensaje = "";
                    endif;
                ?>

                    <div class="col-6 offset-3 alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                &times;
                            </span>
                            <span class="sr-only">
                                Close
                            </span>
                        </button>
                        <strong>Error: </strong> <?= $mensaje ?>.
                    </div>

                <?php
                endif;
                ?>

            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <form action="index.php?seccion=nuevo_producto" method="POST" enctype="multipart/form-data" class="bg-dark p-3 mb-5 mt-3">
                        <div class="form-group">
                            <input type="text" name="nombre" max="3" id="nombre" class="form-control" placeholder="Nombre">
                        </div>

                        <div class="form-row">
                        </div>
                        <div class="form-group">
                            <input type="text" name="precio" max="3" id="precio" class="form-control" placeholder="Precio $">
                        </div>

                        <div class="form-group">
                            <input type="text" name="descripcion" max="3" id="descripcion" class="form-control" placeholder="Descripcion">
                        </div>
                        <div class="form-row">
                            <div class="dropdown  col-4">
                                <select class="btn btn-info dropdown-toggle" data-toggle="dropdown" name="myselectM" id="myselectM">
                                    <option value="0">Marcas</option>
                                    <?php

                                    $cat = new Marca($con);
                                    foreach ($cat->getMarcas() as $row) {
                                    ?>
                                        <option class="dropdown-item" value="<?php echo $row['id_marca'] ?>"><?php echo $row['nombre'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="dropdown  col-4">
                                <select class="btn btn-info dropdown-toggle" data-toggle="dropdown" name="myselect" id="myselect">
                                    <option value="0">categorias</option>
                                    <?php

                                    $cat = new Categorias($con);
                                    foreach ($cat->getSubcategorias() as $row) {
                                    ?>
                                        <option class="dropdown-item" value="<?php echo $row['id_categoria'] ?>"><?php echo $row['nombre'] ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <div class="input-group">
                                    <input type="checkbox" name="check1">
                                    <label class="control-label txt-w">Activa</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="imagen" class="txt-w"> Foto </label>
                            <input type="file" accept="image/jpeg" class="form-control-file txt-w mb-2" name="imagen" id="imagen" aria-describedby="help_imagen">
                            <small id="help_imagen" class="form-text text-muted txt-w">La imágen del producto debe estar en formato JPG.</small>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg btn-block">Agregar producto</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>