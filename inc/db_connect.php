<?php

$db_name= 'prodweb';
$db_user= 'root';
$db_port= 3306;
$db_pass= '';
$db_host= 'localhost';

try{
    $con = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';port='.$db_port,$db_user,$db_pass);
}
catch(PDOException $e){
    print "¡Error!: " . $e->getMessage();
    die();
}

?>