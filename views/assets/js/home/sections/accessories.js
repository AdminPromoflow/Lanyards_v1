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

    for (var i = 0; i < input_amount_accessories.length; i++) {
      input_amount_accessories[i].value = 1;
    }


    for (let i = 0; i < input_amount_accessories.length; i++) {
      input_amount_accessories[i].addEventListener("input", function(){
        this.value = this.value.replace(/\D/g, '');

        if (this.value > 0) {
          input_amount_accessories[i].value = this.value;
        }
        else {
          input_amount_accessories[i].value = 1;
        }
      })
    }


    for (let i = 0; i < box_accessories_home_description.length; i++) {
      box_accessories_home_description[i].addEventListener("click", function(){
          //alert();
           const padre = box_accessories_home_description[i].closest('.subcontainer_accessories_home_description');
           const subcontainer_accessories_home_description = document.querySelectorAll('.subcontainer_accessories_home_description');


           const index = Array.from(subcontainer_accessories_home_description).indexOf(padre);

           const title = document.querySelectorAll(".name_accessory_item")[index].innerHTML;

        //   alert(title + box_accessories_home_description[i].innerHTML);

        const amount = document.querySelectorAll(".name_accessory_item");

      const description =   box_accessories_home_description[i].querySelectorAll('h3')[0]?.textContent || ''
      const price =  box_accessories_home_description[i].querySelectorAll('h3')[1]?.textContent || ''

      //  alert(title + " " + description + "  " +  price.match(/[\d.]+/) + "  " + input_amount_accessories[index].value  + "  " +  price.match(/[\d.]+/) );
        accessoriesHome.setProduct(index, title);
        accessoriesHome.setPricePerUnit(index, price.match(/[\d.]+/));
        accessoriesHome.setDescription(index, description);

        accessoriesHome.setAmount(index, input_amount_accessories[index].value);
        accessoriesHome.setTotal(index, price.match(/[\d.]+/));
        accessoriesHome.setPosicionChildSelected(index, i);

        accessoriesHome.selectItems();


      })
    }



      //this.setProduct(0, 1);


      this.posiciones = [];
      this.product = [];
      this.description = [];
      this.price = [];
      this.amount = [];
      this.total = [];



      this.posiciones[0] = 0;
      this.posiciones[1] = 3;
      this.posiciones[2] = 6;
      this.posiciones[3] = 11;
      this.posiciones[4] = 12;


      this.assignValues();

  }


  assignValues(){
    var selected;
    for (var i = 0; i < box_accessories.length; i++) {

      selected = this.getPosicionChildSelected(i);


      const padre = box_accessories_home_description[selected].closest('.subcontainer_accessories_home_description');
      const subcontainer_accessories_home_description = document.querySelectorAll('.subcontainer_accessories_home_description');


      const index = Array.from(subcontainer_accessories_home_description).indexOf(padre);

      const title = document.querySelectorAll(".name_accessory_item")[index].innerHTML;


      const amount = document.querySelectorAll(".name_accessory_item");

      const description =   box_accessories_home_description[selected].querySelectorAll('h3')[0]?.textContent || ''
      const price =  box_accessories_home_description[selected].querySelectorAll('h3')[1]?.textContent || ''

      this.setProduct(index, title);
      this.setPricePerUnit(index, price.match(/[\d.]+/));
      this.setDescription(index, description);
      this.setAmount(index, input_amount_accessories[index].value);
      this.setTotal(index, price.match(/[\d.]+/));
    //  this.setPosicionChildSelected(index, selected);


    /*  alert(this.getPosicionChildSelected(index)  + "  " +   this.getProduct(index) + "  " + this.getDescription(index) + "  " +  this.getPricePerUnit(index)
       + "  " +  this.getAmount(index) + "  " +  this.getTotal(index)
    );*/


    }

    this.selectItems();
      //  accessoriesHome.setProduct(index, title);

  }

  selectItems(){
    var selected;
    for (var i = 0; i < box_accessories_home_description.length; i++) {
      box_accessories_home_description[i].style.border = "1px solid transparent";
    }
    for (var i = 0; i < box_accessories.length; i++) {
      selected = this.getPosicionChildSelected(i);
      box_accessories_home_description[selected].style.border = "1px solid white";
    }
  }


  // Creo que esto no es necesario:

  setPosicionChildSelected(index, value) {
    this.posiciones[index] = value ;
  }

  getPosicionChildSelected(index) {
    return this.posiciones[index];
  }



  setProduct(index, value) {
    this.product[index] = value;
  }

  getProduct(index) {
    return this.product[index];
  }


  setDescription(index, value) {

    this.description[index] = {
      item: {
        type: value,
        additional_price: this.getPricePerUnit(index)
      }
    }

]  }

  getDescription(index) {
    return this.description[index];
  }


  setPricePerUnit(index, value) {
    this.price[index] = value;
  }

  getPricePerUnit(index) {
    return this.price[index];
  }


  setAmount(index, value) {
    this.amount[index] = value;
  }

  getAmount(index) {
    return this.amount[index];
  }


  setTotal(index, value) {
    this.total[index] = value;
  }

  getTotal(index) {
    return this.total[index];
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
    cartButtons.forEach((button, index) => {
      button.addEventListener("click", () => {



        /*  alert(this.getPosicionChildSelected(index)  + "  " +   this.getProduct(index) + "  " + this.getDescription(index) + "  " +  this.getPricePerUnit(index)
           + "  " +  this.getAmount(index) + "  " +  this.getTotal(index)
        );*/




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

const box_accessories = document.querySelectorAll(".box_accessories_home");
const box_accessories_home_description = document.querySelectorAll(".box_accessories_home_description");
const input_amount_accessories = document.querySelectorAll(".input_amount_accessories");
// Instantiate the class to apply all event listeners
const accessoriesHome = new AccessoriesHome();
