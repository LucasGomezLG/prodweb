<?php

if (!defined("ACCESO")) {
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
            <?php if (isset($_GET['id_producto'])&& $_GET['id_producto']=='nombre' && $_GET['tipo']=='asc'):?>
                <li>
                    <?php else:?>
                        <a href="index.php?seccion=productos&id_producto=nombre&tipo=asc">A - Z</a>
                        <?php endif;?>
                </li>
                <?php if (isset($_GET['id_producto'])&& $_GET['id_producto']=='nombre' && $_GET['tipo']=='desc'):?>
                    <li>
                        <?php else:?>
                            <a href="index.php?seccion=productos&id_producto=nombre&tipo=desc">Z - A</a>
                        <?php endif;?>
                     </li>
                <?php if (isset($_GET['id_producto'])&& $_GET['id_producto']=='destacados' && $_GET['tipo']=='desc'):?>
                    <li>
                        <?php else:?>
                            <a href="index.php?seccion=productos&id_producto=destacada&tipo=asc">Destacados</a>
                        <?php endif;?>
                    </li>
            </ul>
            <?php
                    
           
            
            ?>
            <hr>
            <h3>Categorías</h3>
            <ul>
                <?php
                $cat = new Categorias($con);
                foreach ($cat->getCategorias() as $links) {
                ?>
                    <li>
                        <a href="index.php?seccion=productos&categoria_padre=<?php echo $links['id_categoria'] ?>"><?php echo $links['nombre'] ?></a>
                        <ul>
                            <?php
                            foreach ($cat->getCategorias($links['id_categoria']) as $sublinks) {
                            ?>
                                <li>
                                    <a href="index.php?seccion=productos&categoria=<?php echo $sublinks['id_categoria'] ?>"><?php echo $sublinks['nombre'] ?></a>
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
                foreach ($mar->getMarcas() as $links) {
                    
                ?>
                    <li>
                        <a href="#"><?php echo $links['nombre'] ?></a>
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
                $categoria = (isset($_GET['categoria'])) ? $_GET['categoria'] : Null;
                $categoria = (isset($_GET['categoria_padre'])) ? $_GET['categoria_padre'] : $categoria;
                $es_padre = (isset($_GET['categoria_padre'])) ? True : False;
                foreach ($prod->getProductos($categoria, $es_padre) as $row) {
                ?>
                    <div class="col-4 mb-4">
                        <form class="card" action="index.php?seccion=detalles" method="POST">
                            <img src="productos/<?php echo $row['nombre'] ?>/<?php echo $row['img'] ?>" alt="<?php echo $row['nombre'] ?>" class="img-fluid">
                            <div class="card-body text-center">
                                <h4 class="card-title text-center mt-5 pb-0 mb-0"> <?php echo $row['nombre'] ?></h4>
                            </div>
                            <div>
                                <input type='hidden' name='id_producto' value='<?php echo $row['id_producto'] ?>' />
                                <button class="btn btn-info float-right mb-2" type="submit">Ver mas</button>
                            </div>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>





</div>