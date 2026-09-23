# Actualización del personalizador

El personalizador utiliza cinco pasos: lanyard, impresión, herrajes,
diseño y revisión. El catálogo determina las opciones compatibles y los
precios por cantidad. El dibujo SVG adapta el ancho, los extremos, clips,
enganches, accesorios, texto y logo a la selección.

La vista plana y las imágenes PNG que se entregan al controlador de pedidos
comparten el mismo renderizador. Una impresión a dos caras repite el mismo
diseño; una impresión a una cara deja el reverso vacío. Se puede utilizar
un diseño diferente en cada tramo con la opción de cargar arte terminado.

## Subir a Hostinger

El archivo `.hostinger-deploy/customizer-update.zip` contiene estos archivos
con rutas relativas a `public_html`:

- `controller/config/database.php`
- `views/global/customize-lanyard/customize-lanyard.php`
- `views/assets/css/global/customize-lanyard/designer.css`
- `views/assets/js/customize-lanyard/design-model.js`
- `views/assets/js/customize-lanyard/design-preview.js`
- `views/assets/js/customize-lanyard/designer.js`
- `views/assets/js/home/app.js`
- `views/assets/js/my_lanyards/app.js`

1. Conserva una copia de los archivos existentes de esas rutas.
2. Extrae el ZIP dentro de `public_html`, reemplazando los archivos de la lista.
3. Conserva `controller/config/database.local.php` en Hostinger. El ZIP no
   contiene ni modifica las credenciales.
4. Recarga la página y abre **Start designing**. Comprueba que aparece el
   asistente de cinco pasos y que el catálogo carga sin error.

Las rutas son relativas para servir la misma aplicación desde el subdirectorio
de XAMPP o desde la raíz del dominio. `database.php` incluye la reutilización
de conexiones implementada para la carga del catálogo en Hostinger.

## Validación local

- `node tests/designer.cjs`: compatibilidad, límites de cantidad, huecos y
  solapamientos de precios, cargos por extremo, totales, dibujo SVG y entrega
  del diseño al controlador existente.
- `node tests/customizer.cjs`: carga, reintento y resolución de 267 recursos.
- Sintaxis PHP y JavaScript, y `git diff --check`.
- Revisión visual de escritorio y móvil de 390 px; texto, logo, vistas delantera,
  trasera y plana, cambios de material, accesorios y transición al acceso de
  cuenta. No se crearon cuentas, pedidos ni pagos durante estas pruebas.
- 3.108 comprobaciones de límites con el catálogo local disponible.

## Precios del catálogo que requieren confirmación

No se cambiaron precios comerciales ni tablas de la base de datos. El nuevo
personalizador bloquea el avance si no existe un precio único para la cantidad:

- Ribbed Polyester, 10 mm, una cara y un color: falta el rango 101–110 unidades.
- Ribbed Polyester, 25 mm: los rangos 1001–2000 y 1501–3000 se superponen con
  precios diferentes para las cuatro combinaciones de caras/colores.
  Esto afecta a 1501–2000 unidades.

Es necesario confirmar esos rangos en el catálogo para habilitar también esas
cantidades. El resto de las combinaciones utiliza sus precios existentes.

La publicación y la comprobación final en Hostinger quedan pendientes de subir
los archivos. La imagen es una vista previa; la aprobación de arte final sigue
correspondiendo al proceso de producción.
