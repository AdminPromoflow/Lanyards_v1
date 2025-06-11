<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];

    if ($archivo['error'] !== UPLOAD_ERR_OK) {
        http_response_code(400);
        echo 'Error al subir el archivo';
        exit;
    }

    $directorio = __DIR__ . '/uploads/';
    if (!is_dir($directorio)) {
        mkdir($directorio, 0777, true);
    }

    $nombreFinal = $directorio . basename($archivo['name']);

    if (move_uploaded_file($archivo['tmp_name'], $nombreFinal)) {
        echo 'Archivo recibido y guardado como: ' . $archivo['name'];
    } else {
        http_response_code(500);
        echo 'Error al guardar el archivo';
    }
} else {
    http_response_code(400);
    echo 'No se recibió el archivo correctamente';
}
?>
