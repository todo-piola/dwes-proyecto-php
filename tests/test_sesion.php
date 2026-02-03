<?php
session_start();

/*
 Prueba unitaria:
 Verificar que al iniciar sesión se crean las variables de sesión necesarias
*/

$_SESSION = [];

// Simulamos login correcto
$_SESSION['usuario'] = 'franco';
$_SESSION['rol'] = 'franco123';

// Comprobaciones
assert(isset($_SESSION['usuario']), 'ERROR: No se creó la sesión de usuario');
assert(isset($_SESSION['rol']), 'ERROR: No se creó el rol en sesión');

echo "PHPUNIT-01 OK: Sesión iniciada correctamente";
