class Charging {
  constructor() {
    this.hideShowchargin(false);
  }
  hideShowchargin(action){
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
