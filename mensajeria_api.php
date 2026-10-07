<?php
// Configuración para transmisión Server-Sent Events
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');

$dir = sys_get_temp_dir() . '/chat_temp_render';
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

// 1. Recibir y guardar mensaje enviando respuesta POST inmediata
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $msgId   = trim($_POST['id'] ?? uniqid('msg_', true));
    $mensaje = trim($_POST['mensaje'] ?? '');
    $usuario = trim($_POST['usuario'] ?? 'Anónimo');
    $hora    = trim($_POST['hora'] ?? date('h:i a'));

    if (!empty($mensaje)) {
        $data = json_encode([
            'id'      => $msgId,
            'texto'   => htmlspecialchars($mensaje),
            'usuario' => htmlspecialchars($usuario),
            'hora'    => htmlspecialchars($hora),
            'creado'  => microtime(true)
        ]);
        file_put_contents($dir . '/' . $msgId . '.json', $data);
    }
    echo json_encode(['status' => 'ok']);
    exit;
}

// 2. Transmisión continua para usuarios conectados
$mensajesTransmitidos = [];

while (true) {
    $files = glob($dir . '/msg_*.json');
    $ahora = microtime(true);

    foreach ($files as $file) {
        $filename = basename($file);
        
        // Leer el contenido
        $content = @file_get_contents($file);
        if ($content) {
            $data = json_decode($content, true);

            // Si este hilo de SSE no le ha enviado el mensaje al navegador actual, se lo envía
            if (!isset($mensajesTransmitidos[$filename])) {
                echo "data: {$content}\n\n";
                ob_flush();
                flush();
                $mensajesTransmitidos[$filename] = true;
            }

            // Mantiene el mensaje vivo durante 5 segundos para que los DEMÁS usuarios lo lean
            // Y transcurridos los 5 segundos, se autodestruye para no guardar nada en servidor
            if (isset($data['creado']) && ($ahora - (float)$data['creado']) > 5) {
                @unlink($file);
            }
        }
    }

    // Limpieza de memoria del script
    if (count($mensajesTransmitidos) > 100) {
        $mensajesTransmitidos = array_slice($mensajesTransmitidos, -30, null, true);
    }

    usleep(300000); // Revisa cada 0.3 segundos
}
?>