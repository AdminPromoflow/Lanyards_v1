class Charging {
  constructor() {
    this.hideShowcharging(true);
  }
  
  hideShowcharging(action) {
    const charging_background = document.querySelector('.charging_background');
    if (charging_background) {
      if (action) {
        charging_background.style.display = "flex";
        charging_background.style.opacity = "1";
      } else {
        charging_background.style.opacity = "0";
        setTimeout(() => {
          charging_background.style.display = "none";
        }, 300); // Esperamos a que termine la animación
      }
    }
  }
}

// Esperamos a que la página esté completamente cargada
window.addEventListener('load', function() {
  const chargingClass = new Charging();
  // Agregamos un pequeño delay para asegurar que todo esté cargado
  setTimeout(() => {
    chargingClass.hideShowcharging(false);
  }, 500);
});
