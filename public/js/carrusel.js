
document.addEventListener("DOMContentLoaded", () => {
  const proyectos = [
    {
      titulo: "Ajedrez modular",
      descripcion: "Juego de ajedrez con validación de movimientos de peones y lógica de turnos, desarrollado con JavaScript y manipulación del DOM."
    },
    {
      titulo: "API de Gatos Curiosos",
      descripcion: "Aplicación web que consulta una API sobre gatos y muestra datos curiosos, demostrando consumo de APIs REST y renderizado dinámico."
    },
    {
      titulo: "Pokédex Interactiva",
      descripcion: "Aplicación web que consume la API de Pokémon para mostrar información dinámica mediante un carrusel, con filtros por rango y estadísticas en tiempo real."
    }
  ];

  const nombre = document.getElementById("tituloProyecto");
  const descripcion = document.getElementById("descripcionProyecto");
  const carrusel = document.getElementById("botonesCarrusel");

  // Mostrar el primer proyecto al cargar
  nombre.textContent = proyectos[0].titulo;
  descripcion.textContent = proyectos[0].descripcion;

  // Escuchar cambios del carrusel
  carrusel.addEventListener("slid.bs.carousel", function (event) {
    const index = event.to;
    nombre.textContent = proyectos[index].titulo;
    descripcion.textContent = proyectos[index].descripcion;
  });
});
