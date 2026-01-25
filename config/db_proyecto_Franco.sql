CREATE DATABASE IF NOT EXISTS webdev_franco;

USE webdev_franco;

CREATE TABLE usuario (
    nombre_usuario VARCHAR(20) PRIMARY KEY,
    email VARCHAR(100),
    passwd VARCHAR(20),
	fecha_registro DATE
);

CREATE TABLE curso (
    id_curso INT PRIMARY KEY AUTO_INCREMENT,
	nombre_curso VARCHAR(100),
    descripción VARCHAR(500),
    precio INT4
);


CREATE TABLE pedido (
    id_pedido INT PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(20) NOT NULL,
    fecha_pedido TIMESTAMP,
    total DECIMAL(10,2),
    FOREIGN KEY (nombre_usuario) REFERENCES usuario(nombre_usuario)
);

CREATE TABLE pedido_cursos (
	id_pedido INT NOT NULL,
    id_curso INT NOT NULL,
    precio_pagado DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id_pedido, id_curso),
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
    FOREIGN KEY (id_curso) REFERENCES curso(id_curso)
);


CREATE TABLE carrito (
    id_carrito INT PRIMARY KEY AUTO_INCREMENT,
    nombre_usuario VARCHAR(20) UNIQUE NOT NULL,
    fecha_creación TIMESTAMP,
    fecha_modificación TIMESTAMP,
    FOREIGN KEY (nombre_usuario) REFERENCES usuario(nombre_usuario)
);

CREATE TABLE carrito_cursos (
	id_carrito INT NOT NULL,
    id_curso INT NOT NULL,
    PRIMARY KEY (id_carrito, id_curso),
	FOREIGN KEY (id_carrito) REFERENCES carrito(id_carrito),
    FOREIGN KEY (id_curso) REFERENCES curso(id_curso)
);