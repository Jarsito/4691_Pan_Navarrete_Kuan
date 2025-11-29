# Sistema Web de Gestión de Productos y Control de Stock  
Proyecto en PHP + MySQL (Procedimental)

Este proyecto implementa un sistema web básico con autenticación, dashboard y un CRUD completo de productos.  
Fue desarrollado usando:

- PHP 8
- MySQL / MariaDB
- HTML + CSS
- PHP Procedimental (sin frameworks)
- XAMPP (Apache + MySQL)

------------------------------------------------------------
FUNCIONALIDADES
------------------------------------------------------------

AUTENTICACIÓN
- Registro de usuarios
- Validación de usuario único
- Contraseñas cifradas con password_hash()
- Inicio de sesión con password_verify()
- Manejo de sesiones con $_SESSION
- Cierre de sesión seguro

DASHBOARD
- Acceso solo para usuarios autenticados
- Mostrar mensaje de bienvenida
- Enlaces a:
  - Gestión de productos (CRUD)
  - Carga de stock (para evaluación final)
  - Cerrar sesión

CRUD DE PRODUCTOS
- Listar productos
- Crear productos
- Editar productos
- Eliminar productos
- Validaciones básicas
- Carpeta dedicada /productos/ como pide el enunciado

------------------------------------------------------------
ESTRUCTURA DEL PROYECTO
------------------------------------------------------------

supatiendachina/
│── conexion.php
│── index.php
│── registro.php
│── login.php
│── dashboard.php
│── logout.php
│
└── productos/
    ├── index.php
    ├── crear.php
    ├── editar.php
    └── eliminar.php

------------------------------------------------------------
BASE DE DATOS
------------------------------------------------------------

Ejecuta esto en phpMyAdmin:

CREATE DATABASE sistema;
USE sistema;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(50) NOT NULL UNIQUE,
  clave VARCHAR(255) NOT NULL
);

CREATE TABLE productos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  stock INT NOT NULL DEFAULT 0
);

------------------------------------------------------------
CONFIGURACIÓN IMPORTANTE (PUERTO MYSQL)
------------------------------------------------------------

Si tu MySQL NO corre en el puerto por defecto (3306),  
debes configurar el puerto en:

supatiendachina/conexion.php

Ejemplo si tu MySQL usa el puerto 3307:

$conexion = new mysqli("localhost", "root", "", "sistema", 3307);

Si tu MySQL usa otro puerto:
modifica el último parámetro:

$puerto = 3307;  // <-- cámbialo aquí si es necesario
$conexion = new mysqli("localhost", "root", "", "sistema", $puerto);

------------------------------------------------------------
CÓMO EJECUTAR EL PROYECTO
------------------------------------------------------------

1. Instalar XAMPP
2. Iniciar Apache y MySQL (verificar el puerto)
3. Copiar la carpeta del proyecto en:
   C:\xampp\htdocs\supatiendachina\
4. Abrir en el navegador:
   http://localhost/supatiendachina/
5. Registrarse (registro.php)
6. Iniciar sesión (login.php)
7. Acceder al dashboard y al CRUD de productos

------------------------------------------------------------
USUARIO DE PRUEBA (OPCIONAL)
------------------------------------------------------------

INSERT INTO usuarios (usuario, clave)
VALUES (
  'admin',
  '$2y$10$V0XWWnxwFJl6WGY9SS5HJ.7oM2aDWZIS1u5ahVdrmlDPumYtUcMLO'
);

Contraseña: 1234

------------------------------------------------------------
NOTAS
------------------------------------------------------------

- Proyecto hecho en PHP procedimental (sin frameworks)
- CRUD funcional y completo
- Módulo de stock pendiente (evaluación final)
- Código limpio, simple y apto para uso académico

------------------------------------------------------------
LICENCIA
------------------------------------------------------------

Proyecto educativo — Libre para uso académico.
