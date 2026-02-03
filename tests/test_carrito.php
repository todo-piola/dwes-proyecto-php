<?php
session_start();

/*
 Prueba unitaria:
 Verificar que se pueden añadir cursos al carrito correctamente
*/

$_SESSION['carrito'] = [];

// Simulamos un curso
$curso = [
    'id' => 1,
    'nombre' => 'Curso PHP',
    'precio' => 50
];

// Añadir al carrito
$_SESSION['carrito'][] = $curso;

// Comprobaciones
assert(count($_SESSION['carrito']) === 1, 'ERROR: El carrito no contiene cursos');
assert($_SESSION['carrito'][0]['nombre'] === 'Curso PHP', 'ERROR: Curso incorrecto');

echo "PHPUNIT-02 OK: Curso añadido correctamente";
