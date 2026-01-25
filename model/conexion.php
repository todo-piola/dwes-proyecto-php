<?php

$cadena_conexion = 'mysql:dbname=webdev_franco;host=127.0.0.1;charset=utf8';
$usuario = 'root';
$clave = '';

try {
    $bd = new PDO($cadena_conexion, $usuario, $clave);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}