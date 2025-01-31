
// Función para manejar el scroll suave y respuesta rápida
        let isScrolling = false;
        let velocity = 0;
        let previousY = 0;

        function handleScroll() {
        if (!isScrolling) {
          requestAnimationFrame(() => {
            const currentY = window.scrollY;
            const deltaY = currentY - previousY;

            // Agregar aceleración
            velocity += deltaY * 0.05;
            // Aplicar desaceleración gradual
            velocity *= 0.0;

            window.scrollBy(0, velocity);

            previousY = currentY;
            isScrolling = false;
          });
        }
        }

window.addEventListener('load', function() {
  chargingClass.hideShowchargin(false);
  // Aquí puedes agregar tu lógica que dependa de que todo esté cargado
});
