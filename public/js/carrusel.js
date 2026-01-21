
  const projectData = [
    {
      title: "Ajedrez modular",
      description: "Juego de ajedrez con validación de movimientos de peones y lógica de turnos, desarrollado con JavaScript y manipulación del DOM."
    },
    {
      title: "API de Gatos Curiosos",
      description: "Aplicación web que consulta una API sobre gatos y muestra datos curiosos, demostrando consumo de APIs REST y renderizado dinámico."
    },
    {
      title: "Pokédex Interactiva",
      description: "Aplicación web que consume la API de Pokémon para mostrar información dinámica mediante un carrusel, con filtros por rango y estadísticas en tiempo real."
    }
  ];

  const titleElement = document.getElementById("projectTitle");
  const descriptionElement = document.getElementById("projectDescription");
  const carousel = document.getElementById("carouselExampleIndicators");

  // Mostrar el primer proyecto al cargar
  titleElement.textContent = projectData[0].title;
  descriptionElement.textContent = projectData[0].description;

  // Escuchar cambios del carrusel
  carousel.addEventListener("slid.bs.carousel", function (event) {
    const index = event.to;
    titleElement.textContent = projectData[index].title;
    descriptionElement.textContent = projectData[index].description;
  });
