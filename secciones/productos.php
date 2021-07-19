<?php
 
 if(!defined("ACCESO")){
     header("Location: ../index.php?seccion=productos");
    }

    
    

?>

<div class="container mb-5 mt-2">

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="text-center txt-productos mt-3 mb-3">Productos</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-3">

            <h3>Filtros</h3>               
            <ul class="">
                <li> 
                    <a href="#">Destacados</a>
                </li>
                <li>                
                    <a href="#">A - Z</a>
                </li>
                <li>
                    <a href="#">Z - A</a>
                </li>
            </ul>
            <hr>
            <h3>Categorías</h3>
            <ul>
                <?php 
                    $cat = new Categorias($con);
                    foreach($cat->getCategorias() as $links) {                    
                ?>
                <li>
                    <a href="#"><?php echo $links['nombre']?></a>
                    <ul>
                        <?php 
                            foreach($cat->getCategorias($links['id_categoria']) as $sublinks) {                            
                        ?>
                        <li>
                                <a href="#"><?php echo $sublinks['nombre']?></a>
                        </li>
                        <?php 
                            }
                        ?>
                    </ul>
                </li>
                <?php 
                    }
                ?>
            </ul>
            <hr>
            <h4>Marcas</h4>
            <ul>
                <?php 
                    $mar = new Marca($con);
                    foreach($mar->getMarcas() as $links){
                ?>                
                <li>
                    <a href="#"><?php echo $links['nombre']?></a>
                </li>   
                <?php
                    }
                ?>                
            </ul>
        </div>

        <div class="col-9">
            <div class="row">
                <?php 
                $prod = new Producto($con);
                foreach($prod->getProductos() as $row){ 
                ?>
                <div class="col-4 mb-4">
                    <div class="card">
                        <img src="productos/galeria/<?php echo $row['img']?>" alt="<?php echo $row['nombre']?>" class="img-fluid">
                        <div class="card-body text-center">                                     
                        <h4 class="card-title text-center mt-5 pb-0 mb-0"> <?php echo $row['nombre']?></h4>                      
                        </div>                  
                    </div>
                </div>     
                <?php
                }
                ?>     
            </div>
        </div>
    </div>





</div>