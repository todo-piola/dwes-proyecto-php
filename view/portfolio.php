<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/dwes-proyecto-php/public/css/estilo.css">
</head>
<body>
    <?php include ("../templates/header.html") ?>

    <main>
    <div class="card-group">
        <div class="card p-3">
            <div class="overflow-hidden rounded" style="height: 250px;">
                <a href="https://github.com/todo-piola/dwec/tree/main/react/ajedrez">
                    <img src="/dwes-proyecto-php/public/img/proyecto1.webp" class="w-100 h-100 object-fit-cover" alt="ajedrez">
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Ajedrez Modular</h5>
                <p class="card-text">Juego de ajedrez con validación de movimientos de peones y lógica de turnos, desarrollado con JavaScript y manipulación del DOM.</p>
            </div>
        </div>
        <div class="card p-3">
            <div class="overflow-hidden rounded" style="height: 250px;">
                <a href="https://github.com/todo-piola/dwec/tree/main/react/gato-factos">
                    <img src="/dwes-proyecto-php/public/img/proyecto4.webp" class="w-100 h-100 object-fit-cover" alt="gatos">
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">API de Gatos curiosos</h5>
                <p class="card-text">Aplicación web que consulta una API sobre gatos y muestra datos curiosos, demostrando consumo de APIs REST y renderizado dinámico.</p>
            </div>
        </div>
        <div class="card p-3">
            <div class="overflow-hidden rounded" style="height: 250px;">
                <a href="https://github.com/todo-piola/dwec/tree/main/react/pokemon">
                    <img src="/dwes-proyecto-php/public/img/proyecto3.webp" class="w-100 h-100 object-fit-cover" alt="pokedex">
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">Pókedex interactiva</h5>
                <p class="card-text">Aplicación web que consume la API de Pokémon para mostrar información dinámica mediante un carrusel, con filtros por rango y estadísticas en tiempo real.</p>
            </div>
        </div>
    </div>
</main>

    <?php include ("../templates/footer.html") ?>

</body>
</html>