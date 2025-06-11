<?php
if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $tmp = $_FILES['imagen']['tmp_name'];
    $nombreFinal = 'controller/uploads' . time() . '.png';
    if (move_uploaded_file($tmp, $nombreFinal)) {
        echo "Imagen guardada como: $nombreFinal";
    } else {
        echo "Error al guardar la imagen.";
    }
} else {
    echo "Error al recibir la imagen.";
}
?>
