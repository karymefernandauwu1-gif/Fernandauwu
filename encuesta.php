<?php
$titulo = 'Encuesta';
include 'includes/header.php';
?>
<section class="form-page page-shell">
    <div class="form-heading">
        <p class="eyebrow">ENCUESTA / 01 — 05</p>
        <h1>Cuéntanos tu experiencia.</h1>
        <p>Responde con honestidad. No pedimos tu nombre y tus respuestas se guardan de forma segura.</p>
    </div>
    <form class="survey-form" action="guardar_respuesta.php" method="post">
        <fieldset>
            <legend>01 <span>¿Cómo calificarías tu experiencia general en la UPVM?</span></legend>
            <label><input type="radio" name="experiencia" value="Excelente" required> Excelente</label>
            <label><input type="radio" name="experiencia" value="Buena"> Buena</label>
            <label><input type="radio" name="experiencia" value="Regular"> Regular</label>
            <label><input type="radio" name="experiencia" value="Mala"> Mala</label>
        </fieldset>
        <fieldset>
            <legend>02 <span>¿Qué tan satisfecho estás con tus profesores?</span></legend>
            <label><input type="radio" name="profesores" value="Muy satisfecho" required> Muy satisfecho</label>
            <label><input type="radio" name="profesores" value="Satisfecho"> Satisfecho</label>
            <label><input type="radio" name="profesores" value="Poco satisfecho"> Poco satisfecho</label>
            <label><input type="radio" name="profesores" value="Nada satisfecho"> Nada satisfecho</label>
        </fieldset>
        <fieldset>
            <legend>03 <span>¿Cómo valorarías las instalaciones del campus?</span></legend>
            <select name="instalaciones" required>
                <option value="" selected disabled>Selecciona una opción</option>
                <option value="Excelentes">Excelentes</option>
                <option value="Buenas">Buenas</option>
                <option value="Regulares">Regulares</option>
                <option value="Necesitan mejoras">Necesitan mejoras</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>04 <span>¿Qué servicio de la UPVM debería recibir más atención?</span></legend>
            <select name="servicio" required>
                <option value="" selected disabled>Selecciona una opción</option>
                <option value="Biblioteca">Biblioteca</option>
                <option value="Laboratorios">Laboratorios</option>
                <option value="Internet y conectividad">Internet y conectividad</option>
                <option value="Cafetería">Cafetería</option>
                <option value="Áreas deportivas">Áreas deportivas</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>05 <span>¿Qué cambio tendría mayor impacto en tu vida universitaria?</span></legend>
            <textarea name="comentario" rows="4" maxlength="500" required placeholder="Escribe tu propuesta..."></textarea>
        </fieldset>
        <div class="form-actions">
            <span class="form-note">Tus respuestas son confidenciales.</span>
            <button class="button button-primary" type="submit">Enviar respuestas <span aria-hidden="true">→</span></button>
        </div>
    </form>
</section>
<?php include 'includes/footer.php'; ?>
