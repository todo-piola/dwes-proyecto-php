<?php
session_start();
require_once '../model/conexion.php';
require_once '../model/control_sesion.php';
require_once '../model/funciones_test.php';

if (!usuarioAutenticado()) {
    $_SESSION['login_redirect'] = $_SERVER['REQUEST_URI'];
    header("Location: /dwes-proyecto-php/view/login.php");
    exit();
}

$usuario = $_SESSION['usuario'];

// Obtener cursos del carrito
$stmt = $bd->prepare("
    SELECT cu.id_curso, cu.nombre_curso, cu.descripción, cu.precio
    FROM carrito_cursos cc
    JOIN carrito c ON cc.id_carrito = c.id_carrito
    JOIN curso cu ON cc.id_curso = cu.id_curso
    WHERE c.nombre_usuario = ?
");

$stmt->execute([$usuario]);
$cursos_carrito = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <title>Mi Carrito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/dwes-proyecto-php/public/css/estilo.css">
</head>
<body>
<?php include("../templates/header.php"); ?>

<div class="container py-5">
    <h2>Mi Carrito</h2>
    <?php if(count($cursos_carrito) === 0): ?>
        <p>Tu carrito está vacío.</p>
    <?php else: ?>
        <ul class="list-group">
        <?php foreach($cursos_carrito as $curso): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <span><?= $curso['nombre_curso'] ?></span><br>
                    <small class="text-muted"><?= $curso['descripción'] ?></small>
                </div>
                <div class="d-flex gap-2">
                    <span><i class="bi bi-currency-euro me-1"></i><?= $curso['precio'] ?></span>
                    <!-- Botón eliminar -->
                    <a href="/dwes-proyecto-php/controller/eliminar_carrito.php?id_curso=<?= $curso['id_curso'] ?>" 
                    class="btn btn-sm btn-danger">Eliminar</a>
                </div>
            </li>
        <?php endforeach; ?>
        </ul>

    <?php endif; ?>
</div>

<?php include("../templates/footer.html"); ?>
</body>
</html>
