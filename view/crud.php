<?php
session_start();
require_once '../model/conexion.php';
require_once '../model/control_sesion.php';

// Solo admins
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: /dwes-proyecto-php/index.php");
    exit();
}

// Procesar creación de curso
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear'])) {
    $nombre = $_POST['nombre_curso'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO curso (nombre_curso, descripción, precio) VALUES (?, ?, ?)";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$nombre, $descripcion, $precio]);
}

// Procesar eliminación
if (isset($_GET['eliminar'])) {
    try{
        $id_curso = $_GET['eliminar'];
        $sql = "DELETE FROM curso WHERE id_curso = ?";
        $stmt = $bd->prepare($sql);
        $stmt->execute([$id_curso]);
        echo '<div class="alert alert-success">
            Curso eliminado correctamente.
          </div>';
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Código 23000 indica violación de FK con otra tabla
                echo '<div class="alert alert-warning">
                    No puedes borrar este curso porque está en el carrito de algún usuario.
                </div>';
        } else {
            echo '<div class="alert alert-danger">
                Ha ocurrido un error inesperado.
                </div>';
        }
    }
}

// Obtener cursos
$sql = "SELECT * FROM curso";
$stmt = $bd->query($sql);
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/dwes-proyecto-php/public/css/estilo.css">
</head>
<body>
    <?php include ("../templates/header.php") ?>

    <div class="container py-5">
        <h1>Administración de Cursos</h1>

        <!-- Formulario crear curso -->
        <form method="post" class="mb-4">
            <input type="hidden" name="crear" value="1">
            <div class="mb-2">
                <input type="text" name="nombre_curso" placeholder="Nombre" class="form-control" required>
            </div>
            <div class="mb-2">
                <textarea name="descripcion" placeholder="Descripción" class="form-control" required></textarea>
            </div>
            <div class="mb-2">
                <input type="number" name="precio" placeholder="Precio" class="form-control" required>
            </div>
            <button class="btn btn-success">Crear Curso</button>
        </form>

        <!-- Tabla de cursos -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio(€)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cursos as $curso): ?>
                <tr>
                    <td><?= $curso['id_curso'] ?></td>
                    <td><?= $curso['nombre_curso'] ?></td>
                    <td><?= $curso['descripción'] ?></td>
                    <td><?= $curso['precio'] ?></td>
                    <td>
                        <!-- Botón eliminar -->
                        <a href="?eliminar=<?= $curso['id_curso'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        <!-- Botón editar -->
                        <a href="editar_curso.php?id=<?= $curso['id_curso'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php include ("../templates/footer.html") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
