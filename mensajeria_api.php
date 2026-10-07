<?php
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');

$dir = sys_get_temp_dir() . '/chat_temp_render';
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

// Recibir mensaje
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mensaje = trim($_POST['mensaje'] ?? '');
    $usuario = trim($_POST['usuario'] ?? 'Anónimo');
    $hora    = trim($_POST['hora'] ?? date('h:i a'));

    if (!empty($mensaje)) {
        $data = json_encode([
            'texto'   => htmlspecialchars($mensaje),
            'usuario' => htmlspecialchars($usuario),
            'hora'    => htmlspecialchars($hora),
            'time'    => microtime(true)
        ]);
        file_put_contents($dir . '/msg_' . microtime(true) . '.json', $data);
    }
    echo json_encode(['status' => 'ok']);
    exit;
}

// Transmitir mensaje
$last_check = microtime(true);

while (true) {
    $files = glob($dir . '/msg_*.json');
    foreach ($files as $file) {
        $file_time = (float) str_replace([$dir . '/msg_', '.json'], '', $file);
        if ($file_time > $last_check) {
            $content = file_get_contents($file);
            echo "data: {$content}\n\n";
            ob_flush();
            flush();
        }
        if ((microtime(true) - $file_time) > 2) {
            @unlink($file);
        }
    }
    
    $last_check = microtime(true);
    usleep(300000);
}
?>