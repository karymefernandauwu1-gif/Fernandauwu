<?php
$variableNombreDb = 'Proyecto';
$titulo = 'Regalo';
include 'includes/header.php';
?>
<section class="gift-page page-shell">
    <div class="gift-card">
        <div class="gift-badge">UPVM<br><span>COMUNIDAD</span></div>
        <p class="eyebrow">RECONOCIMIENTO DIGITAL</p>
        <h1>Gracias por<br><em>hacerte escuchar.</em></h1>
        <p>Tu participación ayuda a construir una universidad más cercana, abierta y pensada para su comunidad.</p>
        <div class="gift-ticket">
            <span class="ticket-label">CONSTANCIA DE PARTICIPACIÓN</span>
            <strong>Tu opinión cuenta para la UPVM</strong>
            <div class="gift-meta">
                <span>FOLIO<br><b>VOZ-UPVM-2026</b></span>
                <span>FECHA<br><b><?php echo date('d/m/Y'); ?></b></span>
            </div>
        </div>
        <div class="gift-actions">
            <button class="button button-primary" type="button" onclick="window.print()">Guardar reconocimiento <span aria-hidden="true">↓</span></button>
            <a class="text-link" href="index.php">Volver al inicio <span aria-hidden="true">↗</span></a>
        </div>
    </div>
</section>
<?php include 'includes/footer.php'; ?>