<?php
include('config.php');

// Obtener datos del producto a editar
$row = null;
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM productos WHERE id_producto = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $stmt->close();
}

// Acción de Actualizar Producto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['actualizar'])) {
    $id     = (int) $_POST['id_producto'];
    $nombre = trim($_POST['nombre'] ?? '');
    $precio = (float) ($_POST['precio'] ?? 0);
    $stock  = (int) ($_POST['stock'] ?? 0);

    $stmt = $conn->prepare("UPDATE productos SET nombre = ?, precio = ?, stock = ? WHERE id_producto = ?");
    $stmt->bind_param("sdii", $nombre, $precio, $stock, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: pagina2.php");
    exit();
}

$titulo = 'Editar Producto';
include 'includes/header.php';
?>

<section class="form-page page-shell">
    <div class="form-heading">
        <p class="eyebrow">PRODUCTOS / UPDATE</p>
        <h1>Editar Producto #<?php echo $row ? $row['id_producto'] : ''; ?></h1>
        <p>Modifica los campos del producto y guarda los cambios.</p>
    </div>

    <?php if ($row): ?>
    <form class="survey-form" action="editar.php" method="POST">
        <input type="hidden" name="id_producto" value="<?php echo $row['id_producto']; ?>">

        <fieldset>
            <legend>01 <span>Nombre del Producto</span></legend>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>
        </fieldset>

        <fieldset>
            <legend>02 <span>Precio ($)</span></legend>
            <input type="number" step="0.01" name="precio" id="precio" value="<?php echo $row['precio']; ?>" required>
        </fieldset>

        <fieldset>
            <legend>03 <span>Stock / Cantidad</span></legend>
            <input type="number" name="stock" id="stock" value="<?php echo $row['stock']; ?>" required>
        </fieldset>

        <div class="form-actions">
            <a class="text-link" href="pagina2.php">Cancelar y volver <span aria-hidden="true">→</span></a>
            <button class="button button-primary" type="submit" name="actualizar">Guardar Cambios <span aria-hidden="true">→</span></button>
        </div>
    </form>
    <?php else: ?>
    <div style="padding: 30px; text-align: center;">
        <p>El producto solicitado no existe o no fue encontrado.</p>
        <a class="button button-primary" href="pagina2.php">Volver a la lista de productos</a>
    </div>
    <?php endif; ?>
</section>

<?php include 'includes/footer.php'; ?>