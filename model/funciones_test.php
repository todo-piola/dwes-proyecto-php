<?php
function usuarioAutenticado(): bool {
    return isset($_SESSION['usuario']);
}

function esAdmin(): bool {
    return isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin';
}

function carritoTieneCursos(array $cursos): bool {
    return count($cursos) > 0;
}
