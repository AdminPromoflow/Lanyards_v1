class Charging {
  constructor() {
    this.hideShowcharging(true);
  }
  hideShowcharging(action){
    if (action) {
      charging_background.style.display = "flex";
    }
    else {
      charging_background.style.display = "none";
    }
  }
}

const charging_background = document.getElementById("charging_background");
const chargingClass = new Charging();
window.addEventListener('load', function() {
  chargingClass.hideShowchargin(false);
});
