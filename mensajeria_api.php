<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');

$dir = sys_get_temp_dir() . '/chat_temp_render';
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

// 1. Guardar mensaje recibido en un archivo temporal único
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = trim($_POST['mensaje'] ?? '');
    $usuario = trim($_POST['usuario'] ?? 'Anónimo');
    $hora    = trim($_POST['hora'] ?? date('h:i a'));

    if (!empty($mensaje)) {
        $msgId = uniqid('msg_', true);
        $data = json_encode([
            'id'      => $msgId,
            'texto'   => htmlspecialchars($mensaje),
            'usuario' => htmlspecialchars($usuario),
            'hora'    => htmlspecialchars($hora)
        ]);
        file_put_contents($dir . '/' . $msgId . '.json', $data);
    }
    echo json_encode(['status' => 'ok']);
    exit;
}

// 2. Transmitir en vivo y eliminar el archivo para que no se reenvíe
$mensajesEnviados = [];

while (true) {
    $files = glob($dir . '/msg_*.json');
    foreach ($files as $file) {
        $filename = basename($file);
        if (!isset($mensajesEnviados[$filename])) {
            $content = file_get_contents($file);
            if ($content) {
                echo "data: {$content}\n\n";
                ob_flush();
                flush();
            }
            $mensajesEnviados[$filename] = true;
            // Eliminar el archivo inmediatamente
            @unlink($file);
        }
    }
    
    // Limpiar memoria local del loop si acumula muchos nombres
    if (count($mensajesEnviados) > 100) {
        $mensajesEnviados = array_slice($mensajesEnviados, -20, null, true);
    }

    usleep(300000); // 0.3 segundos
}
?>