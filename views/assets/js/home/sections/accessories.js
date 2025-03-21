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

  addArrowsEvent(selector) {
      const arrows = document.querySelectorAll(selector);
      const container_accessories_home = document.getElementById("container_accessories_home");

      if (arrows.length < 2) {
          console.error("At least two arrows are required.");
          return;
      }

      // Amount to scroll per click (adjust as needed)
      const scrollStep = 350;

      arrows[0].addEventListener("click", () => {
          container_accessories_home.scrollBy({ left: -scrollStep, behavior: "smooth" });
      });

      arrows[1].addEventListener("click", () => {
          container_accessories_home.scrollBy({ left: scrollStep, behavior: "smooth" });
      });

      // Delay check after scroll action
      arrows.forEach(button => {
          button.addEventListener("click", () => {
              setTimeout(() => {
                  this.checkScrollPosition(container_accessories_home, arrows);
              }, 300); // Wait for the scroll animation to complete
          });
      });

      // Initial check on page load
      this.checkScrollPosition(container_accessories_home, arrows);

      // Also listen for manual scrolling
      container_accessories_home.addEventListener("scroll", () => {
          this.checkScrollPosition(container_accessories_home, arrows);
      });
  }

  checkScrollPosition(container, arrows) {
      const scrollLeft = container.scrollLeft;
      const maxScrollLeft = container.scrollWidth - container.clientWidth;

      if (scrollLeft <= 0) {
          // At the beginning: Hide left arrow, show right arrow
          arrows[0].style.display = "none";
          arrows[1].style.display = "block";
      } else if (scrollLeft >= maxScrollLeft - 1) {
          // At the end: Show left arrow, hide right arrow
          arrows[0].style.display = "block";
          arrows[1].style.display = "none";
      } else {
          // Somewhere in the middle: Show both arrows
          arrows[0].style.display = "block";
          arrows[1].style.display = "block";
      }
  }


}

// Instantiate the class to apply all event listeners
const accessoriesHome = new AccessoriesHome();
