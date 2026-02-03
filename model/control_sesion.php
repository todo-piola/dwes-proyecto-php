<?php
session_start();

$tiempo_maximo = 60; // 1 minuto inactivo

if (isset($_SESSION['ultima_actividad'])) {
    if (time() - $_SESSION['ultima_actividad'] > $tiempo_maximo) {
        // Sesión caducada
        session_unset();
        session_destroy();
        // Manda de vuelta a la vista login y envía la variable timeout iniciada a 1 para mostrar un cartel informativo
        header("Location: /dwes-proyecto-php/view/login.php?timeout=1");
        exit();
    }
}

// Actualizar última actividad
$_SESSION['ultima_actividad'] = time();
