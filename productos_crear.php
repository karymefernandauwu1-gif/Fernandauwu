<?php
include('config.php');

// Acción de Guardar / Crear Producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crear'])) {
    $nombre      = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $precio      = (float) ($_POST['precio'] ?? 0);
    $stock       = (int) ($_POST['stock'] ?? 0);

    if (!empty($nombre)) {
        $consulta = $conn->prepare("INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)");
        $consulta->bind_param("ssdi", $nombre, $descripcion, $precio, $stock);
        $consulta->execute();
        $consulta->close();
    }
    
    header("Location: pagina2.php");
    exit();
}

$titulo = 'Gestión de Productos';
include 'includes/header.php';
?>

<section class="form-page page-shell">
    <div class="form-heading">
        <p class="eyebrow">PRODUCTOS / CREATE</p>
        <h1>Añadir producto.</h1>
        <p>Registra un producto para que aparezca en el catálogo y la gestión.</p>
    </div>

    <form class="survey-form" action="productos_crear.php" method="POST">
        <fieldset>
            <legend>01 <span>Nombre del Producto</span></legend>
            <input type="text" name="nombre" id="nombre" required placeholder="Ej. Cuaderno Profesional">
        </fieldset>

        <fieldset>
            <legend>02 <span>Descripción</span></legend>
            <textarea name="descripcion" id="descripcion" rows="3" placeholder="Detalles o especificaciones del producto..."></textarea>
        </fieldset>

        <fieldset>
            <legend>03 <span>Precio ($)</span></legend>
            <input type="number" step="0.01" name="precio" id="precio" required placeholder="0.00">
        </fieldset>

        <fieldset>
            <legend>04 <span>Stock / Cantidad</span></legend>
            <input type="number" name="stock" id="stock" required placeholder="0">
        </fieldset>

        <div class="form-actions">
            <a class="text-link" href="pagina2.php">Ver productos y mapas <span aria-hidden="true">→</span></a>
            <button class="button button-primary" type="submit" name="crear">Guardar producto <span aria-hidden="true">→</span></button>
        </div>
    </form>
</section>

<?php include 'includes/footer.php'; ?>