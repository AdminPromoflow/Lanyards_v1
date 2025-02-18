class AccessoriesHome {
  constructor() {
    this.addClickEvent(".box_accessories_home_whistle");
    this.addClickEvent(".box_accessories_home_cord_lock");
    this.addClickEvent(".box_accessories_home_retractable_reel");
    this.addClickEvent(".box_accessories_home_plastic_wallet");
    this.addClickEvent(".box_accessories_home_rigid_card_holder");
    this.addBuyEvent(".buy_accessory");
    this.addToCartEvent(".add_to_cart_accessory");
    this.addArrowsEvent(".container_accessories_home_arrow");

  }

  // Function to handle border selection and set first element as default
  addClickEvent(selector) {
    const elements = document.querySelectorAll(selector);
    if (elements.length > 0) {
      // Set the first element with a white border
      elements[0].style.border = "2px solid white";
    }
    elements.forEach(element => {
      element.addEventListener("click", () => {
        elements.forEach(el => el.style.border = "2px solid transparent"); // Reset all borders
        element.style.border = "2px solid white"; // Highlight selected item
      });
    });
  }

  // Function to add event listener to 'Buy Accessory' buttons
  addBuyEvent(selector) {
    const buyButtons = document.querySelectorAll(selector);
    buyButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("Under construction");
      });
    });
  }

  // Function to add event listener to 'Add to Cart Accessory' buttons
  addToCartEvent(selector) {
    const cartButtons = document.querySelectorAll(selector);
    cartButtons.forEach(button => {
      button.addEventListener("click", () => {
        alert("Your product has been added to the basket");
      });
    });
  }
  addArrowsEvent(selector){
    const arrows = document.querySelectorAll(selector);
    arrows.forEach(button => {
      button.addEventListener("click", () => {
        alert("Checkedt");
      });
    });
  }
}

// Instantiate the class to apply all event listeners
const accessoriesHome = new AccessoriesHome();
