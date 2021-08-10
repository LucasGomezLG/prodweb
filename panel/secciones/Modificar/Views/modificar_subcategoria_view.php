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

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center h1-x mt-4 mb-4">Modificar subcategoria</h1>
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

                    <div>
                        <div class="d-flex justify-content-center mb-3">
                        </div>
                        <div class="form_container">
                            <form action="index.php?seccion=modificar_subcategoria" method="POST" class="bg-dark p-3 mb-5 mt-3">
                                <input type='hidden' name='id_categoria' value='<?php echo $_POST['id_categoria'] ?>' /> 
                                <div class="form-row">

                                    <div class="form-group ">

                                        <div class="dropdown mb-3 col-6">
                                            <select class="btn btn-info dropdown-toggle" data-toggle="dropdown" name="myselect" id="myselect">
                                                <option value="0">categorias</option>
                                                <?php

                                                $cat = new Categorias($con);
                                                foreach ($cat->getCategorias() as $row) {
                                                ?>
                                                    <option class="dropdown-item" value="<?php echo $row['id_categoria'] ?>"><?php echo $row['nombre'] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3 col-6">
                                        <input type="text" name="nombre" max="3" id="nombre" class="form-control" placeholder="Subcategoria">
                                    </div>
                                </div>
                                <div class="row align-content-middle">
                                    <div class="input-group ml-lg-50">
                                        <input type="checkbox" name="check1">
                                        <label class="control-label txt-w">Activa</label>
                                    </div>
                                </div>
                                <?php if (!empty($errores)) : ?>
                                    <div>
                                        <ul>
                                            <?php echo $errores; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <div class="d-flex justify-content-center mt-3 login_container">
                                    <button type="submit" class="btn btn-success btn-lg btn-block">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--JS-->
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

</body>

</html>