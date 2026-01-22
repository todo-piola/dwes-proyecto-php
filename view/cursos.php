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
                <h1 class="display-4 fw-bold">Cursos Web Developer</h1>
                <ul class="text-text-decoration-none">
                    <li class="lead text-muted p-2">Aprende las bases de HTML/CSS, ¡el lenguaje base de la Web!</li>
                    <li class="lead text-muted p-2">Profundiza en la herramienta para crear sitios web responsive más usada en el planeta</li>
                    <li class="lead text-muted p-2">Genera dinamismo en todas tus páginas de forma sencilla</li>
                </ul>
            </div>

            <!-- Tarjetas de cursos -->
            <div class="row g-4 p-3">
                <!-- Curso HTML CSS Básico -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <img src="../public/img/html-css.jpg">
                            <h5 class="card-title fw-bold fs-4">Curso de HTML CSS Básico</h5>
                            <p class="card-text text-muted fs-6">Aprende los fundamentos del desarrollo web. Domina HTML5 y CSS3 desde cero, creando páginas web profesionales y responsivas.</p>
                            <div class="mb-3">
                                <span class="badge bg-warning me-2 fs-6">HTML5</span>
                                <span class="badge bg-warning me-2 fs-6">CSS3</span>
                                <span class="badge bg-warning fs-6 ">Responsive</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted"><i class="bi bi-clock me-1"></i> 25€</span>
                                <a href="#" class="btn btn-outline-warning ">Agregar al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Curso Bootstrap -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="overflow-hidden rounded-top" style="height: 250px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <i class="bi bi-bootstrap text-white" style="font-size: 8rem;"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Bootstrap</h5>
                            <p class="card-text text-muted">Crea sitios web modernos y responsivos con el framework CSS más popular. Aprende componentes, grid system y utilidades de Bootstrap 5.</p>
                            <div class="mb-3">
                                <span class="badge bg-success me-2">Bootstrap 5</span>
                                <span class="badge bg-success me-2">Grid</span>
                                <span class="badge bg-success">Components</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted"><i class="bi bi-clock me-1"></i> 6 semanas</span>
                                <a href="#" class="btn btn-outline-success btn-sm">Más información</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Curso JavaScript -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="overflow-hidden rounded-top" style="height: 250px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <div class="d-flex align-items-center justify-content-center h-100">
                                <i class="bi bi-filetype-js text-white" style="font-size: 8rem;"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">JavaScript</h5>
                            <p class="card-text text-muted">Domina el lenguaje de programación web más importante. Aprende desde conceptos básicos hasta manipulación del DOM y APIs modernas.</p>
                            <div class="mb-3">
                                <span class="badge bg-warning text-dark me-2">ES6+</span>
                                <span class="badge bg-warning text-dark me-2">DOM</span>
                                <span class="badge bg-warning text-dark">APIs</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted"><i class="bi bi-clock me-1"></i> 10 semanas</span>
                                <a href="#" class="btn btn-outline-warning btn-sm">Más información</a>
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