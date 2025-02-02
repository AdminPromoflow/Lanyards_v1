class Checkout {
  constructor() {
    // Iterar sobre cada elemento del carrito y agregar un evento
    for (let i = 0; i < product_items_checkout.length; i++) {
      product_items_checkout[i].addEventListener("click", () => {
        // Alternar la visibilidad del div correspondiente
        this.toggleDescriptionItemCheckout(i);
      });
    }
    open_checkout.addEventListener("click", function(){
      window.open("../../views/checkout/index.php", "_self");
    })

    // Obtener los estilos iniciales de todos los elementos
    this.initializeStyles();
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
const open_checkout = document.getElementById("open_checkout");
const descriptions_items_checkout = document.querySelectorAll(".descriptions_items_checkout");
const arrow_products_checkout = document.querySelectorAll(".arrow_products_checkout");

// Crear una instancia del carrito de compras
const shoppingCart = new Checkout();
