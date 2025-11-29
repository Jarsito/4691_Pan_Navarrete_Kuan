-- Crear base de datos
CREATE DATABASE IF NOT EXISTS sistema;
USE sistema;

-- Tabla de usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL
);

-- Tabla de productos
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0
);

-- Usuario de prueba (usuario: admin, clave: 1234)
INSERT INTO usuarios (usuario, clave) VALUES 
('admin', '$2y$10$vS0qbbtHgBl/u59jAuc2UOXfFPUArXIkBszP2/2cQ6q3QoNkiwVDW');
