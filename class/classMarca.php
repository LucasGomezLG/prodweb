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
// no funciona jaja
    function borrarMarca ($id_marca){
        $sql = "DELETE FROM marcas WHERE id_marca = :id_marca";
        $sql ->execute(array(':id_marca' => $id_marca));
        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }




}






?>