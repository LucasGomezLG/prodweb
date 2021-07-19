<?php

class Producto{
    var $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    function getProductosHome(){
        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT 4";

        return $this->con->query($sql, PDO::FETCH_ASSOC);

        //Esta funcion retorna listado de categorias en base al padre que recibi.
    }

    function getProductos(){
        $sql = "SELECT * FROM productos";

        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    




}






?>