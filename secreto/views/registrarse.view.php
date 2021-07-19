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

<div class="container login">
        <div class="row justify-content-center">
            <div class="col-auto">
                <div>
                    <div class="d-flex justify-content-center mb-3">
                        <div>
                        <a href="../index.php"><img src="../img/logo-login.png" class="img_logo" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <h3>Registrate para poder acceder al panel!</h3>
                    </div>
                    <div class="form_container">
                        <form action="registrarse.php" method="POST">

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

                            <?php if(!empty($errores)):?>
                                <div>
                                    <ul>
                                        <?php echo $errores;?>
                                    </ul>
                                </div>
                            <?php endif;?>

                            <div class="d-flex justify-content-center mt-3 login_container">
                                <button type="submit" class="btn btn-dark">Registrate</button>
                            </div>


                        </form>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            ¿Ya tienes cuenta?<a href="login.php" class="ml-2">Inicia sesion</a>
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