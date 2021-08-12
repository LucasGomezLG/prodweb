<?php

class Marca{
    var $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    function getMarcas(){
        $sql = "SELECT * FROM marcas";

        return $this->con->query($sql, PDO::FETCH_ASSOC);

        //Esta funcion retorna listado de marcas
    }

    function getMarcaById ($id_marca){
        $sql = "SELECT nombre FROM marcas WHERE id_marca = $id_marca;";
        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }




}






?>