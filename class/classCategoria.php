<?php

class Categorias{
    var $con;

    
    function __construct($con)
    {
        $this->con = $con;
    }

    function getCategorias($idPadre = 0){
        $sql = "SELECT * FROM categorias WHERE id_padre=".$idPadre;

        return $this->con->query($sql, PDO::FETCH_ASSOC);

        //Esta funcion retorna listado de categorias.
    }

    function getSubcategorias($idPadre = 0){
        $sql = "SELECT * FROM categorias WHERE id_padre!= 0".$idPadre;

        return $this->con->query($sql, PDO::FETCH_ASSOC);

        //Esta funcion retorna listado de subcategorias.
    }

    function getSubcategoriaById($id_categoria){
        $sql = "SELECT * FROM categorias WHERE id_categoria = $id_categoria;";

        return $this->con->query($sql, PDO::FETCH_ASSOC);

        //Esta funcion retorna listado de subcategorias.
    }


}






?>