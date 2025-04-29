<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
  echo json_encode("entramos");exit;
    // Directorio actual (donde está upload.php)
    $uploadDir = __DIR__ . '/';
    $fileName = basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $fileName;

    // Mover el archivo subido
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        // URL relativa para devolver al frontend
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
