<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center h1-x mt-4 mb-4">Modificar marca</h1>
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
                <form action="index.php?seccion=modificar_marca" method="POST" class="bg-dark p-3 mb-5 mt-3">
                    <input type='hidden' name='id_marca' value='<?php echo $_POST['id_marca'] ?>' />
                    <div class="form-group">
                        <input type="text" name="nombre" max="3" id="nombre_marca" class="form-control" >
                    </div>
                    <div class="form-row ">
                        <div class="input-group">
                            <input type="checkbox" name="check1">
                            <label class="control-label txt-w">Activa</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</section>