-- Active: 1752549701557@@127.0.0.1@3306@taller_api

CREATE DATABASE IF NOT EXISTS taller_api

USE taller_api;

CREATE TABLE IF NOT EXISTS categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    categoria_id INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
);

CREATE TABLE IF NOT EXISTS promociones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(200) NOT NULL,
    descuento DECIMAL(5, 2) NOT NULL,
    producto_id INT NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);

INSERT INTO categorias (nombre) VALUES
('Electronica'),
('Ropa'),
('Hogar');


INSERT INTO productos (nombre, precio, categoria_id) VALUES
('Televisor LED 50"', 1500000.00, 1),  -- Electrónica
('Camiseta deportiva', 40000.00, 2),   -- Ropa
('Cama grande ', 120000.00, 3), -- Hogar
('Audifonos inalambricos', 80000.00, 1), -- Electrónica
('Pantalon jean', 95000.00, 2); -- Ropa


INSERT INTO promociones (descripcion, descuento, producto_id) VALUES
('Descuento de temporada', 15.00, 1),  -- 15% para el Televisor
('Oferta relampago', 10.00, 4);        -- 10% para los Audífonos


