<?php
require_once '../config/session.php';
require_once '../model/conexion.php';

$mensaje_error = '';
$usuario_no_existe = false;
$usuario_input = '';

// Proceso el login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $usuario_input = trim($_POST['username']);
    $password = trim($_POST['password']);

    error_log("Procesando login para usuario: $usuario_input");

    if (!empty($usuario_input) && !empty($password)) {
        try {
            // 🔹 Usar nombre_usuario correctamente
            $sql = "SELECT nombre_usuario, passwd, rol, contador_login FROM usuario WHERE nombre_usuario = ?";
            $stmt = $bd->prepare($sql);
            $stmt->execute([$usuario_input]);
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            error_log("Resultado búsqueda: " . ($fila ? "Usuario encontrado" : "Usuario NO encontrado"));

            if ($fila) {
                // El usuario existe - verificar contraseña
                if ($fila['passwd'] === $password) { 
                    session_regenerate_id(true); //Cuando el login es correcto regenera la sesión
                    require_once '../config/session.php';
                    // Crear sesión
                    $_SESSION['usuario'] = $fila['nombre_usuario'];
                    $_SESSION['rol'] = $fila['rol'];
                    $_SESSION['ultima_actividad'] = time();

                    // Incrementar contador de logins
                    $stmt = $bd->prepare("UPDATE usuario SET contador_login = contador_login + 1 WHERE nombre_usuario = ?");
                    $stmt->execute([$fila['nombre_usuario']]);

                    $redirect = $_SESSION['login_redirect'] ?? '/dwes-proyecto-php/index.php';
                    unset($_SESSION['login_redirect']);

                    error_log("Login exitoso, redirigiendo a: $redirect");
                    header("Location: $redirect");
                    exit();
                } else {
                    $mensaje_error = "La contraseña no es correcta";
                    error_log("Contraseña incorrecta");
                }
            } else {
                $mensaje_error = "El usuario no existe";
                $usuario_no_existe = true;
                error_log("Usuario no existe, mostrando botón de registro");
            }
        } catch (Exception $e) {
            $mensaje_error = "Error en la base de datos";
            error_log("Error BD: " . $e->getMessage());
        }
    } else {
        $mensaje_error = "Rellena ambos campos";
        error_log("Campos vacíos");
    }
}

// Verificar si ya está logueado
$ya_logueado = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/dwes-proyecto-php/public/css/estilo.css">
</head>
<body class="bg-dark text-white">

<?php include '../templates/header.php' ?>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card p-4 shadow" style="width: 400px;">

        <?php if ($ya_logueado): ?>
            <h4 class="mb-3">Ya estás conectado como <?= htmlspecialchars($_SESSION['usuario']) ?></h4>
            <div class="d-grid gap-2">
                <a href="../model/logout.php" class="btn btn-warning w-100">Cerrar sesión</a>
                <a href="/dwes-proyecto-php/index.php" class="btn btn-secondary w-100">Ir a Inicio</a>
            </div>
            
        <?php else: ?>
            <h4 class="mb-3 text-center">Iniciar Sesión</h4>

            <!-- Muestra mensaje de error personalizado -->
            <?php if ($mensaje_error): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($mensaje_error) ?></div>
            <?php endif; ?>

            <!-- Si el usuario introducido no existe, aparece un botón que redirige a registro.php -->
            <?php if ($usuario_no_existe): ?>
                <div class="alert alert-success">
                    <strong>¡El usuario no existe!</strong><br>
                    ¿No tienes cuenta?
                    <a href="registro.php?usuario=<?= urlencode($usuario_input) ?>" class="btn btn-sm btn-primary ms-2">
                        Registrarse
                    </a>
                </div>
            <?php endif; ?>

            <!-- Si el usuario estaba logeado pero sin actividad, elimina la sesión después de 3 minutos -->
            <?php if (isset($_GET['timeout'])): ?>
                <div class="alert alert-warning">Tu sesión ha caducado por inactividad.</div>
            <?php endif; ?>

            <?php if (isset($_GET['registro']) && $_GET['registro'] === 'ok'): ?>
                <div class="alert alert-success">
                    Usuario registrado correctamente. Ya puedes iniciar sesión.
                </div>
            <?php endif; ?>

            <form method="post" action="login.php">
                <div class="mb-3">
                    <label for="username" class="form-label">Usuario</label>
                    <input type="text" name="username" id="username" class="form-control" 
                           value="<?= htmlspecialchars($usuario_input) ?>" required>
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

<?php include '../templates/footer.html'; ?>

</body>
</html>