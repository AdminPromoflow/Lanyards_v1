<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    // Ruta del directorio actual + subcarpeta 'uploads/images'
    $uploadDir = __DIR__ . '/../uploads/images/';

    // Asegurarse de que la carpeta exista
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }

    // Nombre del archivo
    $fileName = basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;

    // Mover el archivo
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        // Ruta accesible desde el navegador (ajustada según tu estructura)
        $imageUrl = '../../controller/uploads/images/' . $fileName;

        echo json_encode([
            'success' => true,
            'imageUrl' => $imageUrl
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al mover el archivo.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Archivo no recibido.']);
}
?>
