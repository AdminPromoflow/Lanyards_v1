class Charging {
  constructor() {
    alert('Constructor de Charging.js ejecutado');
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
  alert('DOMContentLoaded: Charging.js cargado');
  const chargingClass = new Charging();
  // Corregimos el nombre del método
  window.addEventListener('load', function() {
    chargingClass.hideShowcharging(true);
  });
});
