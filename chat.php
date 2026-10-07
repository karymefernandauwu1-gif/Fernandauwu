<?php
$titulo = 'Chat de la Clase';
include('includes/header.php');
?>

<div style="max-width: 800px; margin: 40px auto; padding: 0 20px;">
    <div style="background: #ffffff; border-radius: 12px; border: 1px solid #e0e0e0; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
        
        <!-- Encabezado con estética VOZ UPVM -->
        <div style="background-color: #004d40; color: #ffffff; padding: 18px 24px; display: flex; justify-content: space-between; align-items: center;">
            <h3 style="margin: 0; font-family: 'Space Grotesk', sans-serif; font-size: 1.25rem;">Chat de la Clase</h3>
            <span style="font-size: 0.85rem; background: rgba(255,255,255,0.15); padding: 4px 10px; border-radius: 20px;">Conectado</span>
        </div>

        <!-- Área de mensajes -->
        <div id="chat-box" style="height: 400px; overflow-y: auto; padding: 20px; background-color: #fcfbf9;">
            <!-- Los mensajes se cargan aquí en tiempo real -->
        </div>

        <!-- Formulario inferior -->
        <div style="padding: 16px; background-color: #f4f1ea; border-top: 1px solid #e5e0d8;">
            <form id="chatForm" style="display: flex; gap: 10px;">
                <input type="text" id="nombreInput" placeholder="Tu nombre" value="Angel" required autocomplete="off" style="width: 140px; padding: 10px 14px; border: 1px solid #ccc; border-radius: 6px; font-family: 'DM Sans', sans-serif;">
                <input type="text" id="mensajeInput" placeholder="Escribe un mensaje..." required autocomplete="off" style="flex: 1; padding: 10px 14px; border: 1px solid #ccc; border-radius: 6px; font-family: 'DM Sans', sans-serif;">
                <button type="submit" style="background-color: #004d40; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-weight: 600; cursor: pointer; font-family: 'Space Grotesk', sans-serif;">Enviar</button>
            </form>
        </div>
    </div>
</div>

<style>
    .globo-mensaje {
        background-color: #ffffff;
        border: 1px solid #e2ddd0;
        border-radius: 8px;
        padding: 8px 14px;
        margin-bottom: 12px;
        max-width: 75%;
        width: fit-content;
    }
    .globo-encabezado {
        font-size: 0.78rem;
        color: #004d40;
        font-weight: 700;
        margin-bottom: 2px;
    }
    .globo-texto {
        font-size: 0.95rem;
        color: #212529;
        word-break: break-word;
    }
</style>

<script>
    const chatBox = document.getElementById('chat-box');
    const chatForm = document.getElementById('chatForm');
    const mensajeInput = document.getElementById('mensajeInput');
    const nombreInput = document.getElementById('nombreInput');

    const evtSource = new EventSource('mensajeria_api.php');

    evtSource.onmessage = function(event) {
        const data = JSON.parse(event.data);
        agregarGloboMensaje(data.usuario, data.texto, data.hora);
    };

    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const texto = mensajeInput.value.trim();
        const usuario = nombreInput.value.trim() || 'Anónimo';
        if (!texto) return;

        const hora = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit', hour12: true });

        const formData = new FormData();
        formData.append('mensaje', texto);
        formData.append('usuario', usuario);
        formData.append('hora', hora);

        fetch('mensajeria_api.php', {
            method: 'POST',
            body: formData
        });

        agregarGloboMensaje(usuario, texto, hora);
        mensajeInput.value = '';
    });

    function agregarGloboMensaje(usuario, texto, hora) {
        const div = document.createElement('div');
        div.className = 'globo-mensaje';
        
        div.innerHTML = `
            <div class="globo-encabezado">${usuario} <span style="font-weight: normal; color: #777;">· ${hora}</span></div>
            <div class="globo-texto">${texto}</div>
        `;

        chatBox.appendChild(div);
        chatBox.scrollTop = chatBox.scrollHeight;
    }
</script>

</main>
</body>
</html>