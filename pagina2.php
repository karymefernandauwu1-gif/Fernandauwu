<?php
$variableNombreDb = 'Proyecto';
include('config.php');

$maps_key = 'AIzaSyBfyCV-KGM0AIvDRMuKL6Nguree9L3kOLQ';

// Acción de Eliminar Producto
if (isset($_GET['eliminar'])) {
    $id = (int) $_GET['eliminar'];
    $stmt = $conn->prepare("DELETE FROM productos WHERE id_producto = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header("Location: pagina2.php");
    exit();
}

// Acción de Leer / Listar Productos
$result = $conn->query("SELECT * FROM productos");

$titulo = 'Lista de Productos y Ubicación';
include 'includes/header.php';
?>

<section class="form-page page-shell">
    <div class="form-heading">
        <p class="eyebrow">PRODUCTOS / READ & DELETE</p>
        <h1>Lista de Productos</h1>
    </div>

    <div style="text-align: center; margin: 25px 0;">
        <img class="profile-photo" src="yoferrrrr.jpeg" alt="Mi foto" style="width: 180px; height: 180px; border-radius: 12px;">
    </div>

    <div style="overflow-x: auto; margin-top: 20px;">
        <table style="width: 100%; border-collapse: collapse; background: var(--cream); box-shadow: var(--shadow);">
            <thead>
                <tr style="background-color: var(--teal); color: white;">
                    <th style="padding: 12px; border: 1px solid var(--line);">ID</th>
                    <th style="padding: 12px; border: 1px solid var(--line);">Nombre</th>
                    <th style="padding: 12px; border: 1px solid var(--line);">Precio</th>
                    <th style="padding: 12px; border: 1px solid var(--line);">Stock</th>
                    <th style="padding: 12px; border: 1px solid var(--line);">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td style="padding: 10px; border: 1px solid var(--line); text-align: center;"><?php echo $row['id_producto']; ?></td>
                        <td style="padding: 10px; border: 1px solid var(--line);"><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td style="padding: 10px; border: 1px solid var(--line); text-align: right;">$<?php echo number_format($row['precio'], 2); ?></td>
                        <td style="padding: 10px; border: 1px solid var(--line); text-align: center;"><?php echo $row['stock']; ?></td>
                        <td style="padding: 10px; border: 1px solid var(--line); text-align: center;">
                            <a class="text-link" href="editar.php?id=<?php echo $row['id_producto']; ?>">Editar</a> | 
                            <a class="text-link" style="color: var(--coral);" href="pagina2.php?eliminar=<?php echo $row['id_producto']; ?>" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="padding: 15px; text-align: center; color: var(--muted);">No hay productos registrados.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div style="margin-top: 30px;">
        <a class="button button-primary" href="productos_crear.php">Registrar Nuevo Producto <span aria-hidden="true">→</span></a>
    </div>

    <div class="form-heading" style="margin-top: 50px;">
        <p class="eyebrow">GEOLOCALIZACIÓN</p>
        <h2>Ubicación en Mapa</h2>
    </div>

    <div style="margin-top: 20px;">
        <iframe class="mapa"
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7515.294497430829!2d-99.12706074602605!3d19.642373116281597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1790001643256!5m2!1ses-419!2smx"
            style="width: 100%; height: 400px; border: 0; border-radius: 12px;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>
</section>

<?php include 'includes/footer.php'; ?>