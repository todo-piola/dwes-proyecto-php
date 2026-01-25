<?php
session_start();
require_once '../model/conexion.php';

if (!isset($_SESSION['usuario']) || !isset($_GET['id_curso'])) {
    header("Location: /dwes-proyecto-php/view/login.php");
    exit();
}

$nombre_usuario = $_SESSION['usuario'];
$id_curso = $_GET['id_curso'];

// Obtener o crear carrito
$sql = "SELECT id_carrito FROM carrito WHERE nombre_usuario = ?";
$stmt = $bd->prepare($sql);
$stmt->execute([$nombre_usuario]);
$carrito = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$carrito) {
    $sql = "INSERT INTO carrito (nombre_usuario, fecha_creación, fecha_modificación)
            VALUES (?, NOW(), NOW())";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$nombre_usuario]);
    $id_carrito = $bd->lastInsertId();
} else {
    $id_carrito = $carrito['id_carrito'];
}

// Insertar curso en carrito
$sql = "INSERT IGNORE INTO carrito_cursos (id_carrito, id_curso) VALUES (?, ?)";
$stmt = $bd->prepare($sql);
$stmt->execute([$id_carrito, $id_curso]);

// Redirigir a carrito
header("Location: /dwes-proyecto-php/view/carrito.php");
exit();
