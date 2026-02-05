<?php 
session_start(); 
include __DIR__ . '/../view/cookies.php';
?>

<header class="m-0 bg-black">
    <nav class="p-5 d-flex justify-content-between align-items-center">
        <div class="nav-name w-50">
            <a href="/dwes-proyecto-php/index.php" class="text-decoration-none text-white justify-content-start h3">
                <span class="myname h2">Franco Benavides Garcia</span>
            </a>
        </div>
        <div class="nav-items d-none d-md-flex gap-5 w-100 justify-content-around fs-5 ">
            <a href="/dwes-proyecto-php/view/cv.php" class="text-decoration-none text-white">CV</a>
            <a href="/dwes-proyecto-php/view/portfolio.php" class="text-decoration-none text-white">Portfolio</a>
            <a href="/dwes-proyecto-php/view/cursos.php" class="text-decoration-none text-white">Cursos</a>
            <a href="/dwes-proyecto-php/view/contacto.php" class="text-decoration-none text-white">Contacto</a>
        <?php 
        if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
            <a href="/dwes-proyecto-php/view/crud.php" class="text-decoration-none text-warning fw-bold">Admin Cursos</a>
        <?php endif; ?>
        </div>

        <div class="dropdown d-md-none">
            <button class="btn btn-link text-white p-0 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-list fs-2"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dwes-proyecto-php/view/cv.php">CV</a></li>
                <li><a class="dropdown-item" href="/dwes-proyecto-php/view/portfolio.php">Portfolio</a></li>
                <li><a class="dropdown-item" href="/dwes-proyecto-php/view/cursos.php">Cursos</a></li>
                <li><a class="dropdown-item" href="/dwes-proyecto-php/view/contacto.php">Contacto</a></li>
            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
                <li><a class="dropdown-item" href="/dwes-proyecto-php/view/crud.php">Admin Cursos</a></li>
            <?php endif; ?>
            </ul>
        </div>
        
        <div class="nav-iconos d-flex w-25 justify-content-end">
            <a href="/dwes-proyecto-php/view/login.php" class="bi bi-person-fill fs-2 text-white w-25"></a>
            <a href="/dwes-proyecto-php/view/carrito.php" class="bi bi-cart-fill fs-2 text-white w-25"></a>
        </div>
        
    </nav>
</header>