class Charging {
  constructor() {
    this.hideShowcharging(true);
    // Ocultar después de 3 segundos
    setTimeout(() => {
      this.hideShowcharging(false);
    }, 2500);
  }

  hideShowcharging(action) {
    const charging_background = document.querySelector('.charging_background');
    if (charging_background) {
      charging_background.style.display = action ? "flex" : "none";
    }
  }
}

const chargingClass = new Charging();
