<?php
$titulo = 'Inicio';
include 'includes/header.php';
?>
<section class="hero page-shell" style="display: flex; justify-content: center; align-items: center; min-height: 70vh; padding: 40px 20px;">
    <div class="home-menu" style="width: 100%; max-width: 900px; text-align: center; margin: 0 auto;">
        <p class="eyebrow" style="margin-bottom: 12px;">UNIVERSIDAD POLITÉCNICA DEL VALLE DE MÉXICO</p>
        <h1 style="margin: 0 auto 12px; text-align: center;">¿A dónde quieres ir?</h1>
        <p class="home-intro" style="margin: 0 auto 30px; text-align: center;">Elige una sección para continuar.</p>
        
        <figure class="home-portrait" style="margin: 0 auto 35px; display: flex; justify-content: center;">
            <img src="yoferrr.jpeg" alt="Foto del estudiante" style="width: 180px; height: 180px; border-radius: 50%; object-fit: cover; border: 4px solid var(--teal, #0e6865); box-shadow: 0 8px 25px rgba(0,0,0,0.15);">
        </figure>

        <nav class="home-options" aria-label="Secciones del sitio" style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; margin: 0 auto;">
            <a class="home-option" href="encuesta.php" style="text-align: left;">
                <span class="home-option-number">01 / COMUNIDAD</span>
                <strong>Encuesta estudiantil</strong>
                <span class="home-option-action">Compartir mi opinión <span aria-hidden="true">→</span></span>
            </a>
            <a class="home-option" href="productos_crear.php" style="text-align: left;">
                <span class="home-option-number">02 / GESTIÓN</span>
                <strong>Gestión de productos</strong>
                <span class="home-option-action">Añadir un producto <span aria-hidden="true">→</span></span>
            </a>
            <a class="home-option" href="pagina2.php" style="text-align: left;">
                <span class="home-option-number">03 / EXPLORAR</span>
                <strong>Productos y mapas</strong>
                <span class="home-option-action">Ver el catálogo <span aria-hidden="true">→</span></span>
            </a>
        </nav>
    </div>
</section>
<?php include 'includes/footer.php'; ?>