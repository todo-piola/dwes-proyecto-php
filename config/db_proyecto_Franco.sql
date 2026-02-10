CREATE DATABASE IF NOT EXISTS webdev_franco;

USE webdev_franco;

CREATE TABLE IF NOT EXISTS usuario (
    nombre_usuario VARCHAR(20) PRIMARY KEY,
    email VARCHAR(100),
    passwd VARCHAR(20),
	rol ENUM('usuario', 'admin') DEFAULT 'usuario'
);

CREATE TABLE IF NOT EXISTS curso (
    id_curso INT PRIMARY KEY AUTO_INCREMENT,
	nombre_curso VARCHAR(100) UNIQUE,
    descripción VARCHAR(500),
    precio DECIMAL(10,2)
);


CREATE TABLE IF NOT EXISTS pedido (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(20) NOT NULL,
    fecha_pedido TIMESTAMP,
    total DECIMAL(10,2),
    FOREIGN KEY (nombre_usuario) REFERENCES usuario(nombre_usuario)
);

CREATE TABLE IF NOT EXISTS pedido_cursos (
	id_pedido INT NOT NULL,
    id_curso INT NOT NULL,
    precio_pagado DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id_pedido, id_curso),
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
    FOREIGN KEY (id_curso) REFERENCES curso(id_curso)
);


CREATE TABLE IF NOT EXISTS carrito (
    id_carrito INT PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(20) UNIQUE NOT NULL,
    fecha_creación TIMESTAMP,
    fecha_modificación TIMESTAMP,
    FOREIGN KEY (nombre_usuario) REFERENCES usuario(nombre_usuario)
);

CREATE TABLE IF NOT EXISTS carrito_cursos (
	id_carrito INT NOT NULL,
    id_curso INT NOT NULL,
    PRIMARY KEY (id_carrito, id_curso),
	FOREIGN KEY (id_carrito) REFERENCES carrito(id_carrito),
    FOREIGN KEY (id_curso) REFERENCES curso(id_curso)
);

CREATE TABLE IF NOT EXISTS contacto (
    email VARCHAR(100) PRIMARY KEY,
    nombre VARCHAR(100),
    mensaje VARCHAR(1000)
);

-- Insertar Usuarios
INSERT IGNORE INTO usuario (nombre_usuario, passwd, rol) VALUES 
('admin', 'admin123', 'admin'),
('franco', 'franco123', 'usuario');

INSERT IGNORE INTO curso (nombre_curso, descripción, precio) VALUES 
('HTML-CSS', 'Aprende los fundamentos del desarrollo web. Domina HTML5 y CSS3 desde cero, creando páginas web profesionales y responsivas.', 40),
('Bootstrap', 'Mejora tus habilidades en la web con el framework favorito de los desarrolladores.', 25),
('JavaScript Moderno', 'Domina JavaScript ES6+ desde cero. Aprende programación asíncrona, manipulación del DOM y las mejores prácticas del desarrollo moderno.', 50),
('React Completo', 'Conviértete en experto en React. Hooks, Context API, Redux y desarrollo de aplicaciones web escalables y profesionales.', 65),
('Node.js & Express', 'Desarrollo backend con Node.js. Crea APIs REST, maneja bases de datos y aprende arquitectura de servidores modernos.', 55),
('PHP & MySQL', 'Desarrollo web dinámico con PHP y MySQL. Desde lo básico hasta aplicaciones complejas con gestión de bases de datos.', 45),
('Python para Desarrollo Web', 'Aprende Python y Django para crear aplicaciones web robustas. Ideal para principiantes y desarrolladores que quieren expandir su stack.', 60),
('Git & GitHub Profesional', 'Domina el control de versiones. Aprende Git, GitHub, flujos de trabajo colaborativos y buenas prácticas en equipos de desarrollo.', 30),
('Vue.js 3 Avanzado', 'Frameworks JavaScript moderno. Composition API, Vuex, Vue Router y desarrollo de SPAs profesionales con Vue 3.', 58);