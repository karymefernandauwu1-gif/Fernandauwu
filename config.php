<?php
// Datos de conexión desde variables de entorno (Render / Railway)
$host     = getenv('DB_HOST') ?: 'localhost';
$username = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASS') ?: 'Bangtan7';
$dbname   = getenv('DB_NAME') ?: 'proyecto';
$port     = (int) (getenv('DB_PORT') ?: 3306);

// Crear la conexión
$conn = @new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
$conexion = $conn;
?>