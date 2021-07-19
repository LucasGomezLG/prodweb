<?php

if(!defined("ACCESO")){
    header("Location: ../index.php?seccion=contacto");
}

?>
   

    <section id="Contacto">
        <div class="contacto-bg">
            <div class="container">
                <h1 class="text-center txt-productos mt-3">Contacto</h1>



                <div class="row mb-4">
                    <div class="col-lg-8 mx-auto ">
                        <form action="enviar.php" method="POST">

                            <!-- Nombre -->
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2 floating-label-form-group-with-value">
                                    <label>Nombre</label>
                                    <input class="form-control" name="nombre" id="name" type="text" placeholder="Nombre y Apellido" required="required" data-validation-required-message="Please enter your name." aria-invalid="false">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            
                            <!-- Mail -->
                            <div class="control-group warning">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2 floating-label-form-group-with-value">
                                    <label>Dirección email</label>
                                    <input class="form-control" name="correo" id="email" type="email" placeholder="mail@mail.com" required="required" data-validation-required-message="Please enter your email address." aria-invalid="true">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <!-- Telefono -->
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2 floating-label-form-group-with-value">
                                    <label>Número telefónico</label>
                                    <input class="form-control" name="telefono" id="phone" type="tel" placeholder="+5491126030887" required="required" data-validation-required-message="Please enter your phone number."
                                        aria-invalid="false">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <!-- Consulta -->
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2 floating-label-form-group-with-value">
                                    <label>Consulta</label>
                                    <textarea class="form-control" name="consulta" id="message" rows="5" placeholder="Escribe tu consulta aqui" required="required" data-validation-required-message="Please enter a message."
                                        aria-invalid="false"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                                <?php
                                    if(isset($_GET["error"]) && $_GET["error"] == "true"):
                                ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                        </button>
                                        <strong>Los campos <b>Nombre</b> y <b>Correo</b> son obligatorios.</strong>
                                    </div>
                        
                                <?php
                                    endif;
                                ?>

                            <!-- Checkbox -->
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="check[]" value="legal">
                                    <label class="form-check-label" for="gridCheck">He leído y acepto los términos y condiciones del aviso legal</label>
                                    <br>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="check[]" value="sorteo">
                                    <label class="form-check-label" for="gridCheck">Participar del sorteo</label>                                    
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck" name="check[]" value="newsletter">
                                    <label class="form-check-label" for="gridCheck">Subscribirme al newsletter de Adidas</label>
                                    <br>
                                </div>
                            </div>

                            <!-- Boton ENVIAR -->
                            <button type="submit" class="btn btn-productos btn-block mb-3 mt-2" >Enviar</button>
                        </form>
                    </div>
                </div>



            </div>
        </div>
    </section>
    

        
    

        
        
        
