<?php
require_once '../model/conexion.php';

$mensaje = '';
$usuario_previo = $_GET['usuario'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Verifico que ningún campo este vacío
    if (!empty($usuario) && !empty($email) && !empty($password)) {
        // Comprobar si el nombre de usuario ya existe
        $stmt = $bd->prepare("SELECT nombre_usuario FROM usuario WHERE nombre_usuario = ?");
        $stmt->execute([$usuario]);

        // Buscamos el usuario en la bbdd, ssi existe devuelve este mensaje
        if ($stmt->fetch()) {
            $mensaje = "Ese usuario ya existe";
        } else {
            // Comprobar si el email ya existe y lo buscamos en la bbdd
            $stmt = $bd->prepare("SELECT email FROM usuario WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $mensaje = "Ese email ya está registrado";

            // Si ni el email ni el usuario están registrados, entonces lo registramos
            } else {
                // Guardar usuario
                $stmt = $bd->prepare(
                    "INSERT INTO usuario (nombre_usuario, email, passwd, rol) VALUES (?, ?, ?, 'usuario')"
                );
                $stmt->execute([$usuario, $email, $password]);

                // Redirigir al login con mensaje de éxito 
                // En login.php se captura $_GET['registro'] === 'ok' para mostrar mensaje
                header("Location: login.php?registro=ok");
                exit(); //Después de un header(...) siempre hay que usar exit() para cancelar la ejecución constante
            }
        }
    } else {
        $mensaje = "Rellena todos los campos";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/dwes-proyecto-php/public/css/estilo.css">
</head>
<body class="bg-dark text-white">

<?php include '../templates/header.php' ?>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card p-4" style="width: 400px;">

        <h4 class="mb-3 text-center">Registro</h4>

        <?php if ($mensaje): ?>
            <div class="alert alert-danger"><?= $mensaje ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="username" class="form-control"
                       value="<?= htmlspecialchars($usuario_previo) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control"
                    value="<?= htmlspecialchars($email_previo ?? '') ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-success w-100">Registrarse</button>
        </form>

    </div>
</div>

<?php include '../templates/footer.html'; ?>

</body>
</html>
