<?php
$id_producto = $_POST['id_producto'];
?>

<div class="container mt-4">
  <div class="row">
 
    <div class="col-md-12 text-center">
      <h1>Detalle del producto</h1>
    </div>
  </div>
  <div class="row mb-5">
    <?php
    $prod = new Producto($con);
    foreach ($prod->getProductoById($id_producto) as $row) {
    ?>

      <div class="col-6 mb-6 mt-5">
        <div class="card">
          <img src="productos/<?php echo $row['nombre'] ?>/<?php echo $row['img'] ?>" style="max-heigt: 300px;" alt="<?php echo $row['nombre'] ?>" class="img-fluid">
          <div class="card-body text-center">
            <h4 class="card-title text-center mt-0 pb-0 mb-0">
              <?php $row['id_producto'] ?>
              <?php echo $row['nombre'] ?>
            </h4>
          </div>
          <div class="card-body text-center">
            <h5 class=" text-center mt-0 pb-0 mb-0">
              <?php  
              $marca = new Marca($con);
              foreach ($marca->getMarcaById($row['id_marca']) as $mar) {
              ?>
              <?php echo $mar['nombre'] ?>
              <?php 
              }
              ?>
              <?php  
              $subCat = new Categorias($con);
              foreach ($subCat->getSubcategoriaById($row['id_categoria']) as $cat) {
              ?>
              <?php echo $cat['nombre'] ?>
              <?php 
              }
              ?>
            </h5>
          </div>
          <div class="card-body ">
          <h4 class="  text-right mr-5">
              $<?php echo $row['precio'] ?>
            </h4>
            <p class=" text-center mt-3 pb-0 mb-0">
              <?php echo $row['descripcion'] ?>
            </p>
          </div>
        </div>
      </div>

    <div class="col-md-6">
      <div>
        <h2 class="p-3">Ingrese su comentario</h2>
      </div>
     
      <div class="row card  bg-dark p-3 mb-5 mt-3 txt-w ">
        <form action="enviar_comentario.php" method="POST">
          
          <input class="form-control" type='hidden' name='id_producto' value='<?php  echo $id_producto ?>' /> 
          <input class="form-control" type="email" name="mail" placeholder="example@gmail.com"/>
          <input class="form-control" type="number" min="1" max="5" name="calificacion" placeholder="Puntaje">
          <textarea class="form-control"name="comentario" id="id_comentario" cols="10" rows="5" placeholder=" Ingrese un comentario"></textarea>
          <button class="btn btn-info float-center m-4" type="submit">Enviar mensaje</button>
          
        </form>        
      </div>
      <?php
    }
    ?>
    
      <div>
        <h3 class="p-3">Comentarios</h3>
      </div>
      <?php
        $comentarios = new Comentario($con);
        foreach ($comentarios->getComentariosById($id_producto) as $comentario) {
          if ($comentario['aprobado'] != 0) {
        ?>
      <div>
        
            <div class="comentario pb-5">
              <div class="card container">
                <i class="fas fa-comments"></i>
                <p class="com">
                  <?php echo $comentario['mail']; ?>
                </p>
                <p class="com">
                  <?php echo $comentario['comentario']; ?>
                </p>
                <p class="date">
                  <?php echo $comentario['last_update']; ?>
                </p>
              </div>
            </div>
      </div>
        <?php
          }
        }
        ?>
      
    </div>
        <div class="div ml-3 mt-3">          
          <button class="btn btn-info float-left" onclick="history.go(-1);"><- Atras </button>
        </div>


  </div>
</div>
</div>