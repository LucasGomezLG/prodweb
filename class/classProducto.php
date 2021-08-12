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

   function getProductos($id = Null, $es_padre = False){
      $sql = "SELECT * FROM productos";
        if (!empty($id)){
            if ($es_padre){
                $sql =  $sql." WHERE id_categoria in (";
                $aux_sql = "SELECT * FROM categorias WHERE id_padre = ".$id;
                foreach ($this->con->query($aux_sql, PDO::FETCH_ASSOC) as $categoria){
                    $sql = $sql. "'".$categoria['id_categoria']."', ";
                }
                $sql = substr($sql, 0, -2) . ")";
            }else{
                $sql = "SELECT * FROM productos WHERE id_categoria = ".$id;
            }
        } 
        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

 function getProductoById($id){
        $sql = "SELECT * FROM productos WHERE id_producto = $id";

        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
    function getProductosCategorias(){
        $sql = "SELECT * FROM productos WHERE id_padre =0";

        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }
    
    function getProductosSubcategorias(){
        $sql = "SELECT * FROM productos WHERE id_padre !=0";

        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }

    function getProductosMarcas($id_marca){
        $sql = "SELECT * FROM productos WHERE id_marca = $id_marca";

        return $this->con->query($sql, PDO::FETCH_ASSOC);
    }





}
?>