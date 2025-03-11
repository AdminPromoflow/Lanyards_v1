class PaymentConfirmation {
  constructor() {
    // Iterar sobre cada elemento del carrito y agregar un evento
    for (let i = 0; i < product_items_payment_confirmation.length; i++) {
      product_items_payment_confirmation[i].addEventListener("click", () => {
        // Alternar la visibilidad del div correspondiente
        this.toggleDescriptionItemPaymentConfirmation(i);
      });
    }
  /*  open_payment_confirmation.addEventListener("click", function(){
      window.open("../../views/payment_confirmation/index.php", "_self");
    })*/

    // Obtener los estilos iniciales de todos los elementos
    this.initializeStyles();

    this.checkSizeItemsFormBoxesPaymentConfirmation();
    // Check size on load and resize
  window.addEventListener("resize", this.checkSizeItemsFormBoxesPaymentConfirmation);

  button_deliver_different_address.addEventListener("change", function() {
    if (this.checked) {
      form_boxes_payment_confirmation_2.classList.remove("active_form_boxes_payment_confirmation");

    } else {
      form_boxes_payment_confirmation_2.classList.add("active_form_boxes_payment_confirmation");

    }
});


    document.querySelectorAll('input[name="options_card_payment_confirmation"]').forEach(radio => {
        radio.addEventListener("change", this.getSelectedOption);
    });

  }
      getSelectedOption() {
        // Selecciona todos los radio buttons del grupo "options"
        const radios = document.querySelectorAll('input[name="options_card_payment_confirmation"]');

        // Recorre los radio buttons para encontrar el seleccionado
        radios.forEach(radio => {
            if (radio.checked ) {
              if ( radio.value == "Stripe") {
                  form_card_container_payment_confirmation.style.display = "flex";
                  button_payment_confirmation_paypal.style.display = "none";
                  button_place_order.style.display = "block";

              }
              else {
                form_card_container_payment_confirmation.style.display = "none";
                button_payment_confirmation_paypal.style.display = "block";
                button_place_order.style.display = "none";


              }
              //  alert( radio.value);
            }
        });

        // Muestra el resultado en el párrafo con id "result"
        }
   checkSizeItemsFormBoxesPaymentConfirmation() {
     const items = document.querySelectorAll(".items_form_boxes_payment_confirmation:nth-child(-n+2)");

     items.forEach(item => {
       if (item.offsetWidth > 180) {
           item.classList.add("items_form_boxes_payment_confirmation_half"); // Example: Expanding width if smaller than 180px

       } else {
         item.classList.remove("items_form_boxes_payment_confirmation_half"); // Example: Expanding width if smaller than 180px
       }
   });
  }

  // Inicializa los estilos actuales de todos los elementos
  initializeStyles() {
    this.descriptionsStyles = [];
    this.arrowsStyles = [];

    for (let i = 0; i < descriptions_items_payment_confirmation.length; i++) {
      const item = descriptions_items_payment_confirmation[i];
      const arrow = arrow_products_payment_confirmation[i];

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
  toggleDescriptionItemPaymentConfirmation(index) {
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
const product_items_payment_confirmation = document.querySelectorAll(".product_items_payment_confirmation");
const descriptions_items_payment_confirmation = document.querySelectorAll(".descriptions_items_payment_confirmation");
const arrow_products_payment_confirmation = document.querySelectorAll(".arrow_products_payment_confirmation");





const form_card_container_payment_confirmation = document.getElementById("form_card_container_payment_confirmation");
const button_payment_confirmation_paypal = document.getElementById("button_payment_confirmation_paypal");
const button_place_order = document.getElementById("button_place_order");
const button_deliver_different_address = document.getElementById("button_deliver_different_address");
const form_boxes_payment_confirmation_2 = document.getElementById("form_boxes_payment_confirmation_2");
// Crear una instancia del carrito de compras
const paymentConfirmation = new PaymentConfirmation();
