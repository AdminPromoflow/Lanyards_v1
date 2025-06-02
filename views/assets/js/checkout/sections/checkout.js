class Checkout {
  constructor() {

    this.getOrder();
    this.getAddresses();

    // Iterar sobre cada elemento del carrito y agregar un evento
  /*  for (let i = 0; i < product_items_checkout.length; i++) {
      product_items_checkout[i].addEventListener("click", () => {
        // Alternar la visibilidad del div correspondiente
        this.toggleDescriptionItemCheckout(i);
      });
    }


    // Obtener los estilos iniciales de todos los elementos
    this.initializeStyles();

    this.checkSizeItemsFormBoxesCheckout();
    // Check size on load and resize
  window.addEventListener("resize", this.checkSizeItemsFormBoxesCheckout);

  button_deliver_different_address.addEventListener("change", function() {
    if (this.checked) {
      form_boxes_checkout_2.classList.remove("active_form_boxes_checkout");

    } else {
      form_boxes_checkout_2.classList.add("active_form_boxes_checkout");

    }
});


    document.querySelectorAll('input[name="options_card_checkout"]').forEach(radio => {
        radio.addEventListener("change", this.getSelectedOption);
    });*/

  /*  button_deliver_different_address.addEventListener("change", function() {
      if (this.checked) {
        form_boxes_checkout_2.classList.remove("active_form_boxes_checkout");

      } else {
        form_boxes_checkout_2.classList.add("active_form_boxes_checkout");

      }
  });*/

  }

  addSecondAddress() {
    const checkbox = document.getElementById("button_deliver_different_address");
    const form_boxes_checkout_2 = document.getElementById("form_boxes_checkout_2");

    if (checkbox && form_boxes_checkout_2) {
      if (checkbox.checked) {
        form_boxes_checkout_2.style.display = "block";
      } else {
        form_boxes_checkout_2.style.display = "none";
      }
    }
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
        //alert(data);
      const data2 =   JSON.parse(data);
      checkout.setHTMLOrder(data2["order"]);

      })
      .catch(error => {
        console.error("Error:", error);
      });
  }

  getAddresses(){
    const url = "../../controller/lanyard/addresses.php";
    const data = {
      action: "getAddresses"
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
      checkout.setHTMLAddresses(data2["addresses"]);

      })
      .catch(error => {
        console.error("Error:", error);
      });
  }

  setHTMLAddresses(data){
  //  alert();
    const boxes_checkout = document.getElementById("boxes_checkout");

    boxes_checkout.innerHTML = `
    <div class="form_boxes_checkout">
      <div class="items_form_boxes_checkout ">
        <label for="">First name *</label>
        <input type="text" name="" value="${data[0]["first_name"]}">
      </div>
      <div class="items_form_boxes_checkout ">
        <label for="">Last name *</label>
        <input type="text" name="" value="${data[0]["last_name"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Company name (optional)</label>
        <input type="text" name="" value="${data[0]["company_name"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Phone *</label>
        <input type="text" name="" value="${data[0]["phone"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Country/Region *</label>
        <input type="text" name="" value="${data[0]["country"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Street address *</label>
        <input type="text" name="" value="${data[0]["street_address_1"]}">
        <input type="text" name="" value="${data[0]["street_address_2"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Town / City *</label>
        <input type="text" name="" value="${data[0]["town_city"]}">
      </div>

      <div class="items_form_boxes_checkout">
        <label for="">Postcode *</label>
        <input type="text" name="" value="${data[0]["postcode"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Email address *</label>
        <input type="text" name="" value="${data[0]["email_address"]}">
      </div>

    <!--  <div class="items_form_boxes_checkout">
        <label for="">Order notes (optional)</label>
        <input type="text" name="" value="${data[0][""]}">
      </div>-->
      <div class="items_form_boxes_checkout_checkbox">
        <label  >
            <input type="checkbox" id="button_deliver_different_address">
            Deliver to a different address?
        </label>
      </div>
    </div>
    <div id="form_boxes_checkout_2" class="form_boxes_checkout active_form_boxes_checkout">
      <div class="items_form_boxes_checkout ">
        <label for="">First name *</label>
        <input type="text" name="" value="${data[1]["first_name"]}">
      </div>
      <div class="items_form_boxes_checkout ">
        <label for="">Last name *</label>
        <input type="text" name="" value="${data[1]["last_name"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Company name (optional)</label>
        <input type="text" name="" value="${data[1]["company_name"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Phone *</label>
        <input type="text" name="" value="${data[1]["phone"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Country/Region *</label>
        <input type="text" name="" value="${data[1]["country"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Street address *</label>
        <input type="text" name="" value="${data[1]["street_address_1"]}">
        <input type="text" name="" value="${data[1]["street_address_2"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Town / City *</label>
        <input type="text" name="" value="${data[1]["town_city"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Postcode *</label>
        <input type="text" name="" value="${data[1]["postcode"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="">Email address *</label>
        <input type="text" name="" value="${data[1]["email_address"]}">
      </div>

    </div>
    <script type="text/javascript">
    const button_deliver_different_address =   document.getElementById("button_deliver_different_address");
    const form_boxes_checkout_2 =   document.getElementById("form_boxes_checkout_2");


    form_boxes_checkout_2.style.display = "none";

      button_deliver_different_address.addEventListener("change", function() {
        
          if (this.checked) {
            form_boxes_checkout_2.classList.remove("active_form_boxes_checkout");

          } else {
            form_boxes_checkout_2.classList.add("active_form_boxes_checkout");

          }
      });

      // Ocultar el segundo bloque inicialmente
    </script>

    `;



  }


  setHTMLOrder(data){

    const boxes_container_checkout = document.getElementById("boxes_container_checkout");


    boxes_container_checkout.innerHTML =
    `<div class="items2_checkout">
      <h3>Product</h3>
      <h3>Subtotal</h3>
    </div>

    <div class="elements_boxes_container_checkout">
      <h3>Subtotal</h3>
      <h3>${data["subtotal"]}</h3>
    </div>
    <div class="elements_boxes_container_checkout">
      <h3>Shipping</h3>
      <h3>${data["shipping_price"]}</h3>
    </div>
    <div class="elements_boxes_container_checkout">
      <h3>Tax</h3>
      <h3>${data["tax"]}</h3>
    </div>
    <div class="elements_boxes_container_checkout">
      <h3>total</h3>
      <h3>${data["total"]}</h3>
    </div>`

  }
      getSelectedOption() {
        // Selecciona todos los radio buttons del grupo "options"
        const radios = document.querySelectorAll('input[name="options_card_checkout"]');

        // Recorre los radio buttons para encontrar el seleccionado
        radios.forEach(radio => {
            if (radio.checked ) {
              if ( radio.value == "Stripe") {
                  form_card_container_checkout.style.display = "flex";
                  button_checkout_paypal.style.display = "none";
                  button_place_order.style.display = "block";

              }
              else {
                form_card_container_checkout.style.display = "none";
                button_checkout_paypal.style.display = "block";
                button_place_order.style.display = "none";


              }
              //  alert( radio.value);
            }
        });

        // Muestra el resultado en el párrafo con id "result"
        }
   checkSizeItemsFormBoxesCheckout() {
     const items = document.querySelectorAll(".items_form_boxes_checkout:nth-child(-n+2)");

     items.forEach(item => {
       if (item.offsetWidth > 180) {
           item.classList.add("items_form_boxes_checkout_half"); // Example: Expanding width if smaller than 180px

       } else {
         item.classList.remove("items_form_boxes_checkout_half"); // Example: Expanding width if smaller than 180px
       }
   });
  }

  // Inicializa los estilos actuales de todos los elementos
  initializeStyles() {
    this.descriptionsStyles = [];
    this.arrowsStyles = [];

    for (let i = 0; i < descriptions_items_checkout.length; i++) {
      const item = descriptions_items_checkout[i];
      const arrow = arrow_products_checkout[i];

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
  /*toggleDescriptionItemCheckout(index) {
    const item = this.descriptionsStyles[index]?.element;
    const arrow = this.arrowsStyles[index]?.element;

    // Verificar que los elementos existan antes de manipularlos
    if (item && arrow) {
      const currentDisplay = this.descriptionsStyles[index].display;

      if (currentDisplay === "block") {
        item.style.display = "none";
        arrow.style.transform = "rotate(0deg)";
        this.descriptionsStyles[index].display = "none";
      } else {
        item.style.display = "block";
        arrow.style.transform = "rotate(90deg)";
        this.descriptionsStyles[index].display = "block";
      }
    } else {
      console.error(`No se puede alternar el índice ${index}: Elemento no válido.`);
    }
  }*/
}

// Obtener los elementos del DOM
const product_items_checkout = document.querySelectorAll(".product_items_checkout");
const descriptions_items_checkout = document.querySelectorAll(".descriptions_items_checkout");
const arrow_products_checkout = document.querySelectorAll(".arrow_products_checkout");





const form_card_container_checkout = document.getElementById("form_card_container_checkout");
const button_checkout_paypal = document.getElementById("button_checkout_paypal");
const button_place_order = document.getElementById("button_place_order");
const button_deliver_different_address = document.getElementById("button_deliver_different_address");
const form_boxes_checkout_2 = document.getElementById("form_boxes_checkout_2");
// Crear una instancia del carrito de compras
const checkout = new Checkout();
