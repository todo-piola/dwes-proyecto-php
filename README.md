# Proyecto Desarrollo Web en Entorno Servidor - Portfolio de Desarrollador PHP

Este proyecto es una aplicación web desarrollada en PHP con base de datos MySQL. Incluye sistema de login, carrito de cursos y un panel básico de administración con CRUD para gestionar los cursos.

Tecnologías necesarias para poder ejecutarlo:

- XAMPP
- MySQL Workbench


## Instalación

### 1. Clonar el repositorio

Clona el proyecto con el siguiente comando desde la terminal:

    git clone https://github.com/todo-piola/dwes-proyecto-php

Coloca la carpeta del proyecto dentro de htdocs si usas XAMPP:

    C:\xampp\htdocs\dwes-proyecto-php

### 2. Crea la base de datos

Abre MySQL Workbench y ejecuta el script .sql que se aloja dentro de /config.

### 3. Ejecutar el proyecto

Asegúrate de que Apache y MySQL estén activos en XAMPP.

Después, abre el navegador y accede a:

<http://localhost/dwes-proyecto-php/index.php>

Puedes usar los siguientes usuarios para probar el sistema:

    Usuario: admin
    Contraseña: admin123

    Usuario: franco
    Contraseña: franco123

El usuario admin tiene acceso al panel de administración para gestionar los cursos.

Funcionalidades principales

- Sistema de login con sesiones

- Carrito de cursos que se guarda por usuario

- Panel CRUD para crear, leer, modificar y borrar cursos (solo admin)

- Navegación responsive con Bootstrap

- Conexión a base de datos usando PDO

## Autoría

Franco Benavides García

- GitHub: [@todo-piola](https://github.com/todo-piola)
- LinkedIn: [Franco Benavides García](https://www.linkedin.com/in/benavidesgarciafranco/)

## Licencia

Este proyecto es de código abierto y está disponible bajo la Licencia MIT.

## Agradecimientos

Proyecto desarrollado como práctica educativa para el módulo DWES en el IES Infanta Elena, Galapagar. Gracias Sarah por tu apoyo y tu fortaleza interior.
