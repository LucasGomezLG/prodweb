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

<div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div>
                    <div class="d-flex justify-content-center mb-3">
                        <div>
                            <a href="../index.php"><img src="../img/logo-login.png" class="img_logo" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <h3>¡Primero inicia sesión!</h3>
                    </div>
                    <div class="d-flex justify-content-center">
                        <form action="login.php" method="POST">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="usuario" class="form-control input_user"
                                       placeholder="Usuario">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" class="form-control input_pass"
                                       placeholder="***********">
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                    <label class="custom-control-label" for="customControlInline">Recordarme</label>
                                </div>
                            </div>
                            <?php if(!empty($errores)):?>
                                <div>
                                    <ul>
                                        <?php echo $errores;?>
                                    </ul>
                                </div>
                            <?php endif;?>
                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" class="btn btn-dark">Ingresar</button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            ¿No tenes usuario?<a href="registrarse.php" class="ml-2">Registrate</a>
                        </div>
                        <div class="d-flex justify-content-center links mt-3">
                            <a href="../index.php" class="ml-2">Volver a Inicio</a>
                        </div>
                        
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