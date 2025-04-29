<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $uploadDir = __DIR__ . '/controller/uploads/';
    $fileName = basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;

    // Asegúrate de que la carpeta existe
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        // Genera la URL accesible para el navegador
        $imageUrl = 'controller/uploads/' . $fileName;

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
