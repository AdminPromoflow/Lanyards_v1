<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    // Usa __DIR__ para obtener el directorio donde está el archivo PHP (upload.php)
    $uploadDir = __DIR__ . '/'; // Usamos solo __DIR__ para que esté en la carpeta correcta
    $fileName = basename($_FILES['image']['name']);
    $targetPath = $uploadDir . 'uploads/' . $fileName; // Mueve 'uploads/' aquí

    // Asegúrate de que la carpeta existe
    if (!is_dir($uploadDir . 'uploads')) {
        mkdir($uploadDir . 'uploads', 0775, true);
    }

    // Mueve el archivo subido a la carpeta correcta
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        // Genera la URL accesible para el navegador
        $imageUrl = 'controller/uploads/' . 'uploads/' . $fileName; // URL correcta

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
