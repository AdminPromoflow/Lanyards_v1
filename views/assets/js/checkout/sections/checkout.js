class Checkout {
  constructor() {
    this.total;
    this.getOrder();
    this.getAddresses();

    button_place_order.addEventListener("click", function() {
      const address1 = checkout.getAddressIds1();
      let valid = true;

      // Recorrer los campos y validar
      for (const key in address1) {
        const input = address1[key];
        if (input) {
          // Elimina cualquier borde rojo anterior
          input.style.border = "";

          // Verifica si el campo está vacío
          if (!input.value.trim()) {
            input.style.border = "2px solid red";
            valid = false;
          }
        }
      }

      // Si todo está correcto, continúa
      if (valid) {
        checkout.makeAjaxRequestSaveOrder();
      } else {
        alert("Por favor, completa todos los campos obligatorios.");
      }
    });

  }

  getAddressIds1() {
    return {
      first_name: document.getElementById("first_name_1"),
      last_name: document.getElementById("last_name_1"),
      company_name: document.getElementById("company_name_1"),
      phone: document.getElementById("phone_1"),
      country: document.getElementById("country_1"),
      state: document.getElementById("state_1"),
      town_city: document.getElementById("town_city_1"),
      street_address_1: document.getElementById("street_address_1_1"),
      postcode: document.getElementById("postcode_1"),
      email_address: document.getElementById("email_address_1")
    };
  }

  makeFormRequestSaveOrder() {
    const url = "../../controller/lanyard/create_stripe_session.php";

    const data = {
      action: "setOrder",
      address1: this.getAddress1(),
      address2: this.getAddress2(),
      currency: "gbp",
      total: this.getTotal(),
      idOrder: this.getIdOrder()
    };

    // Crear formulario oculto
    const form = document.createElement("form");
    form.method = "POST";
    form.action = url;

    // Añadir los datos como campos ocultos
    for (const key in data) {
      if (data.hasOwnProperty(key)) {
        const input = document.createElement("input");
        input.type = "hidden";
        input.name = key;
        input.value = data[key];
        form.appendChild(input);
      }
    }

    // Añadir formulario al documento y enviarlo
    document.body.appendChild(form);
    form.submit();
  }


  addSecondAddress(event) {
    const checkbox = event.target;
    const form_boxes_checkout_2 = document.getElementById("form_boxes_checkout_2");

    if (checkbox ) {
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
      //  alert(data);

      const data2 =   JSON.parse(data);
      checkout.setHTMLOrder(data2["order"]);
      checkout.setTotal(data2["order"]["total"]);
      checkout.setIdOrder(data2["order"]["idOrder"]);

      })
      .catch(error => {
        console.error("Error:", error);
      });
  }

  setIdOrder(idOrder){
    this.idOrder = idOrder;
  }
  getIdOrder(){
    return this.idOrder;
  }

  setTotal(total){
    this.total = total;
  }

  getTotal() {
    return Math.round(this.total * 100);
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
    const boxes_checkout = document.getElementById("boxes_checkout");

    boxes_checkout.innerHTML = `
    <div class="form_boxes_checkout">
      <div class="items_form_boxes_checkout ">
        <label for="first_name_1">First name *</label>
        <input type="text" id="first_name_1" value="${data[0]["first_name"]}">
      </div>
      <div class="items_form_boxes_checkout ">
        <label for="last_name_1">Last name *</label>
        <input type="text" id="last_name_1" value="${data[0]["last_name"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="company_name_1">Company name (optional)</label>
        <input type="text" id="company_name_1" value="${data[0]["company_name"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="phone_1">Phone *</label>
        <input type="text" id="phone_1" value="${data[0]["phone"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="country_1">Country/Region *</label>
        <input type="text" id="country_1" value="${data[0]["country"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="street_address_1_1">Street address *</label>
        <input type="text" id="street_address_1_1" value="${data[0]["street_address_1"]}">
        <input type="text" id="street_address_2_1" value="${data[0]["street_address_2"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="town_city_1">Town / City *</label>
        <input type="text" id="town_city_1" value="${data[0]["town_city"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="postcode_1">Postcode *</label>
        <input type="text" id="postcode_1" value="${data[0]["postcode"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="email_address_1">Email address *</label>
        <input type="text" id="email_address_1" value="${data[0]["email_address"]}">
      </div>

      <div class="items_form_boxes_checkout_checkbox">
        <label>
          <input type="checkbox" onchange="checkout.addSecondAddress(event)" id="button_deliver_different_address">
          Deliver to a different address?
        </label>
      </div>
    </div>

    <div id="form_boxes_checkout_2" class="form_boxes_checkout active_form_boxes_checkout">
      <div class="items_form_boxes_checkout ">
        <label for="first_name_2">First name *</label>
        <input type="text" id="first_name_2" value="${data[1]["first_name"]}">
      </div>
      <div class="items_form_boxes_checkout ">
        <label for="last_name_2">Last name *</label>
        <input type="text" id="last_name_2" value="${data[1]["last_name"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="company_name_2">Company name (optional)</label>
        <input type="text" id="company_name_2" value="${data[1]["company_name"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="phone_2">Phone *</label>
        <input type="text" id="phone_2" value="${data[1]["phone"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="country_2">Country/Region *</label>
        <input type="text" id="country_2" value="${data[1]["country"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="street_address_1_2">Street address *</label>
        <input type="text" id="street_address_1_2" value="${data[1]["street_address_1"]}">
        <input type="text" id="street_address_2_2" value="${data[1]["street_address_2"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="town_city_2">Town / City *</label>
        <input type="text" id="town_city_2" value="${data[1]["town_city"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="postcode_2">Postcode *</label>
        <input type="text" id="postcode_2" value="${data[1]["postcode"]}">
      </div>
      <div class="items_form_boxes_checkout">
        <label for="email_address_2">Email address *</label>
        <input type="text" id="email_address_2" value="${data[1]["email_address"]}">
      </div>
    </div>
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

  initializeStyles(){
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

  getAddress1() {
  const address1 = {
    first_name: document.getElementById("first_name_1").value,
    last_name: document.getElementById("last_name_1").value,
    company_name: document.getElementById("company_name_1").value,
    phone: document.getElementById("phone_1").value,
    country: document.getElementById("country_1").value,
    state: document.getElementById("state_1")?.value || "", // opcional
    town_city: document.getElementById("town_city_1").value,
    street_address_1: document.getElementById("street_address_1_1").value,
    street_address_2: document.getElementById("street_address_2_1").value,
    postcode: document.getElementById("postcode_1").value,
    email_address: document.getElementById("email_address_1").value
  };

  return address1;
}

  getAddress2() {
  const address2 = {
    first_name: document.getElementById("first_name_2").value,
    last_name: document.getElementById("last_name_2").value,
    company_name: document.getElementById("company_name_2").value,
    phone: document.getElementById("phone_2").value,
    country: document.getElementById("country_2").value,
    state: document.getElementById("state_2")?.value || "", // opcional
    town_city: document.getElementById("town_city_2").value,
    street_address_1: document.getElementById("street_address_1_2").value,
    street_address_2: document.getElementById("street_address_2_2").value,
    postcode: document.getElementById("postcode_2").value,
    email_address: document.getElementById("email_address_2").value
  };

  return address2;
}

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
