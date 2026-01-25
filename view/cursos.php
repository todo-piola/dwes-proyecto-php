<?php session_start();
require_once '../model/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/dwes-proyecto-php/public/css/estilo.css">
</head>
<body>
    <?php include ("../templates/header.html") ?>
    
    <main class="py-5">
        <div class="container-fluid">
            <!-- Título de la sección -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-2">Cursos Web Developer</h1>
                <ul>
                    <p class="lead text-muted">Aprende las bases de HTML/CSS, ¡el lenguaje base de la Web!</p>
                    <p class="lead text-muted ">Profundiza en la herramienta para crear sitios web responsive más usada del planeta</p>
                    <p class="lead text-muted ">Genera dinamismo con JavaScript de forma sencilla y creativa</p>
                </ul>
            </div>

            <!-- Tarjetas de cursos -->
            <div class="row g-4 p-3">
                <!-- Curso HTML CSS Básico -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <img src="../public/img/html-css.jpg" class="w-75 d-block mx-auto curso-img">
                            <h5 class="card-title fw-bold fs-4">Curso de HTML CSS Básico</h5>
                            <p class="card-text text-muted fs-6">Aprende los fundamentos del desarrollo web. Domina HTML5 y CSS3 desde cero, creando páginas web profesionales y responsivas.</p>
                            <div class="mb-3">
                                <span class="badge bg-warning text-dark me-2">HTML5</span>
                                <span class="badge bg-warning text-dark me-2">CSS3</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted fs-5"><i class="bi bi-currency-euro me-1"></i> 25</span>
                                <a href="/dwes-proyecto-php/controller/agregar_carrito.php?id_curso=1" class="btn btn-outline-warning ">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Curso Bootstrap -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <img src="../public/img/bootstrap.webp" class="w-75 d-block mx-auto curso-img">
                            <h5 class="card-title fw-bold fs-4">Curso de Bootstrap</h5>
                            <p class="card-text text-muted fs-6">Mejora tus habilidades en la web con el framework favorito de los desarrolladores.</p>
                            <div class="mb-3">
                                <span class="badge bg-warning text-dark me-2">BOOTSTRAP</span>
                                <span class="badge bg-warning text-dark me-2">RESPONSIVE</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted fs-5"><i class="bi bi-currency-euro me-1"></i> 40</span>
                                <a href="/dwes-proyecto-php/controller/agregar_carrito.php?id_curso=2" class="btn btn-outline-warning ">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Curso JavaScript -->
                <div class="col-12 col-md-6 col-lg-4 ">
                    <div class="card h-100 shadow-sm ">
                        <div class="card-body ">
                            <img src="../public/img/javascript.jpg" class="d-block mx-auto curso-img">
                            <h5 class="card-title fw-bold fs-4">Curso de JavaScript</h5>
                            <p class="card-text text-muted fs-6">Perfecciona tus capacidades como desarrollador web, aporta dinamismo a tus sitios webs, acceso a APIs, gestión del DOM, y mucho mas...</p>
                            <div class="mb-3">
                                <span class="badge bg-warning text-dark me-2">DOM</span>
                                <span class="badge bg-warning text-dark me-2">APIS</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted fs-5"><i class="bi bi-currency-euro me-1"></i> 40</span>
                                <a href="/dwes-proyecto-php/controller/agregar_carrito.php?id_curso=3" class="btn btn-outline-warning ">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include ("../templates/footer.html") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>