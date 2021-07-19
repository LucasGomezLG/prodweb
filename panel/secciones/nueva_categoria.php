<?php 
  
    if(!defined("ACCESO")){
        header("Location:../index.php?seccion=nuevo_evento");
    }

?>


<section id="carga">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center h1-x mt-4 mb-4">Cargar evento</h1>
            </div>    

                <?php
                if(!empty($_GET["error"])):
                    $error = $_GET["error"];                    
                    if($error == "nombre"):
                        $mensaje = "Por favor complete todos los campos correctamente.";
                    elseif($error == "desc"):
                        $mensaje = "Por favor complete todos los campos correctamente.";
                    elseif($error == "fecha"):
                        $mensaje = "Por favor complete todos los campos correctamente.";
                    elseif($error == "lugar"):
                        $mensaje = "Por favor complete todos los campos correctamente.";
                    elseif($error == "existe"):
                        $mensaje = "El evento que intenta subir ya existe.";
                    elseif($error == "imagen"):
                        $mensaje = "La imagen tiene que estar en formato JPG";                    
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
                <form action="subir_evento.php" method="POST" enctype="multipart/form-data" class="bg-dark p-3 mb-5 mt-3">
                    <div class="form-group">
                        <label for="nombre" class="txt-w">
                            Nombre
                        </label>
                        <input type="text" name="nombre" max="3" id="nombre" class="form-control" placeholder="Ingrese el nombre">
                    </div>

                    <div class="form-group">
                        <label for="fecha" class="txt-w">
                            Fecha
                        </label>
                        <input type="text" name="fecha" max="3" id="fecha" class="form-control" placeholder="Ingrese la fecha asi 'xx/xx/xxxx'">
                    </div>

                    <div class="form-group">
                        <label for="lugar" class="txt-w">
                            Lugar
                        </label>
                        <input type="text" name="lugar" max="3" id="lugar" class="form-control" placeholder="Ingrese el lugar">
                    </div>

                    <div class="form-group">
                        <label for="desc" class="txt-w">
                            Descripcion
                        </label>
                        <textarea name="desc" id="desc" cols="30" class="form-control" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="imagen" class="txt-w">
                            Foto
                        </label>
                        <input type="file" accept="image/jpeg" class="form-control-file txt-w mb-2" name="imagen" id="imagen" aria-describedby="help_imagen">
                        <small id="help_imagen" class="form-text text-muted txt-w">La imágen del evento debe estar en formato JPG.</small>
                    </div> 

                    <button type="submit" class="btn btn-success btn-lg btn-block">Subir nuevo evento</button>
                </form>
            </div>
        </div>
    </div>
</section>