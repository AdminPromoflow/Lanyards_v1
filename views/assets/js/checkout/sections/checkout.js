class Checkout {
  constructor() {
    // Iterar sobre cada elemento del carrito y agregar un evento
    for (let i = 0; i < product_items_checkout.length; i++) {
      product_items_checkout[i].addEventListener("click", () => {
        // Alternar la visibilidad del div correspondiente
        this.toggleDescriptionItemCheckout(i);
      });
    }
  /*  open_checkout.addEventListener("click", function(){
      window.open("../../views/checkout/index.php", "_self");
    })*/

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
    });

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
  toggleDescriptionItemCheckout(index) {
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
const shoppingCart = new Checkout();
