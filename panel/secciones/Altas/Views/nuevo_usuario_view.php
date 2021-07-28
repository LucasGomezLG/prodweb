<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adidas</title>
    
    <link rel="icon" type="image/png" href="../img/adidas-favicon.ico"/>

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
                <h1 class="text-center h1-x mt-4 mb-4">Cargar usuario</h1>
            </div>    

                <?php
                if(!empty($_GET["error"])):
                    $error = $_GET["error"];
                    
                    if($error == "nombre"):
                        $mensaje = "El campo nombre es obligatorio.";
                    elseif($error == "existe"):
                        $mensaje = "El producto que intenta subir ya existe.";
                    
                    else:
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
                        <form action="nuevo_usuario.php" method="POST" class="bg-dark p-3 mb-5 mt-3">

                            <div class="form-row">
                                <div class="input-group mb-3 col-6">
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="input-group mb-3 col-6">
                                    <input type="text" name="apellido" class="form-control" placeholder="Apellido">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="input-group mb-3 col-12">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="input-group mb-3 col-6">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" name="usuario" class="form-control" placeholder="Usuario">
                                </div>

                                <div class="input-group mb-3 col-6">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-row mb-3 col-6 ">
                                <div class="form-group mb-3 col-6">
                                    <input type="checkbox" class="form-control-input" id="activo" > 
                                    <label for="activo"class="control-label txt-w" >Activa</label>  
                                </div>
                                <div class="form-group mb-3 col-6">
                                    <input type="checkbox" class="form-control-input" id="admin" > 
                                    <label for="admin"class="control-label txt-w" >Admin</label>  
                                </div>
                            </div>
                            <?php if(!empty($errores)):?>
                                <div>
                                    <ul>
                                        <?php echo $errores;?>
                                    </ul>
                                </div>
                            <?php endif;?>

                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Agregar nuevo usuario</button>
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