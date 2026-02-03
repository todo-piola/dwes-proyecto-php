<?php
session_start();

/*
 Prueba unitaria:
 Verificar que solo los administradores acceden al CRUD
*/

function esAdmin() {
    return isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
}

// Simulamos usuario normal
$_SESSION['rol'] = 'usuario';
assert(esAdmin() === false, 'ERROR: Usuario normal detectado como admin');

// Simulamos admin
$_SESSION['rol'] = 'admin';
assert(esAdmin() === true, 'ERROR: Admin no reconocido');

echo "PUNIT-ROL-01 OK: Control de roles correcto";
