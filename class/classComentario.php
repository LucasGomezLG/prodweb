<?php

class Comentario{
    var $con;

    function __construct($con)
    {
        $this->con = $con;
    }

    function getComentariosById($id_producto){
        $sql = "SELECT * FROM comentarios WHERE id_producto = $id_producto";

        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
}
?>