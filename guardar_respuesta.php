<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: encuesta.php');
    exit;
}
require 'config.php';

$experiencia   = isset($_POST['experiencia']) ? trim($_POST['experiencia']) : '';
$profesores    = isset($_POST['profesores']) ? trim($_POST['profesores']) : '';
$instalaciones = isset($_POST['instalaciones']) ? trim($_POST['instalaciones']) : '';
$servicio      = isset($_POST['servicio']) ? trim($_POST['servicio']) : '';
$comentario    = isset($_POST['comentario']) ? trim($_POST['comentario']) : '';

if ($experiencia === '' || $profesores === '' || $instalaciones === '' || $servicio === '' || $comentario === '') {
    die('Por favor completa las cinco preguntas. <a href="encuesta.php">Volver a la encuesta</a>');
}

$consulta = $conn->prepare('INSERT INTO respuestas (experiencia, profesores, instalaciones, servicio, comentario) VALUES (?, ?, ?, ?, ?)');
$consulta->bind_param('sssss', $experiencia, $profesores, $instalaciones, $servicio, $comentario);
$consulta->execute();
$consulta->close();

header('Location: regalo.php');
exit;
?>