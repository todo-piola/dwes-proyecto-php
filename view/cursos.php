<?php
session_start();
require_once '../model/conexion.php';

// Obtener cursos desde la base de datos
$stmt = $bd->query("SELECT * FROM curso");
$cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/dwes-proyecto-php/public/css/estilo.css">
</head>
<body>
<?php include("../templates/header.php"); ?>

<main class="py-5">
    <div class="container-fluid">

        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold mb-2">Cursos Web Developer</h1>
            <p class="lead text-muted">Explora nuestros cursos disponibles y empieza a aprender hoy.</p>
        </div>

        <!-- Tarjetas dinámicas -->
        <div class="row g-4 p-3">
            <?php foreach ($cursos as $curso): ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">

                            <img src="../public/img/default-curso.webp" class="w-75 d-block mx-auto curso-img">

                            <h5 class="card-title fw-bold fs-4"><?= htmlspecialchars($curso['nombre_curso']) ?></h5>
                            <p class="card-text text-muted fs-6"><?= htmlspecialchars($curso['descripción']) ?></p>

                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted fs-5">
                                    <i class="bi bi-currency-euro me-1"></i><?= $curso['precio'] ?>
                                </span>

                                <a href="/dwes-proyecto-php/controller/agregar_carrito.php?id_curso=<?= $curso['id_curso'] ?>"
                                   class="btn btn-warning">
                                    Añadir al carrito
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</main>

<?php include("../templates/footer.html"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>