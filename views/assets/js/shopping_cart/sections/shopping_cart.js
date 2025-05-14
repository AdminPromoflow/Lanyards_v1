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

    // Obtener los estilos iniciales de todos los elementos

    this.initializeStyles();
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


      for (var i = 0; i < data.length; i++) {

        alert(JSON.stringify(data[i]));

      }

    /*  if (data.message) {

      }
      else{
      //  alert("The email address or password you entered is incorrect.");
    }*/
    })
    .catch(error => {
      alert("error");
      // Handle specific errors (from throw in the .then block)
    //  console.error("Error:", error.message);
      //alert(error.message); // Show the error message in an alert
    });
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
const product_items_shopping_cart = document.querySelectorAll(".product_items_shopping_cart");
const open_checkout = document.getElementById("open_checkout");
const descriptions_items_shopping_cart = document.querySelectorAll(".descriptions_items_shopping_cart");
const arrow_products_shopping_cart = document.querySelectorAll(".arrow_products_shopping_cart");

// Crear una instancia del carrito de compras
const shoppingCart = new ShoppingCart();
