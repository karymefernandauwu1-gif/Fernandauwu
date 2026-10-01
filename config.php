<?php
// Configuración de la conexión a MySQL Local
$host     = "localhost";
$usuario  = "root";         // Usuario por defecto de MySQL local
$password = "Bangtan7";     // Tu contraseña de MySQL local
$dbname   = "proyecto";     // Nombre de tu base de datos local

// Crear la conexión
$conn = @new mysqli($host, $usuario, $password, $dbname);

// Verificar si hay error en la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos local: " . $conn->connect_error);
}

// Configurar codificación UTF-8 para acentos y caracteres especiales
$conn->set_charset("utf8mb4");

// Compatibilidad por si algún archivo utiliza $conexion en vez de $conn
$conexion = $conn;
?>