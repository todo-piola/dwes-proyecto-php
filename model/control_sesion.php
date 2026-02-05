<?php

$tiempo_maximo = 180; // 3 minutos

// SOLO si hay usuario logeado
if (isset($_SESSION['usuario'])) {

    if (isset($_SESSION['ultima_actividad'])) {
        if (time() - $_SESSION['ultima_actividad'] > $tiempo_maximo) {

            session_unset();
            session_destroy();

            header("Location: /dwes-proyecto-php/view/login.php?timeout=1");
            exit();
        }
    }

    // Actualizar actividad
    $_SESSION['ultima_actividad'] = time();
}