<?php
require_once '../config/session.php';
require_once '../model/conexion.php';
require_once '../model/control_sesion.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: /dwes-proyecto-php/index.php");
    exit();
}


if (!isset($_GET['id'])) {
    header("Location: crud_cursos.php");
    exit();
}

$id = $_GET['id'];

$sql = "SELECT * FROM curso WHERE id_curso = ?";
$stmt = $bd->prepare($sql);
$stmt->execute([$id]);
$curso = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$curso) {
    header("Location: crud_cursos.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre_curso'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $sql = "UPDATE curso SET nombre_curso = ?, descripción = ?, precio = ? WHERE id_curso = ?";
    $stmt = $bd->prepare($sql);
    $stmt->execute([$nombre, $descripcion, $precio, $id]);

    header("Location: crud.php");
    exit();
}

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

    <div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">

            <h3 class="mb-4"> Editar curso </h3>

            <form method="post" class="border rounded p-4 bg-white">
                <div class="mb-3">
                    <label class="form-label">Nombre del curso</label>
                    <input type="text"
                        name="nombre_curso"
                        class="form-control"
                        value="<?= htmlspecialchars($curso['nombre_curso']) ?>"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion"
                            rows="4"
                            class="form-control"
                            required><?= htmlspecialchars($curso['descripción']) ?></textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label">Precio (€)</label>
                    <input type="number"
                        name="precio"
                        class="form-control"
                        value="<?= $curso['precio'] ?>"
                        required>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-warning"> Guardar cambios </button>
                    <a href="crud.php" class="btn btn-outline-secondary"> Cancelar </a>
                </div>
            </form>

        </div>
    </div>
    </div>


    <?php include ("../templates/footer.html") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>



