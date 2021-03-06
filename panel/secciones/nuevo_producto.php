<?php 
  
    if(!defined("ACCESO")){
        header("Location:../index.php?seccion=nuevo_producto");
    }

?>


<section id="carga">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center h1-x mt-4 mb-4">Cargar producto</h1>
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
                <form action="subir_imagen.php" method="POST" enctype="multipart/form-data" class="bg-dark p-3 mb-5 mt-3">
                    <div class="form-group">
                        <label for="nombre" class="txt-w">
                            Nombre
                        </label>
                        <input type="text" name="nombre" max="3" id="nombre" class="form-control" placeholder="Ingrese el nombre">
                    </div>

                    <div class="form-group">
                        <label for="imagen" class="txt-w">
                            Foto
                        </label>
                        <input type="file" accept="image/jpeg" class="form-control-file txt-w mb-2" name="imagen" id="imagen" aria-describedby="help_imagen">
                        <small id="help_imagen" class="form-text text-muted txt-w">La im??gen del producto debe estar en formato JPG.</small>
                    </div> 

                    <button type="submit" class="btn btn-success btn-lg btn-block">Subir nuevo producto</button>
                </form>
            </div>
        </div>
    </div>
</section>