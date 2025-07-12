<?php
// Función para actualizar los archivos index.php
function updateIndexFiles($directory) {
    $files = glob($directory . '/**/index.php', GLOB_RECURSE);
    
    foreach ($files as $file) {
        // Leer el contenido actual
        $content = file_get_contents($file);
        
        // Verificar si ya tiene el include
        if (strpos($content, 'General/Charging/charging.php') === false) {
            // Buscar la posición para insertar el include
            $position = strpos($content, '</body>');
            if ($position !== false) {
                // Insertar el include antes de </body>
                $newContent = substr($content, 0, $position) . "    <?php include \"../General/Charging/charging.php\"; ?>\n" . substr($content, $position);
                
                // Guardar los cambios
                file_put_contents($file, $newContent);
                echo "Actualizado: " . $file . "\n";
            }
        }
    }
}

// Ejecutar la función
updateIndexFiles('/Users/aleinarossui/htdocs/Lanyards_v1/UllmanSails');
?>
