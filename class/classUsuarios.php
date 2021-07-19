<?php

class Usuario{
    var $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    function getUsuarios(){
        $sql = "SELECT * FROM usuarios";

        return $this->con->query($sql, PDO::FETCH_ASSOC);

        //Esta funcion retorna listado de usuarios.
    }




}






?>