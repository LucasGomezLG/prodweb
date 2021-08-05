<?php 
    
    if(!defined("ACCESO")){
        header("Location: ../index.php?seccion=listado_productos");
    }

?>

    <?php
            if(!empty($_GET["ok"])):
                $ok = $_GET["ok"];
                if($ok == "cargado"){
                    $mensaje = "El producto ha sido cargado correctamente.";

                }elseif($ok == "borrado"){
                    $mensaje = "El producto ".ucfirst(nombre($_GET["nombre"]))." ha sido eliminado correctamente.";
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
        
            if(!empty($_GET["error"])):
            $error = $_GET["error"];

                if($error == "sin_producto"){
                $mensaje = "Error!! Seleccione un producto a eliminar.";

                }elseif($error == "error_producto"){
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
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                            
                            <?php 
                            $prod = new Producto($con);
                            foreach($prod->getProductos() as $row){ 
                            ?>
                               

                        <tr>
                            <td class="align-middle">
                                <?php echo $row['id_producto']?>
                            </td>
                            <td class="align-middle">
                                <?php echo $row['nombre']?>
                            </td>                                
                            <td class="align-middle">
                                <img src="../productos/galeria/<?php echo $row['img']?>" alt="<?php echo $row['nombre']?>" width="70">
                            </td>   
                            <td class="align-middle">
                                <?php echo $row['descripcion']?>
                            </td>      
                            <td class="align-middle" style="width: 180px;">
                                <form action="borrar_imagen.php" method="post">
                                    <input type="hidden" value="<?= $productos ?>" name="id">
                                    <button type="submit" class="btn btn-info btn-sm">M</button>
                                    <button type="submit" class="btn btn-danger btn-sm">X</button>
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

        
