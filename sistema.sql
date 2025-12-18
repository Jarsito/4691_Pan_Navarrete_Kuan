<<<<<<< HEAD
=======
-- Crear base de datos
CREATE DATABASE IF NOT EXISTS sistema;
USE sistema;

-- Tabla de usuarios
>>>>>>> 791faf4f1a50c3cd025ef2c64d96fd91ba031904
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    clave VARCHAR(255) NOT NULL
);

<<<<<<< HEAD
=======
-- Tabla de productos
>>>>>>> 791faf4f1a50c3cd025ef2c64d96fd91ba031904
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL DEFAULT 0
);
<<<<<<< HEAD
=======

-- Usuario de prueba (usuario: admin, clave: 1234)
INSERT INTO usuarios (usuario, clave) VALUES 
('admin', '$2y$10$vS0qbbtHgBl/u59jAuc2UOXfFPUArXIkBszP2/2cQ6q3QoNkiwVDW');
>>>>>>> 791faf4f1a50c3cd025ef2c64d96fd91ba031904
