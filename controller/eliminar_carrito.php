<?php
session_start();
require_once '../model/conexion.php';

if (!isset($_SESSION['usuario']) || !isset($_GET['id_curso'])) {
    header("Location: /dwes-proyecto-php/view/login.php");
    exit();
}

$nombre_usuario = $_SESSION['usuario'];
$id_curso = $_GET['id_curso'];

// Obtener id del carrito del usuario
$stmt = $bd->prepare("SELECT id_carrito FROM carrito WHERE nombre_usuario = ?");
$stmt->execute([$nombre_usuario]);
$carrito = $stmt->fetch(PDO::FETCH_ASSOC);

if ($carrito) {
    $id_carrito = $carrito['id_carrito'];
    // Eliminar curso del carrito
    $stmt = $bd->prepare("DELETE FROM carrito_cursos WHERE id_carrito = ? AND id_curso = ?");
    $stmt->execute([$id_carrito, $id_curso]);
}

// Redirigir de nuevo al carrito
header("Location: /dwes-proyecto-php/view/carrito.php");
exit();
