<?php

if(!defined("ACCESO")){
    header("Location:../index.php?seccion=inicio");
}

//require_once("funciones.php");

?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
 <ol class="carousel-indicators">   
    <?php
        foreach($fotos as $numcarousel):
    ?>
  
        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $numcarousel["numero"] ?>" class="<?= $numcarousel["clase"] ?>"></li>
     <?php
        endforeach;
     ?>
  </ol>
 <div class="carousel-inner">  
   <?php
        foreach($fotos as $carrousel):
    ?>    
        <div class="carousel-item <?= $carrousel["clase"] ?>">
          <img class="d-block w-100" src="<?= $carrousel["ruta"] ?>" alt="<?= $carrousel["nombre"] ?>">
        </div>    
    <?php
        endforeach;
    ?>    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div id="About">
    <div class="about-vid">
        <div class="video-falopa">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-8 col-sm-12 about mt-3 mb-3">
                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/FwR2iVYfDV4" frameborder="0"
                        allow="autoplay; encrypted-media" allowfullscreen></iframe>                            
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <h1 class="txt-w h1-x">Viví el desafio X</h1>
                    <br>
                    <h3 class="txt-w h3-x">Envíanos un mensaje con la explicacion de por qué tu eres el indicado para ganarte un par de los nuevos botines X.</h3>
                    <a href="<?= $navbar[2]["ruta"] ?>" class="btn btn-sorteo float-right mb-2">Quiero ganar</a>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="carouselExampleControls" class="carousel slide container mb-3" data-ride="carousel">
<h1 class="text-center h1-x mt-3 mb-5">Productos Destacados</h1>
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="row">
            <?php
                $prod = new Producto($con);
                foreach($prod->getProductosHome() as $row){
            ?>
                <div class="col-3">
                        <a href="#">
                        <h3 class="text-center"><?php echo $row['nombre']?></h3>
                        <img src="productos/galeria/<?php echo $row['img']?>" class="d-block w-100" alt="<?php echo $row['nombre']?>">
                        </a>
                </div>
            <?php
                }
            ?>
        </div>
      
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div id="historia" class="container mt-5 mb-5">
    <h1 class="text-center h1-x">Un poco de nuestra historia</h1>
    <br>
    <div class="row align-items-center">
        <div class="col-6">
                <p class="text-justify">
                La empresa Adidas, fundada en enero de 1949, tiene sus orígenes en las empresas previas de la familia Dassler: la llamada «Gebrüder Dassler Schuhfabrik», fundada a principios de la década de 1920 en Alemania por Adolf «Adi» Dassler junto con su hermano Rudolf Dassler. Confeccionaban zapatillas y pantuflas sin marca adquirida, y también calzado con clavos para deportistas. Adi era el artista introvertido y Rudi el encargado de relaciones públicas. Ambos lograron colocar sus productos en el equipo alemán de atletismo. 
                </p>          
        </div>
        <div class="col-6">
                <p class="text-justify">
                Pero el golpe maestro fue fichar a Jesse Owens, el atleta que deslumbró en los Juegos Olímpicos de Berlín 1936. Ese año, Dassler persuadió al velocista estadounidense para usar sus clavos hechos a mano en los Juegos Olímpicos. Después de las cuatro medallas de oro de Owens, el nombre y la reputación de los zapatos Dassler se hicieron conocidos por los deportistas del mundo y sus entrenadores. Los negocios tuvieron éxito y los Dassler vendían 200 000 pares de zapatos cada año antes de la Segunda Guerra Mundial.
                </p>
        </div>
    </div>
        
    <div class="row align-items-center p-about">
        <div class="col-6">
            <h3 class="h3-x">Proveedor oficial de la FIFA  </h3>
            <br>
            <p class="text-justify">En 1963 Adidas pretende agrandar su negocio y ampliarlo (lo esta consiguiendo) ofreciendo balones de fútbol.3​ Desde 1970, Adidas es el patrocinador, proveedor y titular oficial de la Copa Mundial de Fútbol. En este evento, Adidas se encarga de proveer los balones y la vestimenta de los árbitros, árbitros asistentes y recogepelotas. El 19 de enero de 2005, Adidas Group anunció una extensión de la sociedad entre la compañía textil y la FIFA, ganando los derechos del evento de 2010 y 2014. Más tarde, en noviembre de 2013, la marca y FIFA confirmaron que su alianza seguirá hasta el año 2030.</p>          
        </div>
        <div class="col-6">
                <img class="img-fluid" src="img/fifa.jpg" alt="Adidas FIFA">
        </div>
    </div>
</div>

