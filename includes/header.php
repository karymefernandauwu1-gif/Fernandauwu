<?php
if (!isset($titulo)) {
    $titulo = 'Voz UPVM';
}
$paginaActual = basename($_SERVER['SCRIPT_NAME'] ?? 'index.php');
$secciones = [
    ['Inicio', 'index.php'],
    ['Encuesta', 'encuesta.php'],
    ['Gestión de Productos (CRUD)', 'productos_crear.php'],
    ['Ver Productos y Mapas', 'pagina2.php'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8'); ?> | Voz UPVM</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <?php if (!empty($cargar_ui_productos)): ?>
        <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <?php endif; ?>
</head>
<body>
    <header class="site-header">
        <a class="brand" href="index.php" aria-label="Ir al inicio">
            <span class="brand-mark">V</span>
            <span>VOZ <b>UPVM</b></span>
        </a>
        <nav class="site-nav" aria-label="Navegación principal">
            <?php foreach ($secciones as [$etiqueta, $ruta]): ?>
                <a href="<?php echo htmlspecialchars($ruta, ENT_QUOTES, 'UTF-8'); ?>"<?php echo $paginaActual === $ruta ? ' aria-current="page"' : ''; ?>>
                    <?php echo htmlspecialchars($etiqueta, ENT_QUOTES, 'UTF-8'); ?>
                </a>
            <?php endforeach; ?>
        </nav>
        <div class="profile-chip">
            <img src="yoferrr.jpeg" alt="Foto del estudiante" class="profile-photo">
            <span><strong>Encuesta estudiantil</strong><small>Comunidad UPVM</small></span>
        </div>
    </header>
    <main>
