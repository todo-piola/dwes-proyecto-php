<?php
session_start();
require_once '../model/conexion.php';
require_once '../model/control_sesion.php';

$mensaje_error = '';
$ya_logueado = isset($_SESSION['usuario']);

// Guardar página anterior solo la primera vez
if (!isset($_SESSION['login_redirect'])) {
    $_SESSION['login_redirect'] = $_SERVER['HTTP_REFERER'] ?? '/dwes-proyecto-php/index.php';
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($usuario) && !empty($password)) {
        // Buscar usuario por nombre_usuario
        $sql = "SELECT nombre_usuario, passwd, rol FROM usuario WHERE nombre_usuario = ?";
        $stmt = $bd->prepare($sql);
        $stmt->execute([$usuario]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila && $fila['passwd'] === $password) {
            $_SESSION['usuario'] = $fila['nombre_usuario'];
            $_SESSION['rol'] = $fila['rol'];
            $_SESSION['ultima_actividad'] = time();

            // Redirigir a la página anterior guardada
            $redirect = $_SESSION['login_redirect'];
            unset($_SESSION['login_redirect']); // limpiar variable
            header("Location: $redirect");
            exit();
        } else {
            $mensaje_error = "Usuario o contraseña incorrectos";
        }
    } else {
        $mensaje_error = "Rellena ambos campos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/dwes-proyecto-php/public/css/estilo.css">
</head>
<body class="bg-dark text-white">

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card p-4 shadow" style="width: 400px;">

        <?php if ($ya_logueado): ?>
            <h4 class="mb-3">Ya estás conectado como <?= $_SESSION['usuario'] ?></h4>
            <div class="d-grid gap-2">
                <!-- Botón cerrar sesión -->
                <a href="../model/logout.php" class="btn btn-warning w-100">Cerrar sesión</a>
                <!-- Botón ir a la página principal -->
                <a href="/dwes-proyecto-php/index.php" class="btn btn-secondary w-100">Ir a Inicio</a>
            </div>
        <?php else: ?>
            <h4 class="mb-3 text-center">Iniciar Sesión</h4>

            <!-- Si el intento de inicio de sesión es erróneo, muestra el mensaje de error -->
            <?php if ($mensaje_error): ?>
                <div class="alert alert-danger"><?= $mensaje_error ?></div>
            <?php endif; ?>

            <!-- Si la variable timeout está iniciada, entonces muestra el cartel de sesión caducada -->
            <?php if (isset($_GET['timeout'])): ?>
                <div class="alert alert-warning"> Tu sesión ha caducado por inactividad. </div>
            <?php endif; ?>


            <form method="post" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-warning w-100">Acceder</button>
            </form>
        <?php endif; ?>

    </div>
</div>

</body>
</html>

