class ShoppingCart {
  constructor() {
    this.makeAjaxRequestJobsAvailables();

    // Iterar sobre cada elemento del carrito y agregar un evento
    for (let i = 0; i < product_items_shopping_cart.length; i++) {
      product_items_shopping_cart[i].addEventListener("click", () => {
        // Alternar la visibilidad del div correspondiente
        this.toggleDescriptionItemShoppingCart(i);
      });
    }

    open_checkout.addEventListener("click", function(){
      window.open("../../views/checkout/index.php", "_self");
    })

    this.initializeStyles();
  }

  // Subtotal
   setSubtotal(value) {
     this.subtotal = value;
   }

   getSubtotal() {
     return this.subtotal;
   }

   // Tax
   setTax(value) {
     this.tax = value;
   }

   getTax() {
     return this.tax;
   }

   // Shipping Price
   setShippingPrice(value) {
     this.shippingPrice = value;
   }

   getShippingPrice() {
     return this.shippingPrice;
   }

   // Total
   setTotal(value) {
     this.total = value;
   }

   getTotal() {
     return this.total;
   }


  makeAjaxRequestJobsAvailables(){

    // Define the URL and the JSON data you want to send
    const url = "../../controller/lanyard/job.php"; // Replace with your API endpoint URL
    const data = {
      action: "getJobsByOrder"
    };

    fetch(url, {
    method: "POST", // HTTP POST method to send data
    headers: {
      "Content-Type": "application/json" // Indicate that you're sending JSON
    },
    body: JSON.stringify(data) // Convert the JSON object to a JSON string and send it
  })
    .then(response => {
      // Check if the response status is OK (2xx range)
      if (response.ok) {
        return response.json(); // Parse the response as JSON
      }
      // For other errors, throw a general network error
      throw new Error("Network error.");
    })
    .then(data => {
      //alert(JSON.stringify(data));
      shoppingCart.addJobsToOrder(data);
      shoppingCart.addOrderSummary(data);

    })
    .catch(error => {
    //  alert("error");
      // Handle specific errors (from throw in the .then block)
      console.error("Error:", error.message);
      //alert(error.message); // Show the error message in an alert
    });
  }



  addJobsToOrder(data) {

    if (!Array.isArray(data)) return;

    // Limpiar contenido anterior
    container_draw_items_shopping_cart.innerHTML = "";

    data.forEach((item, index) => {


      const idJob = item["idJobs"];
      const name = item["name"] || "Sin nombre";

      const newColour = item["newColour"] * 25;

      let extraPriceNewColour = ``;

      if (newColour != 0) {
        extraPriceNewColour = `
          <div class="elements_summary_items_shopping_cart">
            <h3>New background colour</h3>
            <h3></h3>
            <h3>£${newColour}</h3>
            <div onclick="shoppingCart.infoNewColour();" class="info_extra_colour">
              <img src="../../views/assets/img/shopping_cart/sections/info_icon.png" alt="">
            </div>
          </div>`;
      }




      const price_per_unit = item["price_per_unit"];
      const amount = item["amount"];

      const total = price_per_unit * amount + newColour;


      const description = JSON.parse(item["description"]);
      let descriptionsHTML = "";

      // Construir el HTML de las descripciones dinámicamente
      for (const key in description) {
        if (description.hasOwnProperty(key)) {
          const entry = description[key];

          // Tomamos el valor principal según disponibilidad
          const value = entry.type || entry.value || entry.side || "Sin dato";
          const price = entry.additional_price ?? "0";

          // Título legible
          const title = key.replace(/_/g, " ").replace(/\b\w/g, c => c.toUpperCase());

          descriptionsHTML += `
            <div class="elements_descriptions_items_shopping_cart">
              <h3>${title}</h3>
              <h3>${value}</h3>
              <h3>+ £${price}</h3>
            </div>
          `;
        }
      }

      // Crear HTML del item completo
      const itemHTML = `
        <div class="items_shopping_cart" >
          <div class="product_items_shopping_cart">
              <h3>${name} ${index + 1}</h3>
              <h3></h3>
              <img class="arrow_products_shopping_cart" onclick="shoppingCart.toggleDescriptionItemShoppingCart(${index})" src="../../views/assets/img/shopping_cart/sections/arrow_right.png" alt="">
              <img class="delete_job" onclick="shoppingCart.deleteJob(${idJob})" src="../../views/assets/img/shopping_cart/sections/delete-button.png" alt="">
          </div>
          <div class="descriptions_items_shopping_cart">
            ${descriptionsHTML}
          </div>
          <div class="summary_items_shopping_cart">
            ${extraPriceNewColour}
            <div class="elements_summary_items_shopping_cart">
              <h3>Cost per unit</h3>
              <h3></h3>
              <h3>£${price_per_unit}</h3>
            </div>
            <div class="elements_summary_items_shopping_cart">
              <h3>Amount</h3>
              <h3></h3>
              <h3>${amount}</h3>
            </div>
            <div class="elements_summary_items_shopping_cart">
              <h3>Subtotal</h3>
              <h3></h3>
              <h3>£${total}</h3>
            </div>
          </div>
        </div>
      `;

      container_draw_items_shopping_cart.innerHTML += itemHTML;
    });
  }

  infoNewColour(){
    alert("You selected a new background colour when creating your lanyard. As noted in the options, this choice adds an extra charge to the total price of the lanyard, not to the unit cost.");
  }

  calculateShippingAndTotal() {
  if (this.shippingDays === 15) {
    this.shippingPrice = 0;
  } else if (this.shippingDays === 10) {
    this.shippingPrice = this.getSubtotal() * 0.25;
  } else if (this.shippingDays === 8) {
    this.shippingPrice = this.getSubtotal() * 0.5;
  } else {
    this.shippingDays = 15;
    this.shippingPrice = 0;
  }

  this.total = this.getSubtotal() + this.getTax() + this.getShippingPrice();
}


  addOrderSummary(data){
    //alert(JSON.stringify(data));
    const boxes_container_shopping_cart = document.getElementById("boxes_container_shopping_cart");
    const boxes2_container_shopping_cart = document.getElementById("boxes2_container_shopping_cart");



  //  boxes_container_shopping_cart
  boxes2_container_shopping_cart.innerHTML = "";

    boxes_container_shopping_cart.innerHTML = `
    <div class="items2_shopping_cart">
      <h3>Product</h3>
      <h3>Subtotal</h3>
    </div>
    `;
    var subtotal = 0;


    boxes_container_shopping_cart.innerHTML +=
  `  <div class="elements_boxes2_container_shopping_cart">
      <h2>Products</h2>
    </div>`;

    data.forEach((item, index) => {
      var total = parseFloat(item["total"]) + parseFloat(item["newColour"]*25);
      const itemHTML = `
      <div class="elements_boxes_container_shopping_cart">
        <h3>${item["name"]} ${index + 1}</h3>
        <h3>£${total}</h3>
      </div>
      `;

      boxes_container_shopping_cart.innerHTML += itemHTML;
      subtotal = parseFloat(subtotal) + parseFloat(item["total"]);
    });


    this.subtotal = subtotal;

    const vat = parseFloat(subtotal)*20/100;
    this.tax = vat;

    this.shippingPrice = 0;
    this.shippingDays = 15;


    const total = subtotal + vat + this.shippingPrice;
    this.total = total;



    const item2HTML = `
    <div class="elements_boxes2_container_shopping_cart">
      <h2>Shipping</h2>
    </div>

    <div class="elements_boxes2_container_shopping_cart">
    <label  onclick="shoppingCart.changeShoppingTime(15)">
        <input type="radio" name="options_card_shippingCart" value="15" checked>
        <h3>15 working days</h3>
    </label>
    <h3>0%</h3>
    </div>

    <div class="elements_boxes2_container_shopping_cart">
    <label onclick="shoppingCart.changeShoppingTime(10)">
        <input type="radio" name="options_card_shippingCart" value="10">
        <h3>10 working days</h3>
    </label>
      <h3>+25%</h3>
    </div>

    <div class="elements_boxes2_container_shopping_cart">
    <label  onclick="shoppingCart.changeShoppingTime(8)">
        <input type="radio" name="options_card_shippingCart" value="8">
        <h3>8 working days</h3>
    </label>
      <h3>+50%</h3>
    </div>
    `;


    boxes2_container_shopping_cart.innerHTML = item2HTML;



    const item4HTML = `

    <div class="elements_boxes2_container_shopping_cart">
      <h2>Basket totals</h2>
    </div>

    <div class="elements_boxes2_container_shopping_cart">
      <h3>Subtotal</h3>
      <h3>£${this.subtotal}</h3>
    </div>

    <div class="elements_boxes2_container_shopping_cart">
      <h3>Tax (VAT 20%)</h3>
      <h3>£${this.tax}</h3>
    </div>

    <div class="elements_boxes2_container_shopping_cart">
      <h3>Shipping</h3>
      <h3 id="price_shipping">£${this.shippingPrice}</h3>
    </div>

    <div class="elements_boxes2_container_shopping_cart">
      <h3>Total</h3>
      <h3 id="total_price">£${this.total}</h3>
    </div>
    `;


    boxes4_container_shopping_cart.innerHTML = item4HTML;

    this.updatePriceShippingHTML();

    this.updateOrder();
  }

  getOrder(){
    const url = "../../controller/lanyard/order.php";
    const data = {
      action: "getOrder"
    };

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) {
          return response.text();
        }
        throw new Error("Network error.");
      })
      .then(data => {
      //  alert(data);

      const data2 =   JSON.parse(data);

      /*  this.shippingDays= parseFloat(data2["order"]["shippingDays"]);
        this.subtotal = parseFloat(data2["order"]["subtotal"]);
        this.tax = parseFloat(data2["order"]["tax"]);
        this.shippingPrice = parseFloat(data2["order"]["shipping_price"]);
        this.total = parseFloat(data2["order"]["total"]);


      //  alert(this.shippingDay);
        if (this.shippingDays === undefined || this.shippingDays == null || isNaN(this.shippingDays)) {
          this.shippingDays = 15;
          this.shippingPrice = 0;

          this.total  = this.subtotal + this.tax + this.shippingPrice;
          this.updateOrder();
        }*/


        //var value = this.shippingDays + " working days";

      //  alert(this.shippingDays);

    //  this.calculateShippingAndTotal();
    //  this.updateOrder();

    //    document.querySelector('input[name="options_card_shippingCart"][value="' + this.shippingDays + '"]').checked = true;


      //  alert(this.shippingPrice + "  " + this.total);
        //chargingClass.hideShowchargin(false);
      })
      .catch(error => {
        console.error("Error:", error);
      });
  }

  updateOrder(){
  //  alert(this.shippingDays + " " + this.shippingPrice + " " + this.total);
    const url = "../../controller/lanyard/order.php";
    const data = {
      action: "updateOrder",
      subtotal: this.subtotal,
      shippingDays: this.shippingDays,
      shippingPrice: this.shippingPrice,
      tax: this.tax,
      total: this.total
    };

    fetch(url, {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) {
          return response.text();
        }
        throw new Error("Network error.");
      })
      .then(data => {

      //  alert(data);
        //chargingClass.hideShowchargin(false);
      })
      .catch(error => {
        console.error("Error:", error);
      });
  }




  deleteJob(idJob){
      let result = confirm("Are you sure you want to delete the product?");

      if (!result) {
        return;
      }

      const url = "../../controller/lanyard/job.php"; // Replace with your API endpoint URL
      const data = {
        action: "deleteJob",
        idJob: idJob
      };

      fetch(url, {
      method: "POST", // HTTP POST method to send data
      headers: {
        "Content-Type": "application/json" // Indicate that you're sending JSON
      },
      body: JSON.stringify(data) // Convert the JSON object to a JSON string and send it
    })
      .then(response => {
        // Check if the response status is OK (2xx range)
        if (response.ok) {
          return response.json(); // Parse the response as JSON
        }
        // For other errors, throw a general network error
        throw new Error("Network error.");
      })
      .then(data => {
        if (data) {
          alert("The product has been delete successfully");
          location.reload();
        }
        //shoppingCart.addJobsToOrder(data);

      })
      .catch(error => {
      //  alert("error");
        // Handle specific errors (from throw in the .then block)
        console.log("Error");
        //alert(error.message); // Show the error message in an alert
      });



  }


  updatePriceShippingHTML(){

    const price_shipping = document.getElementById("price_shipping");
    const total_price = document.getElementById("total_price");

    if (this.shippingDays == 15) {
      this.shippingPrice = 0;
    }
    else if (this.shippingDays == 10) {
      this.shippingPrice = this.getSubtotal()* 0.2 ;
    }
    else if (this.shippingDays == 8) {
      this.shippingPrice = this.getSubtotal()* 0.5 ;
    }
    else {
      this.shippingPrice = 0;
      this.shippingDays == 15
    }

    this.total = this.subtotal + this.tax + this.shippingPrice;

    price_shipping.textContent = "£" +this.shippingPrice;

    total_price.textContent = "£" + (this.shippingPrice + this.tax + this.subtotal);

  }
  changeShoppingTime(days){

    this.shippingDays = days;
    this.updatePriceShippingHTML();

    this.updateOrder();

  }



  // Inicializa los estilos actuales de todos los elementos
  initializeStyles() {
    this.descriptionsStyles = [];
    this.arrowsStyles = [];

    for (let i = 0; i < descriptions_items_shopping_cart.length; i++) {
      const item = descriptions_items_shopping_cart[i];
      const arrow = arrow_products_shopping_cart[i];

      // Verificar que los elementos sean válidos antes de obtener estilos
      if (item instanceof Element && arrow instanceof Element) {
        const currentDisplay = window.getComputedStyle(item).display;
        const currentTransform = window.getComputedStyle(arrow).transform;

        this.descriptionsStyles.push({ element: item, display: currentDisplay });
        this.arrowsStyles.push({ element: arrow, transform: currentTransform });
      } else {
        console.error(`Elemento no válido en el índice ${i}`);
      }
    }
  }




  // Alterna la visibilidad de una descripción específica





   toggleDescriptionItemShoppingCart(index) {
    const descriptions_items_shopping_cart = document.querySelectorAll(".descriptions_items_shopping_cart");
    const arrow_products_shopping_cart = document.querySelectorAll(".arrow_products_shopping_cart");

    const description = descriptions_items_shopping_cart[index];
    const arrow = arrow_products_shopping_cart[index];

    if (!description) return;

    // Alternar clase para mostrar u ocultar
    description.classList.toggle("visible");

    // Opcional: rotar la flecha para indicar el estado
    if (arrow) {
      arrow.classList.toggle("rotated");
    }
  }

}

const container_draw_items_shopping_cart = document.getElementById("container_draw_items_shopping_cart");

const boxes4_container_shopping_cart = document.getElementById("boxes4_container_shopping_cart");



// Obtener los elementos del DOM
const product_items_shopping_cart = document.querySelectorAll(".product_items_shopping_cart");
const open_checkout = document.getElementById("open_checkout");
const descriptions_items_shopping_cart = document.querySelectorAll(".descriptions_items_shopping_cart");
const arrow_products_shopping_cart = document.querySelectorAll(".arrow_products_shopping_cart");

// Crear una instancia del carrito de compras
const shoppingCart = new ShoppingCart();
