<?php
$host = 'localhost';
$db = 'autos';
$usuario = 'root';
$clave = '';


try{
    $conexion = new PDO("mysql:host=$host;dbname=$db;charsetutf8",$usuario,$clave);
    $conexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
    die("error de conexion:".$e ->getMessage);
};
?>