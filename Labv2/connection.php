<?php
function conectar($nombreBase){
    try{
        $conexion = new PDO('mysql:host=127.0.0.1; dbname=' + $nombreBase, 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->exec("SET CHARACTER SET UTF8");
    }catch(Exception $e){
        die("Error".$e->getMessage());
        echo("Linea de error".$e->getLine());
    }
    return $conexion;
}
?>