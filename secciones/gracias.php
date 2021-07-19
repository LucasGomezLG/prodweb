<?php

    if(!defined("ACCESO")){
        header("Location: index.php?seccion=gracias");
    }

    if(empty($_GET["nombre"])|| empty($_GET["correo"])){
        header("Location:index.php?seccion=error");
        die();
    }
    
    $nombre=$_GET["nombre"];    
    $correo=$_GET["correo"];
    $consulta=$_GET["consulta"];
    $check=$_GET["check"];

?>



    <div class="container" 
    style=
    "margin: auto; 
    width: 450px; 
    background: #444; 
    padding: 10px 30px; 
    margin-top: 100px;
    margin-bottom: 100px;
    box-sizing: border-box; 
    border-radius: 7px;">  <!-- Por alguna razon no me tomaba los estilos y los tuve que poner aca directamente -->

        <div class="row mt-5 mb-5">
            <div class="col">
                <p style="color:green; font-size:20px;" class="h1-x">SU MENSAJE HA SIDO ENVIADO CON EXITO!</p> 
                <p style="font-size:20px; color:white;" class="h3-x">
                        <br>
                        <b>NOMBRE: </b><?= $nombre ?>            
                        <br>
                        <b>CORREO: </b><?= $correo ?>
                        <br>
                        <b>MENSAJE: </b><?= $consulta ?>
                        <br>
                        <b>TERMINOS ACEPTADOS </b>
                        <br>
                        - <?= $check ?>
                        <br>
                        <br>
                        Gracias por contactarnos!
                    </p>
                </div>
            </div>
            
    </div>
