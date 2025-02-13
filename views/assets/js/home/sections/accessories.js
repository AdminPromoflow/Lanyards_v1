class AccessoriesHome {
  constructor() {
    this.addClickEvent(".box_accessories_home_whistle");
    this.addClickEvent(".box_accessories_home_cord_lock");
    this.addClickEvent(".box_accessories_home_retractable_reel");
    this.addClickEvent(".box_accessories_home_plastic_wallet");
    this.addClickEvent(".box_accessories_home_rigid_card_holder");
  }

  addClickEvent(selector) {
    const elements = document.querySelectorAll(selector);
    elements.forEach(element => {
      element.addEventListener("click", () => {
        // Reset all elements of the same class to transparent
        elements.forEach(el => el.style.border = "2px solid transparent");
        // Set the clicked element's border to white
        element.style.border = "2px solid white";
      });
    });
  }
}

// Instantiate the class to apply the event listeners
const accessoriesHome = new AccessoriesHome();
