class Charging {
  constructor() {
    // Eliminamos el alert para que no bloquee la ejecución
    this.hideShowcharging(true);
  }
  hideShowcharging(action){
    const charging_background = document.querySelector('.charging_background');
    if (charging_background) {
      charging_background.style.display = action ? "flex" : "none";
    }
  }
}

// Esperamos a que el DOM esté completamente cargado antes de crear la instancia
window.addEventListener('DOMContentLoaded', function() {
  const chargingClass = new Charging();
  // Corregimos el nombre del método
  window.addEventListener('load', function() {
    chargingClass.hideShowcharging(false);
  });
});
